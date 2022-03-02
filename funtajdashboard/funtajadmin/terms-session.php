<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Terms & Sessions | Funtaj - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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
                    <div class="content">
                        <div class="text-center mb-4">
                            <div id="alertJavascript"> </div>
                        </div>
                        <h2 class="mb-4">Terms & Sessions</h2>

                        <div class="row mb-4">
                            <div class="col-md">
                                <div class="d-flex border">
                                    <div class="bg-primary text-light p-4">
                                        <div class="d-flex align-items-center h-100">
                                            <i class="fa fa-3x fa-fw fa-bookmark"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 bg-white p-4">
                                        <p class="text-uppercase text-secondary mb-0">Current Term</p>
                                        <h4 class="font-weight-bold mb-0">Term 3</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="d-flex border">
                                    <div class="bg-success text-light p-4">
                                        <div class="d-flex align-items-center h-100">
                                            <i class="fa fa-3x fa-fw fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 bg-white p-4">
                                        <p class="text-uppercase text-secondary mb-0">Current Session</p>
                                        <h4 class="font-weight-bold mb-0">2020/2021</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header bg-white font-weight-bold">
                                        Set Current Term & Session
                                    </div>
                                    <div class="card-body">
                                        <div style="width: 100%;">
                                            <h6 class="text-danger">Set Term</h6>
                                            <form action="https://guduhigh.funtajschoolltd.com/school/setCurrentTerm" method="post" accept-charset="utf-8">
                                                <div class="form-group">
                                                    <select class="form-control" name="term" required>
                                                        <option value="">Choose term...</option>
                                                        <option value="Term 1">Term 1</option>
                                                        <option value="Term 2">Term 2</option>
                                                        <option value="Term 3">Term 3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control btn btn-danger" type="submit" value="Set Term">
                                                </div>
                                            </form>
                                            <hr>
                                            <h6 class="text-secondary">Set Session</h6>
                                            <form action="https://guduhigh.funtajschoolltd.com/school/setCurrentSession" method="post" accept-charset="utf-8">
                                                <div class="form-group">
                                                    <select class="form-control" name="session" required>
                                                        <option value="">Choose session...</option>
                                                        <option value="2021/2022">2021/2022</option>
                                                        <option value="2021/2022">2021/2022</option>
                                                        <option value="2020/2021">2020/2021</option>
                                                        <option value="2019/2020">2019/2020</option>
                                                        <option value="2018/2019">2018/2019</option>
                                                        <option value="2017/2018">2017/2018</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control btn btn-secondary" type="submit" value="Set Session">
                                                </div>
                                            </form>
                                            <hr>
                                            <h6 class="text-primary">Set Number of Days Open - Current Term</h6>
                                            <form action="https://guduhigh.funtajschoolltd.com/school/setNumberOfDays" method="post" accept-charset="utf-8">
                                                <div class="form-group">
                                                    <input type="number" value="Number of days opened not set for this term." name="numberOfDays" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control btn btn-primary" type="submit" value="Set Days Opened">
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header bg-white font-weight-bold">
                                        Create Terms & Sessions
                                    </div>
                                    <div class="card-body">
                                        <h6 class="text-danger">Create Terms</h6>
                                        <form action="https://guduhigh.funtajschoolltd.com/school/createTerm" method="post" accept-charset="utf-8">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-bookmark"></i></span>
                                                </div>
                                                <input class="form-control" type="text" name="term" placeholder="Format: 'Term 1'">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input class="form-control btn btn-danger" type="submit" value="Create Term">
                                            </div>
                                        </form>
                                        <hr>
                                        <h6 class="text-secondary">Create Sessions</h6>
                                        <form action="https://guduhigh.funtajschoolltd.com/school/createSession" method="post" accept-charset="utf-8">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input class="form-control" type="text" name="session" placeholder="Format: '2017/2018'">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input class="form-control btn btn-secondary" type="submit" value="Create Session">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header bg-white font-weight-bold">
                                        Current Term's Start and End Dates
                                    </div>
                                    <div class="card-body">
                                        <div id="chart_div_4" style="width: 100%;">
                                            <form action="https://guduhigh.funtajschoolltd.com/school/setTermDates" method="post" accept-charset="utf-8">
                                                <input type="hidden" name="current_term" value="Term 3">
                                                <input type="hidden" name="current_session" value="2020/2021">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-calendar"> Start Date</i></span>
                                                    </div>
                                                    <input class="form-control" type="date" name="start_date" placeholder="Term Start Date'" required>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-calendar"> End Date</i></span>
                                                    </div>
                                                    <input class="form-control" type="date" name="end_date" placeholder="Term End Date'" required>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control btn btn-outline-info" type="submit" value="Set Term Dates">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="card bg-success text-light text-uppercase">
                                    <div class="card-body py-5">
                                        <i class="fa fa-3x fa-chart-pie"></i>
                                        <h5 class="mt-2 mb-0">Term 3 - 2020/2021 Session</h5>
                                        <p class="mb-4">Start(2021-05-04) - End(2021-07-24)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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

    <!-- Required datatable js -->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/libs/jszip/jszip.min.js"></script>
    <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

    <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

    <!-- Responsive examples -->
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="assets/js/pages/datatables.init.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>