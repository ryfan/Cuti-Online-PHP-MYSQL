<?php
session_start();
include('../../koneksi.php');
if(empty($_SESSION['username'])){
header("location:../index.php");
}

//tangkap data dari ubahdatapegawai.php
$id_managerhrd = mysql_real_escape_string($_POST['id_managerhrd']);
$username   = mysql_real_escape_string($_POST['username']);
$password   = mysql_real_escape_string($_POST['password']);
$nama       = mysql_real_escape_string($_POST['nama']);
$alamat    = mysql_real_escape_string($_POST['alamat']);
$jabatan    = mysql_real_escape_string($_POST['jabatan']);
$notelepon  = mysql_real_escape_string($_POST['telepon']);

//update data di database sesuai id_cln
$query = mysql_query("UPDATE managerhrd SET username='$username', password='$password', nama_managerhrd='$nama', alamat_managerhrd='$alamat', jabatan_managerhrd='$jabatan', telepon_managerhrd='$notelepon' WHERE id_managerhrd='$id_managerhrd'") or die(mysql_error());

if ($query) {
	header('location:data-managerhrd.php');
} else {
  echo "<script language=\"JavaScript\">\n";
  echo "alert('Gagal mengubah data Manager HRD!');\n";
  echo "window.location='ubahdatamanagerhrd.php'";
  echo "</script>";
}
?>
