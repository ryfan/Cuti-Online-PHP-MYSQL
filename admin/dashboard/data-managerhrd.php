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
	<title>Master Data Manager HRD - Sistem Cuti Online</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/animate.min.css" rel="stylesheet"/>
  <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
  <link href="assets/css/demo.css" rel="stylesheet" />
	<link rel="stylesheet" href="../../plugins/datatables/jquery.dataTables.min.css" type="text/css" />
	<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/light-bootstrap-dashboard.js" charset="utf-8"></script>
	<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
  <link href="../plugins/fontawesome/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	<style media="screen">
			h1 {
				font-size:25pt;
				text-align: center;
			}
		</style>
		<style media="screen">
				h1 {
					font-size:25pt;
					text-align: center;
				}
			</style>
			<script type="text/javascript">
	    $(document).ready(function() {
	    $('#daftarstaff').dataTable({
	        "bPaginate": true,
	        "bLengthChange": false,
	        "bFilter": true,
	        "bInfo": true,
	        "bAutoWidth": true });
	    });
	    </script>
</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-1.jpg">
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
										<a href="admin.php">
												<i class="pe-7s-graph"></i>
												<p>Dashboard</p>
										</a>
								</li>
								<li>
										<a href="data-pegawai.php">
												<i class="pe-7s-user"></i>
												<p>Data Pegawai</p>
										</a>
								</li>
								<li class="active">
										<a href="data-managerhrd.php">
												<i class="pe-7s-note2"></i>
												<p>Data Manager HRD</p>
										</a>
								</li>
								<li>
										<a href="datakeseluruhancuti.php">
												<i class="pe-7s-news-paper"></i>
												<p>Semua Data Cuti</p>
										</a>
								</li>
						<li class="active-pro">
										<a href="upgrade.html">
												<i class="pe-7s-rocket"></i>
												<p><?php
// set the default timezone to use. Available since PHP 5.1
date_default_timezone_set('Asia/Jakarta');
// Prints something like: Monday
echo date("l, d-m-Y");?></p>
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
                    <a class="navbar-brand" href="#">Data Manager HRD</a>
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
											<a href="tambahmanagerhrd.php" class="btn btn-primary btn-fill" role="button">Tambah Data Manager HRD</a>
											<table id="daftarstaff" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>ID Manager HRD</th>
														<th>Nama</th>
														<th>Alamat</th>
														<th>Jabatan</th>
														<th>Telefon</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>ID Manager HRD</th>
														<th>Nama</th>
														<th>Alamat</th>
														<th>Jabatan</th>
														<th>Telefon</th>
														<th>Aksi</th>
													</tr>
												</tfoot>
												<tbody>
													<?php
													$query = mysql_query("SELECT id_managerhrd, nama_managerhrd, alamat_managerhrd, jabatan_managerhrd, telepon_managerhrd FROM managerhrd");
													while ($data = mysql_fetch_array($query)) {
													?>
													<tr>
														<td><?php echo $data['id_managerhrd'];?></td>
														<td><?php echo $data['nama_managerhrd']; ?></td>
														<td><?php echo $data['alamat_managerhrd']; ?></td>
														<td><?php echo $data['jabatan_managerhrd']; ?></td>
														<td><?php echo $data['telepon_managerhrd']; ?></td>
														<td><a href="ubahdatamanagerhrd.php?id_managerhrd=<?php echo $data['id_managerhrd'];?>">Ubah</a>
														 | <a href="hapusdatamanagerhrd.php?id_managerhrd=<?php echo $data['id_managerhrd'];?>">Hapus</a> </td>
													</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                User Profile
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Ubah Password
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
