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
                            <h4 class="mb-sm-0">Cart</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Store</a></li>
                                    <li class="breadcrumb-item active">Cart</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-centered mb-0 table-nowrap">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th style="width: 120px">Product</th>
                                                    <th>Product Desc</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($cart_contents as $cart_items){

                                                ?>
                                                <tr>
                                                    <td>
                                                        <img src="<?= base_url($cart_items['options']['product_image']) ?>" alt="product-img" title="product-img" class="avatar-md" />
                                                    </td>
                                                    <td>
                                                        <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark"><?php echo $cart_items['name'] ?></a></h5>

                                                    </td>
                                                    <td>
                                                        ₦ <?= $this->cart->format_number($cart_items['price']) ?>
                                                    </td>
                                                    <td>
                                                        <div style="width: 120px;" class="product-cart-touchspin">
                                                        <input name="qty" type="number" step="1" min="1" value="<?= $cart_items['qty'] ?>">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        ₦ <?= $this->cart->format_number($cart_items['subtotal']) ?>
                                                    </td>
                                                    <form action="<?php echo base_url('remove/cart'); ?>" method="post">
                                                    <input type="hidden" name="rowid" value="<?php echo $cart_items['rowid'] ?>"/>
                                                    <td style="width: 90px;" class="text-center">
                                                        <button type="submit" class="action-icon text-danger"> <i class="mdi mdi-trash-can font-size-18"></i></button>
                                                    </td>
                                                    </form>
                                                </tr>
                                                <?php 
                                                }
                                                ?>
                                              
                                             
                                               
                                                <tr class="bg-light text-end">

                                                    <th scope="row" colspan="5">
                                                        Total :
                                                    </th>

                                                    <td>
                                                        ₦ <?php echo $this->cart->format_number($this->cart->total()) ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="checkout" class="btn btn-primary waves-effect col-md-12">checkout</a>
                                </div>
                        </div>
                    </div> <!-- end col -->
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