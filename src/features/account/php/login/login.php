<?php

// Database credentials 
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
$email = $_POST["email"];
$password = $_POST["password"];

// Check if email exists
$sql = "SELECT * FROM users WHERE user_email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
header("Location: login.php?error=Invalid email or password");
exit();
} else {
    $row = $result->fetch_assoc();
    $storedPassword = $row["user_password"];

  // Important: You should compare the entered password with the  password stored in the database
if ($password==$storedPassword) {
    echo "Login Successfull"; 
    exit();
} else {
    header("Location: login.php?error=Invalid email or password");
    exit();
}
}

$conn->close();

?>