<?php
include('../inc_koneksi/koneksi.php');
include('../inc_authcheck/autcheckasir.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Bayar</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
</head>
<body style="background-color: #B99B6B;">
<section>
<div class="container pt-5">
        <h1 style="color: #fff;">Pembayaran</h1>
        <h5 style="color: #fff;">User : <?=$_SESSION['user']?></h5><br>
        <a href="transaksi.php" class="btn btn-secondary">Kembali Ke Transaksi</a>
        <a href="kasir.php" class="btn btn-warning">Kembali Ke Home</a><br /><br />
        <hr>

        <div class="card-body">
            <form action="editmenu.php" method="post">
                <table class="table table-data2 mt-2">
                    <thead style="background-color: #000; color:#fff;">
                    <tr>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Jumlah Pesanan</th>
                        <th>Sub total</th>
                    </tr>

                    </thead>
                    <tbody style="background-color: #fff;">
                        <?php
                        if(isset($_GET['id_transaksi'])):
                        $id_transaksi = $_GET['id_transaksi'];
                        $transaksi_detail = mysqli_query($koneksi, "SELECT transaksi_detail.*, menu.nama,menu.harga FROM transaksi_detail INNER JOIN
                        menu ON transaksi_detail.id_menu = menu.id_menu WHERE id_transaksi = '$id_transaksi'");
                        while($data =mysqli_fetch_assoc($transaksi_detail)):
                        $sub_total = $data['harga'] * $data['qty'];
                        ?>
                        <tr>
                            <td><?= $data['nama'];?></td>
                            <td><?= $data['harga'];?></td>
                            <td><?= $data['qty'];?></td>
                            <td><?php echo $sub_total;?></td>
                        </tr>
                        <?php endwhile;?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </form>

            <?php
            $trans = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi = '$id_transaksi'");
            $transaksi = mysqli_fetch_assoc($trans);
            ?>
            <div class="card">
            <div class="mt-5">
                <form action="transaksi_selesai.php" method="post" class="mb-5">
                    <div class="row d-flex justify-content-center">
                        <tr>
                            <div class="col-md-5">
                                <td>Total Harga</td>
                                <td><input type="text" class="form-control" readonly value="<?= number_format($transaksi['total']);?>"></td>
                                <input type="hidden" name="total" value="<?= $transaksi['total'] ?>">
                                <input type="hidden" name="id_transaksi" value="<?= $id_transaksi?>">
                            </div>
                            <div class="col-md-5">
                                <td>Bayar</td>
                                <td>
                                    <div class="input-group">
                                        <input style="background-color: #e9ecef;" type="text" class="form-control" name="bayar" value="0">
                                        <button type="submit" class="btn btn-success" name="submit">Bayar</button>
                                    </div>
                                </td>
                            </div>
                        </tr>
                    </div>
                </form>
            </div>
     </div>
 </div>
</div>
                   
</section>
</body>
</html>