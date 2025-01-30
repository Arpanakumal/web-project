<?php
include('../../partials/partials.php');

$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header("Location:../../../account/php/login/login1.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../common/css/1.css">

    <link rel="stylesheet" href="../css/order.css?v=2">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>



    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Clothing Palette</title>
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
                        <li><a href="../../../features/account/php/logout/logout.php">Logout</a></li>
                        <li><a href="../../about/html/about.html">About Us</a></li>
                        <li><a href="../../contact/html/contact.html">Contact Us</a></li>
                    </ul>
                    <!-- <a href="../../../features/cart/html/cart.html">
                        <img src="../../../common/images/cart.webp" width="30px" height="30px">
                    </a> -->

                    <img src="../../../features/home/images/menu1.jpeg" class="menu-icon" onclick="menutoggle()" alt="Menu Icon"><img src="../images/menu.jpeg" class="menu-icon" onclick="menutoggle()">
                </nav>
                <div class="input-wrapper">
                    <form action="./search.php" method="POST">
                        <input type="search" name="search" placeholder="Search Product">

                        <input type="submit" name="submit" value="Search" class="btn btn-primary">


                    </form>
                    <!-- <a href="../html/search.php"></a>
                    <input type="search" name="search" placeholder="Search Product" class="search-field">
                    <button class="search-submit" aria-label="search">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button> -->
                </div>

            </div>
        </div>
    </div>



    <section class="box-container">
        <h1 class="title">Placed Orders</h1><br>
        <div class="box">
            <?php
            $order_query = mysqli_query($conn, "SELECT * FROM `order_tbl` WHERE user_id='$user_id'") or die('Query failed');
            if (mysqli_num_rows($order_query) > 0) {
                while ($fetch_orders = mysqli_fetch_assoc($order_query)) {
            ?>
                    <div class="order-form">
                        <div class="form-group">
                            <label for="placed_on">Placed On:</label>
                            <span id="placed_on"><?php echo $fetch_orders['placed_on']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="user_name">Name:</label>
                            <span id="user_name"><?php echo $fetch_orders['user_name']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="user_contact">Number:</label>
                            <span id="user_contact"><?php echo $fetch_orders['user_contact']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="user_email">Email:</label>
                            <span id="user_email"><?php echo $fetch_orders['user_email']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="user_address">Address:</label>
                            <span id="user_address"><?php echo $fetch_orders['user_address']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="payment_method">Payment Method:</label>
                            <span id="payment_method"><?php echo $fetch_orders['payment_method']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="total_products">Your Orders:</label>
                            <span id="total_products"><?php echo $fetch_orders['total_products']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="total_price">Total Price:</label>
                            <span id="total_price"><?php echo $fetch_orders['total_price']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="payment_status">Payment Status:</label>
                            <span id="payment_status" style="color:<?php
                                                                    if ($fetch_orders['payment_status'] == 'pending') {
                                                                        echo 'red';
                                                                    } else {
                                                                        echo 'green';
                                                                    } ?>;"><?php echo $fetch_orders['payment_status']; ?></span>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<script>alert('No orders placed yet');</script>";
            }
            ?>
        </div>
    </section>

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
    <script src="../js/cart.js"></script>
    <script src="../../../common/js/index.js"></script>
</body>

</html>