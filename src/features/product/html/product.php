<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../common/css/1.css">
    <link rel="stylesheet" href="../css/product11.css">
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
                    <li><a href="../../home/html/homepage.html">Home</a></li>
                    <li><a href="../html/product.html">Products</a></li>
                    <li><a href="../../about/html/about.html">About Us</a></li>
                    <li><a href="../../contact/html/contact.html">Contact Us</a></li>
                </ul>
                <img src="../../../common/images/cart.webp" width="30px" height="30px">
                <img src="../../../features/home/images/menu1.jpeg" class="menu-icon" onclick="menutoggle()">

            </nav>

        </div>
    </div>

    <div class="small-container">

        <!-- <div class=" row-2">

        <h1>Our Products</h1>
        <select>
            <option value="">Default Sorting</option>
            <option value="">Sort by Price</option>
            <option value="">Sort by Popularity</option>
            <option value="">Sort by Rating</option>
            <option value="">Sort by Sale</option>
        </select>

    </div> -->



        <div class="row">
            <div class="col-4">
                <a href="productdetail.html"><img src="../images/product5.jpg" alt=""></a>

                <h4>Sweet Lace Cardigan Sweater</h4>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9734;</span>
                <span>&#9734;</span>
                <p>Rs.2800</p>
                <!-- Example Add to Cart Button for Each Product -->
                <button onclick="checkLoginStatus()" onclick="addToCart(1, 'Lace cardigan Sweater', 2800, '../../product/images/product5.jpg')">Add to Cart</button>
            </div>
            <div class="col-4">
                <img src="../images/product6.jpg">
                <h4>Gothic Dress</h4>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <p>Rs.2500</p>
                <!-- Example Add to Cart Button for Each Product -->
                <button onclick="addToCart(1, 'gothic dress', 2500, '../images/product6.jpg')">Add to Cart</button>
            </div>

            <div class="col-4">
                <img src="../images/product3.jpg">
                <h4>Himekaji Blouse</h4>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <p>Rs.3000</p>
                <!-- Example Add to Cart Button for Each Product -->
                <button onclick="addToCart(1, 'himekaji blouse', 3000, '../../../images/product3.jpg')">Add to Cart</button>
            </div>
            <div class="col-4">
                <img src="../images/product4.jpg">
                <h4>Vintage Lace Ruffle Cami-Top</h4>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9734;</span>
                <span>&#9734;</span>
                <p>Rs.1500</p>
                <!-- Example Add to Cart Button for Each Product -->
                <button onclick="addToCart(1, 'vintage lace ruffle cami top', 1500, '../images/product4.jpg')">Add to Cart</button>
            </div>
            <div class="col-4">
                <img src="../images/top.jpg">
                <h4>Sleeveless top</h4>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <p>Rs.1500</p>
                <!-- Example Add to Cart Button for Each Product -->
                <button onclick="addToCart(1, 'sleeveless top', 1500, '../images/top.jpg')">Add to Cart</button>
            </div>

            <div class="col-4">
                <img src="../images/Product2.jpg">
                <h4>Axes Femme Ruffle Cardigan</h4>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9734;</span>
                <p>Rs.2000</p>
                <!-- Example Add to Cart Button for Each Product -->
                <button onclick="addToCart(1, 'axes femme ruffle cardigan', 2000, '../../product/images/product2.jpg')">Add to Cart</button>
            </div>
            <div class="col-4">
                <img src="../images/product7.jpeg">
                <h4>Off Shoulder Sweater</h4>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9734;</span>
                <span>&#9734;</span>
                <span>&#9734;</span>
                <p>Rs.3200</p>
                <!-- Example Add to Cart Button for Each Product -->
                <button onclick="addToCart(1, 'off shoulder sweater', 3200, '../images/product7.jpeg')">Add to Cart</button>
            </div>
            <div class="col-4">
                <img src="../images/product8.jpeg">
                <h4>Pink Outer Cami-Top</h4>
                <span>&#9733;</span>
                <span>&#9734;</span>
                <span>&#9734;</span>
                <span>&#9734;</span>
                <span>&#9734;</span>
                <p>Rs.2200</p>
                <!-- Example Add to Cart Button for Each Product -->
                <button onclick="addToCart(1, 'pink outer cami top', 2200, '../images/product8.jpg')">Add to Cart</button>
            </div>
            <div class="col-4">
                <img src="../images/procduct9jpg.jpg">
                <h4> Lace Pleated Skirt</h4>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9734;</span>
                <span>&#9734;</span>
                <p>Rs.2000</p>
                <!-- Example Add to Cart Button for Each Product -->
                <button onclick="addToCart(1, 'lace pleated skirt', 2000, '../images/product9jpg.jpg')">Add to Cart</button>
            </div>
            <div class="col-4">
                <img src="../images/product10.jpg">
                <h4>Cargo Mini-Skirt</h4>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9734;</span>
                <p>Rs.2000</p>
                <!-- Example Add to Cart Button for Each Product -->
                <button onclick="addToCart(1, 'cargo mini skirt', 2000, '../images/product10.jpg')">Add to Cart</button>
            </div>
            <div class="col-4">
                <img src="../images/product11.jpg">
                <h4>Lace Mini-skirt</h4>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9734;</span>
                <span>&#9734;</span>
                <p>Rs.1700</p>
                <!-- Example Add to Cart Button for Each Product -->
                <button onclick="addToCart(1, 'Lace mini skirt', 1700, '../images/product11.jpg')">Add to Cart</button>
            </div>
            <div class="col-4">
                <img src="../images/skirt.jpg">
                <h4>Vintage Skirt</h4>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9734;</span>
                <span>&#9734;</span>
                <p>Rs.1900</p>
                <!-- Example Add to Cart Button for Each Product -->
                <button onclick="addToCart(1, 'Vintage skirt', 1900, '../images/skirt.jpg')">Add to Cart</button>
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

    <script src="../js/product.js"></script>
    <script src="../../../common/js/index.js"></script>
</body>

</html>