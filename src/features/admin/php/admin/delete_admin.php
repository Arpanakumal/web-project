<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$id = $_GET['id'];
echo $id;

$sql = "DELETE FROM admin_users where id=$id";
$res = mysqli_query($conn, $sql);
if ($res == true) {

    $_SESSION['delete'] = "<div class='success'>Admin deleted successfully</div>";
    header("Location:manage_admin.php");
} else {
    $_SESSION['delete'] = "<div class='error'>Failed to delete admin</div>";
    header("Location:manage_admin.php");
}
