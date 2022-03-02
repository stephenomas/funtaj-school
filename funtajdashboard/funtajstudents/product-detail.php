<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Product Details | Funtaj Schools - Students Dashboard </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="assets/css/ecommerce/product-details-1.css" rel="stylesheet" type="text/css" />
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
                        <h3>Product Details</h3>
                    </div>
                </div>

                <div class="statbox widget box box-shadow">
                    <div class="widget-content">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                                <div class="widget-content-area product-detail-1">
                                    <div class="row">
                                        <div class="col-lg-6 text-center">
                                            <div class="product-slider">
                                                <a class="product-image">
                                                    <div class="preview-pic tab-content">
                                                        <div class="tab-pane active" id="pic-1">
                                                            <img src="assets/img/320x320.jpg" alt="img" class="img-fluid" />
                                                        </div>
                                                        <div class="tab-pane" id="pic-2">
                                                            <img src="assets/img/320x320.jpg" alt="img" class="img-fluid" />
                                                        </div>
                                                        <div class="tab-pane" id="pic-3">
                                                            <img src="assets/img/320x320.jpg" alt="img" class="img-fluid" />
                                                        </div>
                                                        <div class="tab-pane" id="pic-4">
                                                            <img src="assets/img/320x320.jpg" alt="img" class="img-fluid" />
                                                        </div>
                                                    </div>
                                                </a>
                                                <ul class="preview-thumbnail nav nav-tabs">
                                                    <li class="mb-sm-0 mb-2">
                                                        <a data-target="#pic-1" data-toggle="tab" class="active">
                                                            <img src="assets/img/320x320.jpg" alt="img" class="img-fluid" />
                                                        </a>
                                                    </li>
                                                    <li class="mb-sm-0 mb-2">
                                                        <a data-target="#pic-2" data-toggle="tab">
                                                            <img src="assets/img/320x320.jpg" alt="img" class="img-fluid" />
                                                        </a>
                                                    </li>
                                                    <li class="mb-sm-0 mb-2">
                                                        <a data-target="#pic-3" data-toggle="tab">
                                                            <img src="assets/img/320x320.jpg" alt="img" class="img-fluid" />
                                                        </a>
                                                    </li>
                                                    <li class="mb-sm-0 mb-2">
                                                        <a data-target="#pic-4" data-toggle="tab">
                                                            <img src="assets/img/320x320.jpg" alt="img" class="img-fluid" />
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="product-detailing">
                                                <h2 class="product-name mt-4">White Shirt</h2>
                                                <div class="product-rating mb-3">
                                                    <span class="star-rating">
                                                        <i class="flaticon-star-full"></i>
                                                        <i class="flaticon-star-full"></i>
                                                        <i class="flaticon-star-full"></i>
                                                        <i class="flaticon-star-full"></i>
                                                        <i class="flaticon-star-half"></i>
                                                    </span>
                                                    <a href="#">(2 customer reviews)</a>
                                                </div>
                                                <h2 class="product-price">₦ 2000.00</h2>
                                                <div class="product-description mt-4 mb-5">
                                                    <p>Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations creates a modern personalized look.</p>
                                                </div>
                                                <div class="form-row product-attribute-select">
                                                    <div class="form-group col-md-6">
                                                        <input class="form-control" type="number" value="1">
                                                    </div>
                                                    <div class="form-group col-md-6 mb-4">
                                                        <select class="form-control">
                                                            <option selected="selected">Choose Size</option>
                                                            <option>12</option>
                                                            <option disabled="">30</option>
                                                            <option>45</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row product-btn-cart">
                                                    <div class="form-group col-md-6">
                                                        <a class="btn btn-dark" href="#">Add to cart</a>
                                                    </div>
                                                </div>
                                                <hr class="mt-3 mb-3">
                                                <ul class="info-list list-unstyled mb-0">
                                                    <li>
                                                        <span class="info-list-title">SKU:</span>
                                                        <span class="info-list-text">213496</span>
                                                    </li>
                                                    <li>
                                                        <span class="info-list-title">Category:</span><span class="info-list-text">
                                                            <a href="#">Primary</a>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="info-list-title">Tags:</span>
                                                        <span class="info-list-text"><a href="#">Shirt</a>, <a href="#">Short Sleeve</a> </span>
                                                    </li>
                                                </ul>
                                                <hr class="mt-3 mb-3">
                                                <ul class="info-list list-unstyled social-icons mb-0">
                                                    <li>
                                                        <span class="info-list-title">Share:</span>
                                                        <span>
                                                            <i class="flaticon-twitter-logo"></i>
                                                            <i class="flaticon-facebook-logo"></i>
                                                            <i class="flaticon-instagram-logo"></i>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="product-breif-description">
                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="pills-description" data-toggle="pill" href="#pills-desc" role="tab" aria-controls="pills-desc" aria-selected="true">Description</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-additional-info" data-toggle="pill" href="#pills-add-info" role="tab" aria-controls="pills-add-info" aria-selected="false">Additional Information</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-review" data-toggle="pill" href="#pills-rev" role="tab" aria-controls="pills-rev" aria-selected="false">Reviews (3)</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-desc" role="tabpanel" aria-labelledby="pills-description">
                                                    <h3 class="mb-4 mt-5">Description:</h3>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                    </p>
                                                </div>
                                                <div class="tab-pane fade" id="pills-add-info" role="tabpanel" aria-labelledby="pills-additional-info">
                                                    <h3 class="mb-4 mt-5">Additional Info:</h3>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                    </p>
                                                </div>
                                                <div class="tab-pane fade" id="pills-rev" role="tabpanel" aria-labelledby="pills-review">
                                                    <h3 class="mb-4 mt-5">Reviews:</h3>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="col-xl-12 col-lg-12 col-md-12 related-products">
                                        <div class="text-center">
                                            <h3>Related Products</h3>
                                            <p class="mb-5 mt-2">These prducts may also intrest to you!</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                <div class="container">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

    <!--  BEGIN CUSTOM SCRIPT FILES  -->
    <script src="assets/js/ecommerce/custom-ecommerce_pro_detail1.js"></script>
    <!--  END CUSTOM SCRIPT FILES  -->
</body>

</html>