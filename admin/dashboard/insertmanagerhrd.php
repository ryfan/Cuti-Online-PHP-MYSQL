<?php
session_start();
include('../../koneksi.php');
if(empty($_SESSION['username'])){
header("location:../index.php");
}

// terima data dari halaman tambahpegawai.php
$username   = mysql_real_escape_string($_POST['username']);
$password   = mysql_real_escape_string($_POST['password']);
$nama       = mysql_real_escape_string($_POST['nama']);
$alamat    = mysql_real_escape_string($_POST['alamat']);
$jabatan    = mysql_real_escape_string($_POST['jabatan']);
$notelepon  = mysql_real_escape_string($_POST['telepon']);

// simpan data ke database
$query = mysql_query("INSERT INTO managerhrd (username, password, nama_managerhrd, alamat_managerhrd, jabatan_managerhrd, telepon_managerhrd)
VALUES ('$username', '$password', '$nama', '$alamat', '$jabatan', '$notelepon')");

if ($query) {
  // jika berhasil menyimpan
  header('location: data-managerhrd.php');
} else {
  echo "<script language=\"JavaScript\">\n";
  echo "alert('Gagal menginput Manager HRD baru!');\n";
  echo "window.location='tambahmanagerhrd.php'";
  echo "</script>";
}
?>
