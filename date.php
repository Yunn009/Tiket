<?php
    // Example of setting a payment deadline for one day from the current time
    $deadline = date('Y-m-d H:i:s', strtotime('+1 day'));
    $insertOrderQuery = "INSERT INTO `data-tiket` (film, location, jam, jumlah_tiket, total, username,status,deadline) VALUES ('$film', '$location', '$jam', '$jumlah_tiket', '$total', '$username','status','deadline')";
    mysqli_query($coon, $insertOrderQuery);

?>