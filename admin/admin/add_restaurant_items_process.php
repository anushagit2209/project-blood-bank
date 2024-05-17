<?php
session_start();
include('db.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the resort ID and restaurant item details
    $resortId = $_POST['resort_id'];
    $item_name = $_POST['item_name'];
    $item_description = $_POST['item_description'];
    $item_price = $_POST['item_price'];
    
    // Insert the restaurant item into the database
    $sql = "INSERT INTO restaurant_items (resort_id, item_name, item_description, item_price) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $resortId, $item_name, $item_description, $item_price);

    if ($stmt->execute()) {
        // Restaurant item added successfully
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>
