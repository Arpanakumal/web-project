<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../common/css/1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../css/contact.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Contact</title>
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="../../../features/home/images/logo.png" width="200px">
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="../../home/html/homepage.php">Home</a></li>
                        <li><a href="../../product/html/product.php">Products</a></li>
                        <li><a href="../../../features/about/html/about.html">About Us</a></li>
                        <li><a href="../html/contact.html">Contact Us</a></li>
                    </ul>
                </nav>



                <!-- <img src="../../../common/images/cart.webp" width="30px" height="30px"> -->

                <img src="../../../features/home/images/menu1.jpeg" class="menu-icon" onclick="menutoggle()">

            </div>
        </div>

        <div class="contact-section">
            <div class="contact-container">
                <div class="contact-info">
                    <h1 class="contact-title">Get in Touch</h1>
                    <div class="info-item">
                        <h3><i class="fa fa-map-marker" aria-hidden="true"></i>Address</h3>
                        <p>Kathmandu,Nepal</p>
                    </div>
                    <div class="info-item">
                        <h3><i class="fa fa-phone" aria-hidden="true"></i>Phone</h3>
                        <p>9812345678</p>
                    </div>
                    <div class="info-item">
                        <h3><i class="fa fa-envelope" aria-hidden="true"></i>Email</h3>
                        <p>ClothingPalette@gmail.com</p>
                    </div>
                    <div class="social-links">
                        <a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    </div>
                </div>

                <div class="contact-form">
                    <h2 class="contact-title">Send us a message</h2>
                    <form id="contactForm" action="../php/contact.php" method="POST">
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>

                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" required></textarea>
                        </div>

                        <button type="submit" class="submit-btn">Send Message</button>
                    </form>
                </div>
            </div>

        </div>



        <!-----footer-->
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


        <script src="../../../common/js/index.js"></script>
        <script src="../js/contact.js"></script>
</body>

</html>