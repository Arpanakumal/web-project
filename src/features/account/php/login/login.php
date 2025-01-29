<?php

session_start();


// Database credentials 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE password='$password' AND username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_id'] = $row['id'];

        // ✅ If the user came from add_to_cart.php, redirect there first
        if (isset($_GET['id'])) {
            header("Location: ../../cart/html/add_to_cart.php?product_id=" . $_GET['id']);
            exit();
        }

        if ($row['user_type'] == 'admin') {
            header("Location: ../../../admin/php/homepage/index.php");
            exit();
        } else {
            header("Location: ../../../home/html/homepage.php");
            exit();
        }
    } else {
        echo "<script>alert('Invalid email or password');</script>";
    }
}


$conn->close();
