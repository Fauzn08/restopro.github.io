<?php
include('../inc_koneksi/koneksi.php');
session_start();

if(isset($_SESSION['userid'])){
  header("location:../pageadmin/index.php");
  exit();
}

if(isset($_POST['masuk'])){
    $username = $_POST['username'];
    $password = $_POST['katasandi'];

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' and katasandi='$password'");

    //mendapatkan hasil dari data
    $data = mysqli_fetch_assoc($query);

    //mendapatkan nilai dari jumlah data
    $check = mysqli_num_rows($query);

    if(!$check) {
        $_SESSION['error'] = 'Username & Password salah';
    }
    else {
        $_SESSION['userid'] = $data['id_user'];
        $_SESSION['user'] = $data['user'];
        $_SESSION['role_id'] = $data['role_id'];
        // $_SESSION['auth']= 'yes';

        header("location:../pageadmin/index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../login/login.css">
</head>
<body>
    
    <div class="container">
        <div class="login">
            <form method="post">
                <h1>Login Dasboard</h1>
                <hr>
                <p>Silahkan Login </p>
                 <!-- alert -->
        <?php if(isset($_SESSION['error']) && $_SESSION['error'] != '') {?>

<div class="alert alert-danger" role="alert">
    <?=$_SESSION['error']?>
</div>
<?php
} $_SESSION['error'] = ''; 
?>
                <label for="">Username</label>
                <input type="text" name="username" placeholder="Masukkan Username">
                <label for="">Password</label>
                <input type="password" name="katasandi" placeholder="Masukkan Password">
                <input style="width: 200px; margin-top:20px; " type="submit" class="btn btn-secondary" name="masuk" value="Masuk Ke sistem" />
                
            </form>
        </div>
        <div class="right">
            <img src="../gambar/satay.png" alt="">
        </div>
    </div>
</body>
</html>