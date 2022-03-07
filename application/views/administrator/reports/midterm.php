<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">



    <?php // include 'inc/topbar.php';
          $this->load->view('administrator/inc/topbar')
        ?>

        <?php //include 'student/inc/mobile-header.php'; 
  
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
                    <h4 class="mb-sm-0">Mid Term Report</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Funtaj</a></li>
                            <li class="breadcrumb-item active">Mid Term Report</li>
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
                        <ul class="nav nav-tabs nav-tabs-custom mb-4">
                            <li class="nav-item">
                                <a class="nav-link fw-bold p-3 active" href="#">All Mid Term Report</a>
                            </li>
                            
                        </ul>
                        <h4 class="card-title">All Mid Term Report</h4>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Session</th>
                                    <th>First Term</th>
                                    <th>Second Term</th>
                                    <th>Third Term</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                foreach($sessions as $session){
                                ?>
                                <tr>
                                    <td><?= $session->sessions ?></td>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#addInfo<?= $session->id ?>" >View</a></td>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#saddInfo<?= $session->id ?>" >View</a></td>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#taddInfo<?= $session->id ?>" >View</a></td>
                                </tr>
                               
                                    <!-- classes first term model begin model  -->
                                    <div class="modal fade" id="addInfo<?= $session->id ?>" tabindex="-1" role="dialog" aria-labelledby="addInfoTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addInfoTitle">Mid Term</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                    <div class="mb-0 row">
                                                        <?php
                                                            $this->db->where('session', $session->sessions);
                                                           // $years = $this->db->get('classes')->result();

                                                            // foreach($years as $year){

                                                            // }

                                                            // $this->db->where('session', $session->sessions);
                                                            // $this->db->where('term', 'Term 1');
                                                        $classes = $this->db->get('classes')->result();
                                                        foreach($classes as $class){
                                                        ?>
                                                        
                                                        <div class="card col-md-4">
                                                            <a href="<?= site_url('midterm/class?session='.$session->sessions.'&year='.$class->prefix." ".$class->digit.$class->groups.'&term=Term 1') ?>" class="card-body">
                                                                <h4 class="card-title"><?= $class->prefix." ".$class->digit.$class->groups ?></h4>
                                                                <h6 class="card-subtitle font-14 text-muted">View all</h6>
                                                            </a>
                                                        </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    
                                    <!-- classes model end -->

                                     <!-- classes second term model begin model  -->
                                     <div class="modal fade" id="saddInfo<?= $session->id ?>" tabindex="-1" role="dialog" aria-labelledby="addInfoTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addInfoTitle">Mid Term</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                    <div class="mb-0 row">
                                                        <?php
                                                            $this->db->where('session', $session->sessions);
                                                           // $years = $this->db->get('classes')->result();

                                                            // foreach($years as $year){

                                                            // }

                                                            // $this->db->where('session', $session->sessions);
                                                            // $this->db->where('term', 'Term 1');
                                                        $classes = $this->db->get('classes')->result();
                                                        foreach($classes as $class){
                                                        ?>
                                                        
                                                        <div class="card col-md-4">
                                                            <a href="<?= site_url('midterm/class?session='.$session->sessions.'&year='.$class->prefix." ".$class->digit.$class->groups.'&term=Term 2') ?>" class="card-body">
                                                                <h4 class="card-title"><?= $class->prefix." ".$class->digit.$class->groups ?></h4>
                                                                <h6 class="card-subtitle font-14 text-muted">View all</h6>
                                                            </a>
                                                        </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    
                                    <!-- classes model end -->


                                     <!-- classes third term model begin model  -->
                                     <div class="modal fade" id="taddInfo<?= $session->id ?>" tabindex="-1" role="dialog" aria-labelledby="addInfoTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addInfoTitle">Mid Term</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                    <div class="mb-0 row">
                                                        <?php
                                                            $this->db->where('session', $session->sessions);
                                                           // $years = $this->db->get('classes')->result();

                                                            // foreach($years as $year){

                                                            // }

                                                            // $this->db->where('session', $session->sessions);
                                                            // $this->db->where('term', 'Term 1');
                                                        $classes = $this->db->get('classes')->result();
                                                        foreach($classes as $class){
                                                        ?>
                                                        
                                                        <div class="card col-md-4">
                                                            <a href="<?= site_url('midterm/class?session='.$session->sessions.'&year='.$class->prefix." ".$class->digit.$class->groups.'&term=Term 3') ?>" class="card-body">
                                                                <h4 class="card-title"><?= $class->prefix." ".$class->digit.$class->groups ?></h4>
                                                                <h6 class="card-subtitle font-14 text-muted">View all</h6>
                                                            </a>
                                                        </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    
                                    <!-- classes model end -->

                                <?php
                                 
                            } ?>
                            </tbody>
                        </table>

                        <div class="col-sm-6 col-md-4 col-xl-3">
                            <!-- for Mid Term Classes-->
                           
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
