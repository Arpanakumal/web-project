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
    <link rel="stylesheet" href="../../css/cat.css">
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
                        <li><a href="../../php/messages/message.php">Message</a></li>
                        <li><a href="../admin/logout/logout.php">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>


    <!-----categories----->

    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Category</h1>
            <br /> <br /> <br />
            <?php
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if (isset($_SESSION['remove'])) {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }
            if (isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if (isset($_SESSION['no-category-found'])) {
                echo $_SESSION['no-category-found'];
                unset($_SESSION['no-category-found']);
            }
            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);

            }
            if(isset($_SESSION['failed-remove'])){
                echo $_SESSION['failed-remove'];
                unset($_SESSION['failed-remove']);
            }



            ?><br>

            <!---butoon to addadminm---->
            <a href="../category/add_cat.php" class="btn-primary">Add Category</a>
            <br /> <br /> <br />





            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Feature</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>

                <?php
                $sql = "SELECT * from cat_admin";
                $result = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($result);
                $sn = 1;
                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image = $row['image'];
                        $feature = $row['feature'];
                        $status = $row['status'];
                ?>


                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $title; ?></td>
                            <td><?php
                                if ($image) {
                                ?>
                                    <img src="./images/<?php echo $image; ?>" width="100px">
                                <?php

                                } else {
                                    echo "<div class='error'>Image not added</div>";
                                }

                                ?>
                            </td>
                            <td><?php echo $feature; ?></td>
                            <td><?php echo $status; ?></td>

                            <td>
                                <a href="./update_cat.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
                                <a href="./delete_cat.php?id=<?php echo $id; ?>&image=<?php echo $image; ?>" class="btn-danger">Delete Category</a>
                            </td>
                        </tr>
                    <?php

                    }
                } else {

                    ?>
                    <tr>
                        <td colspan="6">
                            <div class='error'>No Category added</div>
                        </td>
                    </tr>
                <?php
                }


                ?>
                <!-- <tr>
                    <td>1.</td>
                    <td>Arpana</td>
                    <td>
                        <a href="#" class="btn-secondary">Update Category</a>
                        <a href="#" class="btn-danger">Delete Category</a>
                    </td>
                </tr> -->


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