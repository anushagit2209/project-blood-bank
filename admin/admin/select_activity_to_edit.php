<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['resort_id'])) {
    $selectedResortId = $_POST['resort_id'];

    $sqlActivity = "SELECT activity_id, activity_name FROM activities WHERE resort_id = ?";
    $stmt = $conn->prepare($sqlActivity);
    $stmt->bind_param("i", $selectedResortId);
    $stmt->execute();
    $resultActivity = $stmt->get_result();

    $Activities = [];

    if ($resultActivity->num_rows > 0) {
        while ($row = $resultActivity->fetch_assoc()) {
            $Activities[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select activity to Edit</title>
    <link rel="stylesheet" href="css/admin_resort.css">
</head>
<body>
    <h1>Select activity to Edit</h1>
    <div class="container">
    <form action="edit_activity_continue.php" method="post">
    <label for="activity_id">Select a activity to Edit:</label>
    <select name="activity_id" required>
        <option value="" disabled selected>Select an activity</option>
        <?php foreach ($Activities as $item) { ?>
            <option value="<?php echo $item['activity_id']; ?>"><?php echo $item['activity_name']; ?></option>
        <?php } ?>
    </select>
    <input type="hidden" name="resort_id" value="<?php echo $selectedResortId; ?>">
    <br>

    <button type="submit" class="btn">Edit activity</button>
</form>
        </div>
</body>
</html>
