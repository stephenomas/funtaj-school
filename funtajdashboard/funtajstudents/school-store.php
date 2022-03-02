<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Product Catalog | Funtaj Schools - Students Dashboard </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="assets/css/ecommerce/product-catalog.css" rel="stylesheet" type="text/css" />
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
                        <h3>School Store</h3>
                    </div>
                </div>

                <div id="product-catalog-container" class="container">


                    <div class="row">

                        <a href="product-detail" class="col-xl-3 col-lg-6 col-md-6 col-sm-6 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-content widget-content-area px-0 py-0 product-cat7">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="wrapper">
                                                    <div class="row">
                                                        <div class="col-xl-12 card-image mb-4">
                                                            <img alt="image-product" src="assets/img/520x520.jpg" class="img-fluid">

                                                        </div>
                                                        <div class="col-xl-12 text-center">
                                                            <p class="card-cat">Category</p>
                                                            <h4 class="card-title">White shirt</h4>
                                                            <h3 class="card-pricing">₦ 23.00</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="widget-content widget-content- text-center">
                        <ul class="pagination pagination-style-5 pagination-rounded justify-content-center pagination-sm mb-5">
                            <li><a href="javascript:void(0);">&laquo;</a></li>
                            <li><a href="javascript:void(0);">1</a></li>
                            <li><a href="javascript:void(0);" class="active">2</a></li>
                            <li><a href="javascript:void(0);">3</a></li>
                            <li><a href="javascript:void(0);">4</a></li>
                            <li><a href="javascript:void(0);">5</a></li>
                            <li><a href="javascript:void(0);">&raquo;</a></li>
                        </ul>
                    </div>

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