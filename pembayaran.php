<?php
// Include your database connection file
include 'db.php';

// Handle payment confirmation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_payment'])) {
    // Verifikasi pembayaran dan proses lainnya
    // ...
    
    // Update status menjadi 'Lunas'
    $orderId = $_POST['order_id'];
    $updateQuery = "UPDATE `data-tiket` SET status ='Lunas' WHERE id=$orderId";
    $updateResult = mysqli_query($coon, $updateQuery);

    if ($updateResult) {
        echo "<script>alert('Pembayaran berhasil!');</script>";
        echo "<script>window.location.href = 'custom.php';</script>"; // Redirect to custom page after successful payment
    } else {
        echo "<script>alert('Error updating status.');</script>";
    }
}   
?>
