<?php
include('../inc_koneksi/koneksi.php');
include('../inc_authcheck/autcheck.php');

$menu = mysqli_query($koneksi, "SELECT * FROM menu");

if(isset($_GET['hapuspesanan'])){
    $id_transaksi = $_GET['id_transaksi'];
    $q1 = mysqli_query($koneksi, "DELETE FROM transaksi where id_transaksi = '$id_transaksi'");
    $q2 = mysqli_query($koneksi, "DELETE FROM transaksi_detail where id_transaksi = '$id_transaksi'");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
</head>

<body style="background-color: #B99B6B;">
    <div class="container pt-5">
        <h1 style="color: #fff;">Transaksi Admin</h1>
        <h5 style="color: #fff;">User : <?=$_SESSION['user']?></h5><br>
        <a href="index.php" class="btn btn-secondary">Kembali Ke Home</a>
        <a href="transaksi_done.php" class="btn btn-primary">Lihat Transaksi Selesai</a><br /><br />
        <hr>
        <div style="display: flex; justify-content:center;" class="row">
            <div class="col-md-15">
                <br>

            <!--Muncul-->
            <section>
                <form action="editorder.php" method="post">
                    <table class="table table-bordered">
                        <tr style="background-color:#000; color:#fff;">

                            <th>Nomor Order</th>
                            <th>Tanggal Order</th>
                            <th>Total Order</th>
                            <th>Status Order</th>
                            <th>Aksi</th>
                        </tr>
                        <tbody>
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE status_order = 'on proses'");
                            foreach ($data as $key => $value) :
                            ?>
                                <tr style="background-color: #fff;">
                                    <td><?= $value['id_pesanan']; ?></td>
                                    <td><?= $value['tanggal_waktu']; ?></td>
                                    <td><?= number_format($value['total']);  ?></td>
                                    <td><?= $value['status_order']; ?></td>
                                    <td>
                                        <a href="edit_transaksi.php?id_transaksi=<?= $value['id_transaksi']; ?>" class="btn btn-warning">Edit
                                        </a>
                                        <a href="?hapuspesanan&id_transaksi=<?= $value['id_transaksi']; ?>" onclick="return confirm('Yakin Hapus Pesanan?')" class="btn btn-danger">Hapus
                                        </a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </form>
                </div>
            </div>
            </section>
            
</body>

</html>