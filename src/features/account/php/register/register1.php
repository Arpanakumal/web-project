<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../common/css/1.css">
    <link rel="stylesheet" href="../../css/register.css">
    <link rel="stylesheet" href="../../../admin/css/cat.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Account page</title>
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
            width: 100%;
            padding: 10px 10px 10px 30px;
            /* Adjust padding to prevent overlap */
            box-sizing: border-box;
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
                        <li><a href="../../../about/html/about.html">About Us</a></li>
                        <li><a href="../../../contact/html/contact.html">Contact Us</a></li>
                        
                    </ul>
                </nav>
                <!-- <a href="../../../../features/cart/html/cart.html">
                    <img src="../../../../common/images/cart.webp" width="30px" height="30px">
                </a> -->
                <img src="../../../../features/home/images/menu1.jpeg" class="menu-icon" onclick="menutoggle()">
            </div>

            <!-------register form-->
            <div class="small-container">
                <h2>Register</h2><br>
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
                <form action="register.php" method="POST" onsubmit="validateForm(event)">
                    <div class="group">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" id="username" name="username" placeholder="Enter Username">
                    </div><br>
                    <div class="group">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input type="text" id="email" name="email" placeholder="Enter Email">
                    </div>
                    <div class="group">
                        <input type="password" id="password" name="password" placeholder="Enter password">

                        <i id="eye" class="fa fa-eye" style="cursor: pointer;"></i>
                    </div>
                    <div class="group">

                        <select name="user_type" id="">

                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <p id="validationError" style="color: red;"></p>
                    <input type="submit" name="submit" id="btn" value="Register"><br>

                    <div class="class-links">
                        <p>Already have an account?</p>
                        <a href="../login/login1.php" id="btn" style="text-decoration: none;">
                            <br>Login</a>
                    </div>
                </form>

            </div>


        </div>
    </div>
</body>
<script src="../../../../common/js/index.js">

</script>
<script src="../../js/script.js"></script>

</html>