<?php
include('../inc_koneksi/koneksi.php');
session_start();

if(isset($_GET['action'])){
    $id_menu = $_GET['action'];
    $qty = $_POST['qty'];
    $data =mysqli_query($koneksi, "SELECT * FROM menu WHERE id_menu = '$id_menu'");
    $b = mysqli_fetch_assoc($data);

    $menu = [
        'id' => $b['id_menu'],
        'nama' => $b['nama'],
        'harga' => $b['harga'],
        'qty' => $qty
    ];

    $_SESSION['cart'][]=$menu;

    
}

if (isset($_GET['pesanan_selesai'])){
    $cart = $_SESSION['cart'];

$tz = 'Asia/Jakarta';
$dt = new DateTime("now", new DateTimeZone($tz));
$tanggal_waktu = $dt -> format('Y-m-d G:i:s');
$nomor = rand(111111,999999);
$user = $_SESSION['nama'];

foreach($_SESSION['cart'] as $key => $value){
    $sum += $value['qty']*$value['harga'];
}
$total = $sum;

mysqli_query($koneksi, "INSERT INTO transaksi(tanggal_waktu, id_pesanan, total, status_order, nama_kasir) VALUES 
('$tanggal_waktu', '$nomor', '$total','on proses', '$nama')");


    //mendapatkan id transaksi baru
    $id_transaksi = mysqli_insert_id($koneksi);

    //insert ke detail transaksi
    foreach ($_SESSION['cart'] as $key => $value) {
        $id_menu = $value['id'];
        $qty = $value['qty'];

        mysqli_query($koneksi, "INSERT INTO transaksi_detail(id_transaksi, id_menu, qty) VALUES ('$id_transaksi', '$id_menu', '$qty')");

    }

    unset($_SESSION['cart']);
}

header("location:transaksi.php?#transaksi");

?>