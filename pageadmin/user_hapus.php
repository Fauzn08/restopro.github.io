<?php
include('../inc_koneksi/koneksi.php');
session_start();

if(isset($_GET['id'])){
$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM user WHERE id_user='$id'");

$_SESSION['success'] = 'Berhasil Menghapus data';

header("location:user.php");
}
?>