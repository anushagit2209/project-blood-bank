<?php
    $invalidotp=false;
    //require('..\required\dbconnect.php');
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "project";
    $conn = mysqli_connect($server, $username, $password, $database);
    
    session_start();
    echo($_SESSION['otp']);
    if($_SERVER['REQUEST_METHOD']=="POST"){
        
        echo($_POST['userotp']);
        
        echo($_POST['userotp']==$_SESSION['otp']);
        
        if($_POST['userotp']==$_SESSION['otp']){
            $signup_username = $_SESSION['signup_username'];
            $email = $_SESSION['email'];
            $signup_password = $_SESSION['signup_password'];
            $address = $_SESSION['address'];
            $phone = $_SESSION['phone'];
            $DOB = $_SESSION['DOB'];
            $gender = $_SESSION['gender'];
            
            echo"success";
            //$hash = password_hash($signup_password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO `project`.`users` (`signup_username`, `email`, `signup_password`, `address`, `phone`, `DOB`, `gender`) VALUES ('$signup_username', '$signup_password', '$hash', '$address', '$phone', '$DOB', '$gender')";

            $result=mysqli_query($conn,$sql);
            header("location: ..\login.php");
            
        }
        else{
            echo"Invalid OTP";
            $invalidotp=true;
        }
        

    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="bg-white">
<section class="text-gray-600 body-font lg:w-3/4 lg:mx-40  mt-32 ">
  

    <div class="lg:w-2/6 md:w-1/2 bg-red-500 rounded-lg p-8 flex flex-col mx-auto w-full mt-10 md:mt-0 ">
      <h2 class="text-black text-lg font-medium title-font mb-5">OTP verification</h2>
      <form  action="otpverification.php" method="post">
        <div class="relative mb-4">
            <label for="userotp" class="leading-7 text-sm text-gray-100">Enter OTP</label>
            <input type="text" id="userotp" name="userotp" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        
        
        <div class="flex flex-wrap mx-auto  items-center">
        <button class="text-black bg-white border-0 py-2 px-8 focus:outline-none hover:bg-gray-500 rounded text-lg ">Verify</button>
        </div>
        

      </form>  
    </div>
  </div>
</section>
</body>
</html>