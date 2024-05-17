<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['item_id'])) {
    $itemId = $_POST['item_id'];

    // Delete the selected restaurant item
    $sql = "DELETE FROM restaurant_items WHERE item_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $itemId);

    if ($stmt->execute()) {
        // Item deleted successfully
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>
