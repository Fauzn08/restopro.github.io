<?php
include('../inc_koneksi/koneksi.php');
include('../inc_authcheck/autcheck.php');

if(isset($_GET['hapuspesanan'])){
    $id_transaksi = $_GET['id_transaksi'];
    $id_menu = $_GET['id_menu'];

    $qry = mysqli_query($koneksi, "SELECT * FROM transaksi_detail WHERE id_transaksi = '$id_transaksi' AND id_menu = '$id_menu'");
    $ordersmenu = mysqli_fetch_assoc($qry);
    $qty_menu = $ordersmenu['qty'];

    $data = mysqli_query($koneksi, "SELECT * FROM menu WHERE id_menu = '$id_menu'");
    $menu = mysqli_fetch_assoc($data);
    $harga = $menu['harga'];

    $sub_total = $qty_menu*$harga;

    mysqli_query($koneksi, "UPDATE transaksi SET total = total - '$sub_total' WHERE id_transaksi = '$id_transaksi'");
    mysqli_query($koneksi, "DELETE FROM transaksi_detail WHERE id_transaksi = '$id_transaksi' AND id_menu = '$id_menu'");

    header("location:edit_transaksi.php?id_transaksi=".$id_transaksi); 
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
        <h1 style="color: #fff;">Transaksi Staf</h1>
        <h5 style="color: #fff;">User : <?= $_SESSION['user'] ?></h5><br>
        <a href="transaksi.php" class="btn btn-warning">Kembali Ke Transaksi</a>
        <a href="index.php" class="btn btn-secondary">Kembali Ke Home</a><br /><br />
        <hr>
        <div style="display: flex; justify-content:center;" class="row">
            <div class="col-md-15">
                <br>
                <section id="transaksi">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10">
                            <div class="card card-success">
                                <table class="table table-bordered">
                                    <tr style="background-color:#000; color:#fff;">

                                        <th>Nama Menu</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Sub total</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <tbody>
                                           <?php
                                           if(isset($_GET['id_transaksi'])):
                                            $id_transaksi = $_GET['id_transaksi'];
                                            $query = mysqli_query($koneksi, "SELECT transaksi_detail.*, menu.nama,menu.harga FROM transaksi_detail INNER JOIN
                                            menu ON transaksi_detail.id_menu = menu.id_menu WHERE id_transaksi = '$id_transaksi'");
                                        
                                        while($data = mysqli_fetch_assoc($query)):
                                             $sub_total = $data['harga']*$data['qty'];  
                                             $id_menu = $data['id_menu'];       

                                           ?>

                                           <tr>
                                            <form action="prosesedit_transaksi.php?id_transaksi=<?= $id_transaksi; ?>&id_menu=<?= $id_menu;?>" method="post">
                                            <td><?= $data['nama'];?></td>
                                            <td><?= $data['harga'];?></td>
                                            <td><input type="number" name="qty[]" max="<?= $data['stok']?>" value="<?= $data['qty'];?>" style="background-color:#e9ecef; width:60px;"></td>
                                            <td><?= $sub_total;?></td>
                                            <td>
                                                    <button class="btn btn-warning" type="submit">
                                                        Update
                                                    </button>
                                                    <a class="btn btn-danger" href="?hapuspesanan&id_transaksi=<?= $id_transaksi;?>&id_menu=<?= $id_menu;?>" onclick="return confirm('ingin Hapus Data?')">
                                                     Hapus
                                                </a>
                                            </td>
                                            </form> 
                                           </tr>
                                           <?php endwhile;?>
                                      <?php endif;?>
                                    </tbody>
                                </table>

                               
                            </div>
                        </div>

                    </div><br>

                </section>
            </div>
        </div>
</body>

</html>