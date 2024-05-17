<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['activity_id'])) {
    $activityId = $_POST['activity_id'];

    // Delete the selected restaurant activity
    $sql = "DELETE FROM activities WHERE activity_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $activityId);

    if ($stmt->execute()) {
        // activity deleted successfully
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>
