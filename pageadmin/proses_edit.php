<?php
include('../inc_koneksi/koneksi.php');

$id   = $_POST['id'];
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$harga = $_POST['harga'];
$gambar = $_FILES['gambar']['name'];

if($gambar != ""){
    $ekstensi_diperbolehkan = array('png', 'jpg');
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $angka_acak = rand(1, 999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar;

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        move_uploaded_file($file_tmp, '../gambar/'.$nama_gambar_baru);

        $query = "UPDATE menu SET nama = '$nama', kategori = '$kategori', harga = '$harga', gambar = '$nama_gambar_baru'";
        $query .= "WHERE id_menu = '$id'";
        $result = mysqli_query($koneksi, $query);

        if(!$result){
            die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data berhasil diubah!');window.location='menu.php'</script>";
        }

    } else {
        echo "<script>alert('Ekstensi Gambar hanya bisa jpg dan png!');window.location='edit_menu.php';</script>";
    }
} else {
    $query = "UPDATE menu SET nama = '$nama', kategori = '$kategori', harga = '$harga'";
    $query .= "WHERE id_menu = '$id'";
    $result = mysqli_query($koneksi, $query);

    if(!$result){
        die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil diubah!');window.location='menu.php'</script>";
    }

}
?>