<?php
session_start();
require('./components/essentials.php');
require('./components/header.php');
require('./operations/fetch-operation.php');
$Viewdata = fetchData();
?>
<main id="main">
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="card shadow body-search" style="border-radius: 10px 10px 0px 0px;">
            <div class="card-body p-4">
                <form id="main-search-form" action="search-results.php" method="POST">
                    <div class="row align-items-center">
                        <div class="col-md-6 pe-3">
                            <div class="card border-0 bg-transparent">
                                <div class="card-body d-flex justify-content-between px-0 chooseOptions">
                                    <button id="aeroplane" type="button" name="airplane-btn" class="btn btn-light px-4 py-2 border-0 shadow-none"><i class="bi bi-airplane fs-4" style="color: #011634f0;"></i></button>
                                    <button id="hotels" type="button" class="btn btn-light px-4 py-2 border-0 shadow-none"><i class="bi bi-building fs-4" style="color: #011634f0;"></i></button>
                                    <button id="travels" type="button" class="btn btn-light px-4 py-2 border-0 shadow-none"><i class="bi bi-taxi-front fs-4" style="color: #011634f0;"></i></button>
                                    <select class="form-select w-50 border-0 shadow-none" id="querySearchtour-type" name="querySearchtour-type">
                                        <option value="">Roundtrip</option>
                                        <option value="domestic">Domestic tour</option>
                                        <option value="international">International tour</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                            <i class="fa-solid fa-check text-light fs-2 fw-bold me-2"></i>
                            <div>
                                <h4 class="text-uppercase text-light">best price</h4>
                                <h5 class="text-uppercase text-light text-opacity-50">guarantee</h5>
                            </div>
                        </div>
                        <div class="col-md-6 pe-3">
                            <div class="mb-3">
                                <label for="querysearchFrom" class="form-label text-light">From</label>
                                <input type="text" class="form-control border-0 shadow-none py-2" id="querysearchFrom" name="querysearchFrom" placeholder="Your home address">
                                <input type="hidden" id="search-category" name="search-category">
                            </div>
                        </div>
                        <div class="col-md-6 ps-3">
                            <div class="mb-3">
                                <label for="to" class="form-label text-light">To</label>
                                <input type="text" class="form-control border-0 shadow-none py-2" id="querysearchTo" name="querysearchTo" placeholder="e.g. Russia, Japan">
                            </div>
                        </div>
                        <div class="col-md-6 pe-3">
                            <div class="row">
                                <div class="col-md-6 pe-3">
                                    <div class="mb-3">
                                        <label for="querysearchDeparts" class="form-label text-light">Departs</label>
                                        <input type="date" class="form-control border-0 shadow-none py-2" id="querysearchDeparts" name="querysearchDeparts" placeholder="Your home address">
                                    </div>
                                </div>
                                <div class="col-md-6 ps-3">
                                    <div class="mb-3">
                                        <label for="querysearchReturning" class="form-label text-light">Returning</label>
                                        <input type="date" class="form-control border-0 shadow-none py-2" id="querysearchReturning" name="querysearchReturning" placeholder="Your home address">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ps-3">
                            <div class="row">
                                <div class="col-md-6 pe-3">
                                    <div class="mb-3">
                                        <label for="querysearchAdultscount" class="form-label text-light">Adults(18+)</label>
                                        <select class="form-select shadow-none border-0 py-2" id="querysearchAdultscount" name="querysearchAdultscount">
                                            <option value="">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 ps-3">
                                    <div class="mb-3">
                                        <label for="querysearchChildrencount" class="form-label text-light">Children(0-17)</label>
                                        <select class="form-select shadow-none border-0 py-2" id="querysearchChildrencount" name="querysearchChildrencount">
                                            <option value="">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn px-5 bg-warning fw-bold text-uppercase py-2" style="color: #011634f0;">Search</button>
                                <a href="" type="button" class="btn text-light border-0 shadow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                    Advanced options
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<section id="description">
    <div class="container-fluid px-5 d-flex justify-content-center align-items-center mb-5">
        <div class="px-3 w-100">
            <div class="card no-radius border-0 shadow w-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-check web-font fs-3 fw-bold me-2"></i>
                        <div>
                            <p class="web-font">Search over <b>435000 hotels</b> and <br><b>400 airlines</b> worldwide.</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-check web-font fs-3 fw-bold me-2"></i>
                        <div>
                            <p class="web-font">Secure incredible value with Expedia's <br><b>best price Guarantee.</b></p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-check web-font fs-3 fw-bold me-2"></i>
                        <div>
                            <p class="web-font"><b>No Expedia cancellation fee</b> to change or <br>cancel almost any hotel reservation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="hotel-demos">
    <div class="container-fluid pb-2 px-5">
        <h6 class="text-uppercase fw-bold web-font ps-3">today's top deals</h6>
        <div class="row multiple-items">
            <?php
            $viewContent = mysqli_fetch_all($Viewdata, MYSQLI_ASSOC);

            foreach ($viewContent as $view) {
                $dateFrom = $view["availabledate_from"];
                $dateTo = $view["availabledate_to"];
                $formattedDateFrom = date("j M Y", strtotime($dateFrom));
                $_SESSION['HotelformattedDateTo'] = date("j M Y", strtotime($dateTo));
                echo '
                <div class="col px-3 py-4">
                    <div class="card shadow border-0">
                        <img src="https://img.freepik.com/free-photo/umbrella-chair_74190-3726.jpg?uid=R126305893&ga=GA1.1.1378415623.1732413357&semt=ais_hybrid" 
                            class="card-img-top" alt="paris-hotels-view">
                        <div class="card-body pb-0">
                         <input type="hidden" id="contentHotelId" value="' . htmlspecialchars($view["id"]) . '">
                            <h6 class="card-text text-capitalize fs-5">' . htmlspecialchars($view["hotel_name"]) . '</h6>
                            <div class="d-flex justify-content-start align-items-center my-2">
                                <i class="fa-solid fa-star web-font-2"></i>
                                <i class="fa-solid fa-star web-font-2"></i>
                                <i class="fa-solid fa-star web-font-2"></i>
                                <i class="fa-solid fa-star web-font-2"></i>
                                <i class="fa-solid fa-star web-font-2"></i>
                            </div>
                            <p class="text-secondary">Guest rating ' . htmlspecialchars($view["hotels_rating"]) . ' out of 5</p>
                            <hr>
                            <p class="text-capitalize web-font">
                ' . htmlspecialchars($formattedDateFrom) . ' - ' . htmlspecialchars($_SESSION['HotelformattedDateTo']) . '
                </p>

                            <p class="text-danger text-capitalize mb-3">Special deal: save ' . htmlspecialchars($view["hotel_rate"]) . '%</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="py-2 px-3" style="background-color: #ffc107;">
                                    <p class="web-font">From</p>
                                    <p class="web-font fs-3 fw-bold">$' . htmlspecialchars($view["hotel_price"]) . '</p>
                                    <p class="text-end text-decoration-line-through web-font">$ ' . htmlspecialchars($view["hotels_actual_price"]) . '</p>
                                </div>
                                <div>
                                    <a href="" class="btn shadow-none border-0 web-font fs-5 fw-bold text-uppercase hotel-book">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 ';
            }
            ?>
        </div>
    </div>
</section>
<section id="email-subscription" style="background-color: #011634f0; color: #fff;" class="shadow">
    <div class="container-fluid p-5">
        <div class="row px-3">
            <div class="col-md-7">
                <div class="d-flex justify-content-start">
                    <div>
                        <h3 class="fs-2 fw-bold">25% off your first hotel booking with your private coupon code</h3>
                        <p class="mt-5">Send a link to your phone for the <b>Discount Coupon.</b></p>
                        <form action="" method="post" class="d-flex align-items-center justify-content-start mt-2">
                            <i class="fa-solid fa-envelope-open-text px-3 py-2 fs-5 bg-white text-dark rounded-start"></i>
                            <input type="email" class="form-control no-radius border-0 shadow-none w-50" id="email-subcription" placeholder="example@gmail.com">
                            <button type="submit" class="btn shadow-none border-0 rounded-end no-radius fw-bold" style="background-color: #ffc107;">Send code</button>
                        </form>
                        <p class="mt-5">Discount available for</p>
                        <p><i class="fa-solid fa-ticket me-2"></i>First time booking</p>
                        <p><i class="fa-solid fa-credit-card me-2"></i>Extra 10% discount on card payment</p>
                        <p class="mt-5 text-secondary">By redeeming Expedia's 25% discount coupon, you agree it is valid for single use, applies only to the base booking amount (excluding taxes/fees), and cannot be combined with other offers or used for group bookings. The coupon is non-transferable and valid only within the promotional period. Feel free to contact <b>contact@expedia.com</b>.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 d-flex align-items-center justify-content-end">
                <img src="images/email-subcription.png" alt="email-subscription" class="img-fluid">
            </div>
        </div>
    </div>
</section>
<?php
require('./components/footer.php');
?>