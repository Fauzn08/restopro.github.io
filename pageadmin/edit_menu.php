<?php
include('../inc_koneksi/koneksi.php');
 session_start();
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
        <h1>Edit Menu</h1> <br/>
        <form action="proses_edit.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Menu" value="<?php echo $data['nama'];?>">
                <input type="hidden" name="id" value="<?php echo $data['id_menu'];?>" />
            </div> <br/>
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-select" name="kategori" id="kategori" value="<?=$data['kategori']?>">
                <option selected>Silahkan Pilih</option>
                <option value="Makanan" <?php if($data['kategori'] == 'Makanan'){echo'selected';} ?>>Makanan</option>
                <option value="Minuman" <?php if($data['kategori'] == 'Minuman'){echo'selected';} ?>>Minuman</option>
                <option value="Cemilan" <?php if($data['kategori'] == 'Cemilan'){echo'selected';} ?>>Cemilan</option>
                </select>
            </div> <br/>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="Masukkan Harga" value="<?=$data['harga']?>">
            </div> <br/>
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar" class="form-control" value="<?php echo $data['gambar'];?>" ><br>
                <img src="../gambar/<?php echo $data['gambar'];?>" width="100px">
            </div> <br/> 
            <input type="submit" name="update" value="perbarui" class="btn btn-primary">
            <a href="menu.php" class="btn btn-warning">Kembali</a>
        </form>
    </div>
 </body>
 </html>