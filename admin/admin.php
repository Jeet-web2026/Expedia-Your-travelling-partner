<?php
session_start();
require('../components/essentials.php');
?>
<section id="admin-view">
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #011634f0;">
        <div class="container-fluid px-5 py-1">
            <a href="">
                <h2 class="text-light text-capitalize"><img src="https://img.freepik.com/free-vector/blue-circle-with-white-user_78370-4707.jpg" alt="admin-profile" class="admin-profile me-3">Expedia</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-5">
                    <li class="nav-item dropdown">
                        <a class="nav-link web-font-2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link web-font-2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-regular fa-bell"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle web-font-2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu mt-4">
                            <li><a class="dropdown-item" href="#">Edit profile</a></li>
                            <li><a class="dropdown-item" href="#">Change password</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid px-0 h-100" style="margin-top: 11vh;">
        <div class="d-flex align-items-start h-100">
            <div class="nav flex-column nav-pills h-100 pt-2" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="background-color: #011634f0;">
                <button class="nav-link active no-radius px-5 text-light font-500" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</button>
                <button class="nav-link no-radius text-light font-500" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Settings</button>
                <button class="nav-link no-radius text-light font-500" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Payments</button>
                <button class="nav-link no-radius text-light font-500" id="v-pills-purchases-tab" data-bs-toggle="pill" data-bs-target="#v-pills-purchases" type="button" role="tab" aria-controls="v-pills-purchases" aria-selected="false">Purchases</button>
                <button class="nav-link no-radius text-light font-500" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">API</button>
            </div>
            <div class="tab-content h-100 w-100" style="background-color: #edcece8c;" id="v-pills-tabContent">
                <div class="tab-pane fade show active h-100" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                    <div class="row h-100 p-4">
                        <div class="col-md-6 pe-3">
                            <div class="card border-0">
                                <div class="card-body">
                                    <h4 class="web-font">Month's planner:</h4>
                                    <div id="piechart" style="width: 100%; height: 100%;"></div>
                                </div>
                            </div>
                            <div class="card border-0 mt-3">
                                <div class="card-body">
                                    <h4 class="web-font mb-3">Verification list:</h4>
                                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="row">
                                                    <div class="col-md-6 pe-3">
                                                        <div class="card shadow">
                                                            <img src="https://img.freepik.com/free-psd/flat-design-renewable-energy-template_23-2149743462.jpg" class="card-img-top" alt="...">
                                                            <div class="card-body">
                                                                <div class="d-flex align-items-center">
                                                                    <a href="#" class="btn web-btn me-3">Approved</a>
                                                                    <a href="#" class="btn btn-outline-danger">Reject</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="card shadow">
                                                            <img src="https://img.freepik.com/free-psd/flat-design-renewable-energy-template_23-2149743462.jpg" class="card-img-top" alt="...">
                                                            <div class="card-body">
                                                                <div class="d-flex align-items-center">
                                                                    <a href="#" class="btn web-btn me-3">Approved</a>
                                                                    <a href="#" class="btn btn-outline-danger">Reject</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="row">
                                                    <div class="col-md-6 pe-3">
                                                        <div class="card shadow">
                                                            <img src="https://img.freepik.com/free-psd/flat-design-renewable-energy-template_23-2149743462.jpg" class="card-img-top" alt="...">
                                                            <div class="card-body">
                                                                <div class="d-flex align-items-center">
                                                                    <a href="#" class="btn web-btn me-3">Approved</a>
                                                                    <a href="#" class="btn btn-outline-danger">Reject</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="card shadow">
                                                            <img src="https://img.freepik.com/free-psd/flat-design-renewable-energy-template_23-2149743462.jpg" class="card-img-top" alt="...">
                                                            <div class="card-body">
                                                                <div class="d-flex align-items-center">
                                                                    <a href="#" class="btn web-btn me-3">Approved</a>
                                                                    <a href="#" class="btn btn-outline-danger">Reject</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="row">
                                                    <div class="col-md-6 pe-3">
                                                        <div class="card shadow">
                                                            <img src="https://img.freepik.com/free-psd/flat-design-renewable-energy-template_23-2149743462.jpg" class="card-img-top" alt="...">
                                                            <div class="card-body">
                                                                <div class="d-flex align-items-center">
                                                                    <a href="#" class="btn web-btn me-3">Approved</a>
                                                                    <a href="#" class="btn btn-outline-danger">Reject</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="card shadow">
                                                            <img src="https://img.freepik.com/free-psd/flat-design-renewable-energy-template_23-2149743462.jpg" class="card-img-top" alt="...">
                                                            <div class="card-body">
                                                                <div class="d-flex align-items-center">
                                                                    <a href="#" class="btn web-btn me-3">Approved</a>
                                                                    <a href="#" class="btn btn-outline-danger">Reject</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0">
                                <h4 class="web-font ps-3 pt-3">All reviews:</h4>
                                <div class="card-body hide-scrollbar" style="height: 82vh; overflow-y: scroll;">
                                    <div class="card mb-2 border-1 shadow">
                                        <h5 class="card-header web-font">Good</h5>
                                        <div class="card-body">
                                            <p class="card-text web-font">This is the best place.</p>
                                            <div class="d-flex">
                                                <a href="#" class="btn web-btn py-1 px-3 mt-2 me-2">Reply</a>
                                                <a href="#" class="btn web-btn py-1 px-3 mt-2">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                    <nav class="navbar navbar-expand-lg bg-light">
                        <div class="container-fluid d-flex justify-content-center align-items-center">
                            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fa-solid fa-screwdriver-wrench"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="nav-settings-items">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a style="cursor: pointer;" class="nav-link text-dark" id="hotel-settings">Hotels</a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="cursor: pointer;" class="nav-link text-dark" id="aeroplanes-settings">Aeroplanes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="cursor: pointer;" class="nav-link text-dark" id="taxis-settings">Taxis</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div id="add-settings">
                        <section id="hotel-details-add">
                            <div class="container-fluid px-5 py-4">
                                <form class="bg-light p-5" id="hotels-detail-upload" method="POST" action="../operations/hotels-details.php">
                                    <div id="hotels-detail-upload-popup"></div>
                                    <div>
                                        <input type="hidden" class="form-control" value="hotels" id="hotelCategory" name="hotelCategory">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pe-3">
                                            <div class="mb-3">
                                                <label for="hotel-picture" class="form-label">Hotel picture</label>
                                                <input type="file" class="form-control shadow-none no-radius" id="hotel-picture" name="hotelPicture">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="hotel-name" class="form-label">Hotel name</label>
                                                <input type="text" class="form-control shadow-none no-radius" id="hotel-name" name="hotelName">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pe-3">
                                            <div class="d-flex align-items-center">
                                                <div class="mb-3 w-50 pe-2">
                                                    <label for="Hotelexperience" class="form-label">Ratings</label>
                                                    <input type="text" class="form-control shadow-none no-radius" id="Hotelexperience" name="Hotelexperience">
                                                </div>
                                                <div class="mb-3 w-50">
                                                    <label for="type_cat" class="form-label">Type Category</label>
                                                    <select id="Hoteltype_cat" class="form-select shadow-none no-radius" name="Hoteltype_cat">
                                                        <option value="">Choose one</option>
                                                        <option value="domestic">Domestic tour</option>
                                                        <option value="international">International tour</option>
                                                        <option value="domestic,international">Domestic & International</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="avail-date" class="form-label">Available date</label>
                                                <div class="d-flex">
                                                    <input type="date" class="form-control shadow-none no-radius" id="avail-date-from" name="availDateFrom">
                                                    <input type="date" class="form-control shadow-none no-radius" id="avail-date-to" name="availDateTo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pe-3">
                                            <div class="mb-3">
                                                <label for="discountrate" class="form-label">Discount (%)</label>
                                                <input type="number" class="form-control shadow-none no-radius" id="discountrate" name="discountRate">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="value" class="form-label">Value</label>
                                                <div class="d-flex">
                                                    <input type="number" class="form-control shadow-none no-radius" id="actualValue" placeholder="Actual price" name="actualRupees">
                                                    <input type="number" class="form-control shadow-none no-radius" id="value" placeholder="Discounted price" name="rupees">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="hotelAvailableCity" class="form-label">Available city</label>
                                                <div>
                                                    <input type="text" class="form-control shadow-none no-radius" id="hotelAvailableCity" placeholder="Available city" name="hotelAvailableCity">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success no-radius px-3 py-1">Submit</button>
                                </form>
                            </div>
                        </section>
                        <section id="aeroplanes-details-add">
                            <div class="container-fluid px-5 py-4">
                                <form class="bg-light p-5" id="aeroplanes-detail-upload" method="POST" action="../operations/aeroplanes-details.php">
                                    <div id="aeroplanes-detail-upload-popup"></div>
                                    <div>
                                        <input type="hidden" class="form-control" id="aeroplanes-category" value="aeroplane" name="aeroplanesCategory">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pe-3">
                                            <div class="mb-3">
                                                <label for="aeroplanes-picture" class="form-label">Aeroplane picture</label>
                                                <input type="file" class="form-control shadow-none no-radius" id="aeroplanes-picture" name="aeroplanesPicture">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="aeroplanes-name" class="form-label">Service company</label>
                                                <input type="text" class="form-control shadow-none no-radius" id="aeroplanes-name" name="aeroplanesName">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pe-3">
                                            <div class="d-flex align-items-center">
                                                <div class="mb-3 w-50 pe-2">
                                                    <label for="experience" class="form-label">Ratings</label>
                                                    <input type="text" class="form-control shadow-none no-radius" id="experience" name="experienceValue">
                                                </div>
                                                <div class="mb-3 w-50">
                                                    <label for="type_cat" class="form-label">Type Category</label>
                                                    <select id="type_cat" class="form-select shadow-none no-radius" name="type_cat">
                                                        <option value="">Choose one</option>
                                                        <option value="domestic">Domestic tour</option>
                                                        <option value="international">International tour</option>
                                                        <option value="domestic,international">Domestic & International</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="aeroavail-date" class="form-label">Available date</label>
                                                <div class="d-flex">
                                                    <input type="date" class="form-control shadow-none no-radius" id="aeroavail-date-from" name="aeroavailDateFrom">
                                                    <input type="date" class="form-control shadow-none no-radius" id="aeroavail-date-to" name="aeroavailDateTo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pe-3">
                                            <div class="mb-3">
                                                <label for="aerodiscountrate" class="form-label">Discount (%)</label>
                                                <input type="number" class="form-control shadow-none no-radius" id="aerodiscountrate" name="aerodiscountRate">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="aerovalue" class="form-label">Value</label>
                                                <div class="d-flex">
                                                    <input type="number" class="form-control shadow-none no-radius" id="aeroactualValue" placeholder="Actual price" name="aeroactualRupees">
                                                    <input type="number" class="form-control shadow-none no-radius" id="aerovalue" placeholder="Discounted price" name="aerorupees">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pe-3">
                                            <div class="mb-3">
                                                <label for="location_from" class="form-label">Location from</label>
                                                <input type="text" class="form-control shadow-none no-radius" id="location_from" name="location_from">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="location_to" class="form-label">Location to</label>
                                                <input type="text" class="form-control shadow-none no-radius" id="location_to" name="location_to">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success no-radius px-3 py-1">Submit</button>
                                </form>
                            </div>
                        </section>
                        <section id="taxis-details-add">
                            <div class="container-fluid px-5 py-4">
                                <form class="bg-light p-5" id="taxi-detail-upload" method="POST" action="../operations/taxi-details.php">
                                    <div id="taxi-detail-upload-popup"></div>
                                    <div>
                                        <input type="hidden" class="form-control" id="taxiCategory" name="taxiCategory" value="travels">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pe-3">
                                            <div class="mb-3">
                                                <label for="taxi-picture" class="form-label">Taxi picture</label>
                                                <input type="file" class="form-control shadow-none no-radius" id="taxi-picture" name="taxiPicture">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="service-company-name" class="form-label">Taxi service comapny</label>
                                                <input type="text" class="form-control shadow-none no-radius" id="service-company-name" name="serviceCompanyname">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pe-3">
                                            <div class="d-flex align-items-center">
                                                <div class="mb-3 w-50 pe-2">
                                                    <label for="taxiexperience" class="form-label">Ratings</label>
                                                    <input type="text" class="form-control shadow-none no-radius" id="taxiexperience" name="taxiexperience">
                                                </div>
                                                <div class="mb-3 w-50">
                                                    <label for="Taxitype_cat" class="form-label">Type Category</label>
                                                    <select id="Taxitype_cat" class="form-select shadow-none no-radius" name="Taxitype_cat">
                                                        <option value="">Choose one</option>
                                                        <option value="domestic">Domestic tour</option>
                                                        <option value="international">International tour</option>
                                                        <option value="domestic,international">Domestic & International</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="taxiavail-date" class="form-label">Available date</label>
                                                <div class="d-flex">
                                                    <input type="date" class="form-control shadow-none no-radius" id="taxiavail-datefrom" name="taxiavail-datefrom">
                                                    <input type="date" class="form-control shadow-none no-radius" id="taxiavail-date-to" name="taxiavail-dateTo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pe-3">
                                            <div class="mb-3">
                                                <label for="taxidiscountrate" class="form-label">Discount (%)</label>
                                                <input type="number" class="form-control shadow-none no-radius" id="taxidiscountrate" name="taxidiscountrate">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="taxiValue" class="form-label">Value</label>
                                                <dv class="d-flex">
                                                    <input type="number" class="form-control shadow-none no-radius" id="taxiactualValue" placeholder="Actual price" name="taxiactualRupees">
                                                    <input type="number" class="form-control shadow-none no-radius" id="taxiValue" placeholder="Discounted price" name="taxirupees">
                                                </dv>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pe-3">
                                            <div class="mb-3">
                                                <label for="taxilocation_from" class="form-label">location from</label>
                                                <input type="text" class="form-control shadow-none no-radius" id="taxilocation_from" name="taxilocation_from">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="taxilocation_to" class="form-label">location to</label>
                                                <input type="text" class="form-control shadow-none no-radius" id="taxilocation_to" name="taxilocation_to">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success no-radius px-3 py-1">Submit</button>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0"></div>
                <div class="tab-pane fade" id="v-pills-purchases" role="tabpanel" aria-labelledby="v-pills-purchases-tab" tabindex="0"></div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0"></div>
            </div>
        </div>
    </div>
</section>
<?php
require('../components/essentials-bottom.php');
?>