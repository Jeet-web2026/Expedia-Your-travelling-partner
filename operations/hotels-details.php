<?php
session_start();
require('../configaration/config.php');

$category = htmlspecialchars(trim($_POST['hotelCategory']));
$hotelPlace = htmlspecialchars(trim($_POST['hotelAvailableCity']));
$hotelTypeCat = htmlspecialchars(trim($_POST['Hoteltype_cat']));
$hotelName = htmlspecialchars(trim($_POST['hotelName']));
$hotelRValue = htmlspecialchars(trim($_POST['Hotelexperience']));
$hotelDateFrom = htmlspecialchars(trim($_POST['availDateFrom']));
$hotelDateTo = htmlspecialchars(trim($_POST['availDateTo']));
$hotelRate = htmlspecialchars(trim($_POST['discountRate']));
$hotelRupees = htmlspecialchars(trim($_POST['rupees']));
$hotelActualRupees = htmlspecialchars(trim($_POST['actualRupees']));
$sessionId = htmlspecialchars(trim($_SESSION['adminTableno']));

$sqlQuery = "INSERT INTO `hotels-details`(`session_id`, `place`, `trip_cat`, `category`, `hotel_name`, `hotels_rating`, `availabledate_from`, `availabledate_to`, `hotel_rate`, `hotel_price`, `hotels_actual_price`, `hotel_img`) VALUES ('$sessionId','$hotelPlace','$hotelTypeCat','$category','$hotelName','$hotelRValue','$hotelDateFrom','$hotelDateTo','$hotelRate','$hotelRupees','$hotelActualRupees','0')";
$runQuery = mysqli_query($connection, $sqlQuery);

if ($runQuery) {
    echo "Data inserted successfully!";
} else {
    echo "Failed to insert!";
}
