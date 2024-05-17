<?php
session_start();
include('db.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the resort ID, restaurant item ID, and updated restaurant item details
    $resortId = $_POST['resort_id'];
    $itemId = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $item_description = $_POST['item_description'];
    $item_price = $_POST['item_price'];

    // Update the restaurant item in the database
    $sql = "UPDATE restaurant_items SET item_name = ?, item_description = ?, item_price = ? WHERE item_id = ? AND resort_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdii", $item_name, $item_description, $item_price, $itemId, $resortId);

    if ($stmt->execute()) {
        // Restaurant item updated successfully
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>
