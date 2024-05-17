<?php
session_start();
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "project";
    $conn = mysqli_connect($server, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>who are you?</title>
    <link rel="stylesheet" href="come1.css">
</head>
<body>
    <h1>ARE YOU A </h1>
   
   
        <div class="register-link">
            
            <a href="donor.php">DONOR</a>
            
        </div><br>
        <div class="register-link">
            
            <a href="recep.php">RECEPIENT</a>
        </div> 
        <form action="logout.php">
    <button class="button">logout</button>
</form>


</body>
</html>