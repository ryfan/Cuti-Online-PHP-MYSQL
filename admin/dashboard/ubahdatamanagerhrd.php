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
	<title>Ubah Data Manager HRD - Sistem Cuti Online</title>
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
		<style media="screen">
				h1 {
					font-size:25pt;
					text-align: center;
				}
			</style>
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
								<li  class="active">
										<a href="data-managerhrd.php">
												<i class="pe-7s-note2"></i>
												<p>Data managerhrd</p>
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
                    <a class="navbar-brand" href="#">Ubah Data managerhrd</a>
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
                      <form class="form-horizontal" role="form" method="post" action="updatemanagerhrd.php">
                        <?php
                          // terima id_pegawai dari halaman data-pegawai.php
                          $id_managerhrd = $_GET['id_managerhrd'];
                          $query = mysql_query("SELECT * FROM managerhrd WHERE id_managerhrd='$id_managerhrd'");
                          $data = mysql_fetch_array($query);
                          ?>
                          <div class="form-group">
                          <label class="control-label col-sm-2">ID managerhrd:</label>
                          <div class="col-sm-10">
                            <input type="text" name="id_managerhrd" class="form-control" placeholder="Auto Generated" readonly value="<?php echo $data['id_managerhrd']; ?>">
                          </div>
                          </div>
                          <div class="form-group">
                          <label class="control-label col-sm-2">Username:</label>
                          <div class="col-sm-10">
                            <input type="text" name="username" class="form-control" placeholder="Username" required value="<?php echo $data['username']; ?>" readonly>
                          </div>
                          </div>
                          <div class="form-group">
                          <label class="control-label col-sm-2">Password:</label>
                          <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" placeholder="Password" required value="<?php echo $data['password']; ?>">
                          </div>
                          </div>
  												<div class="form-group">
  												<label class="control-label col-sm-2">Nama:</label>
  												<div class="col-sm-10">
  													<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required value="<?php echo $data['nama_managerhrd']; ?>">
  												</div>
  												</div>
  												<div class="form-group">
  												<label class="control-label col-sm-2">Alamat:</label>
  												<div class="col-sm-10">
  													<textarea type="text" name="alamat" class="form-control" placeholder="Alamat" required><?php echo $data['alamat_managerhrd']; ?></textarea>
  												</div>
  												</div>
                          <div class="form-group">
                          <label class="control-label col-sm-2">Jabatan:</label>
                          <div class="col-sm-10">
                            <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" required value="<?php echo $data['jabatan_managerhrd']; ?>">
                          </div>
                          </div>
  												<div class="form-group">
  												<label class="control-label col-sm-2">Telepon:</label>
  												<div class="col-sm-10">
  													<input type="number" name="telepon" class="form-control" placeholder="Telefon" required value="<?php echo $data['telepon_managerhrd']; ?>">
  												</div>
  												</div>
  												<div class="form-group">
  													<div class="col-sm-offset-2 col-sm-10">
  														<button type="submit" class="btn btn-info btn-fill">Submit</button>
  													</div>
  												</div>
                      </form>
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
