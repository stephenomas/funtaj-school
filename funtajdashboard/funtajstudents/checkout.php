<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Checkout | Funtaj Schools - Students Dashboard </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE/SCRIPTS FILE  -->
    <script src="plugins/sweetalerts/promise-polyfill.js"></script>
    <link rel="stylesheet" type="text/css" href="plugins/jquery-step/jquery.steps.css">
    <link href="assets/css/ecommerce/ecommerce-wizards.css" rel="stylesheet" type="text/css">
    <link href="plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <!--  BEGIN CUSTOM STYLE/SCRIPTS FILE  -->
</head>
<body>
    <!-- Tab Mobile View Header -->
    <?php include 'inc/mobile-header.php'; ?>
    <!-- Tab Mobile View Header -->

    <!--  BEGIN NAVBAR  -->
    <?php include 'inc/desk-header.php'; ?>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <?php include 'inc/navbar.php'; ?>
        <!--  END TOPBAR  -->
        
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Checkout</h3>
                    </div>
                </div>
                
                <div class="row margin-bottom-120" id="cancel-row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="statbox widget box box-shadow" id="form_wizard">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Checkout - <span class="step-title">Step 1 of 3</span></h4>
                                    </div>                           
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div id="circle-basic" class="mt-5 mb-5">
                                    <!-- <h3>
                                        <span class="icon">
                                            <i class="done flaticon-double-check" style="display: none;"></i>
                                            <i class="active flaticon-user-7" style="display: none"></i>
                                        </span>
                                        <span class="mt-3">Login or Signup</span>
                                    </h3>
                                    <section>
                                        <h5 class="mt-5 mb-5 w-title">General Information</h5>
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-6 col-12">
                                                    <input type="text" class="form-control mt-3 mb-5" placeholder="Username">
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <input type="text" class="form-control mt-3 mb-5" placeholder="Email">
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <input type="text" class="form-control mt-3 mb-5" placeholder="Password">
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <input type="text" class="form-control mt-3 mb-5" placeholder="Retype Password">
                                                </div>
                                            </div>
                                        </form>
                                    </section> -->
                                    <h3>
                                        <span class="icon">
                                            <i class="done flaticon-double-check" style="display: none;"></i>
                                            <i class="active flaticon-placeholder-fill" style="display: none"></i>
                                        </span>
                                        <span class="mt-3">Delivery Address</span>
                                    </h3>
                                    <section>
                                        <h5 class="mt-5 mb-5 w-title">Address</h5>
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-6 col-12">
                                                    <input type="text" class="form-control mt-3 mb-5" placeholder="First Name">
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <input type="text" class="form-control mt-3 mb-5" placeholder="Last Name">
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <input type="text" class="form-control mt-3 mb-5" placeholder="Address">
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <input type="text" class="form-control mt-3 mb-5" placeholder="Street">
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <input type="text" class="form-control mt-3 mb-5" placeholder="Post Code">
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <input type="text" class="form-control mt-3 mb-5" placeholder="City">
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <input type="text" class="form-control mt-3 mb-5" placeholder="State/Region">
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <input type="text" class="form-control mt-3 mb-5" placeholder="Country">
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <input type="text" class="form-control mt-3 mb-5" placeholder="Phone">
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <input type="text" class="form-control mt-3 mb-5" placeholder="Email">
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                    <h3>
                                        <span class="icon">
                                            <i class="done flaticon-double-check" style="display: none;"></i>
                                            <i class="active flaticon-document-3" style="display: none"></i>
                                        </span>
                                        <span class="mt-3">Order Summary</span>
                                    </h3>
                                    <section>
                                        <h5 class="mt-5 mb-5 w-title">Order</h5>
                                        <div class="row">
                                            <div class="col-xl-4 col-12">
                                                <div class="total-amount text-center">
                                                    <i class="flaticon-cart-bag-1"></i>
                                                    <h6>Order Total</h6>
                                                    <p class="t-amount mb-2 mt-2">26,500</p>
                                                    <p class="t-product">7 Products</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-8 col-12 mt-xl-0 mt-4">
                                                <div class="order-product-list">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Product</th>
                                                                    <th scope="col">Qty</th>
                                                                    <th scope="col">Price</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th>
                                                                        <span>Gaming Monitor</span>
                                                                        <p>SKU-001</p>
                                                                    </th>
                                                                    <td>4</td>
                                                                    <td class="pricing">$3488</td>
                                                                    <td><i class="flaticon-cancel-12"></i></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <span>Electric Shaver</span>
                                                                        <p>SKU-002</p>
                                                                    </th>
                                                                    <td>2</td>
                                                                    <td class="pricing">₦105</td>
                                                                    <td><i class="flaticon-cancel-12"></i></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <span>Microwave</span>
                                                                        <p>SKU-003</p>
                                                                    </th>
                                                                    <td>1</td>
                                                                    <td class="pricing">₦999</td>
                                                                    <td><i class="flaticon-cancel-12"></i></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <h3>
                                        <span class="icon">
                                            <i class="done flaticon-double-check" style="display: none;"></i>
                                            <i class="active flaticon-gift-fill" style="display: none"></i>
                                        </span>
                                        <span class="mt-3">Checkout</span>
                                    </h3>
                                    <section>
                                        <h5 class="mt-5 mb-5 w-title">Payment Method</h5>
                                        <div class="rounded-pills-icon checkout-method">
                                            <ul class="nav nav-pills mb-4  justify-content-center" id="rounded-pills-icon-tab" role="tablist">
                                                <li class="nav-item ml-2 mr-2">
                                                    <a class="nav-link mb-2 active text-center" id="rounded-pills-icon-home-tab" data-toggle="pill" href="#rounded-pills-icon-home" role="tab" aria-controls="rounded-pills-icon-home" aria-selected="true"><i class="flaticon-credit-card"></i> Credit Card</a>
                                                </li>
                                                <li class="nav-item ml-2 mr-2">
                                                    <a class="nav-link mb-2 text-center" id="rounded-pills-icon-profile-tab" data-toggle="pill" href="#rounded-pills-icon-profile" role="tab" aria-controls="rounded-pills-icon-profile" aria-selected="false"><i class="flaticon-paypal-logo"></i> PayPal</a>
                                                </li>
                                                <li class="nav-item ml-2 mr-2">
                                                    <a class="nav-link mb-2 text-center" id="rounded-pills-icon-contact-tab" data-toggle="pill" href="#rounded-pills-icon-contact" role="tab" aria-controls="rounded-pills-icon-contact" aria-selected="false"><i class="flaticon-dollar-coin"></i> Pay Cash</a>
                                                </li>
                                            </ul>

                                            <div class="tab-content" id="rounded-pills-icon-tabContent">
                                                <div class="tab-pane fade show active" id="rounded-pills-icon-home" role="tabpanel" aria-labelledby="rounded-pills-icon-home-tab">
                                                    <h5 class="p-methods-title mb-5 mt-5 text-center">Credit Card</h5>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-12">
                                                            <input type="text" class="form-control mt-3 mb-5" placeholder="Card Number">
                                                        </div>
                                                        <div class="col-sm-6 col-12">
                                                            <input type="text" class="form-control sm-0 mt-3 mb-5" placeholder="Expiration Date">
                                                        </div>
                                                        <div class="col-sm-6 col-12">
                                                            <input type="text" class="form-control mt-3 mb-5" placeholder="Card Holder Name">
                                                        </div>
                                                        <div class="col-sm-6 col-12">
                                                            <input type="text" class="form-control mt-3 mb-5" placeholder="CVV">
                                                        </div>
                                                        <div class="col-md-12 text-center mt-4">
                                                            <button class="btn btn-success btn-rounded my-5 confirm-credit">Confirm</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="rounded-pills-icon-profile" role="tabpanel" aria-labelledby="rounded-pills-icon-profile-tab">
                                                    <h5 class="p-methods-title mb-5 mt-4 text-center">Paypal</h5>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-12">
                                                            <input type="text" class="form-control mt-4 mb-4" placeholder="Enter Your Paypal Email">
                                                        </div>
                                                        <div class="col-sm-6 col-12">
                                                            <input type="password" class="form-control mt-4 mb-4" placeholder="Enter Your Paypal Password">
                                                        </div>
                                                        <div class="col-md-12 text-center mt-4">
                                                            <button class="btn btn-success btn-rounded my-5 confirm-paypal">Confirm</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="rounded-pills-icon-contact" role="tabpanel" aria-labelledby="rounded-pills-icon-contact-tab">
                                                    <h5 class="p-methods-title mb-5 mt-4 text-center">Pay Cash</h5>
                                                    <div class="container">
                                                        <div class="place-order-cash text-center mx-auto">
                                                            <i class="flaticon-coin-icon mb-4"></i>
                                                            <p class="mb-4 mt-4">Please click confirm button to accept package and pay cash at your delivery address.</p>
                                                            <button class="btn btn-success btn-rounded my-4  confirm-cash">Confirm</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!--  BEGIN FOOTER  -->
    <?php include 'inc/footer.php'; ?>
    <!--  END FOOTER  -->
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    
    <!--  BEGIN CUSTOM SCRIPT FILES  -->
    <script src="plugins/jquery-step/jquery.steps.min.js"></script>
    <script src="plugins/sweetalerts/sweetalert2.min.js"></script>
    <script>
        $("#circle-basic").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            autoFocus: true,
            titleTemplate: '#title#',
            cssClass: 'circle wizard',
            onFinished: function(event, currentIndex) { swal('Order Placed!', 'Your order has been successfully placed', 'success') }
        });
        $('.confirm-credit').on('click', function () {
            swal({ title: 'Your Credit Card Payment is Successfull!', text: "Please click on finish button to place your order.", type: 'success', })
        })
        $('.confirm-paypal').on('click', function () {
            swal({ title: 'Your Credit Paypal Payment is Successfull!', text: "Please click on finish button to place your order.", type: 'success', })
        })
        $('.confirm-cash').on('click', function () {
            swal({ title: 'Pay cash on delivery!', text: "Please click on finish button to place your order.", type: 'success', })
        })
    </script>
    <!--  END CUSTOM SCRIPT FILES  -->    
</body>
</html>