<?php
session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['no-login-msg'] = "<div class='error'>Please login to access Admin Panel</div>";
    header("Location:../admin/login.php");
    exit();
}

if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
    // $Full_name = $_POST['Full_name'] ?? '';
    // $username = $_POST['username'] ?? '';
    // $password = md5($_POST['password']) ?? ''; //password encryption


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
}



if (isset($_GET['id']) && isset($_GET['image'])) {
    $id = $_GET['id'];
    $image = $_GET['image'];

    if ($image != "") {
        $path = "./images/" . $image;
        $remove = unlink($path);
        if ($remove == false) {
            $_SESSION['remove'] = "<div class='error'>Failed to remove category</div>";
            header("Location:manage_cat.php");
            exit();
        }
    }
    $sql = "DELETE FROM cat_admin where id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result == true) {
        $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully</div>";
        header("Location:manage_cat.php");
        exit();
    } else {
        $_SESSION['delete'] = "<div class='error'>Failed to delete category</div>";
        header("Location:manage_cat.php");
        exit();
    }
} else {
    header("Location:manage_cat.php");
    exit();
}
