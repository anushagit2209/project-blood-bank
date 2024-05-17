

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

    
</head>
<body>
<section class="hero bg-gray-100 bg-cover text-center py-24">
        <div class="container mx-auto">
            <h1 class="text-4xl font-bold">Enter your current location</h1>
            <p class="text-xl mt-4">Donate Blood Save Life</p>
            <form action="M4sneha.php" method="get" class="mt-8 flex items-center justify-center">
                    <input type="text" name="search">
                <input type="submit">
                </div>
            </form>
        </div>
    </section>
</body>

<script>
  // Your JavaScript code for autocomplete here
</script>
</html>

<?php
if (isset($_GET['search'])) {
    // Retrieve the user's input from the location field
    $userLocation = $_GET['search'];

    // Connect to the MySQL database (replace these with your own database credentials)
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "project";

    $conn = new mysqli($host, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query to fetch data based on the user's location input
    $sql = "SELECT Name, Location FROM blood_banks WHERE Location = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userLocation);
    $stmt->execute();

    $result = $stmt->get_result();

    // Display the results in a table
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Location</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["Location"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No results found for the given location.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
