<!-- <?php
        session_start();
        include('../../partials/partials.php');


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
            <div class="row">
                <div class="col-2">
                    <h1>Color your Wardrobe</h1>
                    <p>Fill your Wardrobe with any colour you want.<br>Check out for new and fresh arrivals</p>
                    <a href="../../product/html/product.php" class="btn">Shop Now </a>
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
            <div class="category-row">
                <?php
                $sql = "SELECT * from cat_admin where status='active' LIMIT 3";
                $result = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $category_title = $row['title'];
                        $image_name = $row['image'];
                ?>
                        <div class="category-item">
                            <a href="./product_cat.php?id=<?php echo $id; ?>">
                                <?php
                                if ($image_name == "") {
                                    echo "<div class='error'>Image not available</div>";
                                } else {
                                ?>
                                    <img src="../../admin/php/category/images/<?php echo $image_name; ?>" alt="<?php echo $title; ?>"></a>
                        <?php
                                }
                        ?>
                        <h4><?php echo $category_title; ?></h4>
                        </div>
                <?php
                    }
                } else {
                    echo "<div class='error'>Category not added</div>";
                }
                ?>
            </div>
        </div>
    </div>


    <div class="featured-products">
        <div class="small-container">
            <h2 class="Title">Latest products</h2>
            <div class="category-row">
                <div class="category-item">

                    <img src="../../../features/product/images/product5.jpg">


                    <h3>Sweet Lace cardigan sweater</h3>

                </div>
                <div class="category-item">
                    <img src="../../../features/product/images/product6.jpg">
                    <h3>Gothic Babydoll Dress</h3>

                </div>
                <div class="category-item">
                    <img src="../../../features/product/images/procduct9jpg.jpg">
                    <h3>Lace over pleated skirt</h3>

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
    <script src="../../../common/js/index.js">

    </script>


</body>

</html>