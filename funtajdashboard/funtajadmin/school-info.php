<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>School Info | Funtaj - Dashboard</title>
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
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">School Info Update</h4>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">School Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" value="" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-search-input" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" value="" id="example-search-input">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="email" value="info@funtajschoolltd.com, enquiries@funtajschoolltd.com" id="example-email-input">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-tel-input" class="col-sm-2 col-form-label">Telephone</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="tel" value="081556785" id="example-tel-input">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Principal</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" value="" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Vice Principal</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" value="" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">App Slog</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" value="My Funtaj" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-url-input" class="col-sm-2 col-form-label">URL</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="url" value="www.funtajschoolltd.com" id="example-url-input">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-url-input" class="col-sm-2 col-form-label">Email Extension</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="url" value="funtajschoolltd.com" id="example-url-input">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-password-input" class="col-sm-2 col-form-label">Default students' Password</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="password" value="funtaj123" id="example-password-input">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Campus</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" value="" id="example-text-input">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> <!-- end col -->

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Logo</h4>
                                    <div>
                                        <div class="mb-4">
                                            <img src="logo.png" alt="school logo">
                                        </div>
                                        <form action="">
                                            <div class="mb-4">
                                                <input type="file" class="form-control" id="customFile">
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-primary waves-effect waves-light">Upload</button>
                                            </div>
                                        </form>
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

            <?php include 'inc/footer.php'; ?>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <?php include 'inc/right-bar.php'; ?>
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