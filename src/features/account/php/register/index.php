<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/common/css/1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="/src/features/account/css/styless.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Account page</title>
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="/src/features/home/images/logo.png" width="200px">
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="Home">Home</a></li>
                        <li><a href="/src/features/product/html/product.html">Products</a></li>
                        <li><a href="/src/features/about/html/about.html">About Us</a></li>
                        <li><a href="/src/features/contact/html/contact.html">Contact Us</a></li>
                    </ul>
                </nav>

                <a href="/src/features/cart/html/cart.html">
                    <img src="/src/common/images/cart.webp" width="30px" height="30px">
                </a>

                <img src="/src/features/home/images/menu1.jpeg" class="menu-icon" onclick="menutoggle()">
            </div>




            <!-------register form-->
            <div class="small-container">
                <h2>Register</h2>
                <form action="register.php" method="POST">
                    <div class="group">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter Username">
                    </div>
                    <div class="group">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" placeholder="Enter Email">
                    </div>
                    <div class="group">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter password">
                    </div>

                    <input type="submit" id="btn" value="Register">

                </form>

            </div>
            <script>
                function validateForm(event) {
                    const email = document.getElementById('email').value;
                    const password = document.getElementById('password').value;
                    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                    const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
                    let valid = true;

                    // Email validation
                    if (!emailPattern.test(email)) {
                        document.getElementById('validationError').textContent = 'Invalid email format';
                        valid = false;
                    }

                    // Password validation
                    else if (!passwordPattern.test(password)) {
                        document.getElementById('validationError').textContent = 'Password must be at least 8 characters long and include at least one letter and one number';
                        valid = false;
                    
                    } else {
                        document.getElementById('validationError').textContent = '';
                    }

                    // If not valid, prevent form submission
                    if (!valid) {
                        event.preventDefault();
                    }
                }
            </script>





<!------js for  toggle menu-->
<script src="/src/common/js/index.js"></script>


</body>

</html>