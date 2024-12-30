<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$id           = $_POST['id'];
$status_aktif = $_POST['status_aktif'];


//query update data ke dalam database berdasarkan ID
$query = "UPDATE pelanggan SET status_aktif = '$status_aktif' WHERE id_pelanggan='$id'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($koneksi->query($query)) {
    //redirect ke halaman tampil.php 
    header("location: ../Home/user.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupdate!";
}

?>
