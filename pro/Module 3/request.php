<?php
include('db_config.php');
include('authentication.php'); // Include user authentication functions.


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requester_name = $_SESSION['user_name'];
    $blood_group = mysqli_real_escape_string($conn, $_POST['blood_group']);
    $quantity = intval($_POST['quantity']);
    $request_date = date('Y-m-d');



    $sql = "SELECT * FROM donations WHERE blood_group = '$blood_group'";
    $result = mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    
    if($num==0)
    {
    //     $sql = "INSERT INTO donations (donor_name, blood_group, quantity, donation_date) VALUES ('$donor_name', '$blood_group', $quantity, '$donation_date')";
    }
    else{
        $row=mysqli_fetch_assoc($result);
        $quan=$row['quantity']-$quantity;
        echo ($quan);
        $tempid=$row['id'];
       
        $sql="UPDATE donations SET quantity ='$quan'  WHERE donations.id = '$tempid'";
    }


    if ($conn->query($sql) === TRUE) {
        $success_message = "Request submitted successfully.";
    } else {
        $error_message = "Error: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<!--<link rel="stylesheet" href="request.css">-->-->
</head>
<body>
<!--<img class="bg" src="./files/bg1.jpg">-->
    <h1>Request Blood</h1>
    <table border="2" >
            <th>Donors</th>
            <th>blood_group</th>
            <th>Quantity</th>

        <tr>
           <?php
            $q="SELECT signup_username,blood_group,quantity from users,donations WHERE users.id=donations.donor_id";
            $result=mysqli_query($conn,$q);
            while($row=mysqli_fetch_assoc($result))
            {
                ?>
            <td> <?php echo $row['username']; ?> </td>
            <td> <?php echo $row['blood_group']; ?> </td>
            <td> <?php echo $row['quantity']; ?> </td>
            </tr>
            <?php
            }
            ?>

    </table>
  
    <form method="POST" action="request.php">
        <label for="username">From Donor:</label>
        <input type="text" name="username" required>
    
        <label for="blood_group">Food Item:</label>
        <input type="text" name="blood_group" required>
        
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required>

        <button type="submit">Submit Request</button>
    </form>
    <br>
    <?php
    if (isset($success_message)) {
        echo "<div class='success'>$success_message</div>";
    } elseif (isset($error_message)) {
        echo "<div class='error'>$error_message</div>";
    }
    ?>
    <a href="recieverdash.php">Back to Dashboard</a>
</body>
</html>
