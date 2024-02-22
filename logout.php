<?php 
session_start();

session_unset();
session_destroy();

header("Location:home-0.php");
exit;
?>  