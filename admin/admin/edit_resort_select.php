<?php
session_start();
include('db.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}


// Retrieve a list of resorts
$sql = "SELECT id, name FROM resorts";
$result = $conn->query($sql);
$resorts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $resorts[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Resort</title>
    <link rel="stylesheet" href="css/admin_resort.css">
</head>
<body>
    <h1>Edit Resort </h1>
    <div class="container">
    <form action="edit_resort.php" method="get">
        <label for="resort">Select a Resort:</label>
        <select name="resort" required>
            <option value="" disabled selected>Select a Resort</option>
            <?php foreach ($resorts as $resort) { ?>
                <option value="<?php echo $resort['id']; ?>"><?php echo $resort['name']; ?></option>
            <?php } ?>
        </select>
        <button type="submit" class="btn">Edit Resort</button>
    </form>
            </div>
</body>
</html>
