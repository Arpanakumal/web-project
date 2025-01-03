<?php

session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['no-login-msg'] = "<div class='error'>Please login to access Admin Panel</div>";
    header("Location:../admin/login.php");
    exit();
}
// Check if the user is logged in
// if (!isset($_SESSION['admin'])) {
//     $_SESSION['error'] = "Please login to access the admin panel!";
//     header("Location: add_admin.php");
//     exit;
// }

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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../common/css/1.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/cat.css">
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
                        <li><a href="../admin/logout/logout.php">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>
            <br>

            <?php
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']); // Remove session
            }

            if (isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            if (isset($_SESSION['user-not-found'])) {
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
            }
            if (isset($_SESSION['pwd-not-match'])) {
                echo ($_SESSION['pwd-not-match']);
                unset($_SESSION['pwd-not-match']);
            }
            if (isset($_SESSION['change-pwd'])) {
                echo ($_SESSION['change-pwd']);
                unset($_SESSION['change-pwd']);
            }
            ?>
            <br><br><br>

            <!-- Button to Add Admin -->
            <a href="../admin/add_admin.php" class="btn-primary">Add Admin</a>
            <br /><br /><br />

            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <?php
                $sql = "SELECT * FROM admin_users";
                $result = $conn->query($sql);

                if ($result == true) { {
                        $sn = 1;
                        $count = mysqli_num_rows($result);

                        if ($count > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $full_name = $row['Full_name'];
                                $username = $row['Username'];
                ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                        <a href="../admin/update_password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                        <a href="../admin/update_admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                        <a href="../admin/delete_admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                    </td>
                                </tr>
                <?php
                            }
                        }
                    }
                } else {
                    echo "<tr><td colspan='4' class='error'>No Admins Found.</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>

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