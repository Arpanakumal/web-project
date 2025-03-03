<?php

include('../../partials/partials.php');

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = null; // Handle cases where the user is not logged in
}

if (isset($_POST['Update_cart'])) {
    $cart_id = $_POST['cart_id'];
    $cart_quantity = $_POST['cart_quantity'];
    $query = "UPDATE `cart` SET quantity='$cart_quantity' WHERE cart_id='$cart_id'";

    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn)); // Error reporting
    } else {
        echo "<script>alert('Cart quantity updated');</script>";
    }
}
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM   `cart` where cart_id='$delete_id'") or die('query failed');
    header("Location: ./cart.php");
}
if (isset($_GET['delete_all'])) {

    mysqli_query($conn, "DELETE FROM   `cart` where user_id='$user_id'") or die('query failed');
    header("Location: ./cart.php");
}




?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../common/css/1.css">
    <link rel="stylesheet" href="../css/cart.css?v=2">
    <link rel="stylesheet" href="../../admin/css/admin.css">
    <link rel="stylesheet" href="../../admin/css/cat.css">
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
                    <img src="../../../features/home/images/logo.png" alt="Clothing Palette Logo" width="150px">
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="../../home/html/homepage.php">Home</a></li>
                        <li><a href="../../product/html/product.php">Products</a></li>
                        
                        <li><a href="../../about/html/about.php">About Us</a></li>
                        <li><a href="../../contact/html/contactpage.php">Contact Us</a></li>
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
                            <form action="../../home/html/search.php" method="POST" id="searchForm">
                                <input type="search" name="search" placeholder="Search Product" id="searchInput">
                                <!-- Search icon as a button -->
                                <button type="submit" name="submit" class="search-icon-btn">
                                    <i class="fa fa-search"></i> <!-- Search icon -->
                                </button>
                            </form>
                        </div>
                    </ul>
                    <!-- <a href="../../../features/cart/html/cart.html">
                        <img src="../../../common/images/cart.webp" width="30px" height="30px">
                    </a> -->

                    <img src="../../../features/home/images/menu1.jpeg" class="menu-icon" onclick="menutoggle()" alt="Menu Icon"><img src="../images/menu.jpeg" class="menu-icon" onclick="menutoggle()">
                </nav>


            </div>
        </div>
    </div>
    <br><br><br>

    <!-- Cart Item -->
    <section class="shopping-cart">
        <h1>Products Added</h1><br><br>
        <div class="box-container">
            <?php
            $grand_total = 0;
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` where user_id='$user_id'") or die('query failed');
            if (mysqli_num_rows($select_cart) > 0) {
                while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
            ?>
                    <div class="box">
                        <a href="./cart.php?delete=<?php echo $fetch_cart['cart_id']; ?>" class="fa fa-times"></a>



                        <img src="../../admin/php/product/images/<?php echo $fetch_cart['image']; ?>" alt="Product Image">


                        <div class="name"><?php echo $fetch_cart['product_name'] ?></div>
                        <div class="price">Rs:<?php echo  $fetch_cart['price'] ?></div>
                        <form action="" method="POST">
                            <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['cart_id'] ?>">
                            <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity'] ?>">
                            <input type="submit" name="Update_cart" value="Update" class="btn-primary">



                        </form>
                        <div class="sub-total">
                            Sub Total=<span>Rs.<?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?>/-
                            </span></div>
                    </div>

            <?php
                    $grand_total += $sub_total;
                }
            } else {
                echo '<p class="empty">Your Cart is empty</p>';
            }
            ?>
        </div>
        <div style="margin-top:2rem; text-align:center;">
            <a href="./cart.php?delete_all" class="btn-danger<?php echo ($grand_total > 1) ? '' : ''; ?>" onclick=" return confirm
            ('delete all from cart ?');
            ">Delete All </a><br><br><br>
        </div>
        <div class="cart-total">
            <p>Grand total:<span>Rs.<?php echo $grand_total; ?>/-</span></p><br><br><br>
            <div class="flex">
                <a href="../../product/html/product.php" class="btn-primary">Continue Shopping</a>
                <a href="./checkout.php" class="btn-primary<?php echo ($grand_total > 1) ? '' : ''; ?>">Proceed to Checkout</a>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <img src="../../../features/home/images/logo.png" alt="Clothing Palette Footer Logo">
                    <h2>Clothing Palette's purpose is to provide the latest vintage and soft aesthetic outfits.</h2>
                </div>
                <div class="footer-col-2">
                    <h1>Follow Us</h1>
                    <ul>
                        <li><a href="#" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i> Pinterest</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <h2 class="copyright">Copyright @ 2024-Clothing Palette</h2>
        </div>
    </div>

    <!-- JS for Toggle Menu -->
    <!-- <script src="../js/cart.js"></script> -->
    <script src="../../../common/js/index.js"></script>
</body>

</html>