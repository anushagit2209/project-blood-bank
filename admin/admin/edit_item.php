<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Retrieve the list of resorts
$sqlResorts = "SELECT id, name FROM resorts";
$resultResorts = $conn->query($sqlResorts);

$resorts = [];

if ($resultResorts->num_rows > 0) {
    while ($row = $resultResorts->fetch_assoc()) {
        $resorts[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select Resort</title>
    <link rel="stylesheet" href="css/admin_resort.css">
</head>
<body>
    <h1>Select Resort</h1>
    <div class="container">
    <form action="select_restaurant_item_to_edit.php" method="post">

        <label for="resort_id">Select a Resort:</label>
        <select name="resort_id" required>
            <option value="" disabled selected>Select a resort</option>
            <?php foreach ($resorts as $resort) { ?>
                <option value="<?php echo $resort['id']; ?>"><?php echo $resort['name']; ?></option>
            <?php } ?>
        </select>
        <br>

        <button type="submit" class="btn">Next</button>
    </form>
            </div>
</body>
</html>
