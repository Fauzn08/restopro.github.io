<?php

include('../inc_koneksi/koneksi.php');
include('../inc_authcheck/autcheck.php');

$role = mysqli_query($koneksi, "SELECT * FROM peran");

if (isset($_POST['simpan'])) {

    $nama = $_POST['user'];
    $username = $_POST['username'];
    $password = $_POST['katasandi'];
    $role_id = $_POST['role_id'];

    // menyimpan ke database
    mysqli_query($koneksi, "INSERT INTO user VALUES('', '$nama', '$username', '$password', '$role_id')");

    $_SESSION['success'] = 'Berhasil menambahkan data';

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
                <input type="text" name="user" class="form-control" placeholder="Nama User">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Nama User">
            </div>
            <div class="form-group">
                <label>password</label>
                <input type="text" name="katasandi" class="form-control" placeholder="Nama User">
            </div>
            <div class="form-group">
                <label>Role Akses</label>
                <select class="form-control" name="role_id">
                    <option value="">Pilih Role Akses</option>
                    <?php while($row = mysqli_fetch_array($role)) {?>
                        <option value="<?=$row['id_role']?>"><?=$row['nama']?></option>
                        <?php } ?>
                </select>
            </div><br/>
            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
            <a href="user.php" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</body>
</html>