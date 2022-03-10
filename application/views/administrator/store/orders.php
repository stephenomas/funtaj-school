

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
                                                <?php foreach ($orders as $order){
                                                    ?>
                                                <tr>
                                                    <td>
                                                        <div class="form-checkbox">
                                                            <input type="checkbox" class="form-check-input" id="ordercheck1">
                                                            <label class="form-check-label mb-0" for="ordercheck1">&nbsp;</label>
                                                        </div>
                                                    </td>

                                                    <td><a href="javascript: void(0);" class="text-dark fw-bold">#<?= $order->id ?></a> </td>
                                                    <td>
                                                      <?php
                                                      $date = new Carbon\Carbon($order->date);
                                                      echo $date->toFormattedDateString();
                                                      ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                           $this->db->where('email', $order->user_id);
                                                           $user = $this->db->get('staff')->row();
                                                           if(!$user){
                                                            $this->db->where('email', $order->user_id);
                                                            $user = $this->db->get('students')->row();
                                                           }

                                                           echo $user->fname;
                                                        ?>
                                                    </td>

                                                    <td>
                                                        ₦<?= number_format($order->price) ?>
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
                                                <?php } ?>

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

    <?php //include 'inc/footer.php'; 
            
            $this->load->view('administrator/inc/footer')
            ?>


