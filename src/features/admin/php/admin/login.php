<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$res = null; // Initialize $res variable

if (isset($_POST['submit'])) {
    $username = $_POST['Username'];
    $password = $_POST['password'];


    $stmt = $conn->prepare("SELECT * FROM admin_users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password); // "ss" means two strings
    $stmt->execute();
    $res = $stmt->get_result();


    if ($res && $res->num_rows == 1) {
        $_SESSION['login'] = "<div class='success'>Login Successful</div>";
        $_SESSION['user'] = $username;
        header("Location:../homepage/index.php");
        exit();
    } else {
        $_SESSION['login'] = "<div class='error'>Invalid Username or Password</div>";
        header("Location: login.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/cat.css">
    <link rel="stylesheet" href="../admin/css/adminnn.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Login</title>
</head>

<body>
    <div class="login">
        <div class="small-container">
            <form action="" method="POST">
                <h1>Login</h1>
                <br><br>
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
                <br>
                <div class="group">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <label for="username">Username:</label>
                    <input type="text" id="Username" name="Username"><br><br>
                </div>
                <div class="group">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <label for="username">Password:</label>
                    <input type="password" id="password" name="password"><br><br>
                </div>

                <div class="group">
                    <input type="submit" name="submit" value="Submit" class="btn-secondary">
                </div>
            </form>
        </div>
    </div>
</body>

</html>