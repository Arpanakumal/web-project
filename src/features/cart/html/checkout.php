<?php
include('../../partials/partials.php');

$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header("Location:../../account/php/login/login1.php");
    exit();
}

if (isset($_POST['order-btn'])) {
    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id='$user_id'");

    // Check if query was successful
    if (!$cart_query) {
        // Log or display error message if the query fails
        die("Query failed: " . mysqli_error($conn));
    }

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $method = mysqli_real_escape_string($conn, $_POST['payment_method']);
    $status = mysqli_real_escape_string($conn, $_POST['payment_status']);
    $address = mysqli_real_escape_string($conn, 'flat no.' . $_POST['flat'] . ',' . $_POST['city'] . ',' . $_POST['pin_code']);
    $placed_on = date('Y-m-d H:i:s');  // Added time in the format
    $cart_total = 0;
    $cart_products = [];
    $total_products = '';  // Initialize the total_products variable properly

    // Construct cart products and total
    if (mysqli_num_rows($cart_query) > 0) {
        while ($cart_item = mysqli_fetch_assoc($cart_query)) {
            $cart_products[] = $cart_item['product_name'] . ' (' . $cart_item['quantity'] . ')';
            $cart_total += ($cart_item['price'] * $cart_item['quantity']);
        }
    } else {
        echo "<script>alert('Your cart is empty');</script>";
    }

    // Insert order into the database
    if ($cart_total > 0) {
        $total_products = implode(',', $cart_products); // Ensures proper escaping for product list
        $total_quantity = 0;
        if (!empty($total_products)) {
            // Split the products string into individual entries
            $productEntries = explode(',', $total_products);
            foreach ($productEntries as $entry) {
                // Use regex to match a number inside parentheses
                if (preg_match('/\((\d+)\)/', $entry, $matches)) {
                    $total_quantity += (int)$matches[1];
                }
            }
        }
        $order_query = mysqli_query($conn, "INSERT INTO `order_tbl` (user_id,user_name, user_contact, user_email, user_address, payment_method,payment_status, total_products, total_price, placed_on,total_quantity) 
                                            VALUES ('$user_id','$name', '$number', '$email', '$address', '$method','$status', '$total_products', '$cart_total', '$placed_on','$total_quantity')");
        if (!$order_query) {
            // Log or display error message if the query fails
            die("Order query failed: " . mysqli_error($conn));
        }

        echo "<script>alert('Order placed successfully');</script>";

        // Clear cart after order placement
        mysqli_query($conn, "DELETE FROM `cart` WHERE user_id='$user_id'") or die(mysqli_error($conn));
    }
}

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../common/css/1.css">

    <link rel="stylesheet" href="../css/checkout.css?v=2">

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
    <section class="display-order">
        <?php
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
        } else {
            $user_id = null;
        }
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id='$user_id'") or die('query failed');

        if (mysqli_num_rows($select_cart) > 0) {
            while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                $grand_total += $total_price;
        ?>
                <div class="order-item">
                    <label class="product-label">Product:</label>
                    <span class="product-name"><?php echo $fetch_cart['product_name']; ?></span>

                    <label class="price-label">Price:</label>
                    <span class="product-price"><?php echo 'Rs.' . $fetch_cart['price'] . '/-'; ?></span>

                    <label class="quantity-label">Quantity:</label>
                    <span class="product-quantity"><?php echo 'x' . $fetch_cart['quantity']; ?></span>
                </div>
        <?php
            }
        } else {
            echo '<p class="empty">Your Cart is empty</p>';
        }
        ?>
        <div class="grand-total-box">
            <label class="grand-total-label">Grand Total:</label>
            <span class="grand-total">Rs. <?php echo  $grand_total; ?>/-</span>
        </div>
    </section>
    <br><br>


    <section class="checkout">
        <form action="" method="POST">
            <h3>Place Your Order</h3>
            <div class="flex">
                <div class="inputbox">
                    <span>Your name:</span>
                    <input type="text" name="name" placeholder="Enter your name">
                </div>
                <div class="inputbox">
                    <span>Your number:</span>
                    <input type="tel" name="number" placeholder="Enter your number">
                </div>

                <div class="inputbox">
                    <span>Your Email:</span>
                    <input type="text" name="email" placeholder="Enter your Email">
                </div>
                <div class="inputbox">
                    <span>Payment Method:</span>
                    <select name="payment_method" id="">
                        <option value="Cash On Delivery">Cash On Delivery</option>
                        <option value="credit card">Credit Card</option>
                    </select>

                </div>
                <div class="inputbox">
                    <span>Payment Status:</span>
                    <select name="payment_status" id="">
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
                    </select>

                </div>
                <div class="inputbox">
                    <span>Your Address Line :</span>
                    <input type="number" min="0" name="flat" placeholder="e.g. flat no.">
                </div>
                <div class="inputbox">
                    <span>City:</span>
                    <input type="text" name="city" placeholder="e.g. Kathmandu">
                </div>
                <div class="inputbox">
                    <span>Pincode:</span>
                    <input type="number" name="pin_code" min="0" placeholder="e.g.12345">
                </div>
            </div><br><br>
            <a href="../../order/php/order.php">
                <input type="submit" value="Order Now" class="btn" name="order-btn">
            </a>
        </form>
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
    <script src="../js/cart.js"></script>
    <script src="../../../common/js/index.js"></script>
</body>

</html>