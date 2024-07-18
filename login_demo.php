<?php
session_start();
require_once 'db_connect.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // To prevent SQL injection, use prepared statements
  $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
      // Password is correct, start a session
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $username;
      $_SESSION['userid'] = $row['id'];

      // Redirect to your home page or dashboard
      header("Location: dashboard.php");
      exit;
    } else {
      // Invalid password
      echo "Invalid username or password.";
    }
  } else {
    // User not found
    echo "Invalid username or password.";
  }

  $stmt->close();
}
$conn->close();
?>
