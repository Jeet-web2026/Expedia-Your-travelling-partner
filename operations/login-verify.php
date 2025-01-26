<?php
session_start();
require('../configaration/config.php');
$email = $_POST['login-email'];
$pass = $_POST['pass'];
$checkEmail = "SELECT * FROM `client-signup` WHERE email_add = '$email' AND password = '$pass'";
$runQuery = mysqli_query($connection, $checkEmail);
if ($runQuery) {
    if (mysqli_num_rows($runQuery) == 1) {
        $userData = mysqli_fetch_assoc($runQuery);
        echo "Welcome! <span class='text-capitalize'>" . $userData['first_name'] . "</span> You are successfully logged in!";
        $_SESSION['clientTableno'] = $userData['id'];
        $_SESSION['clientName'] = $userData['first_name'];
        $_SESSION['clientTittle'] = $userData['last_name'];
        $_SESSION['mobileNo'] = $userData['mob'];
        $_SESSION['emailId'] = $userData['email_add'];
        $_SESSION['clientPass'] = $userData['password'];
        $_SESSION['clientAddress'] = $userData['address'];
    } else {
        echo "Invalid credintials.";
    }
} else {
    echo "Error: " . mysqli_error($connection);
}
