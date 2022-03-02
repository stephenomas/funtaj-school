<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Staffs | Funtaj - Dashboard</title>
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
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Staffs</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Funtaj</a></li>
                                        <li class="breadcrumb-item active">Staffs</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <div class="row">
                        <div class="col-lg-3">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#addInfo" class="card bg-primary text-white-50">
                                <div class="card-body">
                                    <h5 class="text-white"><i class="mdi mdi-account-plus-outline me-3"></i> Add Staff</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="#" class="card bg-warning text-white-50">
                                <div class="card-body">
                                    <h5 class="text-white"><i class="mdi mdi-account--off-outline me-3"></i>Inactive Staffs</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="#" class="card bg-danger text-white-50">
                                <div class="card-body">
                                    <h5 class="text-white"><i class="mdi mdi-account-multiple-remove-outline me-3"></i> Deleted Staffs</h5>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Successful
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        Not Successful
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <ul class="nav nav-tabs nav-tabs-custom mb-4">
                                        <li class="nav-item">
                                            <a class="nav-link fw-bold p-3 active" href="#">All Staffs</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link p-3 fw-bold" href="#">Asokoro</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link p-3 fw-bold" href="#">Gudu</a>
                                        </li>
                                    </ul>
                                    <h4 class="card-title">All Staffs</h4>

                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Middle Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Reg No.</th>
                                                <th>Class</th>
                                                <th>Status</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <tr>
                                                <td>Ade</td>
                                                <td>Mike</td>
                                                <td>Stew</td>
                                                <td>abc@xyz.com</td>
                                                <td>14365</td>
                                                <td>Year 9</td>
                                                <td>Active</td>
                                                <td><a href="" data-bs-toggle="modal" data-bs-target="#viewDetails">View</a> | <a href="">Delete</a> | <a href="#" data-bs-toggle="modal" data-bs-target="#editInfo">Edit</a> | <a href="">deactivate</a></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="col-sm-6 col-md-4 col-xl-3">
                                        <!-- To edit staff details -->
                                    <?php include 'inc/edit-staff.php'; ?>
                                    <!-- To add new staff -->
                                    <?php include 'inc/add-staff.php'; ?>
                                    </div>

                                    <div class="col-sm-6 col-md-4 col-xl-3">
                                        <!-- To display staff information -->
                                        <?php include 'inc/staff-details.php'; ?>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div> <!-- container-fluid -->
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