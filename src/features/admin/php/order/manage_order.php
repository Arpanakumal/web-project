<?php
session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['no-login-msg'] = "<div class='error'>Please login to access Admin Panel</div>";
    header("Location:../admin/login.php");
    exit();
}
if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
    // $Full_name = $_POST['Full_name'] ?? '';
    // $username = $_POST['username'] ?? '';
    // $password = md5($_POST['password']) ?? ''; //password encryption


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "admin";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}
if(isset($_POST['update'])){

    $order_update=$_POST['id'];
    mysqli_query($conn,"UPDATE `order_tbl` set payment_status='$update_payment'") or die
    ('query failed ');
    $message[]='Payment status has been updated';



}



?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../common/css/1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/cat.css">
    <link rel="stylesheet" href="./css/order.css">

    <link rel="stylesheet" href="../admin/css/adminnn.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home page</title>
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="../../../home/images/logo.png" width="200px">
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="../homepage/index.php">Home</a></li>
                        <li><a href="../../php/admin/manage_admin.php">Admin</a></li>
                        <li><a href="../../php/product/manage_product.php">Products</a></li>
                        <li><a href="../../php/category/manage_cat.php">Category</a></li>
                        <li><a href="../../php/order/manage_order.php">Order</a></li>
                        <li><a href="../../php/messages/message.php">Order</a></li>
                        <li><a href="../admin/logout/logout.php">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>


    <!-----categories----->


    <section class="orders">
        <h1>Placed Order</h1>
        <br><br>



        <div class="box-container">
            <?php

            $select_orders = mysqli_query($conn, "SELECT * FROM `order_tbl`") or die('query failed');
            if (mysqli_num_rows($select_orders) > 0) {
                while ($fetch_orders = mysqli_fetch_assoc($select_orders)) {
            ?>
                    <div class="box">


                        <p>Username:<span><?php echo $fetch_orders['user_name']; ?></span></p>

                        <p>Email:<span><?php echo $fetch_orders['user_email']; ?></span></p>

                        <p>Contact:<span><?php echo $fetch_orders['user_contact']; ?></span></p>
                        <p>Total Products:<span><?php echo $fetch_orders['total_products']; ?></span></p>
                        <p>Payment Method:<span><?php echo $fetch_orders['payment_method']; ?></span></p>
                        <p>Total Quantity:<span><?php echo $fetch_orders['total_quantity']; ?></span></p>
                        <p>Total price:<span><?php echo $fetch_orders['total_price']; ?></span></p>
                        <p>Payment:<span><?php echo $fetch_orders['payment_status']; ?></span></p>

                        <p>Address:<span><?php echo $fetch_orders['user_address']; ?></span></p>
                        <p>Placed On:<span><?php echo $fetch_orders['placed_on']; ?></span></p>
                        <form action="" method="POST">
                            <input type="hidden" name="order_id" value="<?php echo $fetch_orders['payment_method']; ?>">
                            <select name="update_payment" id="">
                                <option value="" selected disabled><?php echo $fetch_orders['payment_status']; ?></option>
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                            </select>

                            <a href="./manage_order.php?delete=<?php echo $fetch_orders['id']; ?>" class="btn-secondary">Update</a>
                            <a href="./manage_order.php?update=<?php echo $fetch_orders['id']; ?>" class="btn-danger">Delete</a>


                        </form>


                    </div>
            <?php

                }
            } else {
                echo "<div class='error'>No orders placed yet</div>";
            }

            ?>

        </div>
    </section>












    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <img src="../../../home/images/logo.png">
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
</body>

</html>