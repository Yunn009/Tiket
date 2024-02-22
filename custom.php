<?php
session_start();
include 'db.php';
$username = $_SESSION['username'];

if (empty($username)) {
    header("Location: index.php");
    exit(); 
}

// Fungsi untuk mengubah status pembayaran menjadi "Sudah Dibayar"
function updatePaymentStatus($orderId) {
    include 'db.php';
    $updateQuery = "UPDATE `data-tiket` SET status='Sudah Dibayar' WHERE id='$orderId'";
    mysqli_query($coon, $updateQuery);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/custom.css">
    <title>User Account</title>
</head>
<body>
    <div class="container">
        <header>
            <div class="profile">
                <img src="https://e7.pngegg.com/pngimages/552/729/png-clipart-computer-icons-button-user-avatar-button-white-vector-icons.png">
                <div class="profile-info">
                    <h2><?php echo $username; ?></h2>
                    <!-- Your other header content goes here -->
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

                        // Check if the status is 'Belum dibayar'
                        if ($data["status"] == 'Belum dibayar') {
                            echo "<form onsubmit='updateCountdown({$data["id"]}, \"remainingTime{$data["id"]}\"); return false;' action='pembayaran.php' method='post'>";
                            echo "<input type='hidden' name='order_id' value='{$data["id"]}'>";
                            echo "<input type='submit' name='confirm_payment' value='Confirm Payment'>"; // Button for confirming payment
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

    <!-- Script for redirecting after payment confirmation -->
    <script>
        // Function to redirect to custom menu page
        function redirectToCustomMenu() {
            window.location.href = "menu_custom.php"; // Change to your custom menu page URL
        }

        // Call redirect function after payment confirmation
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_payment'])) {
            // Perform status update process here
            updatePaymentStatus($orderId); // Call your status update function
            echo "redirectToCustomMenu();"; // Call redirect function after update
        }
        ?>
    </script>
</body>
</html>
