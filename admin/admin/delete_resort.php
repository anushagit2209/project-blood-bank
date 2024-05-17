<?php
session_start();
include('db.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the resort ID for deletion
    $resortId = $_POST['resort_id'];

    // Delete the resort from the database
    $sql = "DELETE FROM resorts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $resortId);

    if ($stmt->execute()) {
        // Resort deleted successfully
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>
