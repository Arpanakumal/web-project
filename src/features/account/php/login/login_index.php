<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="../../../../common/css/1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../../css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>




</head>

<body>
<div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="../../../../features/home/images/logo.png" width="200px">
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="../../../home/html/1.index.html">Home</a></li>
                        <li><a href="../../../../features/product/html/product.html">Products</a></li>
                        <li><a href="../../../../features/about/html/about.html">About Us</a></li>
                        <li><a href="../../../../features/contact/html/contact.html">Contact Us</a></li>
                    </ul>
                </nav>

                <a href="../../../../features/cart/html/cart.html">
                    <img src="../../../../common/images/cart.webp" width="30px" height="30px">
                </a>

                <img src="../../../../features/home/images/menu1.jpeg" class="menu-icon" onclick="menutoggle()">
            </div>



    
    <?php
    if (isset($_GET['error'])) {
        echo "<p style='color:red;'>" . $_GET['error'] . "</p>";
    }
    ?>
    <div class="small-container">
        <form action="login.php" method="post">
        <h2>Login</h2>
            <div class="group">
            <i class="fa fa-envelope" aria-hidden="true"></i>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>
            </div>
            <div class="group">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>
            </div>

            <input type="submit" value="Login">
        </form>
    </div>

</body>

</html>