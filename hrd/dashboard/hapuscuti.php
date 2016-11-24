<?php
include('../../koneksi.php');

$kd_cuti = $_GET['kd_cuti'];

$query = mysql_query("DELETE FROM permohonan WHERE kd_cuti='$kd_cuti'") or die(mysql_error());

if ($query) {
  echo "<script language=\"JavaScript\">\n";
  echo "alert('Data Berhasil Di Hapus!');\n".mysql_error();
  echo "window.location='listcuti.php'";
  echo "</script>";
} else {
  echo "<script language=\"JavaScript\">\n";
  echo "alert('Gagal Menghapus Data!');\n".mysql_error();
  echo "window.location='listcuti.php'";
  echo "</script>";}
?>
