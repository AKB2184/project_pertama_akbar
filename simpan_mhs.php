<?php
include 'koneksi.php';
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jurusan = $_POST['jurusan'];
$input = mysqli_query($koneksi, "INSERT INTO mahasiswa
VALUES('$nim','$nama','$alamat','$jurusan')") or die(mysqli_error($koneksi));
if ($input) {
  echo "Data Berhasil Disimpan";
  header("location:index.php");
} else {
  echo "Gagal Disimpan";
}
?>