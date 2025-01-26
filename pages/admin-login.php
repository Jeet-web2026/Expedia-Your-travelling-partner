<?php require('../components/essentials.php') ?>
<section id="myAccount-info">
    <div class="container p-5 d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-md-12 admin-form" style="width: 40vw;">
                <form action="../operations/admin-verify.php" id="admin-form" method="POST" class="p-5 rounded" style="background-color: #011634f0;">
                    <h4 class="mb-4 fw-semibold fs-2 text-light text-capitalize">admin</h4>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="admin-email" class="form-label text-light">Email address</label>
                            <input type="email" class="form-control shadow-none border-0" id="admin-email" name="admin-email">
                        </div>
                        <div class="mb-3">
                            <label for="pass" class="form-label text-light">Password</label>
                            <input type="password" class="form-control shadow-none border-0" id="pass" name="pass">
                        </div>
                    </div>
                    <div class="admin-popup my-3"></div>
                    <button type="submit" class="btn btn-warning web-font fw-semibold mt-4 shadow-none border-0">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require('../components/essentials-bottom.php') ?>