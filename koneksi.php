<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_akademik";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
  echo "Koneksi Gagal" . die(mysqli_connect_error());
}
?>