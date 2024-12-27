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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../common/css/1.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/cat.css">
    <link rel="stylesheet" href="../admin/css/adminnn.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Manage Admin</title>
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
                    </ul>
                </nav>
            </div>
        </div>
    </div>


    <div class="main-content">
        <div class="wrapper">
            <h1>Update Admin</h1>
            <br><br>

            <?php
            $id = $_GET['id'];

            $sql = "SELECT * FROM admin_users where id=$id";
            $result = mysqli_query($conn, $sql);

            if ($result == true) {
                $count = mysqli_num_rows($result);
                if ($count == 1) {
                    $row = mysqli_fetch_assoc($result);
                    $Full_name = $row['Full_name'];
                    $Username = $row['Username'];
                } else {
                    header("Location:manage_admin.php");
                }
            }


            ?>



            <div class="small-container">
                <form action="" method="POST">
                    <div class="group">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <label for="email">Full Name:</label>
                        <input type="text" id="Full_name" name="Full_name" value="<?php echo $Full_name; ?>"><br><br>
                    </div>

                    <div class="group">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <label for="username">Username:</label>
                        <input type="text" id="Username" name="Username" value="<?php echo $Username; ?>"><br><br>
                    </div>

                    <div class="group">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Submit" class="btn-secondary">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {


        $id = $_POST['id'];
        $Full_name = $_POST['Full_name'];
        $Username = $_POST['Username'];

        $sql = "UPDATE admin_users SET 
        Full_name = '$Full_name',
        Username = '$Username'
        where id = '$id'
        ";

        $result = mysqli_query($conn,$sql);

        if($result==true){

            $_SESSION['update'] = "<div class='success'>Admin Udated successfully</div>";
            header("Location: manage_admin.php");
        }else{
            $_SESSION['update'] = "<div class='error'>Failed to delete admin</div>";
            header("Location: manage_admin.php");

        }

    }




    ?>







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
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i> Pinterest</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <h2 class="copyright">Copyright @ 2024-Clothing Palette</h2>
        </div>
    </div>
</body>

</html>