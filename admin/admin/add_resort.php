<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $rooms = $_POST['rooms'];
    $amenities = $_POST['amenities'];
    $rating = $_POST['rating'];
    
    $sql = "INSERT INTO resorts (name, description, location, price, rooms, amenities, rating) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiisi", $name, $description, $location, $price, $rooms, $amenities, $rating);

    if ($stmt->execute()) {
        // Resort added successfully
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Resort</title>
    <link rel="stylesheet" href="css/admin_resort.css">
</head>
<body>
    <h1>Add New Resort</h1>
    <div class="container">
    <form action="add_resort.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        
        <label for="description">Description:</label>
        <textarea name="description" required></textarea>

        <label for="location">Location:</label>
        <input type="text" name="location" required>

        <label for="price">Price:</label>
        <input type="number" name="price" required>

        <label for="rooms">Number of Rooms:</label>
        <input type="number" name="rooms" required>

        <label for="amenities">Amenities:</label>
        <input type="text" name="amenities" required>

        <label for="rating">Rating:</label>
        <input type="number" name="rating" required>

        <button type="submit" class="btn">Add Resort</button>
    </form>
</div>
</body>
</html>
