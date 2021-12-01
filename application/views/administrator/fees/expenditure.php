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
                                <h4 class="mb-sm-0">Expenditure</h4>

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
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card" style="background: linear-gradient(172deg, rgba(255,255,255,1) 2%, rgba(236,239,255,1) 25%, rgba(86,100,210,1) 100%, rgba(86,100,210,1) 100%);">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-1 overflow-hidden">
                                                    <p class="text-truncate font-size-14 mb-2">Total Revenue</p>
                                                    <h4 class="mb-0">₦ 38452</h4>
                                                </div>
                                                <div class="text-primary ms-auto">
                                                    <i class="mdi mdi-cash-100 font-size-24"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body border-to py-3">
                                            <div class="text-truncate">
                                                <span class="text-muted ms-2">2021/22 Session</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card" style="background: linear-gradient(172deg, rgba(255,255,255,1) 2%, rgba(222,222,222,1) 25%, rgba(135,135,135,1) 100%, rgba(69,69,69,1) 100%);">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-1 overflow-hidden">
                                                    <p class="text-truncate font-size-14 mb-2">Balance</p>
                                                    <h4 class="mb-0">₦ 38452</h4>
                                                </div>
                                                <div class="text-primary ms-auto">
                                                    <i class="ri-stack-line font-size-24"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body border-to py-3">
                                            <div class="text-truncate">
                                                <span class="text-muted ms-2">2021/22 Session</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-1 overflow-hidden">
                                                    <p class="text-truncate font-size-14 mb-2">School Fees Revenue</p>
                                                    <h4 class="mb-0">₦ 38452</h4>
                                                </div>
                                                <div class="text-primary ms-auto">
                                                    <i class="mdi mdi-cash-refund font-size-24"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body border-to py-3">
                                            <div class="text-truncate">
                                                <span class="text-muted ms-2">2021/21 Session</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-1 overflow-hidden">
                                                    <p class="text-truncate font-size-14 mb-2">Store Revenue</p>
                                                    <h4 class="mb-0">₦ 38452</h4>
                                                </div>
                                                <div class="text-primary ms-auto">
                                                    <i class="ri-store-2-line font-size-24"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body border-top py-3">
                                            <div class="text-truncate">
                                                <span class="text-muted ms-2">2021/21 Session</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-1 overflow-hidden">
                                                    <p class="text-truncate font-size-14 mb-2">Expenditure</p>
                                                    <h4 class="mb-0">₦ 15.4</h4>
                                                </div>
                                                <div class="text-primary ms-auto">
                                                    <i class="ri-briefcase-4-line font-size-24"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body border-top py-3">
                                            <div class="text-truncate">
                                                <span class="text-muted ms-2">2021/21 Session</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <span class="d-flex">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#addInfo" class="btn btn-primary col-md-2"><i class="mdi mdi-cash-plus"></i> New Expense</a>
                        </span>
                        <?php
                 
                         echo   validation_errors('<div class="alert alert-danger alert-dismissible fade show">','</div>');
                  
                        ?>
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
                        <p><br></p>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th> Receiver</th>
                                    <th>Purpose</th>
                                    <th>Branch</th>
                                    <th>Amount Paid</th>
                                    <th>Description</th>
                                    <th>Processed by</th>
                                    <th>Option</th>
                                </tr>
                            </thead>


                            <tbody>
                                <tr>
                                    <td>Adeolu </td>
                                    <td>repair of tap</td>
                                    <td>Gudu</td>
                                    <td>₦10,000</td>
                                    <td>tap in toilet b got spoilt</td>
                                    <td>Mr Adeoye</td>
                                    <td><a href="">View</a> | <a href="#" class="text-warning">Cancel Expense</a> <span class="text-danger">Expense Cancelled</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end row -->

                    <div class="col-sm-6 col-md-4 col-xl-3">

                        <!-- To add new expense -->
                        <?php //include 'inc/add-expense.php';
                         $this->load->view('administrator/inc/add-expense')
                        ?>
                    </div>

                    <!-- end row -->
                </div>

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