<?php 
    $coon = new mysqli('localhost', 'root', '', 'movie');
        if (!$coon) {
        die("Koneksi Gagal:" .mysqli_connect_error());
        }  
    ?>