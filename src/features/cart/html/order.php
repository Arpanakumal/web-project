<?php
include('../../partials/partials.php');

$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header("Location:../../account/php/login/login1.php");
    exit();
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

        h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 1.5rem;
            color: #555;
            margin-bottom: 15px;
        }

        .order {
            background-color: #fafafa;
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            text-align: left;
        }

        .order p {
            margin: 8px 0;
        }



        /* Styling for empty order state */
        .no-orders {
            color: #777;
            font-style: italic;
        }
    </style>

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



    <h2>Your Order History</h2>
    <?php
    // Include the PHP code to display the order history
    include('check_order.php'); // this is the PHP code you wrote for fetching the orders
    ?>

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