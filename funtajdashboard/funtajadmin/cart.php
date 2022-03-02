<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Cart | Funtaj - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

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
                                <h4 class="mb-sm-0">Cart</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Cart</li>
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
                                    <div class="table-responsive">
                                        <table class="table table-centered mb-0 table-nowrap">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th style="width: 120px">Product</th>
                                                    <th>Product Desc</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="assets/images/product/img-1.jpg" alt="product-img" title="product-img" class="avatar-md" />
                                                    </td>
                                                    <td>
                                                        <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">Full sleeve T-shirt</a></h5>
                                                        <p class="mb-0">Color : <span class="fw-medium">Blue</span></p>
                                                    </td>
                                                    <td>
                                                        ₦ 240
                                                    </td>
                                                    <td>
                                                        <div style="width: 120px;" class="product-cart-touchspin">
                                                            <input data-bs-toggle="touchspin" type="text" value="02">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        ₦ 480
                                                    </td>
                                                    <td style="width: 90px;" class="text-center">
                                                        <a href="javascript:void(0);" class="action-icon text-danger"> <i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="assets/images/product/img-2.jpg" alt="product-img" title="product-img" class="avatar-md" />
                                                    </td>
                                                    <td>
                                                        <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">Half sleeve T-shirt</a></h5>
                                                        <p class="mb-0">Color : <span class="fw-medium">Red</span></p>
                                                    </td>
                                                    <td>
                                                        ₦ 225
                                                    </td>
                                                    <td>
                                                        <div style="width: 120px;" class="product-cart-touchspin">
                                                            <input data-bs-toggle="touchspin" type="text" value="01">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        ₦ 225
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="javascript:void(0);" class="action-icon text-danger"> <i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="assets/images/product/img-3.jpg" alt="product-img" title="product-img" class="avatar-md" />
                                                    </td>
                                                    <td>
                                                        <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">Hoodie (Green)</a></h5>
                                                        <p class="mb-0">Color : <span class="fw-medium">Green</span></p>
                                                    </td>
                                                    <td>
                                                        ₦ 275
                                                    </td>
                                                    <td>
                                                        <div style="width: 120px;" class="product-cart-touchspin">
                                                            <input data-bs-toggle="touchspin" type="text" value="02">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        ₦ 550
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="javascript:void(0);" class="action-icon text-danger"> <i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="assets/images/product/img-4.jpg" alt="product-img" title="product-img" class="avatar-md" />
                                                    </td>
                                                    <td>
                                                        <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">Hoodie (Gray)</a></h5>
                                                        <p class="mb-0">Color : <span class="fw-medium">Gray</span></p>
                                                    </td>
                                                    <td>
                                                        ₦ 275
                                                    </td>
                                                    <td>
                                                        <div style="width: 120px;" class="product-cart-touchspin">
                                                            <input data-bs-toggle="touchspin" type="text" value="01">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        ₦ 275
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="javascript:void(0);" class="action-icon text-danger"> <i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>
                                                <tr class="bg-light text-end">

                                                    <th scope="row" colspan="5">
                                                        Sub Total :
                                                    </th>

                                                    <td>
                                                        ₦ 1530
                                                    </td>
                                                </tr>
                                                <tr class="bg-light text-end">

                                                    <th scope="row" colspan="5">
                                                        Discount :
                                                    </th>

                                                    <td>
                                                        - ₦ 30
                                                    </td>
                                                </tr>
                                                <tr class="bg-light text-end">

                                                    <th scope="row" colspan="5">
                                                        Shipping Charge :
                                                    </th>

                                                    <td>
                                                        ₦ 25
                                                    </td>
                                                </tr>
                                                <tr class="bg-light text-end">

                                                    <th scope="row" colspan="5">
                                                        Total :
                                                    </th>

                                                    <td>
                                                        ₦ 1525
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="checkout" class="btn btn-primary waves-effect col-md-12">checkout</a>
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

    <!-- Bootrstrap touchspin -->
    <script src="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <script src="assets/js/pages/ecommerce-cart.init.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>