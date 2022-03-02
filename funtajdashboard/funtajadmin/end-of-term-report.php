<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>End of Term Reports | Funtaj - Dashboard</title>
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
                                <h4 class="mb-sm-0">End of Term Reports</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Funtaj</a></li>
                                        <li class="breadcrumb-item active">End of Term Reports</li>
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
                                                <!-- End of Term -->
                                                <div class="text-center"><img src="assets/images/logo-sm-dark.png" width="50px">
                                                    <h5 class="">Funtaj International School, LTD</h5>
                                                    Plot 584, David Jemibewon Crescent, Off Oladipo Diya Road, Gudu, Apo <br> info@funtajschoolltd.com, enquiries@funtajschoolltd.com
                                                    <br> 2347057928544, 2347057928066

                                                    <h6>End ofTerm Report</h6>
                                                </div>
                                                <div class="row mb-1">
                                                    <div class="col-md-8">
                                                        <h5>Name: Ibrahim Azeez</h5>
                                                        <h5 class="text-danger">Class: Year 9C</h5>
                                                        <h5 class="text-primary">Reg No: 1571 | DoB: 2007-01-25 | Term 2 | 2020/2021 Session</h5>
                                                        <!--                            <h6>Possible Attendance: | Actual Attendance:</h6>-->
                                                        <h5>Class Avg.: 75.0 | Student Avg.: 73.7 | GPA: 3.3</h5>
                                                        <h5 class="text-secondary">Form Tutor: Abu Chris </h5>
                                                        <h6>Possible Attendance: <span class="text-info" id="actual_attendance">110</span> | Actual Attendance: <span class="text-info" id="actual_attendance">110</span></h6>
                                                    </div>
                                                    <div class="col-md-4" id="printPageButton">
                                                        <img src="assets/images/users/avatar-2.jpg" style="height: 80px; width: 80px" alt="profile Picture">
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-bordered dt-responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Subject</th>
                                                            <th scope="col">CA</th>
                                                            <th scope="col">Exam</th>
                                                            <th scope="col">Average</th>
                                                            <th scope="col">Grade</th>
                                                            <th scope="col">Comment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td data-label="Subject">IRS</td>
                                                            <td data-label="CA">84.0</td>
                                                            <td data-label="Exam">81.0</td>
                                                            <td data-label="Avg">82.5</td>
                                                            <td data-label="Grade">A</td>
                                                            <td data-label="Comment">This is an excellent result. keep it up!</td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">Commerce</td>
                                                            <td data-label="CA">72.0</td>
                                                            <td data-label="Exam">60.0</td>
                                                            <td data-label="Avg">66.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <td data-label="Comment">This is a good result. I believe you can still push your limit to a higher level.</td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">Economics</td>
                                                            <td data-label="CA">72.0</td>
                                                            <td data-label="Exam">60.0</td>
                                                            <td data-label="Avg">66.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <td data-label="Comment">A good performance Abande more efforts would produce a better result.</td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">Etiquette</td>
                                                            <td data-label="CA">88.0</td>
                                                            <td data-label="Exam">85.0</td>
                                                            <td data-label="Avg">86.5</td>
                                                            <td data-label="Grade">A</td>
                                                            <td data-label="Comment"> Well done!</td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">Civic Edu.</td>
                                                            <td data-label="CA">81.0</td>
                                                            <td data-label="Exam">84.0</td>
                                                            <td data-label="Avg">82.5</td>
                                                            <td data-label="Grade">A</td>
                                                            <td data-label="Comment">Abande is an attentive student and has worked hard this term. </td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">Data Pro.</td>
                                                            <td data-label="CA">70.0</td>
                                                            <td data-label="Exam">79.0</td>
                                                            <td data-label="Avg">74.5</td>
                                                            <td data-label="Grade">B</td>
                                                            <td data-label="Comment">Impressive, keep working hard for a better grade next term.</td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">Account</td>
                                                            <td data-label="CA">76.0</td>
                                                            <td data-label="Exam">88.0</td>
                                                            <td data-label="Avg">82.0</td>
                                                            <td data-label="Grade">A</td>
                                                            <td data-label="Comment"> Impressive performance Abande. Keep it up!</td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">Insurance</td>
                                                            <td data-label="CA">76.0</td>
                                                            <td data-label="Exam">83.0</td>
                                                            <td data-label="Avg">79.5</td>
                                                            <td data-label="Grade">A</td>
                                                            <td data-label="Comment">Abande, enjoys participating in class and his background knowledge adds a great deal to our discussions. Keep it up.</td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">Further Maths</td>
                                                            <td data-label="CA">80.0</td>
                                                            <td data-label="Exam">48.0</td>
                                                            <td data-label="Avg">64.0</td>
                                                            <td data-label="Grade">C</td>
                                                            <td data-label="Comment"> An average result. There is still room for improvement.</td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">Mathematics</td>
                                                            <td data-label="CA">80.0</td>
                                                            <td data-label="Exam">51.0</td>
                                                            <td data-label="Avg">65.5</td>
                                                            <td data-label="Grade">B</td>
                                                            <td data-label="Comment"> A fairly good result. Work harder next term to achieve better grades.</td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">English</td>
                                                            <td data-label="CA">69.0</td>
                                                            <td data-label="Exam">55.0</td>
                                                            <td data-label="Avg">62.0</td>
                                                            <td data-label="Grade">C</td>
                                                            <td data-label="Comment">Good performance, Abande. You need to put in more efforts for better grades.</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p class="card text-danger" style="font-size: small">Key: A+: 90-100 | A: 75-89 | B: 65-74 | C:
                                                    50-64 | D: 45-49 | E: 40-44 | F: 0-39</p>
                                                <div class="marging-top-25">
                                                    <h6>Behavioral Analysis <span class="text-danger">(Lowest: 1, Highest: 5)</span></h6>
                                                    <table class="table table-striped table-bordered dt-responsive nowrap">
                                                        <thead>

                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="col">Behaviour</th>
                                                                <th scope="col">Rating</th>
                                                                <th scope="col">Behaviour</th>
                                                                <th scope="col">Rating</th>
                                                            </tr>
                                                            <tr>
                                                                <td>Generosity</td>
                                                                <td data-label="Rating" style="max-width: 4em">4 </td>
                                                                <td>Punctuality</td>
                                                                <td data-label="Rating" style="max-width: 4em">3 </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Class Attendance</td>
                                                                <td data-label="Rating" style="max-width: 4em">4 </td>
                                                                <td>Responsibility in Assignments</td>
                                                                <td data-label="Rating" style="max-width: 4em">4 </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Attentiveness</td>
                                                                <td data-label="Rating" style="max-width: 4em">4 </td>
                                                                <td>Initiative</td>
                                                                <td data-label="Rating" style="max-width: 4em">3 </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Neatness</td>
                                                                <td data-label="Rating" style="max-width: 4em">5 </td>
                                                                <td>Self Control</td>
                                                                <td data-label="Rating" style="max-width: 4em">4 </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Relationship With Staff</td>
                                                                <td data-label="Rating" style="max-width: 4em">4 </td>
                                                                <td>Relationship With Students</td>
                                                                <td data-label="Rating" style="max-width: 4em">3 </td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="col" colspan="4" class="text-center">Merits/Demerits or Detention</th>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col" colspan="1">Event</th>
                                                                <th scope="col" colspan="1">Number of occurrences</th>
                                                                <th scope="col" colspan="1">Event</th>
                                                                <th scope="col" colspan="1">Number of occurrences</th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="1">Merits</td>
                                                                <td colspan="1" data-label="No. of times occurred" style="max-width: 4em">none </td>
                                                                <td colspan="1">Demerits/Detention</td>
                                                                <td colspan="1" data-label="No. of times occurred" style="max-width: 4em">none </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="">
                                                        <p>
                                                        <div class="text-danger" style="font-size: large">CLASS TUTOR'S COMMENT: <span class="text-primary">Abande has achieved a very good report. Please encourage him to study each day to enhance understanding and improve his grades.</span></div>
                                                        </p>
                                                    </div>
                                                </div>
                                                <!--  End of Term Ends  -->

                                                <!-- End Of Term -->
                                                <!--  End Of Term Ends  -->

                                            </div>
                                        </div>
                                        <div>

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