<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['resort_id'])) {
    $selectedResortId = $_POST['resort_id'];

    // Retrieve the list of restaurant items for the selected resort
    $sqlItems = "SELECT item_id, item_name FROM restaurant_items WHERE resort_id = ?";
    $stmt = $conn->prepare($sqlItems);
    $stmt->bind_param("i", $selectedResortId);
    $stmt->execute();
    $resultItems = $stmt->get_result();

    $restaurantItems = [];

    if ($resultItems->num_rows > 0) {
        while ($row = $resultItems->fetch_assoc()) {
            $restaurantItems[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select Restaurant Item to Edit</title>
    <link rel="stylesheet" href="css/admin_resort.css">
</head>
<body>
    <h1>Select Restaurant Item to Edit</h1>
    <div class="container">
    <form action="edit_restaurant_item.php" method="post">
    <label for="item_id">Select a Restaurant Item to Edit:</label>
    <select name="item_id" required>
        <option value="" disabled selected>Select an item</option>
        <?php foreach ($restaurantItems as $item) { ?>
            <option value="<?php echo $item['item_id']; ?>"><?php echo $item['item_name']; ?></option>
        <?php } ?>
    </select>
    <input type="hidden" name="resort_id" value="<?php echo $selectedResortId; ?>">
    <br>

    <button type="submit" class="btn">Edit Item</button>
</form>
        </div>
</body>
</html>
