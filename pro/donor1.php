<?php
session_start();
if (isset($_POST['donor_name'])) {
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
    $donor_name = $_POST['donor_name'];
    $blood_group = $_POST['blood_group'];
    $haemoglobin = $_POST['haemoglobin'];
    $disease = $_POST['disease'];
    $pregnant = $_POST['pregnant'];
    $periods = $_POST['periods'];
    $allergy = $_POST['allergy'];
   

    $sql = "INSERT INTO `donor` (`donor_name`, `blood_group`, `haemoglobin`, `disease`, `pregnant`, `periods`, `allergy`) VALUES ('$donor_name', '$blood_group', '$haemoglobin', '$disease', '$pregnant', '$periods', '$allergy')";

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
    <title>DONOR</title>
    <link rel="stylesheet" href="donor1.css">
</head>
<body>
    <div class="main">
    <h1>FILL IN THE CREDENTIALS</h1>
    
        <section id="donor">
    <form action="donor1.php" method="post">
        <div><label for="donor_name">Donor Name:</label>
            <input type="text" id="donor_name" name="donor_name" required>
            <box-icon type='solid' name='user'></box-icon></div> <br>
            <div><label for="blood_group">Blood Group:</label>
                <input type="text" id="blood_group" name="blood_group" required></div> <br>
                <div><label for="haemoglobin">Haemoglobin Count:</label>
                    <input type="text" id="haemoglobin" name="haemoglobin" required></div> <br>
               <div><label for="disease">ARE YOU SUFFERING FROM ANY DISEASE?:</label>
                <select  name="disease"  id="disease"  required>
                    <optgroup label="disease">
                    <option value="" disabled selected>Select Disease</option>
                    <option value="HIV/AIDS">HIV/AIDS</option>
                    <option value="HEPATITIS B">HEPATITIS B</option>
                    <option value="CANCER">CANCER</option>
                    <option value="COLD">COLD</option>
                    <option value="OTHERS">OTHERS</option>
                </select> 
               </div><br>
               <div><label for="pregnant">ARE YOU PREGNANT OR BREAST FEEDING?:</label>
                <input type="radio" id="pregnant" name="pregnant" value="yes">
                yes
                <input type="radio" id="pregnant" name="pregnant" value="no">
                no
                </div><br>
                <div><label for="periods">ARE YOU ON YOUR PERIODS?:</label>
                    <input type="radio" id="periods" name="periods" value="yes">
                    yes
                    <input type="radio" id="periods" name="periods" value="no">
                    no
                    </div><br>
                    <div><label for="allergy">ARE YOU ALLERGIC TO SOMETHING?:</label>
                        <input type="radio" id="allergy" name="allergy" value="yes">
                        yes
                        <input type="radio" id="allergy" name="allergy" value="no">
                        no
                        </div>
                    <div>
                        <p>PLEASE SPECIFY </p>
                   <textarea></textarea></div><br>
                    <button type="submit">Submit</button>
                    <button type="reset">Reset now</button></div><br> 
                    </div>
                    
                    
        </form>
        <br>
       
    </section>
    <form action="logout.php">
    <button class="button">logout</button>
</form>
    
</body>
</html>