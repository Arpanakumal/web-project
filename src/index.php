<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/common/css/1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../src/features/account/css/styless.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Account page</title>
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="../src/features/home/images/logo.png" width="200px">
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="../src/features/home/html/homepage.html">Home</a></li>
                        <li><a href="../src/features/product/html/product.html">Products</a></li>
                        <li><a href="../src/features/about/html/about.html">About Us</a></li>
                        <li><a href="../src/features/contact/html/contact.html">Contact Us</a></li>
                    </ul>
                </nav>

                <a href="../src/features/cart/html/cart.html">
                    <img src="../src/common/images/cart.webp" width="30px" height="30px">
                </a>

                <img src="../src/features/home/images/menu1.jpeg" class="menu-icon" onclick="menutoggle()">
            </div>

            <div class="small-container">
                <h2>Register</h2>
                <form action="../src/features/account/php/register/register.php" method="POST" onsubmit="return validateForm(event)">
                    <div class="group">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter Username" required>
                    </div>
                    <div class="group">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" placeholder="Enter Email" required>
                    </div>
                    <div class="group">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter password" required>
                    </div>
                    <div id="validationError" style="color: red;"></div>
                    <input type="submit" id="btn" value="Register">
                </form>
            </div>
            <script>
                function validateForm(event) {
                    event.preventDefault(); // Prevent default form submission

                    const username = document.getElementById('username').value;
                    const email = document.getElementById('email').value;
                    const password = document.getElementById('password').value;
                    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                    const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
                    let valid = true;
                    let errorMessage = '';

                    // Username validation
                    if (username.trim() === '') {
                        errorMessage = 'Username is required';
                        valid = false;
                    }
                    // Email validation
                    else if (!emailPattern.test(email)) {
                        errorMessage = 'Invalid email format';
                        valid = false;
                    }
                    // Password validation
                    else if (!passwordPattern.test(password)) {
                        errorMessage = 'Password must be at least 8 characters long and include at least one letter and one number';
                        valid = false;
                    }

                    document.getElementById('validationError').textContent = errorMessage;

                    if (valid) {
                        event.target.submit(); // Submit the form if validation passes
                    }

                    return valid;
                }
            </script>

            <!------js for  toggle menu-->
            <script src="../src/common/js/index.js"></script>

            <!-- Code injected by live-server -->
            <script>
                // <![CDATA[  <-- For SVG support
                if ('WebSocket' in window) {
                    (function() {
                        function refreshCSS() {
                            var sheets = [].slice.call(document.getElementsByTagName("link"));
                            var head = document.getElementsByTagName("head")[0];
                            for (var i = 0; i < sheets.length; ++i) {
                                var elem = sheets[i];
                                var parent = elem.parentElement || head;
                                parent.removeChild(elem);
                                var rel = elem.rel;
                                if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                                    var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                                    elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                                }
                                parent.appendChild(elem);
                            }
                        }
                        var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
                        var address = protocol + window.location.host + window.location.pathname + '/ws';
                        var socket = new WebSocket(address);
                        socket.onmessage = function(msg) {
                            if (msg.data == 'reload') window.location.reload();
                            else if (msg.data == 'refreshcss') refreshCSS();
                        };
                        if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                            console.log('Live reload enabled.');
                            sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
                        }
                    })();
                } else {
                    console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
                }
                // ]]>
            </script>
        </div>
    </div>
</body>

</html>