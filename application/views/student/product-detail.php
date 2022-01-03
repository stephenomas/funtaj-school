
<body>
    <!-- Tab Mobile View Header -->
    <?php //include 'inc/mobile-header.php';
    $this->load->view('student/inc/mobile-header')
    ?>
    <!-- Tab Mobile View Header -->

    <!--  BEGIN NAVBAR  -->
    <?php //include 'inc/desk-header.php'; 
    $this->load->view('student/inc/desk-header')
    ?>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>


        <?php //include 'student/inc/navbar.php'; 
         $this->load->view('student/inc/navbar')
        ?>

        <!--  END TOPBAR  -->

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Product Details</h3>
                   
                    </div>
                </div>
                <?php 
                $this->load->view('errors/validation');
                ?>
            
                <form action="<?php echo base_url('save/cart');?>" method="post">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                                <div class="widget-content-area product-detail-1">
                                    <div class="row">
                                        <div class="col-lg-6 text-center">
                                            <div class="product-slider">
                                                <a class="product-image">
                                                    <!-- <div class="preview-pic tab-content">
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
                                                    </div> -->
                                                </a>
                                                <ul class="preview-thumbnail nav nav-tabs">
                                                    <li class="mb-sm-0 mb-2">
                                                        <a data-target="#pic-1" data-toggle="tab" class="active">
                                                            <img src="<?= base_url().$product->product_image ?>" alt="img" class="img-fluid" />
                                                        </a>
                                                    </li>
                                                    <!-- <li class="mb-sm-0 mb-2">
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
                                                    </li> -->
                                                </ul>
                                            </div>
                                        </div>
                                       
                                        <div class="col-lg-6">
                                            <div class="product-detailing">
                                                <h2 class="product-name mt-4"><?= $product->product_name ?></h2>
                                                <div class="product-rating mb-3">
                                                    <span class="star-rating">
                                                        <i class="flaticon-star-full"></i>
                                                        <i class="flaticon-star-full"></i>
                                                        <i class="flaticon-star-full"></i>
                                                        <i class="flaticon-star-full"></i>
                                                        <i class="flaticon-star-half"></i>
                                                    </span>
                                                    <a href="#"><?= $product->description ?></a>
                                                </div>
                                                <h2 class="product-price">₦ <?= number_format($product->product_price) ?></h2>
                                                <div class="product-description mt-4 mb-5">
                                                    <p><?= $product->description ?></p>
                                                </div>
                                                <div class="form-row product-attribute-select">
                                                    <div class="form-group col-md-6">
                                                        <input class="form-control" type="number" name="qty" placeholder="quantity">
                                                    </div>
                                                    <div class="form-group col-md-6 mb-4">
                                                        <select name="size" class="form-control">
                                                            <option selected="selected">Choose Size</option>
                                                            <?php 
                                                            foreach($sizes as $size){
                                                                if($size->size_quantity > 0){
                                                            ?>
                                                            <option><?= $size->product_size?></option>
                                                            
                                                            <?php
                                                            }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row product-btn-cart">
                                                    <div class="form-group col-md-6">
                                                   
                                                       
                                                        <input type="hidden" class="buyfield" name="product_id" value="<?php echo $product->product_id?>"/>
                                                       
                                                        <button type="submit" class="btn btn-dark" >Add to cart</button>
                                                    </div>
                                                  
                                                </form>	
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
    <?php //include 'inc/footer.php'; 
    $this->load->view('student/inc/footer')
    ?>
    <!--  END FOOTER  -->

