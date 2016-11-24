<?php
session_start();
include('../../koneksi.php');
if(empty($_SESSION['username'])){
header("location:../index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Dashboard Staff - Sistem Cuti Online</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/animate.min.css" rel="stylesheet"/>
  <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
  <link href="assets/css/demo.css" rel="stylesheet" />
	<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/light-bootstrap-dashboard.js" charset="utf-8"></script>
  <link href="../plugins/fontawesome/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	<style media="screen">
			h1 {
				font-size:25pt;
				text-align: center;
			}
		</style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="azure" data-image="assets/img/sidebar-2.jpg">
    <!--
        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag
    -->
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    SISTEM CUTI ONLINE
                </a>
            </div>
						<ul class="nav">
								<li>
										<a href="managerhrd.php">
												<i class="pe-7s-graph"></i>
												<p>Dashboard</p>
										</a>
								</li>
								<li>
										<a href="profilmanagerhrd.php">
												<i class="pe-7s-user"></i>
												<p>Profil Manager HRD</p>
										</a>
								</li>
								<li>
										<a href="ubahpassword.php">
												<i class="pe-7s-note2"></i>
												<p>Ubah Password</p>
										</a>
								</li>
								<li class="active">
										<a href="listcuti.php">
												<i class="pe-7s-news-paper"></i>
												<p>List Pengajuan Cuti</p>
										</a>
								</li>
						<li class="active-pro">
										<a href="upgrade.html">
												<i class="pe-7s-rocket"></i>
												<p><?php
// set the default timezone to use. Available since PHP 5.1
date_default_timezone_set('Asia/Jakarta');
// Prints something like: Monday
echo date("l, d-m-Y");?>
</p>
										</a>
								</li>
						</ul>
					</div>
			</div>
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard Staff</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="../logout.php">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
<form class="form-horizontal" role="form" method="post" action="verifikasi2.php">
	<?php
		$kd_cuti = $_GET['kd_cuti'];
		$query = mysql_query("SELECT * FROM permohonan WHERE kd_cuti='$kd_cuti'");
		$data = mysql_fetch_array($query);
		?>
	<div class="form-group">
	<label class="control-label col-sm-2">Kode Cuti:</label>
	<div class="col-sm-10">
		<input type="text" name="kode_cuti" class="form-control" value="<?php echo $data['kd_cuti']; ?>" readonly>
	</div>
	</div>
<?php
$username = $_SESSION['username'];
$query = mysql_query("SELECT id_managerhrd, nama_managerhrd FROM managerhrd WHERE username='$username'");
$hrd = mysql_fetch_array($query);
?>
<div class="form-group">
<label class="control-label col-sm-2">ID Manager HRD:</label>
<div class="col-sm-10">
	<input type="text" name="idm" class="form-control" value="<?php echo $hrd['id_managerhrd']; ?>" readonly>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2">Nama Manager HRD:</label>
<div class="col-sm-10">
	<input type="text" name="nama_managerhrd" class="form-control" value="<?php echo $hrd['nama_managerhrd']; ?>" readonly>
</div>
</div>
	<div class="form-group">
	<label class="control-label col-sm-2">ID Pegawai:</label>
	<div class="col-sm-10">
		<input type="text" name="id_pegawai" class="form-control" value="<?php echo $data['id_pegawai']; ?>" readonly>
	</div>
	</div>
	<?php
	$id_pegawai = $_GET['id_pegawai'];
	$query = mysql_query("SELECT nama_pegawai FROM pegawai WHERE id_pegawai='$id_pegawai'");
	$pegawai = mysql_fetch_array($query);
	?>
	<div class="form-group">
	<label class="control-label col-sm-2">Nama Pegawai:</label>
	<div class="col-sm-10">
		<input type="text" name="id_pegawai" class="form-control" value="<?php echo $pegawai['nama_pegawai']; ?>" readonly>
	</div>
	</div>
	<div class="form-group">
	<label class="control-label col-sm-2">Tanggal Mulai Cuti:</label>
	<div class="col-sm-10">
		<input type="date" name="mulai" class="form-control" value="<?php echo $data['tgl_mulai_cuti']; ?>" readonly>
	</div>
	</div>
	<div class="form-group">
	<label class="control-label col-sm-2">Tanggal Selesai Cuti:</label>
	<div class="col-sm-10">
		<input type="date" name="selesai" class="form-control" value="<?php echo $data['tgl_selesai_cuti']; ?>" readonly>
	</div>
	</div>
	<div class="form-group">
	<label class="control-label col-sm-2">Alasan:</label>
	<div class="col-sm-10">
		<textarea type="text" name="alasan" class="form-control" placeholder="Alasan Cuti" readonly><?php echo $data['alasan_cuti']; ?></textarea>
	</div>
	</div>
	<div class="form-group">
	<label class="control-label col-sm-2">Izin:</label>
	<div class="col-sm-10">
		<input type="number" name="izin" class="form-control" min="1" max="5" value="<?php echo $data['izin']; ?>" readonly>
	</div>
	</div>
	<div class="form-group">
	<label class="control-label col-sm-2">Sakit:</label>
	<div class="col-sm-10">
		<input type="number" name="sakit" class="form-control" min="1" max="5" value="<?php echo $data['sakit']; ?>" readonly>
	</div>
	</div>
	<div class="form-group">
	<label class="control-label col-sm-2">Alpha:</label>
	<div class="col-sm-10">
		<input type="number" name="alpha" class="form-control" min="1" max="5" value="<?php echo $data['alpha']; ?>" readonly>
	</div>
	</div>
<div class="form-group">
<label class="control-label col-sm-2">Keterangan:</label>
<div class="col-sm-10">
<select name="keterangan">
	<option value="Tidak Disetujui">Tidak Disetujui</option>
	<option value="Disetujui">Disetujui</option>
</select></div>
</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-info btn-fill">Submit</button>
		</div>
	</div>
</form>                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="staff.php">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="profilstaff.php">
                                Profil Staff
                            </a>
                        </li>
                        <li>
                            <a href="ubahpassword.php">
                                Ubah Password
                            </a>
                        </li>
                        <li>
                            <a href="listcuti.php">
                               List Pengajuan Cuti
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2016 <a href="#">Sistem Cuti Online</a>, All Right Reserverd.
                </p>
            </div>
        </footer>
    </div>
</div>
</body>
</html>
