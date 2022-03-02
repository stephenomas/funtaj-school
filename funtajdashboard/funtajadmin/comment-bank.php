<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Comments Bank | Funtaj - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

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
                                <h4 class="mb-sm-0">Comments Bank</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Comments Bank</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <!-- <div class="col-12"> -->
                        <!-- Left sidebar -->
                        <div class="email-leftbar card col-md-3">
                            <div class="d-grid">
                                <div class="row">
                                    <a href="" class="btn btn-primary col-md-5 me-2 mb-3" data-bs-toggle="modal" data-bs-target="#commentmodal">
                                        Add Comment
                                    </a>
                                    <a href="" class="btn btn-secondary col-md-5 me-2 mb-3" data-bs-toggle="modal" data-bs-target="#categorymodal">
                                        Add Category
                                    </a>
                                </div>
                            </div>
                            <div class="mail-list mt-4">
                            <h6 class="mt-4">Categories</h6>
                                <div><i class="mdi mdi-circle-outline me-2"></i> Category 1 <span class="ms-1 float-end"><a href=""><i class="mdi mdi-trash-can-outline me-2 text-danger"></i></a></span></div><br>
                                <div><i class="mdi mdi-circle-outline me-2"></i> Category 2 <span class="ms-1 float-end"><a href=""><i class="mdi mdi-trash-can-outline me-2 text-danger"></i></a></span></div><br>
                                <div><i class="mdi mdi-circle-outline me-2"></i> Category 3 <span class="ms-1 float-end"><a href=""><i class="mdi mdi-trash-can-outline me-2 text-danger"></i></a></span></div><br>
                            </div>

                        </div>
                        <!-- End Left sidebar -->


                        <!-- Right Sidebar -->
                        <div class="email-rightb mb-3 col-md-8">

                            <div class="card">
                                <div class="btn-toolbar p-3" role="toolbar">
                                    <div class="btn-group me-2 mb-2 mb-sm-0">
                                        <button type="button" class="btn btn-primary waves-light waves-effect"><i class="far fa-trash-alt"></i></button>
                                    </div>
                                    <div class="btn-group me-2 mb-2 mb-sm-0">
                                        <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Category <i class="mdi mdi-chevron-down ms-1"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Updates</a>
                                            <a class="dropdown-item" href="#">Social</a>
                                            <a class="dropdown-item" href="#">Team Manage</a>
                                        </div>
                                    </div>
                                    <div class="btn-group me-2 mb-2 mb-sm-0">
                                        <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Added by <i class="mdi mdi-chevron-down ms-1"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Me</a>
                                            <a class="dropdown-item" href="#">Admin</a>
                                        </div>
                                    </div>

                                </div>
                                <ul class="message-list">
                                    <li>
                                        <div class="col-mail col-mail-1">
                                            <div class="checkbox-wrapper-mail">
                                                <input type="checkbox" id="chk19">
                                                <label class="form-label" for="chk19" class="toggle"></label>
                                            </div>
                                            <a href="#" class="title">CATEGORY</a>
                                        </div>
                                        <div class="col-mail col-mail-2">
                                            <a href="#" class="subject">Hello – <span class="teaser">Trip home from Colombo has been arranged, then Jenna will come get me from Stockholm. :)</span>
                                            </a>
                                            <div class="date"><a href="">Edit</a> | <a href="">Delete</a></div>
                                        </div>
                                    </li>

                                </ul>

                            </div> <!-- card -->

                            <div class="row">
                                <div class="col-7">
                                    Showing 1 - 20 of 1,524
                                </div>
                                <div class="col-5">
                                    <div class="btn-group float-end">
                                        <button type="button" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-left"></i></button>
                                        <button type="button" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-right"></i></button>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end Col-9 -->

                        <!-- </div> -->

                    </div><!-- End row -->
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <!-- Modal -->
            
            <?php include 'inc/comment-modal.php'; ?>
            <?php include 'inc/category-modal.php'; ?>
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

    <!--tinymce js-->
    <script src="assets/libs/tinymce/tinymce.min.js"></script>

    <!-- init js -->
    <script src="assets/js/pages/form-editor.init.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>