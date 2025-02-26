<?php
include('../../partials/partials.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../common/css/1.css">
    <link rel="stylesheet" href="../css/about.css">
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

                    <img src="../images/menu.jpeg" class="menu-icon" onclick="menutoggle()">
                </nav>

            </div>
        </div>
    </div>

    <div class="about">
        <h1>Welcome to Clothing Palette</h1>
        <h2>Our Beginning and Focus</h2><br>
        <p>Clothing Palette is an online based women's clothing store established in November 2024.This store main objective is to provide vintage style for our customers.</p>
        <p>Founded with passion and love for fashion,this store aims to offer collection of clothing that has timeless elegance with the following trends as well.</p>
        <p>Our Main objective is to have longlasting entrepreneurshiip and a timeless connection with our customers.</p>
        <br>

        <h2>Our Business</h2><br>
        <p>Our store mainly offers vintage fashion for women. The store exists for our customers and every decision is dedicated for their necessities</p>
        <p>Clothing palette will keep on thriving and improving for our customers, we will aim to continuosly enhance our business while improving our website and to prepare for physical store soon as well</p>
    </div>




    <!---footer------->


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