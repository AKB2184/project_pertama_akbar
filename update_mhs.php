<?php
// include database connection file
include 'koneksi.php';
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jurusan = $_POST['jurusan'];
$result = mysqli_query($koneksi, "UPDATE mahasiswa SET
nama='$nama',alamat='$alamat',jurusan='$jurusan' WHERE nim='$nim'");
// Redirect to homepage to display updated user in list
header("Location: index.php");
?>