<?php
if (isset($_POST['emailforotp']) ) {
    // $server = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "project";
    // $conn = mysqli_connect($server, $username, $password, $database);

    // // Check connection
    // if (!$conn) {
    //     die("Connection failed: " . mysqli_connect_error());
    // }

    session_start();
    $_SESSION['emailforotp']=$_POST['emailforotp'];
    $_SESSION['emailotp']=rand(111111,999999);
   
    require 'mailer.php';
    
    header("Location: otpverification.php");
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
        <h2>JEEVAN DHARA</h2>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="..\login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="emailotp.php" method="post">
        <h1>Login</h1>
        <div> <label for="username">Enter Email for otp:</label>
            <input type="text"  name="emailforotp" required>
            <box-icon type='solid' name='user'></box-icon>
            
        </div>
        <button type="submit" class="button">login</button>
       
        </div>
    </form>
    </div> 

</body>
</html>
