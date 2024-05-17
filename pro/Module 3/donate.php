<?php
// Include the database configuration file and authentication functions.
include('db_config.php');
include('authentication.php');

// Redirect unauthenticated users to the login page.


// Define variables to store success and error messages.
$success_message = "";
$error_message = "";

// Handle the form submission.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $donor_name = $_SESSION['user_name'];
    $blood_group =  $_POST['blood_group'];
    $quantity = intval($_POST['quantity']);
    $donation_date = date('Y-m-d');


    $sql = "SELECT * FROM donations WHERE blood_group = '$blood_group' AND donor_name='$donor_name'";
    $result = mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    
    if($num==0)
    {
        $sql = "INSERT INTO donations (donor_name, blood_group, quantity, donation_date) VALUES ('$donor_name', '$blood_group', $quantity, '$donation_date')";
    }
    else{
        $row=mysqli_fetch_assoc($result);
        $quan=$row['quantity']+$quantity;
        $tempid=$row['id'];
       
        $sql="UPDATE donations SET quantity ='$quan'  WHERE donations.id = '$tempid'";
    }

    if ($conn->query($sql) === TRUE) {
        $success_message = "Donation submitted successfully.";
    } else {
        $error_message = "Error: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Donate Blood</title>
    <!--<link rel="stylesheet" href="donate.css">-->
</head>
<body>
<!--<img class="bg" src="./files/bg1.jpg">-->
    <h1>Donate Blood</h1>
    <?php
    if (!empty($success_message)) {
        echo "<div class='success'>$success_message</div>";
    } elseif (!empty($error_message)) {
        echo "<div class='error'>$error_message</div>";
    }
    ?>
    <form method="POST" action="donate.php">
        <label for="blood_group">Blood Group:</label>
        <input type="text" name="blood_group" required>
        
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required>

        <button type="submit">Submit Donation</button>
    </form>
    <br>
    <a href="donordash.php">Back to Home Page</a>
</body>
</html>
