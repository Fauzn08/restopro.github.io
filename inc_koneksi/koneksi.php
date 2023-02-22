<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "restopro";
$koneksi = mysqli_connect($host,$user,$pass,$db);

if(!$koneksi){
    die("Gagal menyambung ke database!".mysqli_connect_error());
}
?>