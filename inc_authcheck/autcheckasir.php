<?php
session_start();
if(isset($_SESSION['userid']))
{
  if($_SESSION['role_id']==1)
  {
    //rederect ke halaman pageadmin/index.php
    header("location:../pageadmin/index.php");
  }
}
else 
{
  $_SESSION['error'] = 'Anda Harus Login Terlebih Dahulu';
  header("location:../login/login.php");
}

?>