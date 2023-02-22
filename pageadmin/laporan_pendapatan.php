<?php 
session_start();
include('../inc_koneksi/koneksi.php');

$filename = "laporan_pendapatan.txt";
$separator = "\n";

header("Content-type: text/plain");
header("Content-disposition: attachment; filename=".$filename);

$total_pendapatan = mysqli_query($koneksi, "SELECT SUM(total) AS total_pendapatan FROM transaksi");
$total = mysqli_fetch_array($total_pendapatan);
$t = $total['total_pendapatan'];
$s = "Total Pendapatan = Rp.$t";
$transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi");

//sintaks untuk di .txt
echo "User = Management".$separator.$separator;

while($value = mysqli_fetch_array($transaksi)){
    $nomor = $value['id_pesanan']. '|'.$tgl = $value['tanggal_waktu']. '|'.$nm = $value['nama_kasir'] . '|' .$pendapatan = $value['total'];


    echo $nomor.$separator.$separator;
}

echo $separator.$s;
//end sintaks
?>