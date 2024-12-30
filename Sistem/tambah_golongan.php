<?php 
// koneksi database
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$nama_golongan = $_POST['nama_golongan'];
$deskripsi = $_POST['deskripsi'];

// Insert the new record with the new id_pelanggan
mysqli_query($koneksi, "INSERT INTO golongan (nama_golongan, deskripsi) VALUES ('$nama_golongan', '$deskripsi')");

// Redirect back to the login page
header("location:../Home/index.php");

 
?>