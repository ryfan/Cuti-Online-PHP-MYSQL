<?php
session_start();
include('../koneksi.php');
if(empty($_SESSION['username'])){
header("location:../index.php");
}

// terima data dari halaman tambahpengajuancuti.php
$kode_cuti     = mysql_real_escape_string($_POST['kode_cuti']);
$id_pegawai    = mysql_real_escape_string($_POST['id_pegawai']);
$mulai    		 = mysql_real_escape_string($_POST['mulai']);
$selesai  		 = mysql_real_escape_string($_POST['selesai']);
$alasan 			 = mysql_real_escape_string($_POST['alasan']);
$izin  				 = mysql_real_escape_string($_POST['izin']);
$sakit  			 = mysql_real_escape_string($_POST['sakit']);
$alpha  			 = mysql_real_escape_string($_POST['alpha']);
$sisacuti			 = mysql_real_escape_string($_POST['sisacuti']);
$ket="Proses";

// simpan data ke database
if($sisacuti>0){
$query = mysql_query("INSERT INTO permohonan VALUES ('$kode_cuti', '', '$id_pegawai', '$mulai', '$selesai', '$alasan', '$ket', '$izin' , '$sakit', '$alpha' )");
if ($query) {
  // jika berhasil menyimpan
  echo "<script language=\"JavaScript\">\n";
  echo "alert('Sukses Menambahkan Pengajuan Cuti!');\n";
  echo "window.location='pengajuancuti.php?id_pegawai=$id_pegawai'";
  echo "</script>";
} else {
  echo "<script language=\"JavaScript\">\n";
  echo "alert('Pengajuan Cuti Limit!');\n".mysql_error();
  echo "window.location='tambahpengajuancuti.php?id_pegawai=$id_pegawai'";
  echo "</script>";
}
}else {
	  echo "<script language=\"JavaScript\">\n";
    echo "alert('Masa Cuti Anda Telah Habis !');\n".mysql_error();
    echo "window.location='pengajuancuti.php?id_pegawai=$id_pegawai'";
    echo "</script>";
}

?>
