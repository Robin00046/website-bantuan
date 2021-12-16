<?php
$host = "localhost";
$user = "root";  
$pass = "";
$name = "kramatselatan";

$koneksi = mysql_connect($host, $user, $pass) or die("Koneksi ke database gagal!");
mysql_select_db($name, $koneksi) or die("Tidak ada database yang dipilih!");
?>
