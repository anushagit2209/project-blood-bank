<!-- php part  -->
<?php
    require('..\required\dbconnect.php');
    if($_SERVER['REQUEST_METHOD']=="POST"){
        
        $username=$_POST['username'];
        $password=$_POST['password'];
        $exists=false;

        
        $sql="SELECT * FROM `user` WHERE username='$username' AND password ='$password'";
        $result=mysqli_query($con,$sql);
        $num=mysqli_num_rows($result);
        if($num==1){
            
            $_SESSION['loggedin']=true;
            $_SESSION['username']=$username;
            
            //header("location: welcome.php");
            echo"loggedin";
        }
        else{
            echo "invalid";
        }

    }

    
?>






<!-- html part  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#2D033B]">

<!-- signup -->
<section class="text-gray-600 body-font lg:w-3/4 lg:mx-40  ">
  <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
    <div class="lg:w-3/5 md:w-1/2 md:pr-16  lg:pr-0 pr-0">
      <h1 class="title-font font-large sm:text-center text-5xl text-gray-100">Event Horizon</h1>
    </div>

    <div class="lg:w-2/6 md:w-1/2 bg-[#810CA8] rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 ">
      <h2 class="text-red-300 text-lg font-medium title-font mb-5">Login</h2>
       
      <form  action="login.php" method="post">
        <div class="relative mb-4">
            <label for="user-name" class="leading-7 text-sm text-gray-100">User Name</label>
            <input required type="text" id="full-name" name="username" class="w-full bg-[#C147E9] rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            
          </div>
        
        <div class="relative mb-4">
            <label for="password" class="leading-7 text-sm text-gray-100">Password</label>
            <input required type="password" id="password" name="password" class="w-full bg-[#C147E9] rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        
        <div class="flex flex-wrap mx-auto  items-center">
        <button class="text-black bg-[#E5B8F4] border-0 py-2 px-8 focus:outline-none hover:bg-purple-500 rounded text-lg ">Signup</button>
        </div>
        <a class="text-purple-400" href="forgotpassword\sendotp.php">Forgot Password?</a>

      </form>  
    </div>
  </div>
</section>
    
</body>
</html>