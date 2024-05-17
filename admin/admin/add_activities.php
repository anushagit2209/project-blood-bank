<?php
session_start();
include('db.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $resortId = $_POST['resort_id'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Activity</title>
    <link rel="stylesheet" href="css/admin_resort.css">
</head>
<body>
    <h1>Add Activity</h1>
    <div class="container">
    <form action="add_activity_process.php" method="post">
        <input type="hidden" name="resort_id" value="<?php echo $resortId; ?>">
        
        <label for="activity_name">Activity Name:</label>
        <input type="text" name="activity_name" required>

        <label for="activity_description">Item Description:</label>
        <textarea name="activity_description" required></textarea>

        <label for="activity_price">Item Price:</label>
        <input type="number" name="activity_price" required>

        <button type="submit" class="btn">Add activity</button>
    </form>
</div>
</body>
</html>
