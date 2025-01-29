<!-- <?php
        // Start session


        include('../../partials/partials.php');


        if (isset($_GET['categories_id'])) {

            $id = $_GET['categories_id'];
            $sql = " SELECT title from cat_admin where id=$id";
            $result = mysqli_query($conn, $result);

            $row = mysqli_fetch_assoc($result);
            $category_title = $row['title'];
        } else {
            // header("Location:./homepage.php");
        }




        ?>

        
        
        // Check if the user is logged in
        // if (!isset($_SESSION['admin'])) {
        //     // If not logged in, redirect to the login page
        //     header("Location: ../../account/php/login/login.php");
        //     header("location:../../account/php/register/register.php");
        //     exit();
        // }
        
        


        // Check if the user is logged in
        // if (!isset($_SESSION['admin'])) {
        //     // If not logged in, redirect to the login page
        //     header("Location: ../../account/php/login/login.php");
        //     header("location:../../account/php/register/register.php");
        //     exit();
        // }-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../common/css/1.css">
    <link rel="stylesheet" href="../../product/css/product.css">
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
                        <li><a href="../html/homepage.php">Home</a></li>
                        <li><a href="../../../features/product/html/product.php">Products</a></li>
                        <li><a href="../../../features/about/html/about.html">About Us</a></li>
                        <li><a href="../../../features/contact/html/contact.html">Contact Us</a></li>
                        <li><a href="../../../features/account/php/register/register.html">Account</a></li>

                    </ul>
                    <!-- <a href="../../../features/cart/html/cart.html">
                        <img src="../../../common/images/cart.webp" width="30px" height="30px">
                    </a> -->

                    <img src="../images/menu.jpeg" class="menu-icon" onclick="menutoggle()">
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
    <br><br><br>


    <div class="small-container">



        <?php
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            // Sanitize the input to prevent SQL injection
        } else {
            die("Error: ID is not set."); // Handle the case where ID is missing
        }



        $sql2 = "SELECT * FROM products where categories_id=$id";
        $result2 = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($result2);
        $product_count = 0;
        if ($count2 > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {

                $title = $row2['title'];
                $price = $row2['price'];
                $description = $row2['description'];

                $image_name = $row2['image'];
                if ($product_count % 4 == 0) {
                    echo '<div class="row">'; // Start a new row
                }
        ?>
                <div class="col-4">

                    <br>

                    <a href="category.php?category_id=<?php echo $id; ?>">
                        <?php
                        if ($image_name == "") {
                            echo "<div class='error'>Image not Available</div>";
                        } else {
                        ?>
                            <img src="../../admin/php/product/images/<?php echo $image_name; ?>" alt=""></a>
                <?php
                        }
                ?>



                <h4><?php echo $title; ?></h4>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9734;</span>
                <span>&#9734;</span>
                <p><?php echo 'Rs.' . number_format($price, 2); ?></p>
                    <br>
                    <!-- Example Add to Cart Button for Each Product -->
                    <button onclick="checkLoginStatus()" onclick="addToCart(1, 'Lace cardigan Sweater', 2800, '../../product/images/product5.jpg')">Add to Cart</button>
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
            echo "<div class='error'>Category not Found</div>";
        }


        ?>
    </div>


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
    <script>
        function addToCart(id, name, price, image) {
            // Debugging: check if the function is triggered
            console.log('Adding to cart:', {
                id,
                name,
                price,
                image
            });

            // Get existing cart from localStorage, or initialize it if not exists
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Check if the product is already in the cart
            const existingProductIndex = cart.findIndex(item => item.id === id);
            if (existingProductIndex !== -1) {
                // If product is already in the cart, increase quantity
                cart[existingProductIndex].quantity += 1;
            } else {
                // If it's a new product, add it to the cart
                cart.push({
                    id,
                    name,
                    price,
                    image,
                    quantity: 1
                });
            }

            // Save updated cart to localStorage
            localStorage.setItem('cart', JSON.stringify(cart));

            // Debugging: check the cart after updating
            console.log('Updated cart:', cart);

            // Redirect to the cart page
            window.location.href = "../../../features/cart/html/cart.html";
        }
    </script>
    <script>
        var productImg = document.getElementById("productImg")
        var SmallImg = document.getElementsByClassName("small-img");

        SmallImg[0].onclick = function() {
            productImg.src = SmallImg[0].src;
        }
        SmallImg[1].onclick = function() {
            productImg.src = SmallImg[1].src;
        }
        SmallImg[2].onclick = function() {
            productImg.src = SmallImg[2].src;
        }
        SmallImg[3].onclick = function() {
            productImg.src = SmallImg[3].src;
        }

        function menutoggle() {
            const menuItems = document.getElementById("MenuItems");
            if (menuItems.style.display === "block") {
                menuItems.style.display = "none";
            } else {
                menuItems.style.display = "block";
            }
        }

        function checkLoginStatus() {
            // Replace this with your actual login check logic
            var isLoggedIn = false; // Example: set to true if user is logged in

            if (!isLoggedIn) {
                // Redirect to the registration page
                window.location.href = '../../account/php/register/register.html';
            } else {
                // Proceed with adding the item to the cart
                // You can implement your add to cart logic here
                alert('Item added to cart');
            }
        }
    </script>
    <script src="../../product/js/product.js"></script>


</body>

</html>