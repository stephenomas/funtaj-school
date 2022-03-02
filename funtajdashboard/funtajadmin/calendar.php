<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Calendar | Funtaj - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Plugin css -->
    <link rel="stylesheet" href="assets/libs/@fullcalendar/core/main.min.css" type="text/css">
    <link rel="stylesheet" href="assets/libs/@fullcalendar/daygrid/main.min.css" type="text/css">
    <link rel="stylesheet" href="assets/libs/@fullcalendar/bootstrap/main.min.css" type="text/css">
    <link rel="stylesheet" href="assets/libs/@fullcalendar/timegrid/main.min.css" type="text/css">

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
                                <h4 class="mb-sm-0">Calendar</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Funtaj</a></li>
                                        <li class="breadcrumb-item active">Calendar</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row mb-4">
                        <div class="col-xl-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <button type="button" class="btn font-16 btn-primary waves-effect waves-light w-100" id="btn-new-event" data-bs-toggle="modal" data-bs-target="#event-modal">
                                        Create New Event
                                    </button>

                                    <div id="external-events">
                                        <br>
                                        <p class="text-muted">Drag and drop your event or click in the calendar</p>
                                        <div class="external-event fc-event bg-success" data-class="bg-success">
                                            <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>New Event
                                            Planning
                                        </div>
                                        <div class="external-event fc-event bg-info" data-class="bg-info">
                                            <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Meeting
                                        </div>
                                        <div class="external-event fc-event bg-warning" data-class="bg-warning">
                                            <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Generating
                                            Reports
                                        </div>
                                        <div class="external-event fc-event bg-danger" data-class="bg-danger">
                                            <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Create
                                            New theme
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> <!-- end col-->
                        <div class="col-xl-9">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row-->
                    <div style='clear:both'></div>

                    <!-- Add New Event MODAL -->
                    <div class="modal fade" id="event-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header py-3 px-4">
                                    <h5 class="modal-title" id="modal-title">Event</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body p-4">
                                    <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Event Name</label>
                                                    <input class="form-control" placeholder="Insert Event Name" type="text" name="title" id="event-title" required value="">
                                                    <div class="invalid-feedback">Please provide a valid event name
                                                    </div>
                                                </div>
                                            </div> <!-- end col-->
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Category</label>
                                                    <select class="form-select" name="category" id="event-category">
                                                        <option selected> --Select-- </option>
                                                        <option value="bg-danger">Danger</option>
                                                        <option value="bg-success">Success</option>
                                                        <option value="bg-primary">Primary</option>
                                                        <option value="bg-info">Info</option>
                                                        <option value="bg-dark">Dark</option>
                                                        <option value="bg-warning">Warning</option>
                                                    </select>
                                                    <div class="invalid-feedback">Please select a valid event
                                                        category</div>
                                                </div>
                                            </div> <!-- end col-->
                                        </div> <!-- end row-->
                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                                            </div> <!-- end col-->
                                            <div class="col-6 text-end">
                                                <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                            </div> <!-- end col-->
                                        </div> <!-- end row-->
                                    </form>
                                </div>
                            </div>
                            <!-- end modal-content-->
                        </div>
                        <!-- end modal dialog-->
                    </div>
                    <!-- end modal-->

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

    <!-- plugin js -->
    <script src="assets/libs/moment/min/moment.min.js"></script>
    <script src="assets/libs/jquery-ui-dist/jquery-ui.min.js"></script>
    <script src="assets/libs/@fullcalendar/core/main.min.js"></script>
    <script src="assets/libs/@fullcalendar/bootstrap/main.min.js"></script>
    <script src="assets/libs/@fullcalendar/daygrid/main.min.js"></script>
    <script src="assets/libs/@fullcalendar/timegrid/main.min.js"></script>
    <script src="assets/libs/@fullcalendar/interaction/main.min.js"></script>

    <!-- Calendar init -->
    <script src="assets/js/pages/calendar.init.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>