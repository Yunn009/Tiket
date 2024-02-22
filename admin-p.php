<?php
session_start();
include 'db.php';
$username = $_SESSION['username'];

if (empty($username)) {
    header("Location: index.php");
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/custom.css">
    <title>User Account</title>
    <script>
        function startTimer(orderId, timerDuration) {
            var timer = timerDuration;
            var interval = setInterval(function () {
                document.getElementById(orderId).innerHTML = "Time left: " + timer + "s";
                timer--;

                if (timer < 0) {
                    clearInterval(interval);
                    document.getElementById(orderId).innerHTML = "Cancelled";
                }
            }, 1000);
        }
    </script>
</head>
<body>
    <div class="container">
        <header>
            <div class="profile">
                <img src="https://e7.pngegg.com/pngimages/552/729/png-clipart-computer-icons-button-user-avatar-button-white-vector-icons.png">
                <div class="profile-info">
                    <h2><?php echo $username; ?></h2>
                    <h1></h1>
                </div>
            </div>
        </header>
        <section>
            <div class="ticket-history">
                <h2>Aktivitas pemesanan</h2>
                <ul>
                    <?php
                    include 'db.php';
                    
                    $getUserQuery = "SELECT * FROM regis WHERE username = '{$username}' ";
                    $userResult = mysqli_query($coon, $getUserQuery);

                    if (mysqli_num_rows($userResult) == 1) {
                        $userData = mysqli_fetch_assoc($userResult);
                        $userId = $userData['username'];

                        $getOrdersQuery = "SELECT * FROM `data-tiket` WHERE username='$username'";
                        $ordersResult = mysqli_query($coon, $getOrdersQuery);
                    }

                    while ($data = mysqli_fetch_assoc($ordersResult)) {
                        echo "<li>" . "ID : " . $data["id"] . "</li>";
                        echo "<li>" . "Film : ". $data["film"] . "</li>";
                        echo "<li>" . "Location : ". $data["location"] . "</li>";
                        echo "<li>" . "Jam : ". $data["jam"] . "</li>";
                        echo "<li>" . "Jumlah Tiket : ". $data["jumlah_tiket"] . "</li>";
                        echo "<li>" . "Total :". $data["total"] . "</li>";
                        echo "<li>" . "Status : <span id='{$data["id"]}'>" . $data["status"] . "</span></li>";
                        echo "<hr>";

                        // Check if the status is 'Pending'
                        if ($data["status"] == 'Pending') {
                            echo "<form action='pembayaran.php' method='post' onsubmit='startTimer({$data["id"]}, 10);'>";
                            echo "<input type='hidden' name='order_id' value='{$data["id"]}'>";
                            echo "<input type='submit' name='confirm_payment' value='Confirm Payment'>";
                            echo "</form>";
                        }
                    }
                    ?>
                </ul>   
            </div>
        </section>
        <footer>
            <p>&copy; 2023 ANM pemesanan tiket.com</p>
        </footer>
    </div>
    <div class="button">
        <a href="home.html">Back</a>
    </div>
    <div class="button2">
        <a href="logout.php">Log Out</a>
    </div>
</body>
</html>
