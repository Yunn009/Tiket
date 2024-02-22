<?php
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$coon = new mysqli('localhost', 'root', '', 'movie');

if (empty($username)) {
    $em = "Full name Required";
    header("Location:index.php");
    exit;
} else if (empty($password)) {
    $em = "Password Required";
    header("Location:index.php");
    exit;
} else if (empty($email)) {
    $em = "Email Required";
    header("Location:index.php");
    exit;
}

if ($coon->connect_error) {
    die('Connection Failed : ' . $coon->connect_error);
} else {
    $stmt = $coon->prepare("INSERT INTO regis (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $email);
    $stmt->execute();

    // Ambil ID user yang baru dibuat
    $userId = $coon->insert_id;

    $stmt->close();
    $coon->close();
    
    echo '<script>alert("Registration successful"); window.location.href = "home-0.php";</script>';
}
?>
