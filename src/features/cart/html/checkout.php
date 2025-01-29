<?php
include('../../partials/partials.php');

if (isset($_GET['id'])) {  // Corrected `isset` usage and removed semicolon
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products where id=$product_id";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image'];
    } else {
        header("Location:../../home/html/homepage.php");
    }
} else {
    echo "Product ID not provided.";
}

?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../common/css/1.css">

    <link rel="stylesheet" href="../css/checkout.css">

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
                        <li><a href="../../product/html/product11.php">Products</a></li>
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


    <div class="small-container">
        <h2>Checkout</h2><br><br>

        <form action="" method="POST" onsubmit="validateForm(event)">
            
            <legend>Delivery Details</legend><br>
            <div class="group">
                <input type="text" name="fullname" id="fullname" placeholder="Enter Your Fullname">
            </div><br>
            <div class="group">
                <input type="tel" name="phone" id="phone" placeholder="Enter  Your Phone Number">
            </div><br>
            <div class="group">
                <input type="text" name="email" id="email" placeholder="Enter Your email">
            </div><br>
            <div class="group">
                <input type="text" name="address" id="address" placeholder="Enter Your Address">
            </div><br>




            <input type="submit" name="submit" id="btn" value="Confirm Order"><br>


        </form>

    </div>

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