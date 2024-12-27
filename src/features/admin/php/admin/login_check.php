<?php
if(isset($_SESSION['user'])){
    $_SESSION['no-login-msg'] = "<div class='error'>Please login to access Admin Panel</div>";
    header("Location:login.php");
    exit();
}

?>