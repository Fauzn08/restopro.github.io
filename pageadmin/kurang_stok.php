<?php
include('../inc_koneksi/koneksi.php');
 include('../inc_authcheck/autcheck.php');

 
 if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM menu WHERE id_menu = '$id'";
    $result = mysqli_query($koneksi, $query);
    if(!$result) {
        die("Query Error :".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);

    if(!count($data)){
        echo "<script>alert('Data tidak ditemukan pada tabel');window.location='menu.php'</script>";
    }

} else {
    echo "<script>alert('Masukkan ID yang ingin di edit');window.location:'menu.php';</script>";
}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
 </head>
 <body>
    <div class="container pt-5 pb-5">
        <h1>Pengurangan Stok</h1> <br/>
        <form action="proseskurang_stok.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" readonly name="nama" class="form-control" placeholder="Nama Menu" value="<?php echo $data['nama'];?>">
                <input type="hidden" name="id" value="<?php echo $data['id_menu'];?>" />
            </div> <br/>
            <div class="form-group">
                <label>Tanggal Dan Waktu</label>
                <input type="text" readonly name="waktu_masuk" class="form-control" value="<?php echo date("Y-m-d");?>">
            </div> <br/>
            <div class="form-group">
                <label>Stok Awal</label>
                <input type="number" readonly name="stok" class="form-control" value="<?=$data['stok']?>">
            </div> <br/>
            <div class="form-group">
                <label>Stok Kurang</label>
                <input type="number" name="stok" class="form-control" >
            </div> <br/>
            <input type="submit" name="update" value="perbarui" class="btn btn-primary">
            <a href="menu.php" class="btn btn-warning">Kembali</a>
        </form>
    </div>
 </body>
 </html>