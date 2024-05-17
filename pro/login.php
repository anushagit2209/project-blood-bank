<?php
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "project";
    $conn = mysqli_connect($server, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `users` WHERE `signup_username` = '$username' AND `signup_password` = '$password'";

    $result = mysqli_query($conn, $sql);
   
    if (mysqli_num_rows($result) > 0) {
        $row=$result->fetch_assoc();
$_SESSION['user_id']=$row['user_id'];
        header("Location: come.php");
        exit;
    } else {
        echo "Login failed. Please check your username and password.";
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
        <h2>JEEVAN DHARA</h2>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="login.php" method="post">
        <h1>Login</h1>
        <div> <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <box-icon type='solid' name='user'></box-icon>
            <i class='bx bxs-user'></i>
        </div>
        <div><label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <i class='bx bxs-lock'></i>
        </div>
        <div class="remember-forgot">
            <label><input type="checkbox"> remeber me</label>
            <a href="forgotpassword/emailotp.php">forgot password?</a>
        </div>
        <button type="submit" class="button">login</button>
        <div class="register-link">
            <p>Don't have an account?
            <a href="signup.php">signup</a></p>
        </div>
    </form>
    </div> 

</body>
</html>
