<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$existingName = $existingDescription = $existingLocation = $existingPrice = $existingRooms = $existingAmenities = $existingRating = '';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['resort'])) {
    // Retrieve the resort details based on the selected resort ID
    $resortId = $_GET['resort'];
    $sql = "SELECT name, description, location, price, rooms, amenities, rating FROM resorts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $resortId);
    $stmt->execute();
    $stmt->bind_result($existingName, $existingDescription, $existingLocation, $existingPrice, $existingRooms, $existingAmenities, $existingRating);
    $stmt->fetch();
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $resortId = $_POST['resort_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $rooms = $_POST['rooms'];
    $amenities = $_POST['amenities'];
    $rating = $_POST['rating'];
    
    // Update the resort details in the database
    $sql = "UPDATE resorts SET name = ?, description = ?, location = ?, price = ?, rooms = ?, amenities = ?, rating = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiisii", $name, $description, $location, $price, $rooms, $amenities, $rating, $resortId);

    if ($stmt->execute()) {
        // Resort updated successfully
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
    <title>Edit Resort</title>
    <link rel="stylesheet" href="css/admin_resort.css">
</head>
<body>
    <h1>Edit Resort</h1>
    <div class="container">
    <form action="edit_resort.php" method="post">
        <input type="hidden" name="resort_id" value="<?php echo $resortId; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" required value="<?php echo $existingName; ?>">
        
        <label for="description">Description:</label>
        <textarea name="description" required><?php echo $existingDescription; ?></textarea>

        <label for="location">Location:</label>
        <input type="text" name="location" required value="<?php echo $existingLocation; ?>">

        <label for="price">Price:</label>
        <input type="number" name="price" required value="<?php echo $existingPrice; ?>">

        <label for="rooms">Number of Rooms:</label>
        <input type="number" name="rooms" required value="<?php echo $existingRooms; ?>">

        <label for="amenities">Amenities:</label>
        <input type="text" name="amenities" required value="<?php echo $existingAmenities; ?>">

        <label for="rating">Rating:</label>
        <input type="number" name="rating" required value="<?php echo $existingRating; ?>">

        <button type="submit" class="btn">Update Resort</button>
    </form>
</div>
</body>
</html>
