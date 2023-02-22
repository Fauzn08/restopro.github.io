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
    <title>Riwayat Stok</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body style="background-color: #B99B6B;">

<!--Riwayat Stok Masuk-->
<section>
<div class="container pt-5">
        <h1 style="color: #fff;">Riwayat Stok</h1>
        <a href="menu.php" class="btn btn-primary">Kembali Ke Menu</a>
        <a href="index.php" class="btn btn-warning">Kembali Ke Home</a><br /><br />

<!--Riwayat Stok Masuk-->
<section>
        </form><br>
        <h2>Stok Ditambah</h2>
        <table class="table table-bordered">
            <tr style="background-color:#000; color:#fff;">
                <th>No.</th>
                <th>ID Menu</th>
                <th>Waktu Bertambah</th>
                <th>Jumlah Bertambah</th>

            </tr>
            <tbody>
                <?php
                $sqltambahan = "";
                $per_halaman = 5;

                $query = "SELECT * FROM stok_masuk $sqltambahan";
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

                ?>
                    <tr style="background-color: #fff;">
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $row['id_menu']; ?></td>
                        <td><?php echo $row['waktu_masuk']; ?></td>
                        <td><?php echo $row['stok_masuk']; ?></td>
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
                        <a class="page-link" href="riwayat_stok.php?katakunci&page=<?php echo $i ?>"><?php echo $i ?></a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </section>

    <!--Riwayat Stok Kurang-->
<section>
        </form><br>
        <h2>Stok Dikurang</h2>
        <table class="table table-bordered">
            <tr style="background-color:#000; color:#fff;">
                <th>No.</th>
                <th>ID Menu</th>
                <th>Waktu Berkurang</th>
                <th>Jumlah Berkurang</th>

            </tr>
            <tbody>
                <?php
                $sqltambahan = "";
                $per_halaman = 5;
                
                $query = "SELECT * FROM stok_kurang $sqltambahan ";
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

                ?>
                    <tr style="background-color: #fff;">
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $row['id_menu']; ?></td>
                        <td><?php echo $row['waktu_keluar']; ?></td>
                        <td><?php echo $row['stok_keluar']; ?></td>
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
                        <a class="page-link" href="riwayat_stok.php?katakunci&page=<?php echo $i ?>"><?php echo $i ?></a>
                    </li>
                <?php
                }
                ?>
            </ul>

        </nav>
    </div>
    </section>

</body>
</html>