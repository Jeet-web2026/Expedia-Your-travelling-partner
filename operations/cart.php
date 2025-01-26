<?php
session_start();
require('../components/essentials.php');
require('../components/header.php');
require('../configaration/config.php');

echo '<section id="order-details" class="p-5">';
echo '<div class="container-fluid p-5">';
echo '<div class="row">';

if (isset($_SESSION['clientTableno']) && !empty($_SESSION['clientTableno'])) {
    $fetch_customer_id = $_SESSION['clientTableno'];
    $fetch_customer_data_sqlQuery = "SELECT * FROM `client_cart` WHERE `login_id` = $fetch_customer_id";

    global $connection;
    $run_query = mysqli_query($connection, $fetch_customer_data_sqlQuery);

    if ($run_query && mysqli_num_rows($run_query) > 0) {
        while ($view_Dta = mysqli_fetch_assoc($run_query)) {
            $_SESSION['finalOrderPrice'] = $view_Dta['price'];
            echo '
            <div class="card mb-3 border-0 shadow rounded-4 overflow-hidden">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="https://img.freepik.com/free-photo/umbrella-chair_74190-3726.jpg?uid=R126305893&ga=GA1.1.1378415623.1732413357&semt=ais_hybrid" class="img-fluid rounded-start" alt="' . htmlspecialchars(trim($view_Dta['companyname'])) . '">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title web-font text-capitalize yatra-one-regular">' . htmlspecialchars(trim($view_Dta['companyname'])) . '</h5>
                            <div class="d-flex aign-items-center mb-2">
                                <div class="me-3">
                                    <h6>Departs date:</h6>
                                    <h6 class="mt-2">Return date:</h6>
                                </div>
                                <div class="me-5">
                                    <h6 class="badge bg-secondary no-radius">' . htmlspecialchars(trim($view_Dta['availablefrom'])) . '</h6><br>
                                    <h6 class="badge bg-secondary no-radius">' . htmlspecialchars(trim($view_Dta['availableto'])) . '</h6>
                                </div>
                                 <div class="me-3">
                                    <h6>Adults:</h6>
                                    <h6 class="mt-2">Children:</h6>
                                </div>
                                <div>
                                    <h6 class="badge bg-secondary no-radius">' . htmlspecialchars(trim($view_Dta['adult_count'])) . '</h6><br>
                                    <h6 class="badge bg-secondary no-radius">' . htmlspecialchars(trim($view_Dta['chldren_count'])) . '</h6>
                                </div>
                            </div>
                            <div class="d-flex aign-items-center my-2">
                                <div class="me-3">
                                    <h6 class="mt-1">Tour:</h6>
                                </div>
                                <div class="me-5 d-flex aign-items-center">
                                    <h6 class="badge bg-secondary no-radius text-capitalize" style="font-size: 2.3vh;">' . htmlspecialchars(trim($view_Dta['start_from'])) . '</h6>
                                    <h6 class="mx-2 mt-1">to</h6>
                                    <h6 class="badge bg-secondary no-radius text-capitalize" style="font-size: 2.3vh;">' . htmlspecialchars(trim($view_Dta['start_to'])) . '</h6>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-4">
                                <a id="rzp-button1" href="javascript:void(0)" class="btn border-0 shadow web-btn me-2 payment-now">Pay now</a>
                                <a href="" class="btn border-0 shadow web-btn">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            
            ';
        }
    }else{
        echo '
        
         <center>
            <h2 class="text-light fw-bold fs-2 mt-5 mb-4">Ohh! your carts is empty.</h2>
            <a href="/Expedia-Your-travelling-partner/" class="web-btn px-3 py-2 fs-5 fw-bold rounded shadow">Home</a>
        </center>
        
        ';
    }
} else {
    echo '
    <center>
        <h2 class="text-light fw-bold fs-2 mt-5 mb-4">You are now login right now!</h2>
        <div class="d-flex align-items-center justify-content-center">
            <a href="/Expedia-Your-travelling-partner/pages/my-account.php" class="web-btn px-3 py-2 fs-5 fw-bold rounded shadow me-3">Login</a>
            <a href="/Expedia-Your-travelling-partner/" class="web-btn px-3 py-2 fs-5 fw-bold rounded shadow">Home</a>
        </div>
    </center>
    ';
}

echo '</div>';
echo '</div>';
echo '</section>';

require('../components/footer.php');
