<?php
include('../inc_koneksi/koneksi.php');
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
 </head>
 <body>
    <div class="container pt-5">
        <h1>Tambah Menu</h1> <br/>
        <form action="proses_tambah.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Menu">
            </div> <br/>
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-select" name="kategori" id="kategori">
                <option selected>Silahkan Pilih</option>
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
                <option value="Cemilan">Cemilan</option>
                </select>
            </div> <br/>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="Masukkan Harga">
            </div> <br/>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" placeholder="Masukkan Jumlah Stok">
            </div> <br/>
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar" class="form-control" placeholder="Pilih Gambar" >
            </div> <br/>
            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
            <a href="menu.php" class="btn btn-warning">Kembali</a>
        </form>
    </div>
 </body>
 </html>