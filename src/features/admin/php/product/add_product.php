<?php
session_start();

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission here
}
?>



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../common/css/1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href=".././../css/admin.css">
    <link rel="stylesheet" href="../.././css/cat.css">
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
                        <li><a href="../admin/logout/logout.php">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>


    <div class="main-content">
        <div class="wrapper">
            <h1>Add Product</h1>
            <br><br>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="small-container">

                    <div class="group">

                        <label for="title">Name:</label><br>
                        <input type="text" id="title" name="title" placeholder="Product name">
                    </div>
                    <div class="group">

                        <label for="description">Description</label><br>
                        <textarea name="desciption" cols="30" rows="5" placeholder="Description of the product"></textarea>
                    </div>
                    <div class="group">

                        <label for="price">Price</label><br>
                        <input type="number" name="price" placeholder=""></input>
                    </div><br>
                    <div class="group">
                        <label for="image">Select Image</label><br>
                        <input type="file" name="image">
                    </div><br>
                    <div class="group">
                        <label for="category">Category</label>
                        <select name="category">
                            <?php
                            $sql = "SELECT * FROM cat_admin WHERE status= 'active'";
                            $result = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($result);

                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];
                                    $title = $row['title'];
                            ?>
                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                <?php
                                }
                            } else {
                                ?>
                                <option value="0">No Category Found</option>
                            <?php

                            }

                            ?>
                        </select>

                    </div><br>


                    <div class="group">
                        <label for="feature">Feature:</label><br>
                        <input type="radio" name="feature" value="yes">Yes
                        <input type="radio" name="feature" value="no">No
                    </div><br>

                    <div class="group">
                        <label for="status">Status</label>
                        <select name="status" id="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>

                    </div><br>

                    <input type="submit" name="submit" value="Add Product" class="btn-secondary">


            </form>

            <?php

            if(isset($_POST['submit'])){
                $title = $_POST['title'];
                $description = $_POST['discription'];
                $price = $_POST['price'];
                $category = $_POST['category'];


                if(isset($_POST['featured'])){
                    $feature = $_POST['feature'];
                }else{
                    $feature = "no";
                }
                if(isset($_POST['status'])){

                }else{
                    
                }

            }
            ?>
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