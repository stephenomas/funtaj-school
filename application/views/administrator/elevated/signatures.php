    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <?php 
        $this->load->view('administrator/inc/topbar')
        //include 'inc/topbar.php'; ?>

        <!-- ========== Left Sidebar Start ========== -->
        <?php 
          $this->load->view('administrator/inc/sidebar')
        //include 'inc/sidebar.php'; ?>
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
                                <h4 class="mb-sm-0">Signatures</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Funtaj</a></li>
                                        <li class="breadcrumb-item active">Signatures</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <div class="row">
                        <div class="col-lg-3">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#addInfo" class="card bg-primary text-white-50">
                                <div class="card-body">
                                    <h5 class="text-white"><i class="mdi mdi-account-plus-outline me-3"></i> Upload Signatures</h5>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                  <?php if($this->session->flashdata('success')){ ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= $this->session->flashdata('success') ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
									
                                    <?php } ?>
                                    <ul class="nav nav-tabs nav-tabs-custom mb-4">
                                        <li class="nav-item">
                                            <a class="nav-link fw-bold p-3 active" href="#">All Signatures</a>
                                        </li>
                                       
                                    </ul>
                                    <h4 class="card-title">All Signatures</h4>

                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Term</th>
                                                <th>session</th>
                                                <th>signature</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                        <?php
                                        $this->db->order_by('full_name', 'ASC');
                                        $signs = $this->db->get('signatures');
                                        $count = 0;
                                        foreach ($signs->result() as $sign) : $count++ ?>
                                            <tr>
                                                <td><?=$sign->full_name?></td>
                                                <td><?=$sign->position?></td>
                                              
                                                <td><?=$sign->term?></td>
                                                <td><?=$sign->session?></td>
                                                <td><img src="<?=base_url($sign->signature)?>" alt="Signature picture"></td>
                                                <td><?=($this->session->userdata('role') === 'Admin' || $this->session->userdata('role') === 'SuperAdmin') ? anchor("school/deleteSignature/" . $sign->id, "<i class='fa fa-trash-alt'></i>", array('onclick' => "return confirm('Do you really want to delete this signature, it will no longer appear on the results of the set term for this signature?')", 'class' => '')) : '' ?></td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>

                                    <div class="col-sm-6 col-md-4 col-xl-3">

                                         <!-- To add new student -->
                                        <?php 
                                        $this->load->view('administrator/inc/upload-signature')
                                        //include 'inc/upload-signature.php'; ?>
                                    </div>
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