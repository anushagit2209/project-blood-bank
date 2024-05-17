<?php
session_start();
include('db.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $resortId = $_POST['resort_id'];
    $activity_name = $_POST['activity_name'];
    $activity_description = $_POST['activity_description'];
    $activity_price = $_POST['activity_price'];
    
    $sql = "INSERT INTO activities (resort_id, activity_name, activity_description, activity_price) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $resortId, $activity_name, $activity_description, $activity_price);

    if ($stmt->execute()) {
        
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>
