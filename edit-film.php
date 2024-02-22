<?php
include 'data-p.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM vidio WHERE id='$id'";
    $result = mysqli_query($coon, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($coon).
         " - ".mysqli_error($coon));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Document</title>
    <link rel="stylesheet" href="./style//edit-film.css">
  </head>
  <body>
      <center>
        <h1>Edit film <?php echo $data['film']; ?></h1>
      <center>
      <form method="POST" action="data-edit.php" enctype="multipart/form-data" >
      <section class="base">

        <input name="id" value="<?php echo $data['id']; ?>"  hidden />
        <div>
          <label>Nama Film</label>
          <input type="text" name="film" value="<?php echo $data['film']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Location</label>
         <input type="text" name="location" value="<?php echo $data['location']; ?>" />
        </div>
        <div>
          <label>Jam 1</label>
         <input type="text" name="jam" value="<?php echo $data['jam']; ?>" />
        </div>
        <div>
          <label>Jam 2</label>
         <input type="text" name="jam1" value="<?php echo $data['jam1']; ?>" />
        </div>
        <div>
          <label>Jam 3</label>
         <input type="text" name="jam2" value="<?php echo $data['jam2']; ?>" />
        </div>
        <div>
          <label>Harga Tiket</label>
         <input type="text" name="harga_tiket" required="" value="<?php echo $data['harga_tiket']; ?>"/>
        </div>
        <div>
          <label>Film</label>  
          <input type="file" name="gambar_produk"/>
        </div>
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  </body>
</html>