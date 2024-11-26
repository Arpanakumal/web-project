<?php

include 'connect.php';

if (isset($_POST['signup'])) {
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Pasword = $_POST['Password'];
    $Password = md5($Password);


    $checkEmail = "Select * from register where Email='$Email'";
    $result = $conn->query($checkEmail);
    if ($result->num_rows > 0) {
        echo " Email Address already exists";
    } else {
        $insertQuery = "Insert into register(Username,Email,Password)
        values('$Username','$Email','$Password')";
        if ($conn->query($insertQuery) == true) {
            header("location:account.php");
        } else {
            echo "Error";
        }
    }
}

if (isset($_POST['SignIn'])) {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $Password - md5($Password);

    $sql = "Select * from register where Email ='$Email'  and password='$Password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['Email'] = $row['Email'];
        header("Location:index.php");
        exit();
    } else {
        echo "Not found or Incorrect Password";
    }
}
