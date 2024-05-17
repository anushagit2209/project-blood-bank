<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/admin_dashboard1.css">
</head>
<body>
    <h1 class="fade-in">Admin Dashboard</h1>
    <div class="container">
        <h2>Resorts Management</h2>
        <a href="add_resort.php" class="btn">Add New Resort</a>
        <a href="edit_resort_select.php" class="btn">Edit Resort</a>
        <a href="delete_resort_select.php" class="btn">Delete Resort</a>
        <h2>Restaurant Items Management</h2>
        <a href="add_restitem_select.php" class="btn">Add New Item</a>
        <a href="edit_item.php" class="btn">Edit Item</a>
        <a href="delete_item.php" class="btn">Delete Item</a>
        <h2>Activities Management</h2>
        <a href="add_activities_select.php" class="btn">Add New Activity</a>
        <a href="edit_activity.php" class="btn">Edit Activity</a>
        <a href="delete_activity.php" class="btn">Delete Activity</a>
        <form action="logout.php">
            <button class="btn logout-btn">Logout</button>
        </form>
    </div>
</body>
</html>

