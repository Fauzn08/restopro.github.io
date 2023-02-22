<?php 
include('../inc_koneksi/koneksi.php');
include('../inc_authcheck/autcheck.php');

if(isset($_SESSION['userid']))
{
  if($_SESSION['role_id']==2)
  {
    //rederect ke halaman pagestaf/index.php
    header("Location:index.php");
  }
}
else 
{
  $_SESSION['error'] = 'Anda Harus Login Terlebih Dahulu';
  header("location:login.php");
}


$view = $koneksi->query("SELECT u.*,r.nama as nama_role FROM user as u INNER JOIN peran as r ON u.role_id=r.id_role ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container pt-5">
        <?php if(isset($_SESSION['success']) && $_SESSION['success'] != '') {?>

        <div class="alert alert-success" role="alert">
            <?=$_SESSION['success']?>
        </div>
        <?php 
        }
        $_SESSION['success'] = '';
        ?>

        <h1>List User</h1>
        <a href="user_add.php" class="btn btn-primary">Tambah User</a>
        <a href="index.php" class="btn btn-secondary">Kembali Ke Home</a><br/><br/>
        <table class="table table-bordered">
            <tr>
            <th>ID User</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Password</th>
            <th>Role Akses</th>
            <th>Aksi</th>
            </tr>
            <?php
            while ($row = $view->fetch_array()){ ?>

            <tr>
                <td><?= $row['id_user'] ?></td>
                <td><?= $row['user'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['katasandi'] ?></td>
                <td><?= $row['nama_role'] ?></td>
                <td>
                    <a href="user_edit.php?id=<?= $row['id_user']?>">Edit</a>
                    <a href="user_hapus.php?id=<?= $row['id_user']?>" onclick="return confirm('apakah anda yakin?')">Hapus</a>
                </td>
            </tr>
            <?php }
            ?>
        </table>
    </div>
</body>
</html>