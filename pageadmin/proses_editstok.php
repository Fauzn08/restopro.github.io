<?php
include('../inc_koneksi/koneksi.php');

$id   = $_POST['id'];
$tz = 'Asia/Jakarta';
$dt = new DateTime("now", new DateTimeZone($tz));
$waktu_masuk = $dt -> format('Y-m-d G:i:s');
$stok = $_POST['stok'];

    $query = "INSERT INTO stok_masuk(id_menu,waktu_masuk,stok_masuk) VALUES ('$id', '$waktu_masuk', '$stok') ";
    $result = mysqli_query($koneksi, $query);

    if(!$result){
        die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil diubah!');window.location='menu.php'</script>";
    }

?>