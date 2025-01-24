<?php

// Assuming you have processed the registration data and created the user account

// Product ID or SKU to add to the cart
$product_id = '12345';

// Redirect to the cart page with product ID as a query parameter
header('Location: ../../cart/html/cart.html?add_product=' . $product_id);
exit();



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

if (isset($_POST['referrer']) && !empty($_POST['referrer'])) {
  $referrer = $_POST['referrer'];
  header("Location: $referrer");
  exit();
} else {
  // Default redirect if no referrer is set
  header("Location: default_page.php");
  exit();
}

$conn->close();
