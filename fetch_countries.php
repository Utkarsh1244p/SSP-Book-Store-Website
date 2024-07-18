<?php

// require_once 'db_connect.php';

$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "book_store"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else
//echo "Connection is established   ";


// Fetch unique countries
$sql = "SELECT DISTINCT country FROM csc_names ORDER BY country ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<option value="' . htmlspecialchars($row["country"]) . '">' . htmlspecialchars($row["country"]) . '</option>';
        var_dump($row);
        // var_dump($row["country"]);
    }
} else {
    echo '<option value="">No countries available</option>';
}
$conn->close();
?>
