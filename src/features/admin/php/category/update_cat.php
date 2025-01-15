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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../../php/admin/css/adminnn.css">
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
                        <li><a href="../admin/logout/logout.php">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>


    <div class="main-content">
        <div class="wrapper">
            <h1>Update Category</h1>
            <br><br>
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * from cat_admin where id =$id";
                $result = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($result);
                if ($count == 1) {
                    $row = mysqli_fetch_assoc($result);
                    $title = $row['title'];
                    $current_image = $row['image'];
                    $feature = $row['feature'];
                    $status = $row['status'];
                } else {
                    $_SESSION['no-category-found'] = "<div class='error'>Category not found</div>";
                    header("Location:manage_cat.php");
                    exit();
                }
            } else {
                header("Location:manage_cat.php");
                exit();
            }

            ?>




            <div class="small-container">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="group">

                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" value="<?php echo $title; ?>" placeholder="Category Title">
                    </div>

                    <div class="group">
                        <label for="current image">Current Image:</label>
                        <?php
                        if ($current_image != "") {
                        ?>
                            <img src="<?php ?>./images/<?php echo $current_image; ?>" width="100px;">
                        <?php

                        } else {
                            echo "<div class='error'>Image not added</div>";
                        }



                        ?>
                    </div>
                    <div class="group">
                        <label for="image">New Image:</label>
                        <input type="file" name="image">
                    </div>
                    <div class="group">
                        <label for="feature">Feature:</label><br>
                        <input <?php if ($feature == "yes") {
                                    echo "checked";
                                } ?> type="radio" name="feature" value="yes">Yes
                        <input <?php if ($feature == "no") {
                                    echo "checked";
                                } ?> type="radio" name="feature" value="no">No
                    </div>
                    <div class="group">
                        <label for="status">Status</label>
                        <select name="status" id="status">
                            <option value="active" <?php if ($status == "active") echo "selected"; ?>>Active</option>
                            <option value="inactive" <?php if ($status == "inactive") echo "selected"; ?>>Inactive</option>
                        </select>
                    </div>

                    <div class="group">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </div>
                </form>
                <?php
                if (isset($_POST['submit'])) {

                    $id = $_POST['id'];
                    $title = $_POST['title'];
                    $current_image = $_POST['current_image'];
                    $feature = $_POST['feature'];
                    $status = $_POST['status'];

                    if (isset($_FILES['image']['name'])) {
                        $image = $_FILES['image']['name'];
                        if ($image != "") {
                            $ext = pathinfo($image, PATHINFO_EXTENSION);

                            $image_name = "Tops_" . rand(000, 999) . '.' . $ext;

                            $source_path = $_FILES['image']['tmp_name'];
                            $destination_path = "images/" . $image_name;


                            $upload = move_uploaded_file($source_path, $destination_path);

                            if ($upload == false) {
                                $_SESSION['upload'] = "<div class='error'>Failed to upload image</div>";
                                header("Location: manage_cat.php");
                                exit();
                            }

                            if ($current_image !== "") {
                                $remove_path = "images/" . $current_image;
                                $remove = unlink($remove_path);
                                if ($remove == false) {
                                    $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current image</div>";
                                    header("location:manage_cat.php");
                                    exit();
                                }
                            }
                        } else {
                            $image_name = $current_image;
                        }
                    } else {
                        $image_name = $current_image;
                    }


                    $sql2 = "UPDATE cat_admin SET
                        title = '$title',
                        image = '$image_name',
                        feature = '$feature',
                        status = '$status'
                        where id =$id
                    
                    ";
                    $result2 = mysqli_query($conn, $sql2);
                    if ($result2 == true) {

                        $_SESSION['update'] = "<div class='success'>Category Updated Successfully</div>";
                        header("Location:manage_cat.php");
                        exit();
                    } else {
                        $_SESSION['update'] = "<div class='error'>Failed to update category</div>";
                        header("Location:manage_cat.php");
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