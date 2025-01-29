<?php

// Database credentials (replace with your actual values)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get user inputs
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$user_type = $_POST['user_type'];

// Check if email already exists
$sql = "SELECT * FROM users WHERE  password='$password'  AND email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Email already exists
  header("Location: ./register1.php?error=Email already exists");
  exit();
}

// Construct the SQL INSERT query (fixed extra comma)
$sql = "INSERT INTO users (username, email, password, user_type) VALUES ('$username', '$email', '$password', '$user_type')";

// Execute the query
if ($conn->query($sql) === TRUE) {
  header("Location:../../../home/html/homepage.php");
  echo "Registration successful!";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
