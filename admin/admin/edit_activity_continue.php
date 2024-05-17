<?php
session_start();
include('db.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $resortId = $_POST['resort_id'];
    $activityId = $_POST['activity_id'];

    // Retrieve the details of the selected restaurant activity
    $sql = "SELECT activity_name, activity_description, activity_price FROM activities WHERE activity_id = ? AND resort_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $activityId, $resortId);
    $stmt->execute();
    $stmt->bind_result($activity_name, $activity_description, $activity_price);
    $stmt->fetch();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit activity</title>
    <link rel="stylesheet" href="css/admin_resort.css">
</head>
<body>
    <h1>Edit activity</h1>
    <div class="container">
    <form action="edit_activity_process.php" method="post">
        <input type="hidden" name="resort_id" value="<?php echo $resortId; ?>">
        <input type="hidden" name="activity_id" value="<?php echo $activityId; ?>">
        
        <label for="activity_name">Activity Name:</label>
        <input type="text" name="activity_name" required value="<?php echo $activity_name; ?>">

        <label for="activity_description">Activity Description:</label>
        <textarea name="activity_description" required><?php echo $activity_description; ?></textarea>

        <label for="activity_price">Activity Price:</label>
        <input type="number" name="activity_price" required value="<?php echo $activity_price; ?>">

        <button type="submit" class="btn">Update activity</button>
    </form>
</div>
</body>
</html>
