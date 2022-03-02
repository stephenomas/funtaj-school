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
                                                <table class="table table-striped table-bordered dt-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="colgroup" colspan="4">Term 1</th>
                                                            <th scope="colgroup" colspan="4">Term 2</th>
                                                            <th scope="colgroup" colspan="4">Term 3</th>
                                                            <th scope="colgroup" colspan="2">Year</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">Subject</th>
                                                            <th scope="col">CA</th>
                                                            <th scope="col">Exam</th>
                                                            <th scope="col">Avg</th>
                                                            <th scope="col">Grade</th>
                                                            <th scope="col">CA</th>
                                                            <th scope="col">Exam</th>
                                                            <th scope="col">Avg</th>
                                                            <th scope="col">Grade</th>
                                                            <th scope="col">CA</th>
                                                            <th scope="col">Exam</th>
                                                            <th scope="col">Avg</th>
                                                            <th scope="col">Grade</th>
                                                            <th scope="col">Avg</th>
                                                            <th scope="col">Grade</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td data-label="Subject">Agric. Science</td>
                                                            <td data-label="CA">63.0</td>
                                                            <td data-label="Exam">74.0</td>
                                                            <td data-label="Avg">69.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <!--                                    Term 2-->
                                                            <td data-label="CA">54.0</td>
                                                            <td data-label="Exam">70.0</td>
                                                            <td data-label="Avg">62.0</td>
                                                            <td data-label="Grade">C</td>
                                                            <!--                                    Term 3-->
                                                            <td data-label="CA">55.0</td>
                                                            <td data-label="Exam">78.0</td>
                                                            <td data-label="Avg">67.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <td data-label="Year Avg">66.0</td>
                                                            <td data-label="Year Grade">
                                                                B </td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">Basic Science</td>
                                                            <td data-label="CA">76.0</td>
                                                            <td data-label="Exam">64.0</td>
                                                            <td data-label="Avg">70.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <!--                                    Term 2-->
                                                            <td data-label="CA">42.0</td>
                                                            <td data-label="Exam">58.0</td>
                                                            <td data-label="Avg">50.0</td>
                                                            <td data-label="Grade">C</td>
                                                            <!--                                    Term 3-->
                                                            <td data-label="CA">67.0</td>
                                                            <td data-label="Exam">57.0</td>
                                                            <td data-label="Avg">62.0</td>
                                                            <td data-label="Grade">C</td>
                                                            <td data-label="Year Avg">60.7</td>
                                                            <td data-label="Year Grade">
                                                                C </td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">Basic Tech</td>
                                                            <td data-label="CA">72.0</td>
                                                            <td data-label="Exam">54.0</td>
                                                            <td data-label="Avg">63.0</td>
                                                            <td data-label="Grade">C</td>
                                                            <!--                                    Term 2-->
                                                            <td data-label="CA">56.0</td>
                                                            <td data-label="Exam">51.0</td>
                                                            <td data-label="Avg">54.0</td>
                                                            <td data-label="Grade">C</td>
                                                            <!--                                    Term 3-->
                                                            <td data-label="CA">68.0</td>
                                                            <td data-label="Exam">54.0</td>
                                                            <td data-label="Avg">61.0</td>
                                                            <td data-label="Grade">C</td>
                                                            <td data-label="Year Avg">59.3</td>
                                                            <td data-label="Year Grade">
                                                                C </td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">Business Studies</td>
                                                            <td data-label="CA">90.0</td>
                                                            <td data-label="Exam">86.0</td>
                                                            <td data-label="Avg">88.0</td>
                                                            <td data-label="Grade">A</td>
                                                            <!--                                    Term 2-->
                                                            <td data-label="CA">80.0</td>
                                                            <td data-label="Exam">76.0</td>
                                                            <td data-label="Avg">78.0</td>
                                                            <td data-label="Grade">A</td>
                                                            <!--                                    Term 3-->
                                                            <td data-label="CA">76.0</td>
                                                            <td data-label="Exam">62.0</td>
                                                            <td data-label="Avg">69.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <td data-label="Year Avg">78.3</td>
                                                            <td data-label="Year Grade">
                                                                A </td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">CCA</td>
                                                            <td data-label="CA">80.0</td>
                                                            <td data-label="Exam">60.0</td>
                                                            <td data-label="Avg">70.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <!--                                    Term 2-->
                                                            <td data-label="CA">74.0</td>
                                                            <td data-label="Exam">60.0</td>
                                                            <td data-label="Avg">67.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <!--                                    Term 3-->
                                                            <td data-label="CA">70.0</td>
                                                            <td data-label="Exam">57.0</td>
                                                            <td data-label="Avg">64.0</td>
                                                            <td data-label="Grade">C</td>
                                                            <td data-label="Year Avg">67.0</td>
                                                            <td data-label="Year Grade">
                                                                B </td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">Civic Edu.</td>
                                                            <td data-label="CA">63.0</td>
                                                            <td data-label="Exam">59.0</td>
                                                            <td data-label="Avg">61.0</td>
                                                            <td data-label="Grade">C</td>
                                                            <!--                                    Term 2-->
                                                            <td data-label="CA">85.0</td>
                                                            <td data-label="Exam">50.0</td>
                                                            <td data-label="Avg">68.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <!--                                    Term 3-->
                                                            <td data-label="CA">73.0</td>
                                                            <td data-label="Exam">54.0</td>
                                                            <td data-label="Avg">64.0</td>
                                                            <td data-label="Grade">C</td>
                                                            <td data-label="Year Avg">64.3</td>
                                                            <td data-label="Year Grade">
                                                                C </td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">Computer</td>
                                                            <td data-label="CA">90.0</td>
                                                            <td data-label="Exam">72.0</td>
                                                            <td data-label="Avg">81.0</td>
                                                            <td data-label="Grade">A</td>
                                                            <!--                                    Term 2-->
                                                            <td data-label="CA">80.0</td>
                                                            <td data-label="Exam">50.0</td>
                                                            <td data-label="Avg">65.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <!--                                    Term 3-->
                                                            <td data-label="CA">76.0</td>
                                                            <td data-label="Exam">75.0</td>
                                                            <td data-label="Avg">76.0</td>
                                                            <td data-label="Grade">A</td>
                                                            <td data-label="Year Avg">74.0</td>
                                                            <td data-label="Year Grade">
                                                                B </td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">English</td>
                                                            <td data-label="CA">40.0</td>
                                                            <td data-label="Exam">70.0</td>
                                                            <td data-label="Avg">55.0</td>
                                                            <td data-label="Grade">C</td>
                                                            <!--                                    Term 2-->
                                                            <td data-label="CA">70.0</td>
                                                            <td data-label="Exam">73.0</td>
                                                            <td data-label="Avg">72.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <!--                                    Term 3-->
                                                            <td data-label="CA">80.0</td>
                                                            <td data-label="Exam">50.0</td>
                                                            <td data-label="Avg">65.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <td data-label="Year Avg">64.0</td>
                                                            <td data-label="Year Grade">
                                                                C </td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">Fine Art</td>
                                                            <td data-label="CA">87.0</td>
                                                            <td data-label="Exam">65.0</td>
                                                            <td data-label="Avg">76.0</td>
                                                            <td data-label="Grade">A</td>
                                                            <!--                                    Term 2-->
                                                            <td data-label="CA">81.0</td>
                                                            <td data-label="Exam">74.0</td>
                                                            <td data-label="Avg">78.0</td>
                                                            <td data-label="Grade">A</td>
                                                            <!--                                    Term 3-->
                                                            <td data-label="CA">64.0</td>
                                                            <td data-label="Exam">68.0</td>
                                                            <td data-label="Avg">66.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <td data-label="Year Avg">73.3</td>
                                                            <td data-label="Year Grade">
                                                                B </td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">French</td>
                                                            <td data-label="CA">83.0</td>
                                                            <td data-label="Exam">73.0</td>
                                                            <td data-label="Avg">78.0</td>
                                                            <td data-label="Grade">A</td>
                                                            <!--                                    Term 2-->
                                                            <td data-label="CA">70.0</td>
                                                            <td data-label="Exam">61.0</td>
                                                            <td data-label="Avg">66.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <!--                                    Term 3-->
                                                            <td data-label="CA">73.0</td>
                                                            <td data-label="Exam">59.0</td>
                                                            <td data-label="Avg">66.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <td data-label="Year Avg">70.0</td>
                                                            <td data-label="Year Grade">
                                                                B </td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">Hausa</td>
                                                            <td data-label="CA">79.0</td>
                                                            <td data-label="Exam">71.0</td>
                                                            <td data-label="Avg">75.0</td>
                                                            <td data-label="Grade">A</td>
                                                            <!--                                    Term 2-->
                                                            <td data-label="CA">49.0</td>
                                                            <td data-label="Exam">65.0</td>
                                                            <td data-label="Avg">57.0</td>
                                                            <td data-label="Grade">C</td>
                                                            <!--                                    Term 3-->
                                                            <td data-label="CA">75.0</td>
                                                            <td data-label="Exam">61.0</td>
                                                            <td data-label="Avg">68.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <td data-label="Year Avg">66.7</td>
                                                            <td data-label="Year Grade">
                                                                B </td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">Home Eco.</td>
                                                            <td data-label="CA">64.0</td>
                                                            <td data-label="Exam">69.0</td>
                                                            <td data-label="Avg">67.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <!--                                    Term 2-->
                                                            <td data-label="CA">57.0</td>
                                                            <td data-label="Exam">52.0</td>
                                                            <td data-label="Avg">55.0</td>
                                                            <td data-label="Grade">C</td>
                                                            <!--                                    Term 3-->
                                                            <td data-label="CA">71.0</td>
                                                            <td data-label="Exam">60.0</td>
                                                            <td data-label="Avg">66.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <td data-label="Year Avg">62.7</td>
                                                            <td data-label="Year Grade">
                                                                C </td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">IRS</td>
                                                            <td data-label="CA">88.0</td>
                                                            <td data-label="Exam">68.0</td>
                                                            <td data-label="Avg">78.0</td>
                                                            <td data-label="Grade">A</td>
                                                            <!--                                    Term 2-->
                                                            <td data-label="CA">94.0</td>
                                                            <td data-label="Exam">53.0</td>
                                                            <td data-label="Avg">74.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <!--                                    Term 3-->
                                                            <td data-label="CA">86.0</td>
                                                            <td data-label="Exam">83.0</td>
                                                            <td data-label="Avg">85.0</td>
                                                            <td data-label="Grade">A</td>
                                                            <td data-label="Year Avg">79.0</td>
                                                            <td data-label="Year Grade">
                                                                A </td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">Mathematics</td>
                                                            <td data-label="CA">89.0</td>
                                                            <td data-label="Exam">66.0</td>
                                                            <td data-label="Avg">78.0</td>
                                                            <td data-label="Grade">A</td>
                                                            <!--                                    Term 2-->
                                                            <td data-label="CA">87.0</td>
                                                            <td data-label="Exam">58.0</td>
                                                            <td data-label="Avg">73.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <!--                                    Term 3-->
                                                            <td data-label="CA">90.0</td>
                                                            <td data-label="Exam">37.0</td>
                                                            <td data-label="Avg">64.0</td>
                                                            <td data-label="Grade">C</td>
                                                            <td data-label="Year Avg">71.7</td>
                                                            <td data-label="Year Grade">
                                                                B </td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">Music</td>
                                                            <td data-label="CA">73.0</td>
                                                            <td data-label="Exam">60.0</td>
                                                            <td data-label="Avg">67.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <!--                                    Term 2-->
                                                            <td data-label="CA">66.0</td>
                                                            <td data-label="Exam">71.0</td>
                                                            <td data-label="Avg">69.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <!--                                    Term 3-->
                                                            <td data-label="CA">72.0</td>
                                                            <td data-label="Exam">63.0</td>
                                                            <td data-label="Avg">68.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <td data-label="Year Avg">68.0</td>
                                                            <td data-label="Year Grade">
                                                                B </td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">PHE</td>
                                                            <td data-label="CA">56.0</td>
                                                            <td data-label="Exam">62.0</td>
                                                            <td data-label="Avg">59.0</td>
                                                            <td data-label="Grade">C</td>
                                                            <!--                                    Term 2-->
                                                            <td data-label="CA">79.0</td>
                                                            <td data-label="Exam">58.0</td>
                                                            <td data-label="Avg">69.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <!--                                    Term 3-->
                                                            <td data-label="CA">55.0</td>
                                                            <td data-label="Exam">82.0</td>
                                                            <td data-label="Avg">69.0</td>
                                                            <td data-label="Grade">B</td>
                                                            <td data-label="Year Avg">65.7</td>
                                                            <td data-label="Year Grade">
                                                                B </td>
                                                        </tr>
                                                        <tr>
                                                            <td data-label="Subject">Social Studies</td>
                                                            <td data-label="CA">85.0</td>
                                                            <td data-label="Exam">75.0</td>
                                                            <td data-label="Avg">80.0</td>
                                                            <td data-label="Grade">A</td>
                                                            <!--                                    Term 2-->
                                                            <td data-label="CA">85.0</td>
                                                            <td data-label="Exam">74.0</td>
                                                            <td data-label="Avg">80.0</td>
                                                            <td data-label="Grade">A</td>
                                                            <!--                                    Term 3-->
                                                            <td data-label="CA">85.0</td>
                                                            <td data-label="Exam">71.0</td>
                                                            <td data-label="Avg">78.0</td>
                                                            <td data-label="Grade">A</td>
                                                            <td data-label="Year Avg">79.3</td>
                                                            <td data-label="Year Grade">
                                                                A </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="">
                                                    <p class="card text-danger" style="font-size: small">Key: A+: 90-100 | A: 75-89 | B: 65-74 | C:
                                                        50-64 | D: 45-49 | E: 40-44 | F: 0-39</p>
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