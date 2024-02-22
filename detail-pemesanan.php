<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pemesanan</title>
    <link rel="stylesheet" href="./style//detail-pemesanan.css">
</head>
<body>
    <h1>Detail Pemesanan</h1>

    <?php
    

    $id = $_GET['id'];
    $film = $_GET['film'];
    $jumlah = $_GET['jumlah'];
    $total = $_GET['total'];
    ?>

    <div class="ticket">
        <h2>ID Pemesanan: <?php echo $id; ?></h2>
        <p>Film: <?php echo $film; ?></p>
        <p>Jumlah Tiket: <?php echo $jumlah; ?></p>
        <p>Total Harga: RP. <?php echo $total; ?></p>
    </div>

    <a href="admin-p.php">Back</a>
</body>
</html>
