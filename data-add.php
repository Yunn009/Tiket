<?php
  include 'data-p.php';


  $film   = $_POST['film'];
  $location     = $_POST['location'];
  $jam    = $_POST['jam'];
  $jam1    = $_POST['jam1'];
  $jam2   = $_POST['jam2'];
  $harga_tiket    = $_POST['harga_tiket'];
  $gambar_produk = $_FILES['gambar_produk']['name'];

if($gambar_produk != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gambar_produk); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar_produk']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO vidio (film, location, jam, jam1, jam2 ,harga_tiket, gambar_produk) VALUES ('$film', '$location', '$jam','$jam1','$jam2', '$harga_tiket', '$nama_gambar_baru')";
                  $result = mysqli_query($coon, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($coon).
                           " - ".mysqli_error($coon));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Film berhasil ditambah.');window.location='admin-j.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='add-film.php';</script>";
            }
} else {
   $query = "INSERT INTO vidio (film, location, jam, jam1, jam2, harga_tiket, gambar_produk) VALUES ('$film', '$location', '$jam', '$jam1','$jam2', '$harga_tiket', null)";
                  $result = mysqli_query($coon, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($coon).
                           " - ".mysqli_error($coon));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='admin.php';</script>";
                  }
}

 
