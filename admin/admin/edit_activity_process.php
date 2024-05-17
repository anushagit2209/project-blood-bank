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
    $activity_name = $_POST['activity_name'];
    $activity_description = $_POST['activity_description'];
    $activity_price = $_POST['activity_price'];


    $sql = "UPDATE activities SET activity_name = ?, activity_description = ?, activity_price = ? WHERE activity_id = ? AND resort_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdii", $activity_name, $activity_description, $activity_price, $activityId, $resortId);

    if ($stmt->execute()) {
        // Restaurant activity updated successfully
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>
