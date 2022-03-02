<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Mid Term Reports | Funtaj - Dashboard</title>
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
<style>
    @media print {
        #printPageButton {
            display: none;
        }
    }
</style>

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
                                <h4 class="mb-sm-0">Mid Term Reports</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Funtaj</a></li>
                                        <li class="breadcrumb-item active">Mid Term Reports</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <button class="btn btn-primary" id="printPageButton" onclick="printReport()"><i class="fas fa-print"></i> Print</button>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="content" style="margin-top: 0.5%;">


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="">
                                                <!-- Mid Term -->
                                                <div class="text-center"><img src="assets/images/logo-sm-dark.png" width="50px">
                                                    <h5 class="">Funtaj International School, LTD</h5>
                                                    Plot 584, David Jemibewon Crescent, Off Oladipo Diya Road, Gudu, Apo <br> info@funtajschoolltd.com, enquiries@funtajschoolltd.com
                                                    <br> 2347057928544, 2347057928066

                                                    <h6>MidTerm Report</h6>
                                                </div>
                                                <div class="row mb-1">
                                                    <div class="col-md-8">
                                                        <h5>Name: Ibrahim Azeez</h5>
                                                        <h5 class="text-danger">Class: Year 9C</h5>
                                                        <h5 class="text-primary">Reg No: 1571 | DoB: 2007-01-25 | Term 2 | 2020/2021 Session</h5>
                                                        <!--                            <h6>Possible Attendance: | Actual Attendance:</h6>-->
                                                        <h5 class="text-secondary">Form Tutor: Abu Chris </h5>
                                                    </div>
                                                    <div class="col-md-4" id="printPageButton">
                                                        <img src="assets/images/users/avatar-2.jpg" style="height: 80px; width: 80px" alt="profile Picture">
                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered dt-responsive nowrap" style=" border-spacing: 0; width: 100%;">

                                                        <tr>
                                                            <th>#</th>
                                                            <th>Subject</th>
                                                            <th>Achievement</th>
                                                            <th>Effort</th>
                                                            <th>Homework</th>
                                                            <th>Behaviour</th>
                                                        </tr>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>Agric. Science</td>
                                                                <td>B</td>
                                                                <td>2</td>
                                                                <td>B</td>
                                                                <td>2</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Basic Science</td>
                                                                <td>A</td>
                                                                <td>1</td>
                                                                <td>A</td>
                                                                <td>1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Basic Tech</td>
                                                                <td>A</td>
                                                                <td>1</td>
                                                                <td>A</td>
                                                                <td>1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>Business Studies</td>
                                                                <td>A</td>
                                                                <td>1</td>
                                                                <td>B</td>
                                                                <td>2</td>
                                                            </tr>
                                                            <tr>
                                                                <td>5</td>
                                                                <td>Civic Edu.</td>
                                                                <td>A</td>
                                                                <td>1</td>
                                                                <td>B</td>
                                                                <td>1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>6</td>
                                                                <td>Computer</td>
                                                                <td>A</td>
                                                                <td>3</td>
                                                                <td>C</td>
                                                                <td>2</td>
                                                            </tr>
                                                            <tr>
                                                                <td>7</td>
                                                                <td>French</td>
                                                                <td>A</td>
                                                                <td>1</td>
                                                                <td>A</td>
                                                                <td>1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>8</td>
                                                                <td>Hausa</td>
                                                                <td>A</td>
                                                                <td>1</td>
                                                                <td>A</td>
                                                                <td>1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>9</td>
                                                                <td>Home Eco.</td>
                                                                <td>A</td>
                                                                <td>1</td>
                                                                <td>A</td>
                                                                <td>1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10</td>
                                                                <td>IRS</td>
                                                                <td>A</td>
                                                                <td>1</td>
                                                                <td>A</td>
                                                                <td>1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>11</td>
                                                                <td>Mathematics</td>
                                                                <td>C</td>
                                                                <td>2</td>
                                                                <td>C</td>
                                                                <td>2</td>
                                                            </tr>
                                                            <tr>
                                                                <td>12</td>
                                                                <td>Music</td>
                                                                <td>A</td>
                                                                <td>1</td>
                                                                <td>A</td>
                                                                <td>1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>13</td>
                                                                <td>Social Studies</td>
                                                                <td>B</td>
                                                                <td>2</td>
                                                                <td>B</td>
                                                                <td>1</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="text-danger" style="font-size: small">Key: (A: Excellent | 1: Highest) | (E: Poor -
                                                    5: Lowest) </div>
                                            </div>
                                            <!--  Mid Term Ends  -->

                                            <!-- End Of Term -->
                                            <!--  End Of Term Ends  -->

                                        </div>
                                    </div>
                                <div>


                                    <div class="text-center exec">
                                        <!--        Grade or Year style-->
                                        <!--Check if class is secondary-->
                                        <!--            Check if it's vp (Principal not selected)-->
                                        <!--Get the signature-->

                                        <img src="" height="60px" alt="Signature"><br>
                                        <h6>Dr Tina Ohai, Vice Principal</h6>
                                        
                                        <!--End if it's principals signature-->
                                        <!--                End if student's class is greater than Year 6-->
                                        <!--Check if class is primary-->
                                        <!--        End of if Grade or Year style    -->


                                        <!--      If class style  Junior/Senior-->
                                    </div>
                                </div>
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
    <script>
        function printReport() {
            window.print();
        }
    </script>

</body>

</html>