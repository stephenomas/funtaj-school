

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
                                <div class="row">
                                <div class="col-md-3">
                                        <div class="card" style="background: linear-gradient(172deg, rgba(255,255,255,1) 2%, rgba(236,239,255,1) 25%, rgba(86,100,210,1) 100%, rgba(86,100,210,1) 100%);">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-1 overflow-hidden">
                                                        <p class="text-truncate font-size-14 mb-2">Admin</p>
                                                        <h4 class="mb-0"><?= $admins ?></h4>
                                                    </div>
                                                    <div class="text-primary ms-auto">
                                                        <i class="ri-user-2-line font-size-24"></i>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="card-body border-to py-3">
                                                <div class="text-truncate">
                                                    <span class="text-muted ms-2">Total Number of Admins</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-1 overflow-hidden">
                                                        <p class="text-truncate font-size-14 mb-2">Teachers</p>
                                                        <h4 class="mb-0"><?= $teachers ?></h4>
                                                    </div>
                                                    <div class="text-primary ms-auto">
                                                        <i class="ri-group-line font-size-24"></i>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="card-body border-top py-3">
                                                <div class="text-truncate">
                                                    <span class="badge badge-soft-success font-size-11"><i class="mdi mdi-menu-up"> </i> 2.4% </span>
                                                    <span class="text-muted ms-2">Increase From previous Session</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-1 overflow-hidden">
                                                        <p class="text-truncate font-size-14 mb-2">Number of Students</p>
                                                        <h4 class="mb-0"><?= $students ?></h4>
                                                    </div>
                                                    <div class="text-primary ms-auto">
                                                        <i class="ri-team-line font-size-24"></i>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="card-body border-top py-3">
                                                <div class="text-truncate">
                                                    <span class="badge badge-soft-success font-size-11"><i class="mdi mdi-menu-up"> </i> 2.4% </span>
                                                    <span class="text-muted ms-2">Increase From previous Session</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-1 overflow-hidden">
                                                        <p class="text-truncate font-size-14 mb-2">Non-Teachers</p>
                                                        <h4 class="mb-0"><?= $noteach ?></h4>
                                                    </div>
                                                    <div class="text-primary ms-auto">
                                                        <i class="ri-user-settings-line font-size-24"></i>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="card-body border-top py-3">
                                                <div class="text-truncate">
                                                    <span class="badge badge-soft-success font-size-11"><i class="mdi mdi-menu-up"> </i> 2.4% </span>
                                                    <span class="text-muted ms-2">From previous Term</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card" style="background: linear-gradient(172deg, rgba(255,255,255,1) 2%, rgba(222,222,222,1) 25%, rgba(135,135,135,1) 100%, rgba(69,69,69,1) 100%);">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-1 overflow-hidden">
                                                        <p class="text-truncate font-size-14 mb-2">Total Revenue</p>
                                                        <h4 class="mb-0">₦38452 </h4>
                                                    </div>
                                                    <div class="text-primary ms-auto">
                                                        <i class="ri-stack-line font-size-24"></i>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="card-body border-to py-3">
                                                <div class="text-truncate">
                                                    <span class="text-muted ms-2"><?= $currentSession ?> Session</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-1 overflow-hidden">
                                                        <p class="text-truncate font-size-14 mb-2">School Fees Revenue</p>
                                                        <h4 class="mb-0">₦ <?= number_format($total) ?> </h4>
                                                    </div>
                                                    <div class="text-primary ms-auto">
                                                        <i class="ri-stack-line font-size-24"></i>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="card-body border-to py-3">
                                                <div class="text-truncate">
                                                    <span class="text-muted ms-2"><?= $currentSession ?> Session</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
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
                                                    <span class="badge badge-soft-success font-size-11"><i class="mdi mdi-menu-up"> </i> 2.4% </span>
                                                    <span class="text-muted ms-2">From previous Term</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
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
                                                    <span class="badge badge-soft-success font-size-11"><i class="mdi mdi-menu-up"> </i> 2.4% </span>
                                                    <span class="text-muted ms-2">From previous Term</span>
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
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
    
                                        <h4 class="card-title mb-3">School Fees</h4>
    
                                        <div>
                                            <div class="text-center">
                                                <p class="mb-2">Total</p>
                                                <h4>₦ 7652</h4>
                                                <div class="text-success">
                                                    <i class="mdi mdi-menu-up font-size-14"> </i>2.2 %
                                                </div>
                                            </div>
    
                                            <div class="table-responsive mt-4">
                                                <table class="table table-hover mb-0 table-centered table-nowrap">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 60px;">
                                                                <div class="avatar-xs">
                                                                    <div class="avatar-title rounded-circle bg-light">
                                                                        <img src="assets/images/companies/img-1.png" alt="img-1" height="20">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            
                                                            <td>
                                                                <h5 class="font-size-14 mb-0">Gudu</h5>
                                                            </td>
                                                            <td><div id="spak-chart1"></div></td>
                                                            <td>
                                                                <p class="text-muted mb-0">₦ 2478</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="avatar-xs">
                                                                    <div class="avatar-title rounded-circle bg-light">
                                                                        <img src="assets/images/companies/img-2.png" alt="img-2" height="20">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h5 class="font-size-14 mb-0">Asokoro</h5>
                                                            </td>
                                                            
                                                            <td><div id="spak-chart2"></div></td>
                                                            <td>
                                                                <p class="text-muted mb-0">₦ 2625</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="avatar-xs">
                                                                    <div class="avatar-title rounded-circle bg-light">
                                                                        <img src="assets/images/companies/img-3.png" alt="img-3" height="20">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h5 class="font-size-14 mb-0">Maitama</h5>
                                                            </td>
                                                            <td class="overflow-hidden">
                                                                <div id="spak-chart3"></div>
                                                            </td>
                                                            <td>
                                                                <p class="text-muted mb-0">₦ 2856</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
    
                                        <h4 class="card-title mb-3">Revenue</h4>
    
                                        <div>
                                            <div class="text-center">
                                                <p class="mb-2">Balance</p>
                                                <h4>₦ 7652</h4>
                                                <div class="text-success">
                                                    <i class="mdi mdi-menu-up font-size-14"> </i>2.2 %
                                                </div>
                                            </div>
    
                                            <div class="table-responsive mt-4">
                                                <table class="table table-hover mb-0 table-centered table-nowrap">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 60px;">
                                                                <div class="avatar-xs">
                                                                    <div class="avatar-title rounded-circle bg-light">
                                                                        <img src="assets/images/companies/img-1.png" alt="img-1" height="20">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            
                                                            <td>
                                                                <h5 class="font-size-14 mb-0">Revenue</h5>
                                                            </td>
                                                            <td><div id="spak-chart1"></div></td>
                                                            <td>
                                                                <p class="text-muted mb-0">₦ 2478</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="avatar-xs">
                                                                    <div class="avatar-title rounded-circle bg-light">
                                                                        <img src="assets/images/companies/img-2.png" alt="img-2" height="20">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h5 class="font-size-14 mb-0">Expenditure</h5>
                                                            </td>
                                                            
                                                            <td><div id="spak-chart2"></div></td>
                                                            <td>
                                                                <p class="text-muted mb-0">₦ 2625</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="avatar-xs">
                                                                    <div class="avatar-title rounded-circle bg-light">
                                                                        <img src="assets/images/companies/img-3.png" alt="img-3" height="20">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h5 class="font-size-14 mb-0">Pending</h5>
                                                            </td>
                                                            <td class="overflow-hidden">
                                                                <div id="spak-chart3"></div>
                                                            </td>
                                                            <td>
                                                                <p class="text-muted mb-0">₦ 2856</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
    
                                        <h4 class="card-title mb-4">Recent Activity Feed</h4>
    
                                        <div data-simplebar style="max-height: 330px;">
                                            <ul class="list-unstyled activity-wid">
                                                <li class="activity-list">
                                                    <div class="activity-icon avatar-xs">
                                                        <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                            <i class="ri-edit-2-fill"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <h5 class="font-size-13">28 Apr, 2021 <small class="text-muted">12:07 am</small></h5>
                                                        </div>
                                                        
                                                        <div>
                                                            <p class="text-muted mb-0">Responded to need “Volunteer Activities”</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="activity-list">
                                                    <div class="activity-icon avatar-xs">
                                                        <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                            <i class="ri-user-2-fill"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <h5 class="font-size-13">21 Apr, 2021 <small class="text-muted">08:01 pm</small></h5>
                                                        </div>
                                                        
                                                        <div>
                                                            <p class="text-muted mb-0">Added an interest “Volunteer Activities”</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="activity-list">
                                                    <div class="activity-icon avatar-xs">
                                                        <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                            <i class="ri-bar-chart-fill"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <h5 class="font-size-13">17 Apr, 2021 <small class="text-muted">09:23 am</small></h5>
                                                        </div>
                                                        
                                                        <div>
                                                            <p class="text-muted mb-0">Joined the group “Boardsmanship Forum”</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="activity-list">
                                                    <div class="activity-icon avatar-xs">
                                                        <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                            <i class="ri-mail-fill"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <h5 class="font-size-13">11 Apr, 2021 <small class="text-muted">05:10 pm</small></h5>
                                                        </div>
                                                        
                                                        <div>
                                                            <p class="text-muted mb-0">Responded to need “In-Kind Opportunity”</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="activity-list">
                                                    <div class="activity-icon avatar-xs">
                                                        <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                            <i class="ri-calendar-2-fill"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <h5 class="font-size-13">07 Apr, 2021 <small class="text-muted">12:47 pm</small></h5>
                                                        </div>
                                                        
                                                        <div>
                                                            <p class="text-muted mb-0">Created need “Volunteer Activities”</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="activity-list">
                                                    <div class="activity-icon avatar-xs">
                                                        <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                            <i class="ri-edit-2-fill"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <h5 class="font-size-13">05 Apr, 2021 <small class="text-muted">03:09 pm</small></h5>
                                                        </div>
                                                        
                                                        <div>
                                                            <p class="text-muted mb-0">Attending the event “Some New Event”</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="activity-list">
                                                    <div class="activity-icon avatar-xs">
                                                        <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                            <i class="ri-user-2-fill"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <h5 class="font-size-13">02 Apr, 2021 <small class="text-muted">12:07 am</small></h5>
                                                        </div>
                                                        
                                                        <div>
                                                            <p class="text-muted mb-0">Responded to need “In-Kind Opportunity”</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
    
                        
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
           <!-- Right Sidebar -->
    <?php // include //'inc/right-bar.php'; 
     $this->load->view('administrator/inc/right-bar')
    ?>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

     