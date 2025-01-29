<?php
// Start session


include('../../partials/partials.php');
// Check if the user is logged in
// if (!isset($_SESSION['admin'])) {
//     // If not logged in, redirect to the login page
//     header("Location: ../../account/php/login/login.php");
//     header("location:../../account/php/register/register.php");
//     exit();
// }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../common/css/1.css">
    <link rel="stylesheet" href="../css/product.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>All Products-Clothing Palette</title>
</head>

<body>




    <div class="container">
        <div class="navbar">
            <div class="logo">
                <img src="../../home/images/logo.png" width="200px">
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="../../home/html/homepage.php">Home</a></li>
                    <li><a href="../html/product.php">Products</a></li>
                    <li><a href="../../about/html/about.html">About Us</a></li>
                    <li><a href="../../contact/html/contact.html">Contact Us</a></li>
                </ul>
                <!-- <img src="../../../common/images/cart.webp" width="30px" height="30px"> -->
                <img src="../../../features/home/images/menu1.jpeg" class="menu-icon" onclick="menutoggle()">

            </nav>
            <div class="input-wrapper">
                <form action="../../product/html/product.php" method="POST">
                    <input type="search" name="search" placeholder="Search Product">

                    <input type="submit" name="submit" value="Search" class="btn btn-primary">


                </form>
            </div>

        </div>
    </div>

    <div class="small-container">
        <?php
        $sql = "SELECT * FROM products WHERE status = 'active'";
        $result = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $product_count = 0; // Counter to track products in the current row
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $price = $row['price'];
                $image_name = $row['image'];

                // Start a new row for every 4 products
                if ($product_count % 4 == 0) {
                    echo '<div class="row">'; // Start a new row
                }

                // Display the product
        ?>
                <div class="col-4">
                    <a href="productdetail.php?id=<?php echo $id; ?>">
                        <?php
                        if ($image_name == "") {
                            echo "<div class='error'>Image not available</div>";
                        } else {
                        ?>
                            <img src="../../admin/php/product/images/<?php echo $image_name; ?>" alt="<?php echo $title; ?>">
                        <?php
                        }
                        ?>
                    </a>
                    <h4><?php echo $title; ?></h4>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9734;</span>
                    <span>&#9734;</span>
                    <p><?php echo 'Rs.' . number_format($price, 2); ?></p>
                    <button onclick="checkLoginStatus()">Add to Cart</button>

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
            echo "<div class='error'>No products found.</div>";
        }
        ?>
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
    <script>
        function menutoggle() {
            const menuItems = document.getElementById("MenuItems");
            if (menuItems.style.display === "block") {
                menuItems.style.display = "none";
            } else {
                menuItems.style.display = "block";
            }
        }

        function checkLoginStatus(id, name, price, image) {
            // Check if user is logged in
            var isLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;

            if (!isLoggedIn) {
                // Redirect to login page with product details
                const queryParams = new URLSearchParams({
                    id,
                    name,
                    price,
                    image
                }).toString();
                window.location.href = `../../account/php/register/register1.php?${queryParams}`;
            } else {
                // If logged in, add the item to the cart
                addToCartDatabase(id);
            }
        }

        function addToCartDatabase(productId) {
            fetch("../../cart/php/add_to_cart.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: `product_id=${productId}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Product added to cart successfully!");
                        window.location.href = "../../cart/html/cart.php";
                    } else {
                        alert("Error adding product to cart.");
                    }
                })
                .catch(error => console.error("Error:", error));
        }
    </script>
    <script src="../js/product.js">
    </script>
    <script src="../../../common/js/index.js"></script>
</body>

</html>