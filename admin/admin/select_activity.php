<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['resort_id'])) {
    $selectedResortId = $_POST['resort_id'];

    // Retrieve the list of restaurant activitys for the selected resort
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
    <title>Select activity to Delete</title>
    <link rel="stylesheet" href="css/admin_resort.css">
</head>
<body>
    <h1>Select  activity to Delete</h1>
    <div class="container">
    <form action="delete_activity_process.php" method="post">
        <label for="activity_id">Select Activity to Delete:</label>
        <select name="activity_id" required>
            <option value="" disabled selected>Select an activity</option>
            <?php foreach ($Activities as $item) { ?>
                <option value="<?php echo $item['activity_id']; ?>"><?php echo $item['activity_name']; ?></option>
            <?php } ?>
        </select>
        <br>

        <button type="submit" class="btn">Delete activity</button>
    </form>
            </div>
</body>
</html>
