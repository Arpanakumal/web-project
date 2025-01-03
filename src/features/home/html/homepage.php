<!-- <?php
        // Start session
        session_start();

        // Check if the user is logged in
        if (!isset($_SESSION['admin'])) {
            // If not logged in, redirect to the login page
            header("Location: ../../account/php/login/login.php");
            header("location:../../account/php/register/register.php");
            exit();
        }

        ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../common/css/1.css">
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
                    <img src="../images/logo.png" width="200px">
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="../html/homepage.html">Home</a></li>
                        <li><a href="../../../features/product/html/product11.html">Products</a></li>
                        <li><a href="../../../features/about/html/about.html">About Us</a></li>
                        <li><a href="../../../features/contact/html/contact.html">Contact Us</a></li>
                        <li><a href="../../../features/account/php/register/register.html">Account</a></li>

                    </ul>
                    <a href="../../../features/cart/html/cart.html">
                        <img src="../../../common/images/cart.webp" width="30px" height="30px">
                    </a>

                    <img src="../images/menu.jpeg" class="menu-icon" onclick="menutoggle()">
                </nav>




            </div>
            <div class="row">
                <div class="col-2">
                    <h1>Color your Wardrobe</h1>
                    <p>Fill your Wardrobe with any colour you want.<br>Check out for new and fresh arrivals</p>
                    <a href="../../product/html/product.html" class="btn">Shop Now </a>
                </div>
                <div class="col-2">
                    <div class="img">
                        <img src="../images/home3.jpg">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!----featured categories-->

    <div class="Categories">
        <div class="small-container">
            <h2 class="Title">Shop By Category</h2>
            <div class="row">
                <div class="col-3">
                    <img src="../images/cat1.jpg">
                    <h4>Dresses</h4>
                </div>
                <div class="col-3">
                    <img src="../images/cat2.jpeg">
                    <h4>Sweaters</h4>
                </div>
                <div class="col-3">
                    <img src="../../../features/product/images/product7.jpeg">
                    <h4>Tops</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="featured-products">
        <div class="small-container">
            <h2 class="Title">Latest products</h2>
            <div class="row">
                <div class="col-4">
                    <img src="../../../features/product/images/product6.jpg">
                    <h4>Gothic Babydoll Dress</h4>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <p>Rs.2500</p>
                </div>
                <div class="col-4">
                    <img src="../../../features/product/images/procduct9jpg.jpg">
                    <h4>Lace over pleated skirt</h4>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9734;</span>
                    <span>&#9734;</span>
                    <span>&#9734;</span>
                    <p>Rs.2000</p>
                </div>
                <div class="col-4">
                    <img src="../../../features/product/images/product5.jpg">
                    <h4>Sweet Lace cardigan sweater</h4>
                    <span>&#9733;</span>
                    <span>&#9734;</span>
                    <span>&#9734;</span>
                    <span>&#9734;</span>
                    <span>&#9734;</span>
                    <p>Rs.2800</p>
                </div>
            </div>
        </div>
    </div>





    <!-----offer-->

    <div class="offer">
        <h1>Special Offer</h1>
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="../images/cat2.jpeg" class="offer-img">
                </div>
                <div class="col-2">
                    <h1>Casual Sweater</h1>
                    <p>Exclusively Available on Clothing Palette</p>

                    <small>The Casual Sweater is a perfect need for casual wears this winter<br></small>

                    <a href="../../product/html/product.html" class="btn">Buy Now&#8594;</a>
                </div>
            </div>
        </div>
    </div>




    <!---footer------->



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


</body>

</html>