<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'cuti_online';
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
$dbselect = mysql_select_db($dbname);
?>
