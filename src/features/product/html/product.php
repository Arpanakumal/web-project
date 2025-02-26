<?php
// Start session
include('../../partials/partials.php');

if (isset($_POST['add_to_cart'])) {
    $user_id = $_POST['user_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['price'];
    $image_name = $_POST['image'];
    // Define the quantity - assume 1 for simplicity, or you could modify this based on user input
    $quantity = 1;


    $check_cart_numbers = mysqli_query($conn, "SELECT * from `cart` where product_name='$product_name' and user_id='$user_id'") or die('query Failed');

    if (mysqli_num_rows($check_cart_numbers) > 0) {
        echo "<script>alert('Product already added to cart!');</script>";
    } else {

        mysqli_query($conn, "INSERT INTO `cart` (user_id, product_name, price, image, quantity)
        VALUES ('$user_id', '$product_name', '$product_price', '$image_name', '$quantity')") or die('query failed');
        echo "<script>alert('Product added to cart!');</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../common/css/1.css">
    <link rel="stylesheet" href="../css/product.css">
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
                    <img src="../../home/images/logo.png" width="200px">
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
    </div><br><br><br>

    <div class="small-container">
        <?php
        $sql = "SELECT * FROM products WHERE status = 'active'";
        $result = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $product_count = 0; // Counter to track products in the current row
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $title = $row['title'];
                $quantity = $row['quantity'];
                $description = $row['description'];
                $price = $row['price'];
                $image_name = $row['image'];

                // Start a new row for every 4 products
                if ($product_count % 4 == 0) {
                    echo '<div class="row">'; // Start a new row
                }

                // Display the product
        ?>
                <div class="col-4">
                    <a href="productdetail.php?id=<?php echo $id; ?>">
                        <?php
                        if ($image_name == "") {
                            echo "<div class='error'>Image not available</div>";
                        } else {
                        ?>
                            <img src="../../admin/php/product/images/<?php echo $image_name; ?>" alt="<?php echo $title; ?>">
                        <?php
                        }
                        ?>
                    </a>
                    <h4><?php echo $title; ?></h4>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9734;</span>
                    <span>&#9734;</span>
                    <p><?php echo 'Rs.' . number_format($price, 2); ?></p>
                    <form action="" method="POST">
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $title; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>"><br>
                        <input type="hidden" name="image" value="<?php echo $image_name; ?>">


                        <?php if ($quantity > 0) { ?>
                            <button type="submit" class="btn" name="add_to_cart">Add to Cart</button>
                        <?php } else { ?>
                            <button type="submit" class="btn" name="btn" style="background-color:red;" disabled>Out of Stock</button>
                        <?php } ?>



                    </form>


                </div>
        <?php

                $product_count++;

                // Close the row after every 4 products
                if ($product_count % 4 == 0) {
                    echo '</div>'; // Close the row
                }
            }

            // If the total number of products is not a multiple of 4, close the last row
            if ($product_count % 4 != 0) {
                echo '</div>'; // Close the last row
            }
        } else {
            echo "<div class='error'>No products found.</div>";
        }
        ?>
    </div>


    <!---footer------->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <img src="../../../features/home/images/logo.png">
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
    <script>
        function menutoggle() {
            const menuItems = document.getElementById("MenuItems");
            if (menuItems.style.display === "block") {
                menuItems.style.display = "none";
            } else {
                menuItems.style.display = "block";
            }
        }
    </script>
    <!-- <script src="../js/product.js">
    </script> -->
    <script src="../../../common/js/index.js"></script>
</body>

</html>