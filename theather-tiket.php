<?php
include('data-p.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM vidio WHERE id = $id";
    $result = mysqli_query($coon, $query);

    if (!$result) {
        die("Query Error: " . mysqli_errno($coon) . " - " . mysqli_error($coon));
    }

    $row = mysqli_fetch_assoc($result);

    $film = $row['film'];
    $location = $row['location'];
    $jam = $row['jam'];
    $jam1 = $row['jam1'];
    $jam2 = $row['jam2'];
    $harga_tiket = $row['harga_tiket'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jumlah_tiket = $_POST["jumlah_tiket"];
    $total = $jumlah_tiket * $harga_tiket;
    $user = $row['user'];

    $getUserQuery = "SELECT id FROM regis WHERE id='$id'";
    $userResult = mysqli_query($coon, $getUserQuery);

    if (mysqli_num_rows($userResult) == 1) {
        $userData = mysqli_fetch_assoc($userResult);
        $userId = $userData['id'];

        $queryInsert = "INSERT INTO `data-tiket` (user, film, location, jam, harga_tiket, jumlah_tiket, total) VALUES 
            ('$user', '$film', '$location', '$jam', '$harga_tiket', '$jumlah_tiket', '$total')";
        $resultInsert = mysqli_query($coon, $queryInsert);

        if ($resultInsert) {
            echo "Booking successful!";
        } else {
            echo "Error: " . mysqli_error($coon);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Tickets</title>
    <link rel="stylesheet" href="./style/theather-tiket.css">
    <!-- Countdown Timer Script -->
    <script>
        var countdownTime = 20; // 5 minutes

        function updateCountdown() {
            document.getElementById('countdown').innerHTML = formatTime(countdownTime);

            if (countdownTime <= 0) {
                alert("Booking has been canceled due to timeout");
                window.location.href = 'cancel_booking.php';
            } else {
                countdownTime--;
                setTimeout(updateCountdown, 1000);
            }
        }

        function formatTime(seconds) {
            var minutes = Math.floor(seconds / 60);
            var remainingSeconds = seconds % 60;
            return minutes + 'm ' + remainingSeconds + 's';
        }

        function startCountdown() {
            if (countdownTime === 20) {
                updateCountdown();
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            // If the countdown is already started (e.g., after a form submission)
            // Continue the countdown from where it left off
            if (countdownTime < 20) {
                updateCountdown();
            }
        });
    </script>
</head>

<body>
    <header>
        <h1>Pemesanan Tiket <?php echo $film; ?></h1>
    </header>
    <form action="theather-data-tiket.php" method="post" onsubmit="startCountdown()">
        <label>Nama Film</label>
        <input type="text" name="film" value="<?php echo $film; ?>" readonly><br>
        <label>Location</label>
        <input type="text" name="location" value="<?php echo $location; ?>" readonly><br>
        <label>Jam</label>
        <select name="jam">
            <?php if (!empty($jam)) : ?>
                <option value="<?php echo $jam; ?>"><?php echo $jam; ?></option>
            <?php endif; ?>
            <?php if (!empty($jam1)) : ?>
                <option value="<?php echo $jam1; ?>"><?php echo $jam1; ?></option>
            <?php endif; ?>
            <?php if (!empty($jam2)) : ?>
                <option value="<?php echo $jam2; ?>"><?php echo $jam2; ?></option>
            <?php endif; ?>
        </select><br>

        <label>Harga Tiket</label>
        <input type="text" name="harga_tiket" value="<?php echo $harga_tiket; ?>" readonly><br>
        <label>Jumlah Tiket</label>
        <input type="number" name="jumlah_tiket" min=1 required><br>
        <input type="submit" value="Pesan Tiket">
        
    </form>
    <script src="countdown.js"></script>

</body>

</html>
