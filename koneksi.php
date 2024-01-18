<?php
//variable
$host="localhost";
$user="n1577229_digilib_kel1";
$pass="*t3lk0m#2023";
$db="n1577229_digilib_tk_kel1";

//koneksi
$koneksi = mysqli_connect($host,$user,$pass,$db);
if (!$koneksi) echo "koneksi gagal........";
?>