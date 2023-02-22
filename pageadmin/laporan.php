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
    <title>Laporan</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body style="background-image: url('../gambar/image.jpg');">
    <div class="container pt-5">
        <h1 style="color: #fff;">Laporan Menu dan Pemasukan</h1>
        <a href="index.php" class="btn btn-warning">Kembali Ke Home</a><br /><br />
        <?php
        $katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";
        ?>
        <form class="row g-3" method="get">
            <div class="col-auto">
                <input type="text" class="form-control" placeholder="Masukkan Kata Kunci" name="katakunci" value="<?php echo $katakunci; ?>" />
            </div>
            <div class="col-auto">
                <input type="submit" name="cari" value="Cari Tulisan" class="btn btn-secondary" />
            </div><br>


        </form><br>
        <a style="margin-left:910px;" href="laporan_pendapatan.php" class="btn btn-info"><img src="../pageadmin/gambar/file.png" width="25px" height="25px">  Laporan Pemasukan</a><br /><br />
        <table class="table table-bordered">
            <tr style="background-color:#000; color:#fff;">
                <th>ID Transaksi</th>
                <th>Nomor Pesanan</th>
                <th>Nama Kasir</th>
                <th>Tanggal dan Waktu</th>
                <th>Total</th>
            </tr>
            <tbody>
                <?php
                $sqltambahan = "";
                $per_halaman = 10;
                if ($katakunci != '') {
                    $array_katakunci = explode(" ", $katakunci);
                    for ($x = 0; $x < count($array_katakunci); $x++) {
                        $sqlcari[] = "(tanggal_waktu like '%" . $array_katakunci[$x] . "%' or nama_kasir like '%" . $array_katakunci[$x] . "%')";
                    }
                    $sqltambahan = " where " . implode(" or ", $sqlcari);
                }

                $query = "SELECT * FROM transaksi $sqltambahan";
                $page  = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $mulai = ($page > 1) ? ($page * $per_halaman) - $per_halaman : 0;
                $result = mysqli_query($koneksi, $query);
                $total = mysqli_num_rows($result);
                $pages = ceil($total / $per_halaman);
                $nomor = $mulai + 1;
                $query = $query . " ORDER BY id_transaksi ASC limit $mulai,$per_halaman";

                $result = mysqli_query($koneksi, $query);

                if (!$result) {
                    die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
                }


                while ($row = mysqli_fetch_assoc($result)) {

                ?>
                    <tr style="background-color: #fff;">
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $row['id_pesanan']; ?></td>
                        <td><?php echo $row['nama_kasir']; ?></td>
                        <td><?php echo $row['tanggal_waktu']; ?></td>
                        <td><?php echo $row['total']; ?></td>
                    </tr>
                <?php
                }
                ?>

                
            </tbody>
        </table>
        <div class="card">
            <?php
            $total_pendapatan = mysqli_query($koneksi, "SELECT SUM(total) AS total_pendapatan FROM transaksi");
            $total = mysqli_fetch_array($total_pendapatan);
            $t = $total['total_pendapatan'];
            ?>
        <h5 style="display: flex; justify-content:center;">Total Pendapatan = Rp.<?php echo $t; ?></h5>
        </div><br/><br/>


        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php
                $cari = (isset($_GET['cari'])) ? $_GET['cari'] : "";

                for ($i = 1; $i <= $pages; $i++) {
                ?>
                    <li class="page-item">
                        <a class="page-link" href="laporan.php?katakunci<?php echo $katakunci ?>&cari = <?php echo $cari ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                    </li>
                <?php
                }
                ?>
            </ul>

        </nav>
    </div>
</body>

</html>