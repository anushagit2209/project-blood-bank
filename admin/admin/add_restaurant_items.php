<?php
session_start();
include('db.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected resort ID for adding restaurant items
    $resortId = $_POST['resort_id'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Restaurant Items</title>
    <link rel="stylesheet" href="css/admin_resort.css">
</head>
<body>
    <h1>Add Restaurant Items</h1>
    <div class="container">
    <form action="add_restaurant_items_process.php" method="post">
        <input type="hidden" name="resort_id" value="<?php echo $resortId; ?>">
        
        <label for="item_name">Item Name:</label>
        <input type="text" name="item_name" required>

        <label for="item_description">Item Description:</label>
        <textarea name="item_description" required></textarea>

        <label for="item_price">Item Price:</label>
        <input type="number" name="item_price" required>

        <button type="submit" class="btn">Add Item</button>
    </form>
</div>
</body>
</html>
