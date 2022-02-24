<div id="layout-wrapper">


    <?php //include 'inc/topbar.php'; 
    $this->load->view('administrator/inc/topbar')
    ?>

    <!-- ========== Left Sidebar Start ========== -->
    <?php //include 'inc/sidebar.php'; 
    $this->load->view('administrator/inc/sidebar')
    ?>
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
                            <h4 class="mb-sm-0">Checkout</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Store</a></li>
                                    <li class="breadcrumb-item active">Checkout</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-pan" id="billing-info">
                                    <h5 class="card-title">Billing information</h5>

                                    <form>
                                        <div>

                                            <div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="mb-4">
                                                            <label class="form-label" for="billing-name">Student Name</label>
                                                            <input type="text" class="form-control" id="billing-name" placeholder="Enter name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-4">
                                                            <label class="form-label" for="billing-email-address">Email Address</label>
                                                            <input type="email" class="form-control" id="billing-email-address" placeholder="Enter email">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-4">
                                                            <label class="form-label" for="billing-phone">Phone</label>
                                                            <input type="text" class="form-control" id="billing-phone" placeholder="Enter Phone no.">
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="mb-4">
                                                            <label class="form-label" for="billing-id">Student ID</label>
                                                            <input type="text" class="form-control" id="billing-id" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-4">
                                                            <label class="form-label" for="billing-address">Branch</label>
                                                            <input type="text" class="form-control" id="billing-address" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label" for="billing-note">NOTE</label>
                                                    <textarea class="form-control" id="billing-note" rows="3" placeholder="Enter full address"></textarea>
                                                </div>

                                                <div class="row">

                                                    <div class="col-lg-4 col-sm-6">
                                                        <div>
                                                            <label class="form-label card-radio-label mb-3">
                                                                <input type="radio" name="pay-method" id="pay-methodoption1" class="card-radio-input">

                                                                <span class="card-radio">
                                                                    <i class="fab fa-cc-mastercard font-size-24 align-middle me-2"></i>
                                                                    <span>Credit / Debit Card</span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-sm-6">
                                                        <div>
                                                            <label class="form-label card-radio-label mb-3">
                                                                <input type="radio" name="pay-method" id="pay-methodoption2" class="card-radio-input">

                                                                <span class="card-radio">
                                                                    <i class="fab fa-cc-paypal font-size-24 align-middle me-2"></i>
                                                                    <span>Transfer</span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-sm-6">
                                                        <div>
                                                            <label class="form-label card-radio-label mb-3">
                                                                <input type="radio" name="pay-method" id="pay-methodoption3" class="card-radio-input" checked>

                                                                <span class="card-radio">
                                                                    <i class="far fa-money-bill-alt font-size-24 align-middle me-2"></i>
                                                                    <span>Cash</span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

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
                    <img src="<?= base_url() ?>assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="layout-1">
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                    <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="<?= base_url() ?>assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="layout-2">
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="<?= base_url() ?>assets/css/bootstrap-dark.min.css" data-appStyle="<?= base_url() ?>assets/css/app-dark.min.css">
                    <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="<?= base_url() ?>assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="layout-3">
                </div>
                <div class="form-check form-switch mb-5">
                    <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appStyle="<?= base_url() ?>assets/css/app-rtl.min.css">
                    <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                </div>


            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>