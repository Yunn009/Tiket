<?php
 
session_start();

include 'db.php';
$username = $_POST['username'];
$password = $_POST['password'];


if (!empty($username) && !empty($password)){
   $sql = mysqli_query($coon, "SELECT * FROM regis WHERE username = '{$username}' AND password = '{$password}' ");
   if(mysqli_num_rows($sql) > 0){
      $row = mysqli_fetch_assoc($sql);
      if($row){
         $_SESSION['username'] = $row['username'];
         $_SESSION['password'] = $row['password'];
         if ($row["level"] === "admin"){
            header("Location:admin.php");
         } else{
            header("Location:home.html");
            echo "succses";
         }
      }    
   } else {
      echo '<script>alert("Username Dan Password Salah");location.href="home-0.php";</script>';
   }
}


?>