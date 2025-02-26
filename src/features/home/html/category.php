<?php
// Start session


include('../../partials/partials.php');
// if (isset($_GET['id'])) {

//     $category_id = $_GET['id'];


//     $sql = "SELECT title FROM cat_admin where id=$id";
//     $result = mysqli_query($conn, $sql);
//     $row = mysqli_fetch_assoc($result);
//     $category_title = $row['title'];
// } else {
//     // header("Location:./homepage.php");
// }



?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../common/css/1.css">
    <link rel="stylesheet" href="../../product/css/product.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Clothing Palette</title>
    <style>
        .search-icon-btn {
            background-color: transparent;
            border: none;
            cursor: pointer;
            padding: 5px;
            font-size: 18px;
        }

        .search-icon-btn i {
            color: #333;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="../images/logo.png" width="200px">
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="../html/homepage.php">Home</a></li>
                        <li><a href="../../../features/product/html/product.php">Products</a></li>
                        <li><a href="../../../features/about/html/about.php">About Us</a></li>
                        <li><a href="../../../features/contact/html/contactpage.php">Contact Us</a></li>
                        <li><a href="../../cart/html/order.php">Orders</a></li>
                        <a href="../../account/php/register/register1.php"><i class="fa fa-fw fa-user"></i></a>
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            $user_id = $_SESSION['user_id']; // Get user ID from session
                        } else {
                            $user_id = null; // Set it to null if not logged in
                        }
                        $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` where user_id='$user_id'") or die('query failed');
                        $cart_row_numbers = mysqli_num_rows($select_cart_number);

                        ?>
                        <a href="../../cart/html/cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>(<?php echo $cart_row_numbers; ?>)</span></a>
                        <div class="input-wrapper">
                            <form action="./search.php" method="POST" id="searchForm">
                                <input type="search" name="search" placeholder="Search Product" id="searchInput">
                                <!-- Search icon as a button -->
                                <button type="submit" name="submit" class="search-icon-btn">
                                    <i class="fa fa-search"></i> <!-- Search icon -->
                                </button>
                            </form>
                        </div>
                    </ul>


                    <img src="../images/menu.jpeg" class="menu-icon" onclick="menutoggle()">
                </nav>

            </div>
        </div>
    </div>
    <br><br><br>


    <div class="small-container">
        <?php
        if (isset($_GET['id'])) {
            $category_id = $_GET['id'];
            $category_title = $_GET['title'];
        }
        $sql = "SELECT * FROM cat_admin where status='active'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        $product_count = 0;
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $title = $row['title'];

                $image_name = $row['image'];
                if ($product_count % 4 == 0) {
                    echo '<div class="row">'; // Start a new row
                }

        ?>
                <div class="col-4">
                    <a href="./product_cat.php?id=<?php echo $id; ?>">

                        <?php
                        if ($image_name == "") {
                            echo "<div class='error'>Image not Available</div>";
                        } else {
                        ?>
                            <img src="../../admin/php/category/images/<?php echo $image_name; ?>" alt=""></a>
                <?php

                        }
                ?>


                <h4><?php echo $title; ?></h4>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9734;</span>
                <span>&#9734;</span>
                <br>
                <!-- Example Add to Cart Button for Each Product -->
                <button onclick="checkLoginStatus()" onclick="addToCart(1, 'Lace cardigan Sweater', 2800, '../../product/images/product5.jpg')">Add to Cart</button>
                </div>
        <?php
                $product_count++;

                // Close the row after every 4 products
                if ($product_count % 4 == 0) {
                    echo '</div>'; // Close the row
                }
            }
            if ($product_count % 4 != 0) {
                echo '</div>'; // Close the last row

            }
        } else {
            echo "<div class='error'>Category not Available</div>";
        }


        ?>

    </div>







    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <img src="../images/logo.png">
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



    <!------js for  toggle menu-->
    <script src="../../../common/js/index.js"></script>


    <script src="../../product/js/product.js"></script>


</body>

</html>