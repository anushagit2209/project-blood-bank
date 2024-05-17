<?php
session_start();
if (isset($_POST['RECEPIENT_NAME'])) {
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
    $RECEPIENT_NAME = $_POST['RECEPIENT_NAME'];
    $blood_group = $_POST['blood_group'];
    $blood_component = $_POST['blood_component'];
    $disease = $_POST['disease'];
    
   

    $sql = "INSERT INTO `project`.`recepient` (`RECEPIENT_NAME`, `blood_group`, `blood_component`, `disease`) VALUES ('$RECEPIENT_NAME', '$blood_group', '$blood_component', '$disease')";

    if ($conn->query($sql) === true) {
        echo "Successfully inserted";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    if (mysqli_num_rows($result) > 0) {
        // Login successful, redirect to another webpage
        header("Location: login.php");
        exit;
    } else {
        echo "signup failed. Please check your username and password.";
    }
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECEPIENT</title>
    <link rel="stylesheet" href="donor1.css">
</head>
<body>
    <div class="main">
    <h1>FILL IN THE CREDENTIALS</h1>
    
        <section id="donor">
    <form action="recep.php" method="post">
        <div><label for="RECEPIENT_NAME">RECEPIENT NAME:</label>
            <input type="text" id="RECEPIENT_NAME" name="RECEPIENT_NAME" required>
            <box-icon type='solid' name='user'></box-icon></div> <br>
            <div><label for="blood_group">Blood Group:</label>
                <input type="text" id="blood_group" name="blood_group" required></div> <br>
                
               <div><label for="blood_component">SELECT THE BLOOD COMPONENT:</label>
                <select  name="blood_component"  id="blood_component"  required>
                    <optgroup label="blood_component">
                    <option value="Whole Blood">Whole Blood</option>
                    <option value="Single Donor Platelet">Single Donor Platelet</option>
                    <option value="Single Donor Plasma">Single Donor Plasma</option>
                    <option value="Random donor platelets">Random donor platelets</option>
                    <option value="Platelet rich plasma">Platelet rich plasma</option>
                    <option value="Platelet concentrate">Platelet concentrate</option>
                    <option value="plasma">Plasma</option>
                    <option value="Packed red blood cells">Packed red blood cells</option>
                    <option value="irradiated RBC">irradiated RBC</option></optgroup> </select> 
               </div><br>
               <div><label for="disease">Any pre existing conditions or diseases?</label>
                <input type="text" id="disease" name="disease" required></div> <br>
                      
                    <button type="submit">Submit</button>
                    <button type="reset">Reset now</button>
                    <a href="logout.php" class="btn">LogOut</a>    
                </div><br> 
                    </div>
                    
                    
        </form>
        <br>
       
    </section>
  
    
</body>
</html>