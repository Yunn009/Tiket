<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/theather.css">
</head>

<body>
    <?php include('data-p.php'); ?>

    <header>
        <h1>Playing Now</h1>
    </header>

    <section class="movie-list">
        <?php
        $query = "SELECT * FROM vidio ORDER BY id ASC";
        $result = mysqli_query($coon, $query);

        if (!$result) {
            die("Query Error: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
        }

        $no = 1;

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="movie-item">
                <img src="gambar/<?php echo $row['gambar_produk']; ?>" alt="<?php echo $row['film']; ?>" style="width: 120px;"> 
                <h2><?php echo $row['film']; ?></h2>
                <p>Location: <?php echo $row['location']; ?></p>
                <p>Jam: <?php echo $row['jam']; ?> <?php echo $row['jam1']; ?> <?php echo $row['jam2']; ?></p>
                <button class="btn-bac">
                <a href="theather-tiket.php?id=<?php echo $row['id']; ?>"  class="btn-pesan">Pesan Tiket</a>
                </button>
            </div>
        <?php
            $no++;
        }
        ?>
    </section>

</body>

</html>
