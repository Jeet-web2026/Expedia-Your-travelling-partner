<?php require('../components/essentials.php') ?>
<section id="myAccount-info">
    <div class="container p-5 d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-md-12 login-form" style="width: 40vw;">
                <form action="../operations/login-verify.php" id="login-form-data" method="POST" class="p-5 rounded" style="background-color: #011634f0;">
                    <h4 class="mb-4 fw-semibold fs-2 text-light">Login</h4>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="login-email" class="form-label text-light">Email address</label>
                            <input type="email" class="form-control shadow-none border-0" id="login-email" name="login-email">
                        </div>
                        <div class="mb-3">
                            <label for="pass" class="form-label text-light">Password</label>
                            <input type="password" class="form-control shadow-none border-0" id="pass" name="pass">
                        </div>
                    </div>
                    <div class="login-popup my-3"></div>
                    <button type="submit" class="btn btn-warning web-font fw-semibold mt-4 shadow-none border-0">Submit</button>
                    <h6 class="text-light text-center mt-5">New here? <span class="signup-page">Signup</span> now</h6>
                </form>
            </div>
            <div class="col-md-12 signup-form">
                <form action="../operations/signup-verify.php" id="signup-form-data" method="POST" class="p-5 rounded" style="background-color: #011634f0;">
                    <h4 class="mb-4 fw-semibold fs-2 text-light">Signup</h4>
                    <div class="row">
                        <div class="col-md-6 border-end pe-lg-5">
                            <div class="d-flex justify-content-between">
                                <div class="mb-3 w-100 me-lg-3">
                                    <label for="signup-firstname" class="form-label text-light">First name</label>
                                    <input type="text" class="form-control shadow-none border-0 text-capitalize" id="signup-firstname" name="signup-firstname">
                                </div>
                                <div class="mb-3 w-100">
                                    <label for="signup-lastname" class="form-label text-light">Last name</label>
                                    <input type="text" class="form-control shadow-none border-0" id="signup-lastname" name="signup-lastname">
                                </div>
                            </div>
                            <div class="mb-3 w-100">
                                <label for="signup-mob" class="form-label text-light">Mobile number</label>
                                <input type="number" class="form-control shadow-none border-0" id="signup-mob" name="signup-mob">
                            </div>
                        </div>
                        <div class="col-md-6 ps-lg-5">
                            <div class="mb-3">
                                <label for="signup-email" class="form-label text-light">Email address</label>
                                <input type="email" class="form-control shadow-none border-0" id="signup-email" name="signup-email">
                            </div>
                            <div class="mb-3">
                                <label for="signup-pass" class="form-label text-light">Password</label>
                                <input type="password" class="form-control shadow-none border-0" id="signup-pass" name="signup-pass">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="signup-address" class="form-label text-light">Address</label>
                            <textarea class="form-control shadow-none border-0" id="signup-address" style="height: 100px" name="signup-address"></textarea>
                        </div>
                    </div>
                    <div id="showAlert" class="my-3"></div>
                    <button type="submit" class="btn btn-warning web-font fw-semibold mt-4 shadow-none border-0">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require('../components/essentials-bottom.php') ?>