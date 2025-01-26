<?php
session_start();
require('../configaration/config.php');
require('../components/essentials.php');
require('../components/header.php');

$bookingId = $_GET['id'];

if (!isset($_SESSION['booking_inserted']) || $_SESSION['booking_inserted'] !== $bookingId) {
    function fetchBookingdata()
    {
        global $connection;
        global $bookingId;
        $fetchDataview = "SELECT * FROM `hotels-details` WHERE id = '$bookingId'";
        $runDataQuery = mysqli_query($connection, $fetchDataview);
        return $runDataQuery;
    }

    $runDataQuery = fetchBookingdata();

    if ($runDataQuery) {
        foreach ($runDataQuery as $fetchQuery) {
            $_SESSION['clientHotelname'] = htmlspecialchars(trim($fetchQuery['hotel_name']));
            $_SESSION['clientHotelRating'] = htmlspecialchars(trim($fetchQuery['hotels_rating']));
            $_SESSION['hotelAvailabilityFrom'] = htmlspecialchars(trim($fetchQuery['availabledate_from']));
            $_SESSION['hotelAvailabilityTo'] = htmlspecialchars(trim($fetchQuery['availabledate_to']));
            $_SESSION['clientHotelDiscountRate'] = htmlspecialchars(trim($fetchQuery['hotel_rate']));
            $_SESSION['clientHotelPrice'] = htmlspecialchars(trim($fetchQuery['hotel_price']));
            $_SESSION['clientHotelActualPrice'] = htmlspecialchars(trim($fetchQuery['hotels_actual_price']));

            if (isset($_SESSION['clientTableno'])) {
                $cust_id = $_SESSION['clientTableno'];
            } else {
                die("Session variable `clientTableno` is not set.");
            }

            $clienthotel_name = $_SESSION['clientHotelname'];
            $hotel_rating = $_SESSION['clientHotelRating'];
            $hotelavl_from = $_SESSION['hotelAvailabilityFrom'];
            $hotelavl_to = $_SESSION['hotelAvailabilityTo'];
            $hotel_discount = $_SESSION['clientHotelDiscountRate'];
            $hotel_price = $_SESSION['clientHotelPrice'];
            $hotel_actualprice = $_SESSION['clientHotelActualPrice'];
        }
    } else {
        die("No data found!");
    }
    if (!empty($clienthotel_name)) {
        $insertQuery = "INSERT INTO `client_cart`(`Cust_id`, `hotel_name`, `hotel_rating`, `hotelavl_from`, `hotelavl_to`, `hotel_discount`, `hotel_price`, `hotel_actualprice`) VALUES ('$cust_id','$clienthotel_name','$hotel_rating','$hotelavl_from','$hotelavl_to','$hotel_discount','$hotel_price','$hotel_actualprice')";
        $accessQuery = mysqli_query($connection, $insertQuery);
        

        if ($accessQuery) {
            $_SESSION['booking_inserted'] = $bookingId;
        } else {
            echo "Data not inserted";
        }
    }
} else {
    echo "no";
}

function fetchCartData()
{
    global $connection;
    $fetchSqlQuery = "SELECT * FROM `client_cart`";
    $fetchQueryData = mysqli_query($connection, $fetchSqlQuery);
    return $fetchQueryData;
}
$fetchClientCartData = fetchCartData();

echo '<div class="container p-5 mt-5">';
foreach ($fetchClientCartData as $fetchClientCart) {
    echo '
        <div class="card mb-5 rounded-4 shadow">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://img.freepik.com/free-photo/umbrella-chair_74190-3726.jpg" class="img-fluid rounded-start" alt="' . htmlspecialchars($fetchClientCart['hotel_name']) . '">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">' . htmlspecialchars($fetchClientCart['hotel_name']) . '</h5>
                        <div class="d-flex align-items-center mb-2">
                            <p class="card-text text-capitalize pe-3">Rating : ' . htmlspecialchars($fetchClientCart['hotel_rating']) . '</p>
                            <p class="card-text text-capitalize">Discount : ' . htmlspecialchars($fetchClientCart['hotel_discount']) . ' %</p>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <p class="card-text text-capitalize pe-3">available from : ' . htmlspecialchars($fetchClientCart['hotelavl_from']) . '</p>
                            <p class="card-text text-capitalize">available to : ' . htmlspecialchars($fetchClientCart['hotelavl_to']) . '</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="card-text text-capitalize pe-3">discounted price : ' . htmlspecialchars($fetchClientCart['hotel_price']) . '</p>
                            <p class="card-text text-capitalize text-decoration-line-through">actual price : ' . htmlspecialchars($fetchClientCart['hotel_actualprice']) . '</p>
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <button type="button" class="btn web-btn no-radius me-2">Pay now</button>
                            <button type="button" class="btn btn-outline-dark no-radius">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';
}
echo '</div>';

?>
<?php require('../components/footer.php'); ?>
