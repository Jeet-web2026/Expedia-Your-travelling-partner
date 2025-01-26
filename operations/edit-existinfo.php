<?php
require('../configaration/config.php');
session_start();
$clientId = htmlspecialchars(trim($_POST['cltId']));
$clientName = htmlspecialchars(trim($_POST['disabledName']));
$clientTittle = htmlspecialchars(trim($_POST['disabledtittle']));
$clientMob = htmlspecialchars(trim($_POST['disabledmob']));
$clientEmail = htmlspecialchars(trim($_POST['disabledemail']));
$clientPassword = htmlspecialchars(trim($_POST['inputPassword6']));
$clientAddress = htmlspecialchars(trim($_POST['disabledaddress']));
if ($_SESSION['clientName'] !== $clientName || $_SESSION['clientTittle'] !== $clientTittle || $_SESSION['mobileNo'] !== $clientMob || $_SESSION['emailId'] !== $clientEmail || $_SESSION['clientPass'] !== $clientPassword || $_SESSION['clientAddress'] !== $clientAddress || $_SESSION['clientTableno'] !== $clientId) {
    $editQuery = "UPDATE `client-signup` SET `first_name`='$clientName',`last_name`='$clientTittle',`mob`='$clientMob',`email_add`='$clientEmail',`password`='$clientPassword',`address`='$clientAddress' WHERE `id`='$clientId'";
    $runQuery = mysqli_query($connection, $editQuery);
    if ($runQuery) {
        if (session_status() === PHP_SESSION_ACTIVE && !empty($_SESSION)) {
            session_unset();
            if (session_destroy()) {
                echo "Data updated successfully";
            } else {
                echo "Data not updated";
            }
        }
    }
} else {
    echo "Please check all the details & confirm again";
}
exit;
$connection->close();
?>
