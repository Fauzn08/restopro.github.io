<?php
include('../inc_koneksi/koneksi.php');
include('../inc_authcheck/autcheckasir.php');

$total_transaksi = $_POST['total'];
$total_bayar = $_POST['bayar'];
$id_transaksi = $_POST['id_transaksi'];
$total_kembalian = $total_bayar-$total_transaksi;


if($total_bayar < $total_transaksi){
    echo "<script>alert('Uang Anda Kurang!!!');window.location='transaksi_bayar.php? id_transaksi=$id_transaksi#prosespesanan'</script>";
}

$data = mysqli_query($koneksi, "SELECT transaksi_detail.*, harga,menu.nama FROM transaksi_detail INNER JOIN menu ON transaksi_detail.id_menu
= menu.id_menu WHERE id_transaksi = '$id_transaksi'");

$data_transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi = '$id_transaksi'");
$transaksi = mysqli_fetch_assoc($data_transaksi);

mysqli_query($koneksi, "UPDATE transaksi SET status_order = 'Done' WHERE id_transaksi = '$id_transaksi'");


$total_pendapatan = mysqli_query($koneksi, "SELECT SUM(total) AS total_pendapatan FROM transaksi");
$total = mysqli_fetch_array($total_pendapatan);
$t = $total['total_pendapatan'];
$s = "Total Pendapatan = Rp.$t";

$dt_laporan = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi = '$id_transaksi'");
$data_laporan = mysqli_fetch_assoc($dt_laporan);

$fopen = fopen("../laporan_pendapatan/laporan.txt", "a");
fwrite($fopen, "\n");
fwrite($fopen, $data_laporan['tanggal_waktu']);
fwrite($fopen, "\t");
fwrite($fopen, $data_laporan['nama_kasir']);
fwrite($fopen, "\t");
fwrite($fopen, $data_laporan['id_pesanan']);
fwrite($fopen, "\t");
fwrite($fopen, $data_laporan['total']);
fwrite($fopen, "\n");
fwrite($fopen, $s);
fclose($fopen);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print transaksi</title>
    <style type="text/css">
        body{
            color: #a7a7a7;
        }

        @media print{
            button, a,
            div > div:not(.to-print),
            div + div:not(.to-print){
                display: none;
            }
        }
    </style>
</head>
<body>
    
<div align="center" class="struk to-print">
    <table width="500" border="0" cellpadding="1" cellspacing="0">
        <tr>
            <th>Rumah Makan Sederhana <br>
            Jl. Hayam Wuruk, Mangga Besar, Kec. Taman Sari, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta</th>
        </tr>
        <tr align="center"><td><hr></td></tr>
        <tr>
            <td>Nomor Transaksi : <?=$transaksi['id_pesanan'] ?></td>
        </tr>
        <tr>
            <td>Tanggal Dan Waktu :  <?=$transaksi['tanggal_waktu']?></td>
        </tr>
        <tr>
            <td>Nama Kasir : <?=$transaksi['nama_kasir']?></td>
        </tr>
        <tr><td><hr></td></tr>
    </table>
    <table width="500" border="0" cellpadding="3" cellspacing="0">
        <?php while($row = mysqli_fetch_array($data)):
            $sub_total = $row['harga'] * $row['qty'];
             ?>
        <tr>
            <td><?=$row['nama']?></td>
            <td><?=$row['qty']?></td>
            <td align="right"><?=number_format($row['harga'])?></td>
            <td align="right"><?=number_format($sub_total)?></td>
        </tr>
        <?php endwhile; ?>
        <tr>
            <td colspan="4"><hr></td>
        </tr>
        <tr>
            <td align="right" colspan="3">Total</td>
            <td align="right"><?=number_format($transaksi['total'])?></td>
        </tr>
        <tr>
            <td align="right" colspan="3">Bayar</td>
            <td align="right"><?=number_format($total_bayar)?></td>
        </tr>
        <tr>
            <td align="right" colspan="3">Kembali</td>
            <td align="right"><?=number_format($total_kembalian)?></td>
        </tr>
    </table> 
    <table width="500" border="0" cellpadding="1" cellspacing="0">
        <tr><td><hr></td></tr>
        <tr>
            <th>====== Layanan Konsumen =====</th>
        </tr>
        <tr>
            <th>SMS/CALL 081212123432</th>
        </tr>
    </table>
</div><br/><br/>
<a href="transaksi.php"><button style="border: none; border-radius:5px; background-color:#000; color:#fff; height:30px;">Kembali Ke Halaman Transaksi</button></a>
<script>
    window.print();
</script>
</body>
</html>