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
                            <a href="#" class="card bg-warning text-white-50">
                                <div class="card-body">
                                    <h5 class="text-white"><i class="mdi mdi-account--off-outline me-3"></i>Awaiting Verification</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="#" class="card bg-danger text-white-50">
                                <div class="card-body">
                                    <h5 class="text-white"><i class="mdi mdi-account-multiple-remove-outline me-3"></i> Part or no payment</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="#" class="card bg-success text-white-50">
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

                                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#studentlist" role="tab">
                                                <span class="d-block d-sm-none">Student school fees list</span>
                                                <span class="d-none d-sm-block">Student school fees list</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#setfees" role="tab">
                                                <span class="d-block d-sm-none">Set school fees Amount</span>
                                                <span class="d-none d-sm-block">Set school fees Amount</span>
                                            </a>
                                        </li>
                                    </ul>

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
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th> Student Name</th>
                                                    <th>Class</th>
                                              
                                                    <th>Amount Paid</th>
                                                    <th>Outstanding</th>
                                                    <th>Payment Mode</th>
                                                    <th>Status</th>
                                                    <th>Option</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php foreach($fees_paid as $fee_paid){?>
                                                <tr>
                                                    <td><?= $fee_paid->fname ?></td>
                                                    <td><?= $fee_paid->curr_year ?></td>
                                        
                                                    <td><?= $fee_paid->amount_paid ?></td>
                                                    <td><?= $fee_paid->outstanding ?></td>
                                                    <td><?= $fee_paid->paymentmode ?></td>
                                                    <td>
                                                        <div class="badge badge-soft-success font-size-12"><?= $fee_paid->status ?></div>
                                                    </td>
                                                    <td><a href="">View</a> | <a href="#" data-bs-toggle="modal" data-bs-target="#editInfo">Edit</a></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="tab-pane" id="setfees" role="tabpanel">
                                    <?php if($this->session->flashdata('success')){ ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= $this->session->flashdata('success') ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    
                                    <?php } ?>
                                        <p class="mb-0">
                                        <?=form_open('fees/addFees')?>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="validationCustom03" class="form-label">Class / Year</label>
                                                        <select name="fee_year" class="form-select" id="validationCustom03" required>
                                                            <option selected disabled value="">select class</option>
                                                            <?php foreach ($classesDigit as $class) : ?>
                                                            <option value="<?=$class->digit?>"><?=$class->digit?></option>
                                                            <?php endforeach;?>
                                                         
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please select a valid class.
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Minimum Deposit allowed(%)</label>
                                                        <input type="number" name="min" class="form-control" id="validationCustom01" placeholder="the least percentage allowed to be deposited"  required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="validationCustom06" class="form-label">Session</label>
                                                        <input type="text" class="form-control" readonly name="sess" value="<?=$currentSession?>">
                                                        <div class="invalid-feedback">
                                                            Please select a valid Session.
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="validationCustom02" class="form-label">First Term</label>
                                                        <input type="number" name="fterm" class="form-control" id="validationCustom02" placeholder="40000"  required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="validationCustom04" class="form-label">Second Term</label>
                                                        <input type="number" name="sterm" class="form-control" id="validationCustom04" placeholder="40000" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid number.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="validationCustom05" class="form-label">Third Term</label>
                                                        <input type="number" name="tterm" class="form-control" id="validationCustom05" placeholder="40000" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid number.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button class="btn btn-primary" type="submit">Submit form</button>
                                            </div>
                                        </form>
                                        </p>

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Class Year</th>
                                                    <th>Session</th>
                                                    <th>First term(₦)</th>
                                                    <th>Second Term(₦)</th>
                                                    <th>Third Term(₦)</th>
                                                    <th>Total(₦)</th>
                                                    <th></th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php foreach($fees as $fee){

                                                ?>
                                                <tr>
                                                    <td><?= $fee->fee_year ?></td>
                                                    <td><?= $fee->curr_session ?></td>
                                                    <td><?= $fee->first_term ?></td>
                                                    <td><?= $fee->second_term ?></td>
                                                    <td><?= $fee->third_term ?></td>
                                                    <td><?= $fee->first_term + $fee->second_term + $fee->third_term ?></td>
                                                    <td><a href="">Delete</a></td>
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