<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Orders | Funtaj - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

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
                                <h4 class="mb-sm-0">Orders</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Orders</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body  pt-0">
                                    <ul class="nav nav-tabs nav-tabs-custom mb-4">
                                        <li class="nav-item">
                                            <a class="nav-link fw-bold p-3 active" href="#">All Orders</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link p-3 fw-bold" href="#">Active</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link p-3 fw-bold" href="#">Unpaid</a>
                                        </li>
                                    </ul>
                                    <div class="table-responsive">
                                        <table class="table table-centered datatable dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th style="width: 20px;">
                                                        <div class="form-checkbox">
                                                            <input type="checkbox" class="form-check-input" id="ordercheck">
                                                            <label class="form-check-label mb-0" for="ordercheck">&nbsp;</label>
                                                        </div>
                                                    </th>
                                                    <th>Order ID</th>
                                                    <th>Date</th>
                                                    <th>Billing Name</th>
                                                    <th>Total</th>
                                                    <th>Payment Status</th>
                                                    <th>Invoice</th>
                                                    <th style="width: 120px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-checkbox">
                                                            <input type="checkbox" class="form-check-input" id="ordercheck1">
                                                            <label class="form-check-label mb-0" for="ordercheck1">&nbsp;</label>
                                                        </div>
                                                    </td>

                                                    <td><a href="javascript: void(0);" class="text-dark fw-bold">#NZ1572</a> </td>
                                                    <td>
                                                        04 Apr, 2020
                                                    </td>
                                                    <td>Walter Brown</td>

                                                    <td>
                                                        ₦172
                                                    </td>
                                                    <td>
                                                        <div class="badge badge-soft-success font-size-12">Paid</div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-light btn-rounded">Invoice <i class="mdi mdi-download ms-2"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="me-3 text-primary" data-bs-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="form-checkbox">
                                                            <input type="checkbox" class="form-check-input" id="ordercheck2">
                                                            <label class="form-check-label mb-0" for="ordercheck2">&nbsp;</label>
                                                        </div>
                                                    </td>

                                                    <td><a href="javascript: void(0);" class="text-dark fw-bold">#NZ1571</a> </td>
                                                    <td>
                                                        03 Apr, 2020
                                                    </td>
                                                    <td>Jimmy Barker</td>

                                                    <td>
                                                        ₦165
                                                    </td>
                                                    <td>
                                                        <div class="badge badge-soft-warning font-size-12">unpaid</div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-light btn-rounded">Invoice <i class="mdi mdi-download ms-2"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="me-3 text-primary" data-bs-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="form-checkbox">
                                                            <input type="checkbox" class="form-check-input" id="ordercheck3">
                                                            <label class="form-check-label mb-0" for="ordercheck3">&nbsp;</label>
                                                        </div>
                                                    </td>

                                                    <td><a href="javascript: void(0);" class="text-dark fw-bold">#NZ1570</a> </td>
                                                    <td>
                                                        03 Apr, 2020
                                                    </td>
                                                    <td>Donald Bailey</td>

                                                    <td>
                                                        ₦146
                                                    </td>
                                                    <td>
                                                        <div class="badge badge-soft-success font-size-12">Paid</div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-light btn-rounded">Invoice <i class="mdi mdi-download ms-2"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="me-3 text-primary" data-bs-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="form-checkbox">
                                                            <input type="checkbox" class="form-check-input" id="ordercheck4">
                                                            <label class="form-check-label mb-0" for="ordercheck4">&nbsp;</label>
                                                        </div>
                                                    </td>

                                                    <td><a href="javascript: void(0);" class="text-dark fw-bold">#NZ1569</a> </td>
                                                    <td>
                                                        02 Apr, 2020
                                                    </td>
                                                    <td>Paul Jones</td>

                                                    <td>
                                                        ₦183
                                                    </td>
                                                    <td>
                                                        <div class="badge badge-soft-success font-size-12">Paid</div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-light btn-rounded">Invoice <i class="mdi mdi-download ms-2"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="me-3 text-primary" data-bs-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="form-checkbox">
                                                            <input type="checkbox" class="form-check-input" id="ordercheck5">
                                                            <label class="form-check-label mb-0" for="ordercheck5">&nbsp;</label>
                                                        </div>
                                                    </td>

                                                    <td><a href="javascript: void(0);" class="text-dark fw-bold">#NZ1568</a> </td>
                                                    <td>
                                                        01 Apr, 2020
                                                    </td>
                                                    <td>Jefferson Allen</td>

                                                    <td>
                                                        ₦160
                                                    </td>
                                                    <td>
                                                        <div class="badge badge-soft-danger font-size-12">Chargeback</div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-light btn-rounded">Invoice <i class="mdi mdi-download ms-2"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="me-3 text-primary" data-bs-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="form-checkbox">
                                                            <input type="checkbox" class="form-check-input" id="ordercheck6">
                                                            <label class="form-check-label mb-0" for="ordercheck6">&nbsp;</label>
                                                        </div>
                                                    </td>

                                                    <td><a href="javascript: void(0);" class="text-dark fw-bold">#NZ1567</a> </td>
                                                    <td>
                                                        31 Mar, 2020
                                                    </td>
                                                    <td>Jeffrey Waltz</td>

                                                    <td>
                                                        ₦105
                                                    </td>
                                                    <td>
                                                        <div class="badge badge-soft-warning font-size-12">unpaid</div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-light btn-rounded">Invoice <i class="mdi mdi-download ms-2"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="me-3 text-primary" data-bs-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="form-checkbox">
                                                            <input type="checkbox" class="form-check-input" id="ordercheck7">
                                                            <label class="form-check-label mb-0" for="ordercheck7">&nbsp;</label>
                                                        </div>
                                                    </td>

                                                    <td><a href="javascript: void(0);" class="text-dark fw-bold">#NZ1566</a> </td>
                                                    <td>
                                                        30 Mar, 2020
                                                    </td>
                                                    <td>Jewel Buckley</td>

                                                    <td>
                                                        ₦112
                                                    </td>
                                                    <td>
                                                        <div class="badge badge-soft-success font-size-12">Paid</div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-light btn-rounded">Invoice <i class="mdi mdi-download ms-2"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="me-3 text-primary" data-bs-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="form-checkbox">
                                                            <input type="checkbox" class="form-check-input" id="ordercheck8">
                                                            <label class="form-check-label mb-0" for="ordercheck8">&nbsp;</label>
                                                        </div>
                                                    </td>

                                                    <td><a href="javascript: void(0);" class="text-dark fw-bold">#NZ1565</a> </td>
                                                    <td>
                                                        29 Mar, 2020
                                                    </td>
                                                    <td>Jamison Clark</td>

                                                    <td>
                                                        ₦123
                                                    </td>
                                                    <td>
                                                        <div class="badge badge-soft-success font-size-12">Paid</div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-light btn-rounded">Invoice <i class="mdi mdi-download ms-2"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="me-3 text-primary" data-bs-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="form-checkbox">
                                                            <input type="checkbox" class="form-check-input" id="ordercheck9">
                                                            <label class="form-check-label mb-0" for="ordercheck9">&nbsp;</label>
                                                        </div>
                                                    </td>

                                                    <td><a href="javascript: void(0);" class="text-dark fw-bold">#NZ1564</a> </td>
                                                    <td>
                                                        28 Mar, 2020
                                                    </td>
                                                    <td>Eddy Torres</td>

                                                    <td>
                                                        ₦141
                                                    </td>
                                                    <td>
                                                        <div class="badge badge-soft-success font-size-12">Paid</div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-light btn-rounded">Invoice <i class="mdi mdi-download ms-2"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="me-3 text-primary" data-bs-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="form-checkbox">
                                                            <input type="checkbox" class="form-check-input" id="ordercheck10">
                                                            <label class="form-check-label mb-0" for="ordercheck10">&nbsp;</label>
                                                        </div>
                                                    </td>

                                                    <td><a href="javascript: void(0);" class="text-dark fw-bold">#NZ1563</a> </td>
                                                    <td>
                                                        28 Mar, 2020
                                                    </td>
                                                    <td>Frank Dean</td>

                                                    <td>
                                                        ₦164
                                                    </td>
                                                    <td>
                                                        <div class="badge badge-soft-warning font-size-12">unpaid</div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-light btn-rounded">Invoice <i class="mdi mdi-download ms-2"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="me-3 text-primary" data-bs-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="form-checkbox">
                                                            <input type="checkbox" class="form-check-input" id="ordercheck11">
                                                            <label class="form-check-label mb-0" for="ordercheck11">&nbsp;</label>
                                                        </div>
                                                    </td>

                                                    <td><a href="javascript: void(0);" class="text-dark fw-bold">#NZ15632</a> </td>
                                                    <td>
                                                        27 Mar, 2020
                                                    </td>
                                                    <td>James Hamilton</td>

                                                    <td>
                                                        ₦154
                                                    </td>
                                                    <td>
                                                        <div class="badge badge-soft-success font-size-12">Paid</div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-light btn-rounded">Invoice <i class="mdi mdi-download ms-2"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="me-3 text-primary" data-bs-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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

    <!-- Required datatable js -->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <script src="assets/js/pages/ecommerce-order-datatables.init.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>