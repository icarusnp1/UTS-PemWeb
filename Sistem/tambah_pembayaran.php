<?php 
// koneksi database
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$tanggal_pembayaran = $_POST['tanggal_pembayaran'];
$status_pembayaran = $_POST['status_pembayaran'];
$id = $_POST['id_pelanggan'];
$id2 = $_POST['id_penggunaan'];

// Insert the new record with the new id_pelanggan
mysqli_query($koneksi, "INSERT INTO pembayaran (id_pelanggan, id_penggunaan, tanggal_pembayaran, status_pembayaran) VALUES ('$id2', '$id', '$tanggal_pembayaran', '$status_pembayaran')");

// Redirect back to the login page
header("location:../Home/index.php");

?>