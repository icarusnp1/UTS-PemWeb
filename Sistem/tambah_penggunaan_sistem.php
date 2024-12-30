<?php 
// koneksi database
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$volume_air_m3 = $_POST['volume_air_m3'];
$total_biaya = $_POST['total_biaya'];
$tanggal_penggunaan = $_POST['tanggal_penggunaan'];
$id = $_POST['id'];

// Insert the new record with the new id_pelanggan
mysqli_query($koneksi, "INSERT INTO penggunaan (id_pelanggan, volume_air_m3, total_biaya, tanggal_penggunaan) VALUES ('$id', '$volume_air_m3', '$total_biaya', '$tanggal_penggunaan')");

// Redirect back to the login page
header("location:../Home/index.php");

?>