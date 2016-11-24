<?php
session_start();
include('../../koneksi.php');
if(empty($_SESSION['username'])){
header("location:../index.php");
}

$id_pegawai = $_GET['id_pegawai'];

$query = mysql_query("DELETE FROM pegawai where id_pegawai='$id_pegawai'") or die(mysql_error());

if ($query) {
	header('location:data-pegawai.php');
} else {
  echo "<script language=\"JavaScript\">\n";
  echo "alert('Gagal mengubah data pegawai!');\n";
  echo "window.location='data-pegawai.php'";
  echo "</script>";
}
?>
