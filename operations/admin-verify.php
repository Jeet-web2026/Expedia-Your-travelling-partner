<?php
session_start();
require('../configaration/config.php');
$email = $_POST['admin-email'];
$pass = $_POST['pass'];
$checkDetails = "SELECT * FROM `admin` WHERE email = '$email' AND password = '$pass'";
$runQuery = mysqli_query($connection, $checkDetails);
if ($runQuery) {
    if (mysqli_num_rows($runQuery) == 1) {
        $userData = mysqli_fetch_assoc($runQuery);
        echo "Welcome! <span class='text-capitalize'>" . $userData['first_name'] . "</span> You are successfully logged in!";
        $_SESSION['adminTableno'] = $userData['id'];
        $_SESSION['adminName'] = $userData['first_name'];
        $_SESSION['adminTittle'] = $userData['last_name'];
        $_SESSION['adminEmailId'] = $userData['email'];
    } else {
        echo "Invalid credintials.";
    }
} else {
    echo "Error: " . mysqli_error($connection);
}
$connection->close();
?>
