<?php
session_start();
include('../../koneksi.php');
if(empty($_SESSION['username'])){
header("location:../index.php");
}

//tangkap data dari ubahdatapegawai.php
$id_managerhrd  = mysql_real_escape_string($_POST['id_managerhrd']);
$passwordbaru = mysql_real_escape_string($_POST['passwordbaru']);

//update data di database sesuai id_cln
$query = mysql_query("UPDATE managerhrd SET password='$passwordbaru' WHERE id_managerhrd='$id_managerhrd'") or die(mysql_error());

if ($query) {
	header('location:profilstaff.php');
} else {
  echo "<script language=\"JavaScript\">\n";
  echo "alert('Gagal mengubah password!');\n";
  echo "window.location='ubahpassword.php'";
  echo "</script>";
}
?>
