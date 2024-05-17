<?php

if (isset($_POST['signup_username'])) {
    
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "project";
    $conn = mysqli_connect($server, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    session_start();
    $_SESSION['signup_username'] = $_POST['signup_username'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['signup_password'] = $_POST['signup-password'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['DOB'] = $_POST['date'];
    $_SESSION['gender'] = $_POST['gender'];

    $_SESSION['otp']=rand(111111,999999);
    require 'signupotp\mailer.php';
    
    header("Location: signupotp\otpverification.php");
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="blood Bank">
    <meta name="robots" content="INDEX, FOLLOW">
    <title>Online Blood Bank</title>
    <link rel="stylesheet" href="s.css">
</head>
<body>
   
     <div class="main">
    
    
    <section id="signup">
       
        
        <form action="signup.php" method="post">
           <div><label for="signup-username">Username:</label>
            <input type="text" id="signup_username" name="signup_username" required></div> <br>
            <div><label for="email">Email id:</label>
                <input type="email" id="email" name="email" required></div> <br>
            <div><label for="signup-password">Password:</label>
                <input type="password" id="signup-password" name="signup-password" required></div><br>
            <div><label for="address">Address:</label>
                <input type="text" id="address" name="address" required></div><br>
             
            <div> <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required></div><br>
                <div><label for="DOB">DOB:</label>
                <input type="date" id="date" name="date" required><div><br>
                <div><label for="gender">gender:</label>    
                <input type="radio" id="gender" name="gender" value="female">
                female
                <input type="radio" id="gender" name="gender" value="male">
                male
                <input type="radio" id="gender" name="gender" value="other">
                other </div><br>
                    <button type="submit">Sign Up</button>
                    <button type="reset">Reset now</button></div><br> 
                    </div>
                    
                    
        </form>
        <br>
        <a href="login.php"> login</a>

    </section>
    

    
    <!-- <footer> -->
        <!-- <p>&copy; 2023 Online Blood Bank. All rights reserved.</p> -->
    <!-- </footer> -->
</body>
</html>
