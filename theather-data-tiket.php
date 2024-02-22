<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <link rel="stylesheet" href="./style//theather-data-tiket.css">
</head>

<body>

    <?php
    session_start();
    include('data-p.php');

    $film = $_POST["film"];
    $location = $_POST["location"];
    $jam = $_POST["jam"];
    $harga_tiket = $_POST["harga_tiket"];
    $jumlah_tiket = $_POST["jumlah_tiket"];
    $username = $_SESSION["username"];
    $total = $jumlah_tiket * $harga_tiket;

    $queryInsert = "INSERT INTO `data-tiket` (film, location, jam, harga_tiket, jumlah_tiket, total,username) VALUES 
    ('$film', '$location', '$jam', '$harga_tiket', '$jumlah_tiket', '$total', '$username')";
    $resultInsert = mysqli_query($coon, $queryInsert);

    $lastInsertedId = mysqli_insert_id($coon);

    $hasil = mysqli_query($coon, "SELECT * FROM `data-tiket` WHERE id = $lastInsertedId");
    while ($data = mysqli_fetch_array($hasil)) {
    ?>

<div class="form">

<label class="film">ANM</label>
<hr> 
<div class="judul">
    <label><?php echo $data ['film']; ?></label> <br>
</div>

<div class="date">
    <label>ID : </label>
    <label  ><?php echo $data['id']; ?></label> <br>
</div>

<div class="date">
    <label>Jam : </label>
    <label  ><?php echo $data ['jam']; ?></label> <br>
</div>

<div class="location">
    <label>Location : </label>
    <label><?php echo $data ['location']; ?></label> <br>
</div>

<div class="tiket">
    <label>Jumlah Tiket : </label>
    <label><?php echo $data ['jumlah_tiket']; ?></label> <br>
</div>

<div class="price">
    <label>Total Harga : </label>
    <label>RP. <?php echo $data ['total']; ?></label> <br>
</div>


<div class="button">    
        <a class="btn" href="home.html">Countinue</a>
</div>


    <?php
    }
    ?>

</body>

</html>
          