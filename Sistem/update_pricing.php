<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$id           = $_POST['id'];
$batas_bawah  = $_POST['batas_bawah'];
$batas_atas   = $_POST['batas_atas'];
$tarif_per_m3 = $_POST['tarif_per_m3'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE tarif SET batas_bawah = '$batas_bawah', batas_atas = '$batas_atas', tarif_per_m3 = '$tarif_per_m3' WHERE id_tarif='$id'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($koneksi->query($query)) {
    //redirect ke halaman tampil.php 
    header("location: ../Home/index.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupdate!";
}

?>
