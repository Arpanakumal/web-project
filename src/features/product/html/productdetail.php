<?php
include('../../partials/partials.php');
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $sql="SELECT * FROM products where products_id=?";
    $result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);
    if($count>0){
        
    }


}else{

}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../common/css/1.css">



    <link rel="stylesheet" href="../css/Single.css">

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


    <!-------single product details-->


    <div class="small-container single-product">
        <div class="row">
            <?php
            while($row=mysqli_fetch_assoc($result)){

            }
            ?>
            <div class="col-2">
                
                <img src="../../../features/product/images/product5.jpg" width="100%" id="productImg">

                <div class=" small-img-row">
                    <div class="small-img-col">
                        <img src="../../../features/product/images/product5.jpg" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="../../../features/product/images/back.jpeg" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="../../../features/product/images/neck.jpeg" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="../../../features/product/images/hand.jpeg" width="100%" class="small-img">
                    </div>
                </div>
            </div>


            <div class="col-2">
                <p>Home/ Cardigan Sweater</p><br>
                <h1>Sweet Lace Cardigan Sweater </h1>
                <h4>Rs.2800</h4>

                <select>
                    <option>Select Size</option>
                    <option>Small</option>
                    <option>Medium</option>
                    <option>Large</option>
                    <option>XL</option>
                </select>

                <input type="number" value="1">
                <a href="" class="btn">Add To Cart
                    <!-- <i class="fa fa-shopping-cart fa-2x" ></i> -->
                </a>


                <h3>Product Details </h3>
                <br>
                <p>The red cardigan sweater is here for your fall fashion.Featuring a classic neckline style with ribbons,this sweater offers warmth and comfort. </p>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>

    <!--------title------>

    <div class="small-container">
        <div class="row row-2">
            <h2>Related Products</h2>
            <div class="small-container">
                <div class="row">
                    <div class="col-4">
                        <img src="../../home/images/cat3.jpg">

                    </div>
                    <div class="col-4">
                        <img src="../images/product7.jpeg">

                    </div>
                    <div class="col-4">
                        <img src="../images/Product2.jpg">

                    </div>
                    <div class="col-4">
                        <img src="../../home/images/1productjpg.jpg">

                    </div>
                </div>

            </div>
        </div>


    </div>


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


    <script src="../../../common/js/index.js">


    </script>
    <script src="../js/single.js"></script>



    <!---------js for product gallery------>

</body>

</html>