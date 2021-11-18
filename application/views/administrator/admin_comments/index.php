<body data-sidebar="dark">

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
                                <h4 class="mb-sm-0">Dashboard</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Funtaj</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">

                                    <!-- <h4 class="card-title">Custom Tabs</h4>
                                    <p class="card-title-desc">Example of custom tabs</p> -->

                                    <!-- Nav tabs -->
                                    
                                    <!-- Tab panes -->

                                    <div class="tab-content p-3 text-muted">
                                        <div class="tab-pane active" id="asokoro-campus" role="tabpanel">
                                            <div class="mb-0 row">
                                            <?php
                                            $this->db->order_by('digit', 'asc');
                                            $query = $this->db->get('classes');
                                            foreach ($query->result() as $cl) : ?>
                                                <div class="card col-md-4">
                                                    <a href="" data-bs-toggle="modal" data-bs-target="#viewDetails<?=base_url('headtutor/stu_comment/'.$cl->prefix.'/'.$cl->digit.'/'.$cl->groups)?>" class="card-body">
                                                        <h4 class="card-title"><?=$cl->prefix.' '.$cl->digit.$cl->groups?></h4>
                                                        <h6 class="card-subtitle font-14 text-muted">View all</h6>
                                                    </a>
                                                </div>

                                                <!-- modal start -->
                                                <!-- sample modal content -->
                                                    <div id="viewDetails<?=base_url('headtutor/stu_comment/'.$cl->prefix.'/'.$cl->digit.'/'.$cl->groups)?>" class="modal fade" tabindex="-1" aria-labelledby="#viewDetailsLabel" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-fullscreen">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="viewDetailsLabel">Head Teacher/Principal Comments</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>Students</th>
                                                                                <th>Average Score/Grade</th>
                                                                                <th>Subject Count</th>
                                                                                <th>Comment</th>
                                                                                <th>Delete</th>
                                                                            </tr>
                                                                        </thead>


                                                                        <tbody>
                                                                            <tr>
                                                                                <td>1</td>
                                                                                <td>Mike Stew</td>
                                                                                <td class="text-danger">68.9 - B</td>
                                                                                <td>17</td>
                                                                                <td><textarea name="" id="" cols="30" rows="3" placeholder="Type your comment here"></textarea></td>
                                                                                <td><a href="">Delete</a></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->

                                                <!-- model end -->

                                            <?php endforeach;?>
                                                

                                            </div>
                                        </div>
                                 
                                   
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->


                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <!-- To show popup for comments -->
                        <?php // include 'inc/headtutor-comments.php'; 
                        $this->load->view('administrator/inc/headtutor-comments')
                        ?>
                    </div>

                    <!-- end row -->
                </div>

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