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
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    header("Location: login_index.php?error=Invalid email or password");
    exit();
} else {
    $row = $result->fetch_assoc();
    $storedPassword = $row["password"];

    // Important: You should compare the entered password with the  password stored in the database
    if ($password == $storedPassword) {
        echo "Welcome back";
    
        exit();
    } else {
        header("Location: login_index.php?error=Invalid email or password");

        exit();
    }
}

$conn->close();
