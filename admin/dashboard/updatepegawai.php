<?php
session_start();
include('../../koneksi.php');
if(empty($_SESSION['username'])){
header("location:../index.php");
}

//tangkap data dari ubahdatapegawai.php
$id_pegawai = mysql_real_escape_string($_POST['id_pegawai']);
$username   = mysql_real_escape_string($_POST['username']);
$password   = mysql_real_escape_string($_POST['password']);
$nama       = mysql_real_escape_string($_POST['nama']);
$jabatan    = mysql_real_escape_string($_POST['jabatan']);
$alamat     = mysql_real_escape_string($_POST['alamat']);
$notelepon  = mysql_real_escape_string($_POST['telepon']);
$izin			  = mysql_real_escape_string($_POST['izin']);
$sakit		  = mysql_real_escape_string($_POST['sakit']);
$alpha		  = mysql_real_escape_string($_POST['alpha']);

//update data di database sesuai id_cln
$query = mysql_query("UPDATE pegawai set username='$username', password='$password', nama_pegawai='$nama', jabatan_pegawai='$jabatan', alamat_pegawai='$alamat', no_telfon_pegawai='$notelepon', izin='$izin', sakit='$sakit', alpha='$alpha' WHERE id_pegawai='$id_pegawai'") or die(mysql_error());

if ($query) {
	header('location:data-pegawai.php');
} else {
  echo "<script language=\"JavaScript\">\n";
  echo "alert('Gagal mengubah data pegawai!');\n";
  echo "window.location='ubahdatapegawai.php'";
  echo "</script>";
}
?>
