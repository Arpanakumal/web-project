<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="../../../../common/css/1.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../../css/login.css">
    <link rel="stylesheet" href="../../../admin/css/cat.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
    <style>
        .group {
            position: relative;
            margin-bottom: 15px;
        }

        .group i {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
        }

        .group input {
            padding-left: 30px;
        }

        #eye {
            position: absolute;
            top: 50%;
            right: 5px;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>




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
                        <li><a href="../../../home/html/homepage.php">Home</a></li>
                        <li><a href="../../../product/html/product.php">Products</a></li>
                        <li><a href="../../../about/html/about.php">About Us</a></li>
                        <li><a href="../../../contact/html/contactpage.php">Contact Us</a></li>
                    </ul>
                </nav>

                <a href="../../../../features/cart/html/cart.html">
                    <img src="../../../../common/images/cart.webp" width="30px" height="30px">
                </a>

                <img src="../../../../features/home/images/menu1.jpeg" class="menu-icon" onclick="menutoggle()">
            </div>


            <div class="small-container">
                <form action="./login.php" method="POST">
                    <h2>Login</h2>
                    <?php
                    if (isset($_SESSION['login'])) {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                    if (isset($_SESSION['no-login-msg'])) {
                        echo $_SESSION['no-login-msg'];
                        unset($_SESSION['no-login-msg']);
                    }

                    ?>
                    <div class="group">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter Username">
                    </div>
                    <div class="group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                        <i id="eye" class="fa fa-eye" style="cursor: pointer;"></i>
                    </div>
                    <div class="group">

                        <select name="user_type" id="">

                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>



                    <input type="submit" value="Login">
                </form>
            </div>

</body>
<script src="../../js/login.js"></script>

</html>