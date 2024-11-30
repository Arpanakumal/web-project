<?php

// Debugging: Check if form data is received
var_dump($_POST);

if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
  $username = $_POST['username'] ?? '';
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';

  if ($username && $email && $password) {
    echo "Form submitted successfully! Username: $username, Email: $email";
  } else {
    echo "Some fields are missing!";
  }
} else {
  echo "Invalid request method!";
}

// Database credentials (replace with your actual values)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "account";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get user inputs
$name = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

// Check if email already exists
$sql = "SELECT * FROM users WHERE  email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Email already exists
  header("Location: register.php?error=Email already exists");
  exit();
}

// Construct the SQL INSERT query
$sql = "INSERT INTO users (username,email, password) VALUES ('$name', '$email', '$password')";

// Execute the query
if ($conn->query($sql) === TRUE) {
 
  echo "Registration successful!";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
