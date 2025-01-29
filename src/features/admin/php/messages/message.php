<?php
include('../../../partials/partials.php'); // Database connection

$sql = "SELECT * FROM messages ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `messages` where id=$delete_id") or die('query failed');
    header("Location:./message.php");
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
    <link rel="stylesheet" href="../admin/css/adminnn.css">


    <link rel="stylesheet" href="../../php/admin/css/adminnn.css">
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
                        <li><a href="../admin/logout/logout.php">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <body>

        <div class="main-content">
            <div class="wrapper">
                <h1>Messages</h1>
                <br><br>



                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Received At</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    $sn = 1;
                    while ($row = mysqli_fetch_assoc($result)): ?>

                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['subject']); ?></td>
                            <td><?php echo htmlspecialchars($row['message']); ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td><a href="../messages/message.php?delete=<?php echo htmlspecialchars($row['id']); ?>" class="btn-danger">Delete</a></td>
                        </tr>
                    <?php endwhile; ?>


                </table>
            </div>
        </div>





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