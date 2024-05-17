<!-- php part  -->
<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "project";
    $conn = mysqli_connect($server, $username, $password, $database);
    $password_match=true;
    session_start();
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if($_POST['password']==$_POST['confirmpassword']){
        
        $newpassword=$_POST['password'];
        $fpemail=$_SESSION['emailforotp'];
        //checking if the username or email is already in use 
        
        $sql="UPDATE users SET signup_password = '$newpassword' WHERE email = '$fpemail'";
        try{
        $result=mysqli_query($conn,$sql);
        }
        catch(mysqli_sql_exception){
          echo "Wrong";
        }
        echo $result;
        //header("location: ..\login.php");
       
      }
      else{
        echo "password problem";
        $password_match=false;
        
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
<body class="bg-white">

<!-- signup -->
<section class="text-gray-600 body-font lg:w-3/4 lg:mx-40  ">
  <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
    <div class="lg:w-3/5 md:w-1/2 md:pr-16  lg:pr-0 pr-0">
      <h1 class="title-font font-large sm:text-center text-5xl text-black">Jeevan Dhara</h1>
    </div>

    <div class="lg:w-2/6 md:w-1/2 bg-red-500 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 ">
      <h2 class="text-black text-lg font-medium title-font mb-5">Enter new password</h2>
        
      <form  action="updatepassword.php" method="post">
        
        
        <div class="relative mb-4">
            <label for="password" class="leading-7 text-sm text-gray-100">Password</label>
            <input required type="password" id="password" name="password" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        <div class="relative mb-4">
            <label for="confirm-password" class="leading-7 text-sm text-gray-100">Confirm Password</label>
            <input required type="password" id="confirmpassword" name="confirmpassword" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            <?php
              if(!$password_match){
                echo('<p class="text-red-500">Password doesnt match</p>');
              }
            ?>
            
          </div>
        <div class="flex flex-wrap mx-auto  items-center">
        <button class="text-black bg-white border-0 py-2 px-8 focus:outline-none hover:bg-gray-500 rounded text-lg ">Update</button>
        </div>
        

      </form>  
    </div>
  </div>
</section>
    
</body>
</html>