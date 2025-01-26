<!-- jqury cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- razorpay cdn -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<!-- slick js cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- google loader js cdn -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- bootstrap js cdn -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


<script>
    $(document).ready(function() {
        $('#submit-region').on('click', function() {
            let Inputvalue = $('#choosen-text').val();
            $('.region-text').text(Inputvalue);
        });

        $('.multiple-items').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 2,
            arrows: true,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        $('.multiple-items').find('button').addClass('shadow rounded-circle');

        $(window).scroll(function() {
            let scroll = $(window).scrollTop();
            if (scroll > 1) {
                $('.navbar').addClass('bg-black');
            } else {
                $('.navbar').removeClass('bg-black');
            }
        });
        $('#show-footer-content').on('click', function() {
            let Plus = $(this).find('.fa-solid');
            Plus.toggleClass('fa-plus fa-minus');
            $('#footer').find('a.display').toggleClass('display-none');
        });

        $('#footer a').on('mouseenter', function() {
            $(this).removeClass('text-black') && $(this).addClass('web-font-2 transition');
        }).mouseleave(function() {
            $(this).addClass('text-black') && $(this).removeClass('web-font-2 transition');
        });

        $('.chooseOptions .btn').on('click', function() {
            $(this).css({
                'background-color': '#ffc107',
            }).siblings().css({
                'background-color': '#fff',
            });

            let travelInfo = $(this).attr('id');
            $('#search-category').val(travelInfo);

        });

        $('#myAccount-info .login-form').siblings().hide();
        $('#myAccount-info .login-form .signup-page').css({
            'cursor': 'pointer'
        });
        $('#myAccount-info .login-form .signup-page').on('click', function() {
            $('#myAccount-info .signup-form').siblings().hide();
            $('#myAccount-info .signup-form').fadeIn();
        });

        $('#myAccount-info #login-form-data').on('submit', function(event) {
            event.preventDefault();
            if ($('#login-email').val() == '' || $('#pass').val() == '') {
                $('.login-popup').html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <p class="fw-semibold">All fields required!</p>
                        <button type="button" class="btn-close shadow-none border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `);
            } else {
                $.ajax({
                    url: '../operations/login-verify.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response === 'Invalid credintials.') {
                            $('.login-popup').html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <p class="fw-semibold pb-0">${response} Please Check and try again!</p>
                            <button type="button" class="btn-close shadow-none border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `);
                            setTimeout(function() {
                                window.location.reload();
                            }, 2000);
                        } else {
                            $('.login-popup').html(`
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p class="fw-semibold pb-0">${response}</p>
                                <button type="button" class="btn-close shadow-none border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `);
                            setTimeout(function() {
                                window.location.href = '../';
                            }, 2000);

                        }
                    },
                    error: function(xhr, status, error) {
                        $('.login-popup').html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <p class="fw-semibold pb-0">${error}</p>
                            <button type="button" class="btn-close shadow-none border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `);
                    }
                });
            }

        });

        $('#myAccount-info #signup-form-data').on('submit', function(event) {
            event.preventDefault();
            if ($('#signup-firstname').val() == '' || $('#signup-lastname').val() == '' || $('#signup-mob').val() == '' || $('#signup-email').val() == '' || $('#signup-pass').val() == '' || $('#signup-address').val() == '') {
                $('#showAlert').html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <p class="fw-semibold">All fields required</p>
                        <button type="button" class="btn-close shadow-none border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `);
            } else {
                $.ajax({
                    url: '../operations/signup-verify.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#showAlert').html(`                    
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p class="fw-semibold">Congratulations! You are successfully signup to Expedia. Now you can login.${response}</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `);
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    },
                    error: function(xhr, status, error) {
                        $('#showAlert').html(`
                            <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                                <p class="fw-semibold">An error occured!</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                         `);
                    }
                });
            }
        });
        $('#edit-info').on('click', function() {
            const fieldset = $('#v-pills-settings fieldset');
            fieldset.prop('disabled', !fieldset.prop('disabled'));
        });

        $('#cancel-edit-info').on('click', function() {
            const fieldset = $('#v-pills-settings fieldset');
            fieldset.prop('disabled', true);
        });

        $('#session-destroy').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/expedia/operations/logout.php',
                method: 'POST',
                success: function(response) {
                    if (response == 'You are not logged in.') {
                        $('.sign-out-alert').html(`
                        <div class="alert alert-primary alert-dismissible fade show w-100 py-2" role="alert">
                            <i class="fa-regular fa-circle-check me-2"></i>${response}
                            <button type="button" class="btn-close shadow-none border-0 pt-2" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>                
                        `);
                        setTimeout(() => {
                            window.location.href = '/expedia/pages/my-account.php';
                        }, 1500);
                    } else {
                        $('.sign-out-alert').html(`
                            <div class="alert alert-primary alert-dismissible fade show w-100 py-2" role="alert">
                                <i class="fa-regular fa-circle-check me-2"></i>${response}
                                <button type="button" class="btn-close shadow-none border-0 pt-2" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>                
                    `);

                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Logout failed:', error);
                    alert('An error occurred while logging out. Please try again.');
                }
            });
        });

        $('#edit-exsistinfo-form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "/expedia/operations/edit-existinfo.php",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    if (response == "Data updated successfully") {
                        $('.show-edit-alert').html(`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            ${response}
                        <button type="button" class="btn-close border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>                    
                        `);
                        setTimeout(() => {
                            window.location.href = '/expedia/pages/my-account.php';
                        }, 1000);
                    } else if (response == "Data not updated") {
                        $('.show-edit-alert').html(`
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            ${response}
                        <button type="button" class="btn-close border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>                    
                        `);
                    } else {
                        $('.show-edit-alert').html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            ${response}
                        <button type="button" class="btn-close border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>                    
                        `);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });

        $('#myAccount-info #admin-form').on('submit', function(event) {
            event.preventDefault();
            if ($('#admin-email').val() == '' || $('#pass').val() == '') {
                $('.admin-popup').html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <p class="fw-semibold">All fields required!</p>
                        <button type="button" class="btn-close shadow-none border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `);
            } else {
                $.ajax({
                    url: '../operations/admin-verify.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response === 'Invalid credintials.') {
                            $('.admin-popup').html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <p class="fw-semibold pb-0">${response} Please Check and try again!</p>
                            <button type="button" class="btn-close shadow-none border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `);
                            setTimeout(function() {
                                window.location.reload();
                            }, 2000);
                        } else {
                            $('.admin-popup').html(`
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p class="fw-semibold pb-0">${response}</p>
                                <button type="button" class="btn-close shadow-none border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `);
                            setTimeout(function() {
                                window.location.href = '../admin/admin.php';
                            }, 2000);

                        }
                    },
                    error: function(xhr, status, error) {
                        $('.login-popup').html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <p class="fw-semibold pb-0">${error}</p>
                            <button type="button" class="btn-close shadow-none border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `);
                    }
                });
            }

        });

        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Booking', 'This month'],
                ['Approved', 11],
                ['Pending', 5],
                ['Rejected', 1],
            ]);

            var options = {
                title: ''
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }

        $('#hotel-details-add #hotels-detail-upload').on('submit', function(event) {
            event.preventDefault();
            if ($('#hotel-picture').val() == '' || $('#hotel-name').val() == '' || $('#Hotelexperience').val() == '' || $('#avail-date-from').val() == '' || $('#avail-date-to').val() == '' || $('#Hoteltype_cat').val() == '' || $('#discountrate').val() == '' || $('#value').val() == '' || $('#hotelAvailableCity').val() == '') {
                $('#hotels-detail-upload-popup').html(`
                    <div class="alert alert-danger alert-dismissible fade show no-radius" role="alert">
                        <p class="fw-semibold">All fields required!</p>
                        <button type="button" class="btn-close shadow-none border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `);
            } else {
                $.ajax({
                    url: '../operations/hotels-details.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response === 'Failed to insert!') {
                            $('#hotels-detail-upload-popup').html(`
                        <div class="alert alert-danger alert-dismissible fade show no-radius" role="alert">
                            <p class="fw-semibold pb-0">${response} Please Check and try again!</p>
                            <button type="button" class="btn-close shadow-none border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `);

                        } else {
                            $('#hotels-detail-upload-popup').html(`
                            <div class="alert alert-success alert-dismissible fade show no-radius" role="alert">
                                <p class="fw-semibold pb-0">${response}</p>
                                <button type="button" class="btn-close shadow-none border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `);

                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);

                        }
                    },
                    error: function(xhr, status, error) {
                        $('#hotels-detail-upload-popup').html(`
                        <div class="alert alert-danger alert-dismissible fade show no-radius" role="alert">
                            <p class="fw-semibold pb-0">${error}</p>
                            <button type="button" class="btn-close shadow-none border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `);
                    }
                });

            }

        });

        $('#aeroplanes-details-add #aeroplanes-detail-upload').on('submit', function(event) {
            event.preventDefault();
            if ($('#aeroplanes-picture').val() == '' || $('#aeroplanes-name').val() == '' || $('#type_cat').val() == '' || $('#experience').val() == '' || $('#aeroavail-date-from').val() == '' || $('#aeroavail-date-to').val() == '' || $('#aerodiscountrate').val() == '' || $('#aerovalue').val() == '' || $('#aeroactualValue').val() == '' || $('#location_from').val() == '' || $('#location_to').val() == '') {
                $('#aeroplanes-detail-upload-popup').html(`
                    <div class="alert alert-danger alert-dismissible fade show no-radius" role="alert">
                        <p class="fw-semibold">All fields required!</p>
                        <button type="button" class="btn-close shadow-none border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `);
            } else {
                $.ajax({
                    url: '../operations/aeroplanes-details.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response === 'Failed to insert!') {
                            $('#aeroplanes-detail-upload-popup').html(`
                        <div class="alert alert-danger alert-dismissible fade show no-radius" role="alert">
                            <p class="fw-semibold pb-0">${response} Please Check and try again!</p>
                            <button type="button" class="btn-close shadow-none border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `);

                        } else {
                            $('#aeroplanes-detail-upload-popup').html(`
                            <div class="alert alert-success alert-dismissible fade show no-radius" role="alert">
                                <p class="fw-semibold pb-0">${response}</p>
                                <button type="button" class="btn-close shadow-none border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `);

                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);

                        }
                    },
                    error: function(xhr, status, error) {
                        $('#aeroplanes-detail-upload-popup').html(`
                        <div class="alert alert-danger alert-dismissible fade show no-radius" role="alert">
                            <p class="fw-semibold pb-0">${error}</p>
                            <button type="button" class="btn-close shadow-none border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `);
                    }
                });

            }

        });

        $('#taxis-details-add #taxi-detail-upload').on('submit', function(event) {
            event.preventDefault();
            if ($('#taxi-picture').val() == '' || $('#service-company-name').val() == '' || $('#taxiexperience').val() == '' || $('#Taxitype_cat').val() == '' || $('#taxiavail-datefrom').val() == '' || $('#taxiavail-date-to').val() == '' || $('#taxidiscountrate').val() == '' || $('#taxiactualValue').val() == '' || $('#taxiValue').val() == '' || $('#taxilocation_from').val() == '' || $('#taxilocation_to').val() == '') {
                $('#taxi-detail-upload-popup').html(`
                    <div class="alert alert-danger alert-dismissible fade show no-radius" role="alert">
                        <p class="fw-semibold">All fields required!</p>
                        <button type="button" class="btn-close shadow-none border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `);
            } else {
                $.ajax({
                    url: '../operations/taxi-details.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response === 'Failed to insert!') {
                            $('#taxi-detail-upload-popup').html(`
                        <div class="alert alert-danger alert-dismissible fade show no-radius" role="alert">
                            <p class="fw-semibold pb-0">${response} Please Check and try again!</p>
                            <button type="button" class="btn-close shadow-none border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `);

                        } else {
                            $('#taxi-detail-upload-popup').html(`
                            <div class="alert alert-success alert-dismissible fade show no-radius" role="alert">
                                <p class="fw-semibold pb-0">${response}</p>
                                <button type="button" class="btn-close shadow-none border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `);

                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);

                        }
                    },
                    error: function(xhr, status, error) {
                        $('#taxi-detail-upload-popup').html(`
                        <div class="alert alert-danger alert-dismissible fade show no-radius" role="alert">
                            <p class="fw-semibold pb-0">${error}</p>
                            <button type="button" class="btn-close shadow-none border-0" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `);
                    }
                });

            }

        });

        $("#add-settings #hotels-detail-upload #discountrate, #add-settings #hotels-detail-upload #actualValue").on("input", function() {
            let actualValue = parseFloat($("#add-settings #hotels-detail-upload #actualValue").val()) || 0;
            let disCount = parseFloat($("#add-settings #hotels-detail-upload #discountrate").val()) || 0;
            let discountValue = Math.round((actualValue * disCount) / 100);
            let theValue = (actualValue - discountValue);
            if (!isNaN(theValue)) {
                $("#add-settings #hotels-detail-upload #value").val(theValue);
            } else {
                $("#add-settings #hotels-detail-upload #value").val("");
            }
        });

        $("#add-settings #aeroplanes-detail-upload #discountrate, #add-settings #aeroplanes-detail-upload #aeroactualValue").on("input", function() {
            let actualValue = parseFloat($("#add-settings #aeroplanes-detail-upload #aeroactualValue").val()) || 0;
            let disCount = parseFloat($("#add-settings #aeroplanes-detail-upload #aerodiscountrate").val()) || 0;
            let discountValue = Math.round((actualValue * disCount) / 100);
            let theValue = (actualValue - discountValue);
            if (!isNaN(theValue)) {
                $("#add-settings #aeroplanes-detail-upload #aerovalue").val(theValue);
            } else {
                $("#add-settings #aeroplanes-detail-upload #aerovalue").val("");
            }
        });

        $("#add-settings #taxi-detail-upload #taxidiscountrate, #add-settings #taxi-detail-upload #taxiactualValue").on("input", function() {
            let actualValue = parseFloat($("#add-settings #taxi-detail-upload #taxiactualValue").val()) || 0;
            let disCount = parseFloat($("#add-settings #taxi-detail-upload #taxidiscountrate").val()) || 0;
            let discountValue = Math.round((actualValue * disCount) / 100);
            let theValue = (actualValue - discountValue);
            if (!isNaN(theValue)) {
                $("#add-settings #taxi-detail-upload #taxiValue").val(theValue);
            } else {
                $("#add-settings #taxi-detail-upload #taxiValue").val("");
            }
        });

        $('#hotel-demos .multiple-items').on('click', '.hotel-book', function() {
            let cartId = $(this).closest('.card-body').find('input#contentHotelId').val();
            $('#clientCardvalue').val(cartId);
        });

        $('#admin-view #add-settings #hotel-details-add').siblings().hide();
        $('#admin-view .tab-content .tab-pane #nav-settings-items #hotel-settings').on('click', function() {
            $('#admin-view #add-settings #hotel-details-add').fadeIn();
            $('#admin-view #add-settings #hotel-details-add').siblings().hide();
        });

        $('#admin-view .tab-content .tab-pane #nav-settings-items #aeroplanes-settings').on('click', function() {
            $('#admin-view #add-settings #aeroplanes-details-add').fadeIn();
            $('#admin-view #add-settings #aeroplanes-details-add').siblings().hide();
        });

        $('#admin-view .tab-content .tab-pane #nav-settings-items #taxis-settings').on('click', function() {
            $('#admin-view #add-settings #taxis-details-add').fadeIn();
            $('#admin-view #add-settings #taxis-details-add').siblings().hide();
        });

        $('#main #main-search-form').on('submit', function(e) {
            if ($('#querySearchtour-type').val() == '' || $('#querysearchFrom').val() == '' || $('#querysearchChildrencount').val() == '' || $('#querysearchTo').val() == '' || $('#search-category').val() == '' || $('#querysearchDeparts').val() == '' || $('#querysearchReturning').val() == '' || $('#querysearchAdultscount').val() == '') {
                e.preventDefault();
            }
        });
        var options = {
            "key": "rzp_test_9CIs4zzujYSGiH",
            "amount": "",
            "currency": "INR",
            "description": "Acme Corp",
            "image": "example.com/image/rzp.jpg",
            "prefill": {
                "email": "gaurav.kumar@example.com",
                "contact": +919900000000,
            },
            config: {
                display: {
                    blocks: {
                        utib: {
                            name: "Most popular",
                            instruments: [{
                                    method: 'upi'
                                },
                                {
                                    method: 'card'
                                },
                                {
                                    method: 'wallet'
                                },
                                {
                                    method: 'netbanking'
                                }
                            ]
                        },
                        other: {
                            name: "Other Payment Methods",
                            instruments: [{
                                    method: "card",
                                    issuers: ["ICIC"]
                                },
                                {
                                    method: 'netbanking',
                                }
                            ]
                        }
                    },
                    sequence: ["block.utib", "block.other"],
                    preferences: {
                        show_default_blocks: false
                    }
                }
            },
            "handler": function(response) {
                alert(response.razorpay_payment_id);
            },
        };
        var rzp1 = new Razorpay(options);
        $(document).on('click', '#rzp-button1', function(e) {
            rzp1.open();
            e.preventDefault();
        });

        $('#location-catch-form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: '../operations/location-manage.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response){
                    
                }
            });
        });

    });
</script>

</body>

</html>