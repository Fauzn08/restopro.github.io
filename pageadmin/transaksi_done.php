<?php
include('../inc_koneksi/koneksi.php');
include('../inc_authcheck/autcheck.php');

$menu = mysqli_query($koneksi, "SELECT * FROM menu");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Done</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
</head>
<body>
<body style="background-color: #B99B6B;">
    <div class="container pt-5">
        <h1 style="color: #fff;">Transaksi Staf</h1>
        <h5 style="color: #fff;">User : <?=$_SESSION['user']?></h5><br>
        <a href="transaksi.php" class="btn btn-secondary">Kembali ke Transaksi</a>
        <a href="kasir.php" class="btn btn-warning">Kembali Ke Home</a><br /><br />
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
                        </tr>
                        <tbody>
                            <?php
                            $data =mysqli_query($koneksi, "SELECT * FROM transaksi WHERE status_order = 'Done'");
                            foreach ($data as $key => $value) :
                            ?>
                                <tr style="background-color: #fff;">
                                    <td><?= $value['id_pesanan']; ?></td>
                                    <td><?= $value['tanggal_waktu']; ?></td>
                                    <td><?= number_format($value['total']);  ?></td>
                                    <td><?= $value['status_order']; ?></td>

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