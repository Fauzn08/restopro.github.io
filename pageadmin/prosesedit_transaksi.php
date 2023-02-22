<?php

include('../inc_koneksi/koneksi.php');


$id_transaksi = $_GET['id_transaksi'];
$id_menu = $_GET['id_menu'];
$qty = $_POST['qty'];

$qry = mysqli_query($koneksi, "SELECT transaksi_detail.*, menu.harga FROM transaksi_detail INNER JOIN menu ON transaksi_detail.id_menu = menu.id_menu WHERE id_transaksi = '$id_transaksi' AND transaksi_detail.id_menu = '$id_menu'");

while($data = mysqli_fetch_assoc($qry)){
    $jumlah = $data['qty'];
    $harga = $data['harga'];
    $sub_total = $jumlah*$harga;

    mysqli_query($koneksi, "UPDATE transaksi SET total = total - '$sub_total' WHERE id_transaksi='$id_transaksi'");
    mysqli_query($koneksi, "UPDATE menu SET stok = stok + '$jumlah' WHERE id_menu = '$id_menu'");

    foreach($qty as $key => $value){
        $total = $harga*$value;

        mysqli_query($koneksi, "UPDATE transaksi_detail SET qty = '$value' WHERE id_menu ='$id_menu' AND id_transaksi = '$id_transaksi'");
        mysqli_query($koneksi, "UPDATE transaksi SET total = total + '$total' WHERE id_transaksi ='$id_transaksi'");
    }
}

header('location: edit_transaksi.php?id_transaksi='.$id_transaksi);

?>
