<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../common/css/1.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/cat.css">
    <link rel="stylesheet" href="../admin/css/adminnn.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Manage Admin</title>
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
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="wrapper">
            <h1>Change Password</h1>
            <br><br>

            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }


            ?>


            <div class="small-container">
                <form action="" method="POST">

                    <div class="group">

                        <label for="password">Current Password:</label>
                        <input type="password" id="old_Password" name="old_Password" placeholder="Enter Current Password"><br><br>
                    </div>

                    <div class="group">

                        <label for="password">New Password:</label>
                        <input type="password" id="new_Password" name="new_Password" placeholder="Enter New Password"><br><br>
                    </div>

                    <div class="group">
                        <label for="password">Confirm Password</label>
                        <input type="password" id="confirm_Password" name="confirm_Password" placeholder="Confirm Password"><br><br>
                    </div>

                    <div class="group">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $current_Password = ($_POST['old_Password']);
        $new_Password = ($_POST['new_Password']);
        $confirm_Password = ($_POST['confirm_Password']);

        $sql = "SELECT * from admin_users where id=$id and password='$current_Password'";
        $result = mysqli_query($conn, $sql);

        if ($result == true) {
            $count = mysqli_num_rows($result);
            if ($count == 1) {

                if ($new_Password == $confirm_Password) {

                    $sql2 = "UPDATE admin_users SET

                    password = '$new_Password'
                    where id = $id
                    ";

                    $result2 = mysqli_query($conn, $sql2);
                    if ($result2 == true) {

                        $_SESSION['change-pwd'] = "<div class='success'>Password changed succcessfully</div>";
                        header("Location:manage_admin.php");
                        exit();
                    } else {
                        $_SESSION['change-pwd'] = "<div class='error'>Failed to changes password</div>";
                        header("Location:manage_admin.php");
                        exit();
                    }
                } else {
                    $_SESSION['pwd-not-match'] = "<div class='error'>Password do not match</div>";
                    header("Location:manage_admin.php");
                    exit();
                }
            } else {
                $_SESSION['user-not-found'] = "<div class='error'>User not found</div>";
                header("Location:manage_admin.php");
                exit();
            }
        }
    }




    ?>




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
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i> Pinterest</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <h2 class="copyright">Copyright @ 2024-Clothing Palette</h2>
        </div>
    </div>
</body>

</html>