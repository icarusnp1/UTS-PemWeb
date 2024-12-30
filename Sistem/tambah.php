<?php 
// koneksi database
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$status_aktif = $_POST['status_aktif'];
$no_telepon = $_POST['no_telepon'];
$tanggal_penggunaan = $_POST['tanggal_penggunaan'];
$id_golongan = $_POST['id_golongan'];

// Get the max id_pelanggan, increment it by 1, and set it as the new id_pelanggan
// Get the total row count from the pelanggan table, increment it by 1, and set it as the new id_pelanggan



// Insert the new record with the new id_pelanggan
mysqli_query($koneksi, "INSERT INTO pelanggan (nama, alamat, no_telepon, id_golongan, status_aktif) VALUES ('$nama', '$alamat', '$no_telepon','$id_golongan', '$status_aktif')");
// Redirect back to the login page
header("location:../Home/user.php");

 
?>