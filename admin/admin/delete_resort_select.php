<?php
session_start();
include('db.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Retrieve the list of resorts
$sql = "SELECT id, name FROM resorts";
$result = $conn->query($sql);

$resorts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $resorts[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select Resort to Delete</title>
    <link rel="stylesheet" href="css/admin_resort.css">
</head>
<body>
    <h1>Select Resort to Delete</h1>
    <div class="container">
    <form action="delete_resort_confirmation.php" method="post">
        <label for="resort">Select a Resort to Delete:</label>
        <select name="resort_id" required>
            <option value="" disabled selected>Select a resort</option>
            <?php foreach ($resorts as $resort) { ?>
                <option value="<?php echo $resort['id']; ?>"><?php echo $resort['name']; ?></option>
            <?php } ?>
        </select>
        <br>

        <button type="submit" class="btn">Delete Resort</button>
    </form>
            </div>
</body>
</html>
