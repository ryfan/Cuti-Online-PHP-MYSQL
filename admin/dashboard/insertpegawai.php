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
$jabatan    = mysql_real_escape_string($_POST['jabatan']);
$alamat    = mysql_real_escape_string($_POST['alamat']);
$notelepon  = mysql_real_escape_string($_POST['telepon']);
$izin  = mysql_real_escape_string($_POST['izin']);
$sakit  = mysql_real_escape_string($_POST['sakit']);
$alpha  = mysql_real_escape_string($_POST['alpha']);


// simpan data ke database
$query = mysql_query("INSERT INTO pegawai (username, password, nama_pegawai, jabatan_pegawai, alamat_pegawai, no_telfon_pegawai, izin, sakit, alpha)
VALUES ('$username', '$password', '$nama', '$jabatan', '$alamat', '$notelepon' , '$izin', '$sakit', '$alpha')");

if ($query) {
  // jika berhasil menyimpan
  header('location: data-pegawai.php');
} else {
  echo "<script language=\"JavaScript\">\n";
  echo "alert('Gagal menginput pegawai baru!');\n";
  echo "window.location='tambahpegawai.php'";
  echo "</script>";
}
?>
