<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - Pemesanan Tiket Bioskop</title>
  <link rel="stylesheet" href="./style//admin.css">
</head>
<body>
    <?php
    
    include "db-cetak.php";
    $data_tiket = mysqli_query($coon, "SELECT * FROM `data-tiket`");
    $jumlah_tiket = mysqli_num_rows($data_tiket);
    ?>

  <header>
    <h1>Admin Panel - Pemesanan Tiket Bioskop</h1>
    <p>Jumlah Pemesanan: <?php echo $jumlah_tiket; ?> </p> <!-- Ganti dengan jumlah pemesanan aktual -->
  </header>

  <nav>
    <a href="#">Beranda</a>
    <a href="admin-j.php">Film</a>
    <a href="admin-p.php">Pemesanan</a>
  </nav>

  <div class="welcome-container">
    <img src="https://cdn-icons-png.flaticon.com/512/1794/1794749.png" class="admin-icon">
    <h2>Selamat Datang di Admin Center</h2>
    <p>Silakan kelola informasi dan data dengan mudah.</p>
      <button>
      <a class="btn-log" href="logout.php">Log Out</a>
      </button>
  </div>
 
</body>
</html>