<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}







if (isset($_GET['id']) && isset($_GET['image_name'])) {
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];


    if ($image_name != "") {

        $path = "./images/" . $image_name;
        if (file_exists($path)) {
            $remove = unlink($path);
            if (!$remove) {
                $_SESSION['delete'] = "<div class='error'>Failed to remove product image</div>";
                header("Location:manage_product.php");
                exit();
            }
        } else {
            $_SESSION['delete'] = "<div class='error'>Image file not found</div>";
            header("Location:manage_product.php");
            exit();
        }
    }


    $sql = "DELETE FROM products WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['delete'] = "<div class='success'>Product deleted successfully</div>";
    } else {
        $_SESSION['delete'] = "<div class='error'>Failed to delete product</div>";
    }
    header("Location:manage_product.php");
    exit();
} else {
    $_SESSION['unauthorized'] = "<div class='error'>Unauthorized Access</div>";
    header("Location:manage_product.php");
    exit();
}
