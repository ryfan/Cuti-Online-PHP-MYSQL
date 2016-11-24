<?php
session_start();
include('../../koneksi.php');
if(empty($_SESSION['username'])){
header("location:../index.php");
}

$id_staff = $_GET['id_staff'];

$query = mysql_query("DELETE FROM staff where id_staff='$id_staff'") or die(mysql_error());

if ($query) {
	header('location:data-staff.php');
} else {
  echo "<script language=\"JavaScript\">\n";
  echo "alert('Gagal mengubah data pegawai!');\n";
  echo "window.location='data-staff.php'";
  echo "</script>";
}
?>
