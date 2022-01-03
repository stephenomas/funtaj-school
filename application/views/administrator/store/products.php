<body data-sidebar="dark">
 
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


    <?php //include 'inc/topbar.php'; 
    $this->load->view('administrator/inc/topbar')
    ?>

    <!-- ========== Left Sidebar Start ========== -->
    <?php //include 'inc/sidebar.php'; 
    $this->load->view('administrator/inc/sidebar')
    ?>


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
                                <h4 class="mb-sm-0">Products</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Products</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <h5>Uniform</h5>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-inline float-md-end">
                                                    <div class="search-box ms-2">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control rounded" placeholder="Search...">
                                                            <i class="mdi mdi-magnify search-icon"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <span class="d-flex">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#addInfo" class="btn btn-primary col-md-2">Add New</a>
                                            </span>

                                        </div>

                                        <ul class="list-inline my-3 ecommerce-sortby-list">
                                            <li class="list-inline-item"><span class="fw-medium font-family-secondary">Sort by:</span></li>
                                            <li class="list-inline-item active"><a href="#">All</a></li>
                                            <li class="list-inline-item"><a href="#">Primary</a></li>
                                            <li class="list-inline-item"><a href="#">Secondary</a></li>
                                        </ul>
                                        <?php $this->load->view('errors/validation') ?>
                                        <div class="row g-0">
                                            <?php foreach ($productsData as $prod){ ?>
                                            <div class="col-xl-3 col-sm-6">
                                                <div class="product-box">
                                                    <div class="product-img">
                                                        <div class="product-ribbon badge bg-warning">
                                                            4 left
                                                        </div>
                                                        <div data-bs-toggle="modal" data-bs-target="#editinfo" class="product-like">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#editinfo">
                                                                <i class="mdi mdi-pencil-outline"></i>
                                                            </a>
                                                        </div>
                                                        <img src="<?=base_url().$prod->product_image ?>" alt="img-1" class="img-fluid mx-auto d-block">
                                                    </div>
  
                                                    <div class="text-center">
                                                        <p class="font-size-12 mb-1"><?php 
                                                        $this->db->where('id', $prod->product_category);
                                                        $cat = $this->db->get('products_categories')->row();
                                                        echo  $cat->categories;
                                                        ?></p>
                                                        <h5 class="font-size-15"><a href="#" class="text-dark"><?= $prod->product_name ?></a></h5>

                                                        <h5 class="mt-3 mb-0">₦<?= number_format($prod->product_price) ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                           <?php } ?>
                                         
                                           
                                           

                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-sm-6">
                                                <div>
                                                    <p class="mb-sm-0 mt-2">Page <span class="fw-bold">2</span> Of <span class="fw-bold">113</span></p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="float-sm-end">
                                                    <ul class="pagination pagination-rounded mb-sm-0">
                                                        <li class="page-item disabled">
                                                            <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link">1</a>
                                                        </li>
                                                        <li class="page-item active">
                                                            <a href="#" class="page-link">2</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link">3</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link">4</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link">5</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link"><i class="mdi mdi-chevron-end"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-4 col-xl-3">
                                            <!-- To edit student details -->
                                            <?php //include 'inc/edit-product.php'; 
                              
            
                                             $this->load->view('administrator/inc/edit-product')
                               
                                 
                                            ?>

                                            <!-- To add new student -->
                                            <?php // include 'inc/add-product.php'; 
                                               $this->load->view('administrator/inc/add-product')
                                            ?>

                                            <!-- To display student information -->
                                            <?php //include 'inc/product-details.php'; 
                                               $this->load->view('administrator/inc/product-details')
                                            ?>
                                        </div>

                                        <div class="col-sm-6 col-md-4 col-xl-3">

                                        </div>
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
    <?php //include 'inc/footer.php'; 
            
            $this->load->view('administrator/inc/footer')
            ?>
