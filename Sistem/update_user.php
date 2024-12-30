<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$id             = $_POST['id'];
$volume_air_m3  = $_POST['volume_air_m3'];
$total_biaya = $_POST['total_biaya'];
$tanggal_penggunaan = $_POST['tanggal_penggunaan'];


//query update data ke dalam database berdasarkan ID
$query = "UPDATE penggunaan SET volume_air_m3 = '$volume_air_m3', total_biaya = '$total_biaya', tanggal_penggunaan = '$tanggal_penggunaan' WHERE id_penggunaan='$id'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($koneksi->query($query)) {
    //redirect ke halaman tampil.php 
    header("location: ../Home/user.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupdate!";
}

?>
