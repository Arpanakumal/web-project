<?php
ob_start();
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
    <link rel="stylesheet" href="./css/product.css">
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

    <?php

    //check whethet the id is set or not
    if (isset($_GET['id'])) {
        //get the id
        $id = $_GET['id'];

        //query to get the data from the database
        $sql2 = "SELECT * FROM products WHERE id=$id";

        //execute the query
        $res2 = mysqli_query($conn, $sql2);

        //fetch the data
        $row2 = mysqli_fetch_assoc($res2);

        //get individual product
        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['image'];
        $current_category = $row2['categories_id'];
        $feature = $row2['feature'];
        $status = $row2['status'];
    } else {
        //redirect to the products page
        header('location:manage_product.php');
    }

    ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update Product</h1>
            <br><br><br>
            <div class="small-container">
                <form action="update_product.php" method="POST" enctype="multipart/form-data">
                    <div class="group">

                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" value="<?php echo $title; ?>" placeholder="Category Title">
                    </div>

                    <div class="group">
                        <label for="description">Description</label>
                        <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                    </div>
                    <div class="group">
                        <label for="price">Price:</label>
                        <input type="number" name="price" id="price" value="<?php echo $price; ?>">
                    </div>


                    <div class="group">
                        <label for=" current image">Current Image:</label>
                        <?php
                        if ($current_image == "") {
                            echo "<div class='error'>Image not available</div>";
                        } else {
                        ?>

                            <img src="./images/<?php echo $current_image; ?>" width="100px;">
                        <?php
                        }
                        ?>
                    </div>
                    <div class="group">
                        <label for="new image">Select new image:</label>
                        <input type="file" name="image">
                    </div>

                    <div class="group">
                        <label for="category">Category:</label>
                        <select name="category" id="category">
                            <?php
                            $sql = "SELECT  * from cat_admin where status='active'";
                            $result = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($result);
                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];

                            ?>
                                    <option <?php if ($current_category == $category_id) {
                                                echo "selected";
                                            } ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>

                            <?php
                                }
                            } else {
                                echo "<option value='0'>Category Not Available</option>";
                            }

                            ?>
                        </select>
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
                        <input type="submit" name="submit" value="Update Product" class="btn-secondary">
                    </div>
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    $id = $_POST['id'];
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $current_image = $_POST['current_image'];
                    $category = $_POST['category'];
                    $feature = $_POST['feature'];
                    $status = $_POST['status'];

                    if (isset($_FILES['image']['name'])) {
                        $image_name = $_FILES['image']['name'];
                        if ($image_name != "") {
                            $ext = end(explode('.', $image_name));

                            //b. rename the image
                            $image_name = "product_" . rand(0000, 9999) . '.' . $ext;

                            $src_path = $_FILES['image']['tmp_name'];
                            $dest_path = "images/" . $image_name;

                            //upload the image
                            $upload = move_uploaded_file($src_path, $dest_path);

                            //check whether the image is upload or not
                            if ($upload == false) {
                                //set message
                                $_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
                                //redirect to the update page
                                header('location:manage_product.php');
                                die();
                            }
                            if ($current_image != "") {
                                //remove the current image
                                $remove_path = "../images/products/" . $current_image;
                                $remove = unlink($remove_path);

                                //check whether the image is removed or not
                                if ($remove == false) {
                                    //failed to remove the image
                                    //set message
                                    $_SESSION['remove-failed'] = "<div class='error'>Failed to remove current image.</div>";
                                    //redirect to the update page
                                    header('location:manage_product.php');
                                    die();
                                }
                            }
                        }
                    } else {
                        $image_name = $current_image;
                    }
                    $sql3 = " UPDATE products set
                    title= '$title',
                    description= '$description',
                    price= $price,
                    categories_id='$category',
                    image= '$image_name',
                    feature= '$feature',
                    status= '$status'
                    where id = $id";

                    $result3 = mysqli_query($conn, $sql3);
                    if ($result3) {
                        $_SESSION['update'] = "<div class='success'>Product updated successfully</div>";
                        header("Location: manage_product.php");
                        exit();
                    } else {
                        $_SESSION['update'] = "<div class='error'>Failed to update product: " . mysqli_error($conn) . "</div>";
                        header("Location: manage_product.php");
                        exit();
                    }
                }

                ob_end_flush();
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