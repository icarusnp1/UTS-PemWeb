<?php 
// koneksi database
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id_golongan = $_POST['id_golongan'];
$batas_bawah = $_POST['batas_bawah'];
$batas_atas = $_POST['batas_atas'];
$tarif_per_m3 = $_POST['tarif_per_m3'];      

// Get the max id_pelanggan, increment it by 1, and set it as the new id_pelanggan
$result = mysqli_query($koneksi, "SELECT MAX(id_tarif) AS max_id FROM tarif");
$row = mysqli_fetch_assoc($result);
$new_id = $row['max_id'] + 1;

// Insert the new record with the new id_pelanggan
mysqli_query($koneksi, "INSERT INTO tarif (id_tarif, id_golongan, batas_bawah, batas_atas, tarif_per_m3) VALUES ('$new_id', '$id_golongan', '$batas_bawah', '$batas_atas', '$tarif_per_m3')");

// Redirect back to the login page
header("location:../Home/index.php");

 
?>