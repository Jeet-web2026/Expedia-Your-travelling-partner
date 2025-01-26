<?php
session_start();
require('./components/essentials.php');
require('./components/header.php');
require('./operations/action-search.php');

$insertDataForQuery = new SearchData($_SESSION['search_category'], $_SESSION['trip_category'], $_SESSION['trip_to']);
$insertDataForQuery->searchData();
echo '<section id="searching-results" class="pt-5">';
echo '<div class="container-fluid p-5 d-flex justify-content-center align-items-center">';
echo '<div class="row">';
echo '<h2 class="text-center text-light yatra-one-regular my-4"><i class="fa-solid fa-magnifying-glass me-2"></i>Search results based on your queries</h2>';
if (isset($_SESSION['resultofQuerySearch']) && !empty($_SESSION['resultofQuerySearch'])) {
    foreach ($_SESSION['resultofQuerySearch'] as $viewQueryR) {
        if (!empty($viewQueryR['id']) && !empty($viewQueryR['table_source'])) {
            $fetchSearchIDQueryResulttoView = (int) $viewQueryR['id'];
            $tableSource = $connection->real_escape_string($viewQueryR['table_source']);

            $fetchSearchQueryResulttoView = "SELECT * FROM `$tableSource` WHERE `id` = $fetchSearchIDQueryResulttoView";
            $fetchResultQueryforResult = mysqli_query($connection, $fetchSearchQueryResulttoView);
            if ($fetchResultQueryforResult && mysqli_num_rows($fetchResultQueryforResult) > 0) {
                foreach ($fetchResultQueryforResult as $fetchResultQueryforView) {
                    echo '
                    <div class="col-md-6 px-3 py-2">
                        <div class="card mb-4 border-0 shadow rounded-4 overflow-hidden bg-white">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="https://img.freepik.com/free-photo/umbrella-chair_74190-3726.jpg?uid=R126305893&ga=GA1.1.1378415623.1732413357&semt=ais_hybrid" class="img-fluid" alt="';
                    if (!empty($fetchResultQueryforView['servicecompany'])) {
                        echo htmlspecialchars($fetchResultQueryforView['servicecompany']);
                    } elseif (!empty($fetchResultQueryforView['hotel_name'])) {
                        echo htmlspecialchars($fetchResultQueryforView['hotel_name']);
                    }
                    echo '">
                                </div>
                                <div class="col-md-8">
                                <div class="card-body pb-0">
                                    <h5 class="card-title text-capitalize yatra-one-regular mb-3" style="font-size: 4vh; color: #011634f0;">
                                    ';
                    if (!empty($fetchResultQueryforView['servicecompany'])) {
                        echo htmlspecialchars($fetchResultQueryforView['servicecompany']);
                    } elseif (!empty($fetchResultQueryforView['hotel_name'])) {
                        echo htmlspecialchars($fetchResultQueryforView['hotel_name']);
                    }
                    echo '
                                    </h5>
                                    <p class="card-text text-black fon-500">
                                    ';
                    if (!empty($fetchResultQueryforView['ratings'])) {
                        echo htmlspecialchars($fetchResultQueryforView['ratings']);
                    } elseif (!empty($fetchResultQueryforView['hotels_rating'])) {
                        echo htmlspecialchars($fetchResultQueryforView['hotels_rating']);
                    }
                    echo ' out of 5
                                    </p>
                                    <p class="card-text text-black fon-500">Available :
                                    ';
                    if (!empty($fetchResultQueryforView['availfrom'])) {
                        $searchForFormat = $fetchResultQueryforView['availfrom'];
                        $searchFormatteddate = date("j M Y", strtotime($searchForFormat));
                        echo htmlspecialchars($searchFormatteddate);
                    } elseif (!empty($fetchResultQueryforView['availabledate_from'])) {
                        $searchForFormat = $fetchResultQueryforView['availabledate_from'];
                        $searchFormatteddate = date("j M Y", strtotime($searchForFormat));
                        echo htmlspecialchars($searchFormatteddate);
                    }
                    echo ' 
                        to 
                        ';
                    if (!empty($fetchResultQueryforView['availto'])) {
                        $searchForFormat = $fetchResultQueryforView['availto'];
                        $searchFormatteddate = date("j M Y", strtotime($searchForFormat));
                        echo htmlspecialchars($searchFormatteddate);
                    } elseif (!empty($fetchResultQueryforView['availabledate_to'])) {
                        $searchForFormat = $fetchResultQueryforView['availabledate_to'];
                        $searchFormatteddate = date("j M Y", strtotime($searchForFormat));
                        echo htmlspecialchars($searchFormatteddate);
                    }
                    echo ' 
                                    </p>
                                    <p class="card-text text-black fon-500">Upto 
                                    ';
                    if (!empty($fetchResultQueryforView['discount'])) {
                        echo htmlspecialchars($fetchResultQueryforView['discount']);
                    } elseif (!empty($fetchResultQueryforView['hotel_rate'])) {
                        echo htmlspecialchars($fetchResultQueryforView['hotel_rate']);
                    }
                    echo ' % of
                                    </p>
                                    <p class="card-text text-black fon-500">Price :  
                                    ';
                    if (!empty($fetchResultQueryforView['dprice'])) {
                        echo htmlspecialchars($fetchResultQueryforView['dprice']);
                    } elseif (!empty($fetchResultQueryforView['hotels_actual_price'])) {
                        echo htmlspecialchars($fetchResultQueryforView['hotels_actual_price']);
                    }
                    echo '
                                    </p>
                                     <a href="/Expedia-Your-travelling-partner/operations/booking-confirmation.php?id=' . htmlspecialchars(trim($fetchResultQueryforView['id'])) . '&db=' . htmlspecialchars(trim($tableSource)) . '" type="submit" class="btn web-btn click-to-fetch border-0 px-3 font-500">Book now</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                }
            } else {
                echo "Failed to fetch results from $tableSource.";
            }
        } else {
            echo "ID or table source not found.";
        }
    }
} else {
    echo '<p class="text-center fw-bold text-light fs-2 my-5">Oops! No results found.</p>';
}
echo '</div>';
echo '</div>';
echo '</section>';

?>
<?php require('./components/footer.php'); ?>