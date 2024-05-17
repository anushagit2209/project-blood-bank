<?php
session_start();
include('db.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected resort ID and restaurant item ID for editing
    $resortId = $_POST['resort_id'];
    $itemId = $_POST['item_id'];

    // Retrieve the details of the selected restaurant item
    $sql = "SELECT item_name, item_description, item_price FROM restaurant_items WHERE item_id = ? AND resort_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $itemId, $resortId);
    $stmt->execute();
    $stmt->bind_result($item_name, $item_description, $item_price);
    $stmt->fetch();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Restaurant Item</title>
    <link rel="stylesheet" href="css/admin_resort.css">
</head>
<body>
    <h1>Edit Restaurant Item</h1>
    <div class="container">
    <form action="edit_restaurant_item_process.php" method="post">
        <input type="hidden" name="resort_id" value="<?php echo $resortId; ?>">
        <input type="hidden" name="item_id" value="<?php echo $itemId; ?>">
        
        <label for="item_name">Item Name:</label>
        <input type="text" name="item_name" required value="<?php echo $item_name; ?>">

        <label for="item_description">Item Description:</label>
        <textarea name="item_description" required><?php echo $item_description; ?></textarea>

        <label for="item_price">Item Price:</label>
        <input type="number" name="item_price" required value="<?php echo $item_price; ?>">

        <button type="submit" class="btn">Update Item</button>
    </form>
</div>
</body>
</html>
