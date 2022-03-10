<div id="layout-wrapper">


    <?php //include 'inc/topbar.php'; 
    $this->load->view('administrator/inc/topbar')
    ?>

    <!-- ========== Left Sidebar Start ========== -->
    <?php //include 'inc/sidebar.php'; 
    $this->load->view('administrator/inc/sidebar')
    ?>
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
                            <h4 class="mb-sm-0">Product Details</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Product Detail</li>
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
                                <div class="row">
                                    <div class="col-xl-5">
                                        <div class="product-detail">
                                            <div class="row">
                                            <?php 
                                            $this->load->view('errors/validation');
                                            ?>
                                                <div class="col-3">
                                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                        <a class="nav-link active" id="product-1-tab" data-bs-toggle="pill" href="#product-1" role="tab">
                                                            <img src="<?= base_url().$product->product_image ?>" alt="img-1" class="img-fluid mx-auto d-block tab-img rounded">
                               
                                                        </a>
                                                        <a class="nav-link" id="product-2-tab" data-bs-toggle="pill" href="#product-2" role="tab">
                                                            <img src="<?= base_url().$product->product_image ?>" alt="img-5" class="img-fluid mx-auto d-block tab-img rounded">
                                                        </a>
                                                        <a class="nav-link" id="product-3-tab" data-bs-toggle="pill" href="#product-3" role="tab">
                                                            <img src="<?= base_url().$product->product_image ?>" alt="img-3" class="img-fluid mx-auto d-block tab-img rounded">
                                                        </a>
                                                        <a class="nav-link" id="product-4-tab" data-bs-toggle="pill" href="#product-4" role="tab">
                                                            <img src="<?= base_url().$product->product_image ?>" alt="img-4" class="img-fluid mx-auto d-block tab-img rounded">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-9">
                                                    <div class="tab-content" id="v-pills-tabContent">
                                                        <div class="tab-pane fade show active" id="product-1" role="tabpanel">
                                                            <div class="product-img">
                                                                <img src="<?= base_url().$product->product_image ?>" alt="img-1" class="img-fluid mx-auto d-block" data-zoom="assets/images/product/img-1.png">
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="product-2" role="tabpanel">
                                                            <div class="product-img">
                                                                <img src="assets/images/product/img-5.png" alt="img-5" class="img-fluid mx-auto d-block">
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="product-3" role="tabpanel">
                                                            <div class="product-img">
                                                                <img src="assets/images/product/img-3.png" alt="img-3" class="img-fluid mx-auto d-block">
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="product-4" role="tabpanel">
                                                            <div class="product-img">
                                                                <img src="assets/images/product/img-4.png" alt="img-4" class="img-fluid mx-auto d-block">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- end product img -->
                                    </div>
                                    <div class="col-xl-7">
                                        <div class="mt-4 mt-xl-3">
                                            <a href="#" class="text-primary">Store</a>
                                            <h5 class="mt-1 mb-3"><?= $product->product_name ?></h5>


                                            <h5 class="mt-2">₦<?= number_format($product->product_price) ?> </h5>
                                            <p class="mt-3"><?= $product->description ?></p>
                                            <hr class="my-4">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div>
                                                        <form action="<?php echo base_url('save/cart');?>" method="post">
                                                        <h5 class="font-size-14"><i class="mdi mdi-location"></i>Quantity</h5>
                                                        <div class="d-flex flex-wrap">
                                                        <div class="input-group mb-3 w-100">
                                                            <div class="form-group ">
                                                                <input class="form-control" type="number" min="1" name="qty" placeholder="quantity">
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <input type="hidden" class="buyfield" name="product_id" value="<?php echo $product->product_id?>"/>
                                                            <h5 class="font-size-14"><i class="mdi mdi-location"></i>Sizes</h5>
                                                            <div class="d-flex flex-wrap">

                                                                <div class="input-group mb-3 w-100">
                                                                    <select name="size" id="" class="form-control">
                                                                        <option value="">Select Size</option>
                                                                        <?php 
                                                                        foreach($sizes as $size){
                                                                            if($size->size_quantity > 0){
                                                                        ?>
                                                                        <option value="<?= $size->id ?>"><?= $size->product_size?></option>
                                                                        
                                                                        <?php
                                                                        }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                              

                                                            <div class="d-grid">
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light mt-2">
                                                                    <i class="mdi mdi-cart me-2"></i> Add to cart
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-md-6">

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
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
                <img src="<?= base_url() ?>assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="layout-1">
            </div>

            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                <label class="form-check-label" for="light-mode-switch">Light Mode</label>
            </div>

            <div class="mb-2">
                <img src="<?= base_url() ?>assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="layout-2">
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="<?= base_url() ?>assets/css/bootstrap-dark.min.css" data-appStyle="<?= base_url() ?>assets/css/app-dark.min.css">
                <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
            </div>

            <div class="mb-2">
                <img src="<?= base_url() ?>assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="layout-3">
            </div>
            <div class="form-check form-switch mb-5">
                <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appStyle="<?= base_url() ?>assets/css/app-rtl.min.css">
                <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
            </div>


        </div>

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>