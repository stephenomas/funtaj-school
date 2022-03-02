<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Results | Funtaj Schools - Students Dashboard </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="assets/css/pages/helpdesk.css" rel="stylesheet" type="text/css" />
    <link href="plugins/charts/chartist/chartist.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/css/modules/modules-widgets.css">  
    <!--  END CUSTOM STYLE FILE  -->
</head>

<body>
    <!-- Tab Mobile View Header -->
    <?php include 'inc/mobile-header.php'; ?>
    <!-- Tab Mobile View Header -->

    <!--  BEGIN NAVBAR  -->
    <?php include 'inc/desk-header.php'; ?>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <?php include 'inc/navbar.php'; ?>
        <!--  END TOPBAR  -->

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Results</h3>
                    </div>
                </div>

                <div class="row layout-spacing">

                    <a href="" class="col-xl-4 col-md-6 col-12">
                        <div class="widget-content-area br-4 mb-4">
                            <div class="d-flex justify-content-between t-likes">                                
                                <div class="">
                                    <p class="mb-0">2021/22</p>
                                    <h5 class="mb-0">Year 9</h5>
                                </div>
                                <div class="">
                                    <i class="flaticon-note-1"></i>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="" class="col-xl-4 col-md-6 col-12">
                        <div class="widget-content-area br-4 mb-4">
                            <div class="d-flex justify-content-between t-likes">                                
                                <div class="">
                                    <p class="mb-0">2020/21</p>
                                    <h5 class="mb-0">Year 8</h5>
                                </div>
                                <div class="">
                                    <i class="flaticon-note-1"></i>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="" class="col-xl-4 col-md-6 col-12">
                        <div class="widget-content-area br-4 mb-4">
                            <div class="d-flex justify-content-between t-likes">                                
                                <div class="">
                                    <p class="mb-0">2019/20</p>
                                    <h5 class="mb-0">Year 7</h5>
                                </div>
                                <div class="">
                                    <i class="flaticon-note-1"></i>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>

            </div>
        </div>
        <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!--  BEGIN FOOTER  -->
    <?php include 'inc/footer.php'; ?>
    <!--  END FOOTER  -->


    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/js/app.js"></script>

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY STYLES -->
</body>

</html>