<?php
session_start();
include '../koneksi.php';

$error='';
if (isset($_POST['login'])){
if	(empty($_POST['username']) || empty($_POST['password'])) {
	$error = "Username or Password Tidak Valid!";

}
else{
$username=$_POST['username'];
$password=$_POST['password'];

$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$query = "select * from admin where password='$password' AND username='$username'";
$sql = mysql_query($query);
$rows = mysql_fetch_array($sql);
	if ($rows) {
		$_SESSION['username']=$username;
		header("location: dashboard/admin.php");
} else {
		echo "<script language=\"JavaScript\">\n";
		echo "alert('Maaf, username atau password tidak sesuai!');\n";
		echo "window.location='index.php'";
		echo "</script>";
		}
	}
}

?>
