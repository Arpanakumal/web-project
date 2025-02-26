<?php


// Assuming the user is logged in and their user_id is stored in the session
$user_id = $_SESSION['user_id'];

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch order history for the logged-in user
$sql = "SELECT * FROM order_tbl WHERE user_id = '$user_id' ORDER BY placed_on DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop through the orders
    while ($row = $result->fetch_assoc()) {
        echo "<div class='order'>";
        echo "<p><strong>Order ID:</strong> " . $row['id'] . "</p>";
        echo "<p><strong>Product:</strong> " . $row['total_products'] . "</p>";
        echo "<p><strong>Order Date:</strong> " . $row['placed_on'] . "</p>";

        // Determine the status of the order
        // if ($row['status'] == 'pending') {
        //     echo "<p><strong>Status:</strong> <span style='color: orange;'>Pending</span></p>";
        // } elseif ($row['status'] == 'completed') {
        //     echo "<p><strong>Status:</strong> <span style='color: green;'>Completed</span></p>";
        // } else {
        //     echo "<p><strong>Status:</strong> <span style='color: gray;'>" . ucfirst($row['status']) . "</span></p>";
        // }

        echo "</div>";
    }
} else {
    echo "<p>No orders found.</p>";
}

$conn->close();
