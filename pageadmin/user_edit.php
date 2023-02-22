<?php

include('../inc_koneksi/koneksi.php');
include('../inc_authcheck/autcheck.php');

$role = mysqli_query($koneksi, "SELECT * FROM peran");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //menampilkan data berdasarkan ID

    $data = mysqli_query($koneksi, "SELECT * FROM user where id_user='$id'");
    $data = mysqli_fetch_assoc($data);
}

if(isset($_POST['update'])){
    $id = $_GET['id'];

    $nama = $_POST['user'];
    $username = $_POST['username'];
    $password = $_POST['katasandi'];
    $role_id = $_POST['role_id'];

    // menyimpan ke database
    mysqli_query($koneksi, "UPDATE user SET user='$nama', username='$username', katasandi='$password', role_id=$role_id where id_user='$id'");

    $_SESSION['success'] = 'Berhasil memperbarui data';

    //mengalihkan halaman ke list menu
    header("location:user.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Tambah User</h1>
        <form method="post">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="user" class="form-control" placeholder="Nama" value="<?php echo $data['user'];?>">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Nama User" value="<?=$data['username']?>">
            </div>
            <div class="form-group">
                <label>password</label>
                <input type="text" name="katasandi" class="form-control" placeholder="password" value="<?=$data['katasandi']?>">
            </div>
            <div class="form-group">
                <label>Role Akses</label>
                <select class="form-control" name="role_id">
                    <option value="">Pilih Role Akses</option>
                    <?php while($row = mysqli_fetch_array($role)) {?>

                        <option value="<?=$row['id_role']?>" <?=$row['id_role']==$data['role_id']?'selected':''?> ><?=$row['nama']?></option>
                        <?php } ?>
                </select>
            </div><br/>
            <input type="submit" name="update" value="Perbarui" class="btn btn-primary">
            <a href="user.php" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</body>
</html>