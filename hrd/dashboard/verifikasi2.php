<?php
session_start();
include('../../koneksi.php');
if(empty($_SESSION['username'])){
header("location:../index.php");
}

$kode_cuti     = mysql_real_escape_string($_POST['kode_cuti']);
$id_managerhrd = mysql_real_escape_string($_POST['idm']);
$keterangan		 = mysql_real_escape_string($_POST['keterangan']);

$query = mysql_query("UPDATE permohonan SET id_managerhrd=$id_managerhrd, keterangan='$keterangan' WHERE kd_cuti=$kode_cuti") or die(mysql_error());

if ($query) {
	header('location:listcuti.php');
} else {
  echo "<script language=\"JavaScript\">\n";
  echo "alert('Gagal merubah data cuti!');\n";
  echo "window.location='verifikasi.php'";
  echo "</script>";
}
?>
