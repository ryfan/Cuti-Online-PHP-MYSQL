<?php
session_start();
include '../../plugins/fpdf/fpdf.php';
include_once('../../koneksi.php');

//mengambil data dari tabel
$kd_cuti = $_GET['kd_cuti'];
$id_pegawai = $_GET['id_pegawai'];
$query = mysql_query("SELECT b.id_pegawai AS 'idpeg', c.kd_cuti AS 'kdct', a.nama_managerhrd AS 'nmhrd', b.nama_pegawai AS 'nmpegawai', c.tgl_mulai_cuti AS 'mulai',
c.tgl_selesai_cuti AS 'selesai', c.alasan_cuti AS 'alasan', c.keterangan AS 'ket'
FROM managerhrd a, pegawai b, permohonan c WHERE a.id_managerhrd=c.id_managerhrd AND b.id_pegawai=c.id_pegawai AND c.id_pegawai='$id_pegawai' AND c.kd_cuti='$kd_cuti'");
$row = mysql_fetch_array($query);


$tempat="Tangerang, ";
$tgl=date('l, d-m-Y');

$tanggalmulaicuti = $row['mulai'];
$tglmulaicutifix=date("d F Y",strtotime($tanggalmulaicuti));
$tanggalselesaicuti = $row['selesai'];
$tglselesaicutifix=date("d F Y",strtotime($tanggalselesaicuti));
$namapegawai = $row['nmpegawai'];


//mengisi judul dan header tabel
$header 				= "Surat Pengajuan Cuti";
$top 						= "Yang bertanda tangan dibawah ini bermaksud ingin mengajukan cuti sebagai berikut :";
$nama 					= "Nama                         : " .$row['nmpegawai'];
$tglcutimulai 	= "Tanggal Mulai Cuti   : $tglmulaicutifix";
$tglcutiselesai = "Tanggal Selesai Cuti : $tglselesaicutifix";
$alasancuti			= "Alasan Cuti					           : " .$row['alasan'];
$status 				= "Status                         : " .$row['ket'];
$content				= "Dengan ini mengajukan permintaan cuti selama hari yang telah diajukan terhitung sejak tanggal $tglmulaicutifix";
$content2				= "Demikian surat permintaan cuti yang saya buat.";
$footer 				= "$tgl";
$footer2 				= "Note: surat ini berlaku untuk yang berstatus terverifikasi.";


class PDF extends FPDF
{
	// Page header
	function Header()
	{
	    // Logo
	    $this->Image('../../images/logo.png',10,6,30);
	    // Arial bold 15
	    $this->SetFont('Arial','B',14);
	    // Move to the right
	    $this->Cell(80);
	    // Title
	    $this->Cell(30,10,'PT Sukses Makmur Plastindo',0,0,'C');

	    $this->Ln();
	    $this->SetFont('Arial','B',12);
	    $this->Cell(190,10,'Kawasan Industry Millennium, Tiga raksa, Tangerang',0,0,'C');
	    // Line break

	    $this->Line(10, 37, 210-10, 37);
	    $this->Line(10, 39, 210-10, 39);
	    $this->Ln(15);
	}

	// Page footer
	function Footer()
	{
	    // Position at 1.5 cm from bottom
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Page number
	    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

//tampilan Judul Laporan
$pdf->SetFont('Arial','B','16'); //Font Arial, Tebal/Bold, ukuran font 16
$pdf->Cell(0,25, $header, '0', 1, 'C');

$pdf->SetFont('Times','',12);
$pdf->Cell(0,20, $top, '0', 1, 'L');

$pdf->SetFont('Times','',12);
$pdf->Cell(0,1, $nama, '0', 1, 'L');

$pdf->SetFont('Times','',12);
$pdf->Cell(0,10, $tglcutimulai, '0', 1, 'L');

$pdf->SetFont('Times','',12);
$pdf->Cell(0,1, $tglcutiselesai, '0', 1, 'L');

$pdf->SetFont('Times','',12);
$pdf->Cell(0,10, $alasancuti, '0', 1, 'L');

$pdf->SetFont('Times','',12);
$pdf->Cell(0,1, $status, '0', 1, 'L');

$pdf->SetFont('Times','',12);
$pdf->Cell(0,10, $content, '0', 1, 'L');

$pdf->SetFont('Times','',12);
$pdf->Cell(0,1, $content2, '0', 1, 'L');

$pdf->SetFont('Times','',12);
$pdf->Cell(0,10, $footer, '0', 1, 'R');

$pdf->Ln(1);
$pdf->Cell(170,0,'',0,0,'');
$pdf->Cell(15,0,"Hormat Saya",0,0,'R');

$pdf->Ln(20);
$pdf->Cell(160,0,'',0,0,'');
$pdf->Cell(28,0,"$namapegawai",0,0,'R');

$pdf->Ln(20);
$pdf->SetFont('Times','',7);
$pdf->Cell(0,2, $footer2, '0', 1, 'L');

//output file pdf
$pdf->Output();
?>
