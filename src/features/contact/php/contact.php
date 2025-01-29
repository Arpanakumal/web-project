<?php
include('../../partials/partials.php'); // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    // Validate inputs
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../html/contact.html?error=Invalid email address");
        exit();
    }

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        header("Location: ../html/contact.html?error=All fields are required");
        exit();
    }

    // Prepare and execute database query
    $sql = "INSERT INTO messages (name, email, subject, message) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $subject, $message);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../html/contactpage.php?success=true");
    } else {
        header("Location: ../html/contactpage.php?error=Database error");
    }
} else {
    header("Location: ../html/contactpage.php?error=Invalid request");
}
