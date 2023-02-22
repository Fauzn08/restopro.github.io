<?php
include('../inc_koneksi/koneksi.php');
include('../inc_authcheck/autcheck.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body style="background-image: url('../gambar/image.jpg');">
    <div class="container pt-5">
        <h1 style="color: #fff;">List Menu</h1>
        <a href="index.php" class="btn btn-warning">Kembali Ke Home</a>
        <a href="tambah_menu.php" class="btn btn-primary">Tambah Data</a>
        <a href="riwayat_stok.php" class="btn btn-success">Lihat Riwayat Stok</a><br /><br />
        <?php
        $katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";
        ?>
        <form class="row g-3" method="get">
            <div class="col-auto">
                <input type="text" class="form-control" placeholder="Masukkan Kata Kunci" name="katakunci" value="<?php echo $katakunci; ?>" />
            </div>
            <div class="col-auto">
                <input type="submit" name="cari" value="Cari Tulisan" class="btn btn-secondary" />
            </div>

        </form><br>
        <table class="table table-bordered">
            <tr style="background-color:#000; color:#fff;">
                <th>No.</th>
                <th>Gambar</th>
                <th>Nama Menu</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <tbody>
                <?php
                $sqltambahan = "";
                $per_halaman = 5;
                if ($katakunci != '') {
                    $array_katakunci = explode(" ", $katakunci);
                    for ($x = 0; $x < count($array_katakunci); $x++) {
                        $sqlcari[] = "(nama like '%" . $array_katakunci[$x] . "%' or kategori like '%" . $array_katakunci[$x] . "%')";
                    }
                    $sqltambahan = " where " . implode(" or ", $sqlcari);
                }

                $query = "SELECT * FROM menu $sqltambahan";
                $page  = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $mulai = ($page > 1) ? ($page * $per_halaman) - $per_halaman : 0;
                $result = mysqli_query($koneksi, $query);
                $total = mysqli_num_rows($result);
                $pages = ceil($total / $per_halaman);
                $nomor = $mulai + 1;
                $query = $query . " ORDER BY id_menu ASC limit $mulai,$per_halaman";

                $result = mysqli_query($koneksi, $query);

                if (!$result) {
                    die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
                }


                while ($row = mysqli_fetch_assoc($result)) {
                    if($row['stok']==0){
                        mysqli_query($koneksi, "UPDATE menu SET status_stok = 'Kosong' WHERE stok = 0");
                    } else {
                        mysqli_query($koneksi, "UPDATE menu SET status_stok = 'Tersedia' WHERE stok > 0");
                    }
                ?>
                    <tr style="background-color: #fff;">
                        <td><?php echo $nomor++; ?></td>
                        <td><img src="../gambar/<?php echo $row['gambar']; ?>" width="80px"></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['kategori']; ?></td>
                        <td><?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                        <td align="center"><?php echo $row['stok']; ?></td>
                        <td><?php echo $row['status_stok']; ?></td>
                        <td>
                        <a href="kurang_stok.php?id=<?php echo $row['id_menu']; ?>" style="background-color: #FF8B13;"><button style="border: none; border-radius:2px; background-color:grey;"><img style="margin-bottom: 3px;">-</button></a>
                        <a href="edit_stok.php?id=<?php echo $row['id_menu']; ?>" style="background-color: #FF8B13;"><button style="border: none; border-radius:2px; background-color:grey;"><img style="margin-bottom: 3px;">+</button></a>
                            <a href="edit_menu.php?id=<?php echo $row['id_menu']; ?>" style="background-color: #FF8B13;"><button style="border: none; border-radius:2px; background-color:green;"><img style="margin-bottom: 3px;" src="../pageadmin/gambar/edit.png" width="20px"></button></a>
                            <a href="proses_hapus.php?id=<?php echo $row['id_menu']; ?>" onclick="return confirm('Anda yakin ingin hapus data ini?')" style="background-color: #CD0404;"><button style="border: none; border-radius:2px; background-color:red;"><img style="margin-bottom: 3px;" src="../pageadmin/gambar/delete.png" width="20px" alt=""></button></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php
                $cari = (isset($_GET['cari'])) ? $_GET['cari'] : "";

                for ($i = 1; $i <= $pages; $i++) {
                ?>
                    <li class="page-item">
                        <a class="page-link" href="menu.php?katakunci<?php echo $katakunci ?>&cari = <?php echo $cari ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                    </li>
                <?php
                }
                ?>
            </ul>

        </nav>
    </div>
</body>

</html>