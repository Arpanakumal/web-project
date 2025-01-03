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
                } else {
                    $_SESSION['no-cat-found'] = "<div class='error'>Categort not found</div>";
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
                        <input type="text" id="title" name="title" placeholder="Category Title">
                    </div>

                    <div class="group">
                        <label for="current image">Current Image:</label>
                        Image will be displayed here
                    </div>
                    <div class="group">
                        <label for="image">New Image:</label>
                        <input type="file" name="image">
                    </div>
                    <div class="group">
                        <label for="feature">Feature:</label><br>
                        <input type="radio" name="feature" value="yes">Yes
                        <input type="radio" name="feature" value="no">No
                    </div>
                    <div class="group">
                        <label for="status">Status</label>
                        <select name="status" id="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>

                    </div><br>

                    <input type="submit" name="submit" value="Add Category" class="btn-secondary">

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