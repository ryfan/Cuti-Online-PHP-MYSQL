<?php
session_start();
include('../koneksi.php');
if(empty($_SESSION['username'])){
header("location:../index.php");
}

//tangkap data dari ubahdatapegawai.php
$id_pegawai   = mysql_real_escape_string($_POST['id_pegawai']);
$passwordbaru = mysql_real_escape_string($_POST['passwordbaru']);

//update data di database sesuai id_cln
$query = mysql_query("UPDATE pegawai SET password='$passwordbaru' WHERE id_pegawai='$id_pegawai'") or die(mysql_error());

if ($query) {
	header('location:profil.php');
} else {
  echo "<script language=\"JavaScript\">\n";
  echo "alert('Gagal mengubah password!');\n";
  echo "window.location='ubahpassword.php'";
  echo "</script>";
}
?>
