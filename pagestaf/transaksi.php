<?php
include('../inc_koneksi/koneksi.php');
include('../inc_authcheck/autcheckasir.php');

$menu = mysqli_query($koneksi, "SELECT * FROM menu");

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
        <h1 style="color: #fff;">Transaksi Staf</h1>
        <h5 style="color: #fff;">User : <?=$_SESSION['user']?></h5><br>
        <a href="transaksi_done.php" class="btn btn-secondary">Lihat Transaksi Selesai</a>
        <a href="kasir.php" class="btn btn-warning">Kembali Ke Home</a><br /><br />
        <hr>
        <div style="display: flex; justify-content:center;" class="row">
            <div class="col-md-15">
                <br>
                <section>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10">
                            <div class="card card-success">
                    <table class="table table-bordered">
                        <tr style="background-color:#000; color:#fff;">

                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Aksi</th>
                        </tr>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM menu ORDER BY id_menu ASC";
                            $result = mysqli_query($koneksi,$query);

                            if (!$result) {
                                die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
                            }

                            while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                                <tr style="background-color: #fff;">
                                    <form action="keranjang_act.php?action=<?= $row['id_menu'] ?>" method="post">
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= number_format($row['harga']); ?></td>
                                        <td align="center"><input type="number" name="qty" min="1" max="<?= $row['stok'] ?>" style="background-color: #e9ecef; width: 60px;" value="1"></td>
                                        <td class="d-flex justify-content-start">
                                            <div class="table-data-feature">
                                                <button type="submit" class="item" data-toggle="tooltip" data-placement="top" title="Pesan">
                                                    <a href="keranjang_act.php?action=<?= $row['id_menu'] ?>">
                                                        <img src="../pagestaf/gambar/keranjang.png" width="20px" alt="">
                                                    </a>
                                                </button>
                                            </div>
                                        </td>
                                    </form>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <a href="keranjang_act.php?pesanan_selesai">
                        <button class="btn btn-primary">Pesanan Selesai</button><br>
                    </a>
                    </form><br>
                </div>
            </div>
            
            </div><br>
                    
            </section>

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
                                        <a href="transaksi_bayar.php?id_transaksi=<?= $value['id_transaksi']; ?>" class="btn btn-success">Bayar
                                        </a>
                                        <a href="edit_transaksi.php?id_transaksi=<?= $value['id_transaksi']; ?>" class="btn btn-warning">Edit
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