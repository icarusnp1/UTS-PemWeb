<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from tarif where id_golongan ='$id'");
mysqli_query($koneksi,"delete from golongan where id_golongan ='$id'");



 
// mengalihkan halaman kembali ke index.php
header("location:../Home/index.php");
 
?>