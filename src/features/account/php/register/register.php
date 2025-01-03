<?php


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


$name = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];


$sql = "SELECT * FROM users WHERE  email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  header("Location: register.php?error=Email already exists");
  exit();
}

$sql = "INSERT INTO users (username,email, password) VALUES ('$name', '$email', '$password')";


if ($conn->query($sql) === TRUE) {

  echo "Registration successful!";
  header("location:../../home/homepage.php");
  exit;
} else {
  header("Location: login.php?error=Invalid email or password");
  exit;
  echo "Error: " . $conn->error;
}

$conn->close();
