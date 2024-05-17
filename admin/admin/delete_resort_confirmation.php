<?php
session_start();
include('db.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected resort ID for deletion
    $resortId = $_POST['resort_id'];
    // Retrieve the resort name
    $sql = "SELECT name FROM resorts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $resortId);
    $stmt->execute();
    $stmt->bind_result($resortName);
    $stmt->fetch();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirm Resort Deletion</title>
    <link rel="stylesheet" href="css/admin_resort.css">
</head>
<body>
    <h1>Confirm Resort Deletion</h1>
    <div class="container">
    <p>Are you sure you want to delete the resort "<?php echo $resortName; ?>"?</p>
    <form action="delete_resort.php" method="post">
        <input type="hidden" name="resort_id" value="<?php echo $resortId; ?>">
        <button type="submit" class="btn">Confirm Deletion</button>
    </form>
    <form action="delete_resort_select.php">
        <button type="submit" class="btn">Cancel</button>
    </form>
</div>
</body>
</html>
