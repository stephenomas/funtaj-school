<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Product Detail | Funtaj - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <?php include 'inc/topbar.php'; ?>

        <!-- ========== Left Sidebar Start ========== -->
        <?php include 'inc/sidebar.php'; ?>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Product Detail</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Product Detail</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-5">
                                            <div class="product-detail">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                            <a class="nav-link active" id="product-1-tab" data-bs-toggle="pill" href="#product-1" role="tab">
                                                                <img src="assets/images/product/img-1.png" alt="img-1" class="img-fluid mx-auto d-block tab-img rounded">
                                                            </a>
                                                            <a class="nav-link" id="product-2-tab" data-bs-toggle="pill" href="#product-2" role="tab">
                                                                <img src="assets/images/product/img-5.png" alt="img-5" class="img-fluid mx-auto d-block tab-img rounded">
                                                            </a>
                                                            <a class="nav-link" id="product-3-tab" data-bs-toggle="pill" href="#product-3" role="tab">
                                                                <img src="assets/images/product/img-3.png" alt="img-3" class="img-fluid mx-auto d-block tab-img rounded">
                                                            </a>
                                                            <a class="nav-link" id="product-4-tab" data-bs-toggle="pill" href="#product-4" role="tab">
                                                                <img src="assets/images/product/img-4.png" alt="img-4" class="img-fluid mx-auto d-block tab-img rounded">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-9">
                                                        <div class="tab-content" id="v-pills-tabContent">
                                                            <div class="tab-pane fade show active" id="product-1" role="tabpanel">
                                                                <div class="product-img">
                                                                    <img src="assets/images/product/img-1.png" alt="img-1" class="img-fluid mx-auto d-block" data-zoom="assets/images/product/img-1.png">
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="product-2" role="tabpanel">
                                                                <div class="product-img">
                                                                    <img src="assets/images/product/img-5.png" alt="img-5" class="img-fluid mx-auto d-block">
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="product-3" role="tabpanel">
                                                                <div class="product-img">
                                                                    <img src="assets/images/product/img-3.png" alt="img-3" class="img-fluid mx-auto d-block">
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="product-4" role="tabpanel">
                                                                <div class="product-img">
                                                                    <img src="assets/images/product/img-4.png" alt="img-4" class="img-fluid mx-auto d-block">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-center mt-2">
                                                            <div class="col-sm-6">
                                                                <div class="d-grid">
                                                                    <button type="button" class="btn btn-primary waves-effect waves-light mt-2">
                                                                        <i class="mdi mdi-cart me-2"></i> Add to cart
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="d-grid">
                                                                    <button type="button" class="btn btn-light waves-effect  mt-2 waves-light">
                                                                        <i class="mdi mdi-shopping me-2"></i>Buy now
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end product img -->
                                        </div>
                                        <div class="col-xl-7">
                                            <div class="mt-4 mt-xl-3">
                                                <a href="#" class="text-primary">T-shirt</a>
                                                <h5 class="mt-1 mb-3">Full sleeve Blue color t-shirt</h5>

                                                <div class="d-inline-flex">
                                                    <div class="text-muted me-3">
                                                        <span class="mdi mdi-star text-warning"></span>
                                                        <span class="mdi mdi-star text-warning"></span>
                                                        <span class="mdi mdi-star text-warning"></span>
                                                        <span class="mdi mdi-star text-warning"></span>
                                                        <span class="mdi mdi-star"></span>
                                                    </div>
                                                    <div class="text-muted">( 132 )</div>
                                                </div>

                                                <h5 class="mt-2"><del class="text-muted me-2">₦252</del>₦240 <span class="text-danger font-size-12 ms-2">25 % Off</span></h5>
                                                <p class="mt-3">To achieve this, it would be necessary to have uniform pronunciation</p>
                                                <hr class="my-4">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div>
                                                            <h5 class="font-size-14"><i class="mdi mdi-location"></i> Delivery location</h5>
                                                            <div class="d-flex flex-wrap">

                                                                <div class="input-group mb-3 w-auto">
                                                                    <input type="text" class="form-control" placeholder="Enter Delivery pincode">
                                                                    <button class="btn btn-light" type="button">Check</button>
                                                                </div>
                                                            </div>

                                                            <h5 class="font-size-14">Specification :</h5>
                                                            <ul class="list-unstyled product-desc-list">
                                                                <li><i class="mdi mdi-circle-medium me-1 align-middle"></i> Full Sleeve</li>
                                                                <li><i class="mdi mdi-circle-medium me-1 align-middle"></i> Cotton</li>
                                                                <li><i class="mdi mdi-circle-medium me-1 align-middle"></i> All Sizes available</li>
                                                                <li><i class="mdi mdi-circle-medium me-1 align-middle"></i> 4 Different Color</li>
                                                            </ul>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <h5 class="font-size-14">Services :</h5>
                                                        <ul class="list-unstyled product-desc-list">
                                                            <li><i class="mdi mdi-sync text-primary me-1 align-middle font-size-16"></i> 10 Days Replacement</li>
                                                            <li><i class="mdi mdi-currency-usd-circle text-primary me-1 align-middle font-size-16"></i> Cash on Delivery available</li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="product-color mt-3">
                                                            <h5 class="font-size-14">Color :</h5>
                                                            <a href="#" class="active">
                                                                <div class="product-color-item">
                                                                    <img src="assets/images/product/img-1.png" alt="img-1" class="avatar-md">
                                                                </div>
                                                                <p>Blue</p>
                                                            </a>
                                                            <a href="#">
                                                                <div class="product-color-item">
                                                                    <img src="assets/images/product/img-5.png" alt="img-5" class="avatar-md">
                                                                </div>
                                                                <p>Cyan</p>
                                                            </a>
                                                            <a href="#">
                                                                <div class="product-color-item">
                                                                    <img src="assets/images/product/img-3.png" alt="img-3" class="avatar-md">
                                                                </div>
                                                                <p>Green</p>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="product-color mt-3">
                                                            <h5 class="font-size-14">Size :</h5>
                                                            <a href="#" class="active">
                                                                <div class="product-color-item">
                                                                    <div class="avatar-xs">
                                                                        <span class="avatar-title bg-transparent text-body">S</span>
                                                                    </div>
                                                                </div>

                                                            </a>
                                                            <a href="#">
                                                                <div class="product-color-item">
                                                                    <div class="avatar-xs">
                                                                        <span class="avatar-title bg-transparent text-body">M</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="product-color-item">
                                                                    <div class="avatar-xs">
                                                                        <span class="avatar-title bg-transparent text-body">L</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="product-color-item">
                                                                    <div class="avatar-xs">
                                                                        <span class="avatar-title bg-transparent text-body">XL</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="d-flex">
                                                <div class="avatar-sm me-3">
                                                    <span class="avatar-title bg-light rounded-circle text-primary font-size-24">
                                                        <i class="ri-checkbox-circle-line"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-1 align-self-center overflow-hidden">
                                                    <h5>Free Shipping</h5>
                                                    <p class="text-muted mb-0">Sed ut perspiciatis unde</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="d-flex mt-4 mt-md-0">
                                                <div class="avatar-sm me-3">
                                                    <span class="avatar-title bg-light rounded-circle text-primary font-size-24">
                                                        <i class="ri-exchange-line"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-1 align-self-center overflow-hidden">
                                                    <h5>Easy Return</h5>
                                                    <p class="text-muted mb-0">Neque porro quisquam est</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="d-flex mt-4 mt-md-0">
                                                <div class="avatar-sm me-3">
                                                    <span class="avatar-title bg-light rounded-circle text-primary font-size-24">
                                                        <i class="ri-money-dollar-circle-line"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-1 align-self-center overflow-hidden">
                                                    <h5>Cash on Delivery</h5>
                                                    <p class="text-muted mb-0">Ut enim ad minima quis</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Funtaj.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                by Envy365 Agency
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title d-flex align-items-center px-3 py-4">

                <h5 class="m-0 me-2">Settings</h5>

                <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
            </div>

            <!-- Settings -->
            <hr class="mt-0" />
            <h6 class="text-center mb-0">Choose Layouts</h6>

            <div class="p-4">
                <div class="mb-2">
                    <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="layout-1">
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                    <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="layout-2">
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css">
                    <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="layout-3">
                </div>
                <div class="form-check form-switch mb-5">
                    <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css">
                    <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                </div>


            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>