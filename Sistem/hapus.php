<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from pembayaran where id_pembayaran ='$id'");
mysqli_query($koneksi,"delete from penggunaan where id_penggunaan ='$id'");
mysqli_query($koneksi,"delete from pelanggan where id_pelanggan ='$id'");

 
// mengalihkan halaman kembali ke index.php
header("location:../Home/user.php");
 
?>