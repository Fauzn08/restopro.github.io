<?php
session_start();
//fungsi dari membatasi hak aksess
if(isset($_SESSION['userid']))
{
  if($_SESSION['role_id']==2)
  {
    //rederect ke halaman pagestaf/index.php
    header("location:../pagestaf/kasir.php");
  }
}
else 
{
  $_SESSION['error'] = 'Anda Harus Login Terlebih Dahulu';
  header("location:../login/login.php");
}

?>