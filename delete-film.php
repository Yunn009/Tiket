<?php
include 'data-p.php';
$id = $_GET["id"];
//mengambil id yang ingin dihapus

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM vidio WHERE id='$id' ";
    $hasil_query = mysqli_query($coon, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($coon).
       " - ".mysqli_error($coon));
    } else {
      echo "<script>alert('Film berhasil dihapus.');window.location='admin-j.php';</script>";
    }