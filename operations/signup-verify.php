<?php
session_start();
require('../configaration/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['signup-firstname']) && !empty($_POST['signup-lastname']) && !empty($_POST['signup-mob']) && !empty($_POST['signup-email']) && !empty($_POST['signup-pass']) && !empty($_POST['signup-address'])) {

        $clientFirstname = htmlspecialchars(trim($_POST['signup-firstname']));
        $clientLastname = htmlspecialchars(trim($_POST['signup-lastname']));
        $clientMobile = htmlspecialchars(trim($_POST['signup-mob']));
        $clientEmail = htmlspecialchars(trim($_POST['signup-email']));
        $clientPassword = htmlspecialchars(trim($_POST['signup-pass']));
        $clientAddress = htmlspecialchars(trim($_POST['signup-address']));

        $query = "INSERT INTO `client-signup` (`first_name`, `last_name`, `mob`, `email_add`, `password`, `address`) VALUES ('$clientFirstname', '$clientLastname', '$clientMobile', '$clientEmail', '$clientPassword', '$clientAddress')";
        $success = mysqli_query($connection, $query);
        
        if ($success) {
            $insertedId = mysqli_insert_id($connection);
            $_SESSION['clientSignupid'] = $insertedId;
        } else {
            echo "Failed to insert data.";
        }
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Request not authorised.";
}
