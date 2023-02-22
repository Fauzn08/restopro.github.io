<?php
include('../inc_koneksi/koneksi.php');

$id   = $_POST['id'];
$data = mysqli_query($koneksi, "SELECT * FROM menu WHERE id_menu = '$id'");
$menu = mysqli_fetch_assoc($data);
$stok = $menu['stok'];
$tz = 'Asia/Jakarta';
$dt = new DateTime("now", new DateTimeZone($tz));
$waktu_keluar = $dt -> format('Y-m-d G:i:s');
$stokk = $_POST['stok'];

   if($stokk <= $stok){
    $query = "INSERT INTO stok_kurang(id_menu,waktu_keluar,stok_keluar) VALUES ('$id', '$waktu_keluar', '$stokk') ";
    $result = mysqli_query($koneksi, $query);

    if(!$result){
        die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil diubah!');window.location='menu.php'</script>";
    } 
} else {
    echo "<script>alert('Pengurangan stok Gagal');window.location='kurang_stok.php?id=$id'</script>";
}

?>