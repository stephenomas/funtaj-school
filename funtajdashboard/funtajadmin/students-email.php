<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Funtaj - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- jquery.vectormap css -->
    <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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
                                <h4 class="mb-sm-0">Dashboard</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Funtaj</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">

                                    <!-- <h4 class="card-title">Custom Tabs</h4>
                                    <p class="card-title-desc">Example of custom tabs</p> -->

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#asokoro-campus" role="tab">
                                                <span class="d-block d-sm-none">Asokoro Campus</span>
                                                <span class="d-none d-sm-block">Asokoro Campus</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#gudu-primary" role="tab">
                                                <span class="d-block d-sm-none">Gudu Primary</span>
                                                <span class="d-none d-sm-block">Gudu Primary</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#gudu-high" role="tab">
                                                <span class="d-block d-sm-none">Gudu High</span>
                                                <span class="d-none d-sm-block">Gudu High</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content p-3 text-muted">
                                        <div class="tab-pane active" id="asokoro-campus" role="tabpanel">
                                            <div class="mb-0 row">
                                                <div class="card col-md-4">
                                                    <a href="./" class="card-body">
                                                        <h4 class="card-title">Year 7A</h4>
                                                        <h6 class="card-subtitle font-14 text-muted">View all</h6>
                                                    </a>
                                                </div>
                                                <div class="card col-md-4">
                                                    <a href="./" class="card-body">
                                                        <h4 class="card-title">Year 7B</h4>
                                                        <h6 class="card-subtitle font-14 text-muted">View all</h6>
                                                    </a>
                                                </div>
                                                <div class="card col-md-4">
                                                    <a href="./" class="card-body">
                                                        <h4 class="card-title">Year 7C</h4>
                                                        <h6 class="card-subtitle font-14 text-muted">View all</h6>
                                                    </a>
                                                </div>
                                                <div class="card col-md-4">
                                                    <a href="./" class="card-body">
                                                        <h4 class="card-title">Year 8A</h4>
                                                        <h6 class="card-subtitle font-14 text-muted">View all</h6>
                                                    </a>
                                                </div>
                                                <div class="card col-md-4">
                                                    <a href="./" class="card-body">
                                                        <h4 class="card-title">Year 8B</h4>
                                                        <h6 class="card-subtitle font-14 text-muted">View all</h6>
                                                    </a>
                                                </div>
                                                <div class="card col-md-4">
                                                    <a href="./" class="card-body">
                                                        <h4 class="card-title">Year 8C</h4>
                                                        <h6 class="card-subtitle font-14 text-muted">View all</h6>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="tab-pane" id="gudu-primary" role="tabpanel">
                                            <div class="mb-0 row">
                                                <div class="card col-md-4">
                                                    <a href="./" class="card-body">
                                                        <h4 class="card-title">Year 7A</h4>
                                                        <h6 class="card-subtitle font-14 text-muted">View all</h6>
                                                    </a>
                                                </div>
                                                <div class="card col-md-4">
                                                    <a href="./" class="card-body">
                                                        <h4 class="card-title">Year 7B</h4>
                                                        <h6 class="card-subtitle font-14 text-muted">View all</h6>
                                                    </a>
                                                </div>
                                                <div class="card col-md-4">
                                                    <a href="./" class="card-body">
                                                        <h4 class="card-title">Year 7C</h4>
                                                        <h6 class="card-subtitle font-14 text-muted">View all</h6>
                                                    </a>
                                                </div>
                                                <div class="card col-md-4">
                                                    <a href="./" class="card-body">
                                                        <h4 class="card-title">Year 8A</h4>
                                                        <h6 class="card-subtitle font-14 text-muted">View all</h6>
                                                    </a>
                                                </div>
                                                <div class="card col-md-4">
                                                    <a href="./" class="card-body">
                                                        <h4 class="card-title">Year 8B</h4>
                                                        <h6 class="card-subtitle font-14 text-muted">View all</h6>
                                                    </a>
                                                </div>
                                                <div class="card col-md-4">
                                                    <a href="./" class="card-body">
                                                        <h4 class="card-title">Year 8C</h4>
                                                        <h6 class="card-subtitle font-14 text-muted">View all</h6>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="tab-pane" id="gudu-high" role="tabpanel">
                                            <div class="mb-0 row">
                                                <div class="card col-md-4">
                                                    <a href="./" class="card-body">
                                                        <h4 class="card-title">Year 7A</h4>
                                                        <h6 class="card-subtitle font-14 text-muted">View all</h6>
                                                    </a>
                                                </div>
                                                <div class="card col-md-4">
                                                    <a href="./" class="card-body">
                                                        <h4 class="card-title">Year 7B</h4>
                                                        <h6 class="card-subtitle font-14 text-muted">View all</h6>
                                                    </a>
                                                </div>
                                                <div class="card col-md-4">
                                                    <a href="./" class="card-body">
                                                        <h4 class="card-title">Year 7C</h4>
                                                        <h6 class="card-subtitle font-14 text-muted">View all</h6>
                                                    </a>
                                                </div>
                                                <div class="card col-md-4">
                                                    <a href="./" class="card-body">
                                                        <h4 class="card-title">Year 8A</h4>
                                                        <h6 class="card-subtitle font-14 text-muted">View all</h6>
                                                    </a>
                                                </div>
                                                <div class="card col-md-4">
                                                    <a href="./" class="card-body">
                                                        <h4 class="card-title">Year 8B</h4>
                                                        <h6 class="card-subtitle font-14 text-muted">View all</h6>
                                                    </a>
                                                </div>
                                                <div class="card col-md-4">
                                                    <a href="./" class="card-body">
                                                        <h4 class="card-title">Year 8C</h4>
                                                        <h6 class="card-subtitle font-14 text-muted">View all</h6>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->




                    <!-- end row -->
                </div>

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


    <!-- apexcharts -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- jquery.vectormap map -->
    <script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

    <!-- Required datatable js -->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <script src="assets/js/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
</body>

</html>