<?php


ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', 'error.log');
error_reporting(E_ALL);

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}


if (isset($_SERVER["REQUEST_METHOD"]) === "POST") {
    $email = $_POST["email"] ?? null;
    $password = $_POST["password"] ?? null;

    if (!$email || !$password) {
        header("Location: login.html?error=Please fill out all fields");
        exit();
    }

    // Prepared statement to prevent SQL injection
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        header("Location: login.html?error=Invalid email or password");
        exit();
    } else {
        $row = $result->fetch_assoc();
        $storedPassword = $row["password"];

        // Verify hashed password
        if (password_verify($password, $storedPassword)) {
            // Redirect after successful login
            header("Location:../../home/homepage.php");

            echo "login successful";
            exit();
        } else {
            header("Location: login.html?error=Invalid email or password");
            exit();
        }
    }
} else {
    header("Location: login.html?error=Invalid request");
    exit();
}

// Close connection
$conn->close();
