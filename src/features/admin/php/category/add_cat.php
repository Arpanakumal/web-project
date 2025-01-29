<?php
session_start();

if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {


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
    <link rel="stylesheet" href="../admin/css/adminnn.css">
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
            <h1>Add Category</h1>
            <br><br>

            <?php
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if (isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        



            ?><br>
            <div class="small-container">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="group">

                        <label for="title">Title:</label><br>
                        <input type="text" id="title" name="title" placeholder="Category Title"><br><br>
                    </div>

                    <div class="group">
                        <label for="feature">Feature:</label><br>
                        <input type="radio" name="feature" value="yes">Yes
                        <input type="radio" name="feature" value="no">No
                    </div><br><br>
                    <div class="group">
                        <label for="image">Select Image:</label><br>
                        <input type="file" name="image">
                    </div><br>
                    <div class="group">
                        <label for="status">Status</label>
                        <select name="status" id="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>

                    </div><br>

                    <input type="submit" name="submit" value="Add Category" class="btn-secondary">

                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $title = $_POST['title'];
                    $feature = isset($_POST['feature']) ? $_POST['feature'] : "no";
                    $status = isset($_POST['status']) ? $_POST['status'] : "active";

                    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
                        $image_name = $_FILES['image']['name'];

                        $ext = pathinfo($image_name, PATHINFO_EXTENSION);

                        $image_name = "Tops_" . rand(000, 999) . '.' . $ext;

                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "images/" . $image_name;


                        $upload = move_uploaded_file($source_path, $destination_path);

                        if ($upload == false) {
                            $_SESSION['upload'] = "<div class='error'>Failed to upload image</div>";
                            header("Location: add_cat.php");
                            exit();
                        }
                    } else {
                        $image_name = "";
                    }


                    $sql = "INSERT INTO cat_admin (title, feature, image, status) 
            VALUES ('$title', '$feature', '$image_name', '$status')";

                    $result = mysqli_query($conn, $sql);

                    if ($result === true) {
                        $_SESSION['add'] = "<div class='success'>Category Added Successfully</div>";
                        header("Location: manage_cat.php");
                        exit();
                    } else {
                        $_SESSION['add'] = "<div class='error'>Failed to add Category</div>";
                        header("Location: add_cat.php");
                        exit();
                    }
                }
                ?>
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