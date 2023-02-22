<?php
include('../inc_koneksi/koneksi.php');
include('../inc_authcheck/autcheckasir.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Staf</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body  style="background-color: #E8D2A6;">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">RSM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
      <a style="text-decoration:none; color:#fff; font-weight: bold;" href="../login/logout.php">Log Out</a>
      </ul>
    </div>
  </div>
</nav>

<!--Beranda-->
<section>
    <div class="container">
        <div class="row">
            <div class="col pt-5 text-center" style="margin: 30px;">
                <h1>Selamat Datang Di Halaman Staf</h1>
                <h2>Hai <?=$_SESSION['user']?></h2>
            </div>
        </div>
        <div class="row pt-5">
          <div class="col-6 ">
          <a style="text-decoration: none;" href="menu.php"><div class="card" style="padding: 30px 75px; background-color:#F99417;">
             <img style="margin-left:150px;" src="../pageadmin/gambar/menu.png" width="90px" alt="">
              <h2 class="menu pt-3" style="color: #fff; margin-left:153px;">Menu</h2>
            </div></a>
          </div>

          <div class="col-6 ">
          <a style="text-decoration: none;" href="transaksi.php"><div class="card" style="padding: 32px 75px; background-color:#03C988;">
              <img style="margin-left:150px;" src="../pageadmin/gambar/transaction.png" width="90px" alt="">
              <h3 class="menu pt-3" style="color: #fff; margin-left:140px;">Transaksi</h3>
            </div></a>
          </div>
        </div>
    </div>
</section>

</body>
</html>