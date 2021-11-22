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
                                <h4 class="mb-sm-0">School Fees</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Account</a></li>
                                        <li class="breadcrumb-item active">School Fees</li>
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
                                    <h5 class="text-white"><i class="mdi mdi-account-plus-outline me-3"></i> Pay fees</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="<?= site_url('fees/outstanding') ?>" class="card bg-danger text-white-50">
                                <div class="card-body">
                                    <h5 class="text-white"><i class="mdi mdi-account-multiple-remove-outline me-3"></i> Not Paid</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="<?= site_url('fees/awaiting') ?>" class="card bg-warning text-white-50">
                                <div class="card-body">
                                    <h5 class="text-white"><i class="mdi mdi-account--off-outline me-3"></i>Awaiting Verification</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="<?= site_url('fees/part') ?>" class="card bg-danger text-white-50">
                                <div class="card-body">
                                    <h5 class="text-white"><i class="mdi mdi-account-multiple-remove-outline me-3"></i> Part payment</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="<?= site_url('fees/full') ?>" class="card bg-success text-white-50">
                                <div class="card-body">
                                    <h5 class="text-white"><i class="mdi mdi-account-check-outline me-3"></i> Full Payment</h5>
                                </div>
                            </a>
                        </div>
                        <!-- <div class="col-lg-4">
                            <a href="#" class="card bg-light text-white-50">
                                <div class="card-body">
                                    <h5 class="text-dark"><i class="mdi mdi-school-outline me-3"></i> All</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="#" class="card bg-light text-white-50">
                                <div class="card-body">
                                    <h5 class="text-dark"><i class="mdi mdi-school-outline me-3"></i> Asokoro</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="#" class="card bg-light text-white-50">
                                <div class="card-body">
                                    <h5 class="text-dark"><i class="mdi mdi-school-outline me-3"></i> Gudu</h5>
                                </div>
                            </a>
                        </div> -->
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body tab-content">

                                    
                                    <p><br></p>
                                    <div class="tab-pane active" id="studentlist" role="tabpanel">
                                        <span class="d-flex">
                                            <form class="app-search row">
                                                <div class="position-relative col-md-4 mb-2">
                                                        <input class="form-control" list="datalistOptions1" id="exampleDataList" placeholder="Session">
                                                        <datalist id="datalistOptions1">
                                                            <option value="2019/2020">
                                                            <option value="2020/2021">
                                                            <option value="2021/2022">
                                                        </datalist>
                                                </div>
                                                <div class="position-relative col-md-3 mb-2">
                                                        <input class="form-control" list="datalistOptions2" id="exampleDataList" placeholder="class">
                                                        <datalist id="datalistOptions2">
                                                            <option value="7">
                                                            <option value="8">
                                                            <option value="9">
                                                        </datalist>
                                                </div> 
                                              
                                                <button type="button" class="btn btn-primary col-md-2"><i class="ri-search-line"></i></button>
                                            </form>
                                        </span>
                                        <?php if($this->session->flashdata('success')){ ?>
                                             <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= $this->session->flashdata('success') ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                         </div>
                                    
                                      <?php } ?>
                                      <?php if($this->session->flashdata('error')){ ?>
                                             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?= $this->session->flashdata('error') ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                         </div>
                                    
                                      <?php } ?>
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th> Student Name</th>
                                                    <th>Class</th>
                                              
                                                    <th>School fees</th>
                                                   
                                                    
                                                   
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php foreach($fees_paid as $fee_paid){?>
                                                <tr>
                                                    <td><?= $fee_paid->fname." ".$fee_paid->lname ?></td>
                                                    <td><?= $fee_paid->curr_year ?></td>
                                        
                                                    <td>
                                                        <?php
                                                            $this->db->where('curr_session', $currentSession);
                                                            $this->db->where('fee_year', $fee_paid->curr_year);
                                                            $fee = $this->db->get('school_fees')->row();
                                                            if($fee != null){
                                                            echo $fee->first_term + $fee->second_term + $fee->third_term;}
                                                        ?>
                                                    </td>
                                                   
                                                   
                                                   
                                                </tr>
                                              
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                     

                                    <div class="col-sm-6 col-md-4 col-xl-3">
                                        <!-- To edit student fees -->
                                        <?php //nclude 'inc/edit-fees.php'; 
                                          $this->load->view('administrator/inc/edit-fees')
                                        ?>
                                    
                                        <!-- To add new student fee-->
                                        <?php // include 'inc/add-fees.php'; 
                                         $this->load->view('administrator/inc/add-fees')
                                        ?>
                                    </div>

                                    <div class="col-sm-6 col-md-4 col-xl-3">
                                     
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->


                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php //include 'inc/footer.php'; 
            
            $this->load->view('administrator/inc/footer')
            ?>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <?php // include //'inc/right-bar.php'; 
     $this->load->view('administrator/inc/right-bar')
    ?>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>