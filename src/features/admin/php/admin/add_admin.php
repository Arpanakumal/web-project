<<?php


    session_start();
    if (!isset($_SESSION['user'])) {
        $_SESSION['no-login-msg'] = "<div class='error'>Please login to access Admin Panel</div>";
        header("Location:../admin/login.php");
        exit();
    }


    if (($_SERVER['REQUEST_METHOD']) == 'POST') {
        $Full_name = $_POST['Full_name'] ?? '';
        $Username = $_POST['Username'] ?? '';
        $Password = ($_POST['Password']) ?? '';


        // $siteurl = "http://localhost/arpanaproject/src/features/home/html/homepage.html";

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


        $sql = "INSERT into admin_users (Full_name,Username,password) VALUES  ('$Full_name','$Username','$Password')";
        $result = $conn->query($sql);

        if ($result == TRUE) {
            $_SESSION['add'] = "Admin Added Successfully ";
            header("location:manage_admin.php");
            exit;
        } else {
            $_SESSION['add'] = "Failed To Add Admin ";
            header("location:add_admin.php");
            exit;
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

        <link rel="stylesheet" href="../../php/admin/css/adminnn.css">
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

        <div class="main-content">
            <div class="wrapper">
                <h1>Add Admin</h1>

                <?php
                if (isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                ?>
                <div class="small-container">
                    <form action="" method="POST">
                        <div class="group">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <label for="email">Full Name:</label>
                            <input type="text" id="Full_name" name="Full_name" placeholder="Enter Your Full Name"><br><br>
                        </div>

                        <div class="group">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <label for="username">Username:</label>
                            <input type="text" id="Username" name="Username" placeholder="Enter Your Username"><br><br>
                        </div>
                        <div class="group">
                            <label for="status">Status</label>
                            <select name="status" id="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="group">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <label for="password">Password:</label>
                            <input type="password" id="Password" name="Password" placeholder="Enter Your Password"><br><br>

                        </div>
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">

                    </form>
                </div>
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