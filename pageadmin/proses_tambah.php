<?php
include('../inc_koneksi/koneksi.php');

$gambar = $_FILES['gambar']['name'];
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];


if($gambar != ""){
    $ekstensi_diperbolehkan = array('png', 'jpg');
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $angka_acak = rand(1, 999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar;

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        move_uploaded_file($file_tmp, '../gambar/'.$nama_gambar_baru);

        $query = "INSERT INTO menu (nama, harga, stok, gambar, kategori, status_stok) VALUES ('$nama', '$harga', '$stok', '$nama_gambar_baru', '$kategori', 'Tersedia')";
        $result =mysqli_query($koneksi, $query);

        if(!$result){
            die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data berhasil ditambahkan');window.location='menu.php'</script>";
        }

    } else {
        echo "<script>alert('Ekstensi Gambar hanya bisa jpg dan png!');window.location='tambah_menu.php';</script>";
    }
} else {
    $query = "INSERT INTO menu (nama, harga, stok, kategori, status_stok) VALUES ('$nama', '$harga', '$stok', '$kategori', 'Tersedia')";
        $result = mysqli_query($koneksi, $query);

        if(!$result){
            die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data berhasil ditambahkan');window.location='menu.php'</script>";
        }

}
?>