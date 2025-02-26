<?php
session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['no-login-msg'] = "<div class='error'>Please login to access Admin Panel</div>";
    header("Location:../admin/login.php");
    exit();
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

// Query the counts of categories, products, users, and order
$adminCount = $conn->query("SELECT COUNT(*) AS total FROM admin_users")->fetch_assoc()['total'];
$categoryCount = $conn->query("SELECT COUNT(*) AS total FROM cat_admin")->fetch_assoc()['total'];
$productCount = $conn->query("SELECT COUNT(*) AS total FROM products")->fetch_assoc()['total'];
$userCount = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()['total'];
$orderCount = $conn->query("SELECT COUNT(*) AS total FROM order_tbl")->fetch_assoc()['total'];
$messageCount = $conn->query("SELECT COUNT(*) AS total FROM messages")->fetch_assoc()['total'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../common/css/1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../../css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home page</title>
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="../../../home/images/logo.png" width="200px">
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="../homepage/index.php">Home</a></li>
                        <li><a href="../../php/admin/manage_admin.php">Admin</a></li>
                        <li><a href="../../php/product/manage_product.php">Products</a></li>
                        <li><a href="../../php/category/manage_cat.php">Category</a></li>
                        <li><a href="../../php/order/manage_order.php">Order</a></li>
                        <li><a href="../../php/messages/message.php">Messages</a></li>
                        <li><a href="../../php/admin/manage_users.php">Users</a></li>

                        <li><a href="../admin/logout/logout.php">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-------main content-->
    <div class="main-content">
        <div class="wrapper">
            <h1>Dashboard</h1>
            <br><br>
            <?php
            if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
            <br><br>
            <div class="col-4">
                <h2><?php echo $adminCount; ?></h2>
                <br>
                Admin
            </div>
            <div class="col-4">
                <h2><?php echo $categoryCount; ?></h2>
                <br>
                Categories
            </div>
            <div class="col-4">
                <h2><?php echo $productCount; ?></h2>
                <br>
                Products
            </div>
            <div class="col-4">
                <h2><?php echo $userCount; ?></h2>
                <br>
                Users
            </div>
            <div class="col-4">
                <h2><?php echo $orderCount; ?></h2>
                <br>
                Placed Orders
            </div>
            <div class="col-4">
                <h2><?php echo $messageCount; ?></h2>
                <br>
                New Messages
            </div>
        </div>
    </div><br><br><br><br><br>



    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <img src="../../../home/images/logo.png">
                    <h2>Clothing palette's purpose is to provide the latest vintage and soft aesthetic outfits</h2>
                </div>
                <div class="footer-col-2">
                    <h1>Follow Us</h1>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a></li>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i>Pinterest</a></li>
                    </ul>
                </div>

            </div>
            <hr>
            <h2 class="copyright">Copyright @ 2024-Clothing Palette</h2>
        </div>
    </div>
</body>

</html>