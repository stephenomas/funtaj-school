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
                            <h2>Hello 👋🏾 Mr <?= $tutor->fname ?>,</h2>
                            <h5>Staff Group: Tutor | Session: <?= $currentSession ?></h5>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card" style="background: linear-gradient(172deg, rgba(255,255,255,1) 2%, rgba(236,239,255,1) 25%, rgba(86,100,210,1) 100%, rgba(86,100,210,1) 100%);">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-1 overflow-hidden">
                                                    <p class="text-truncate font-size-14 mb-2">Subjects</p>
                                                    <h4 class="mb-0"><?= $subs ?></h4>
                                                </div>
                                                <div class="text-primary ms-auto">
                                                    <i class="ri-book-mark-line font-size-24"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body border-to py-3">
                                            <div class="text-truncate">
                                                <span class="text-muted ms-2">No. of Subjects you Teach</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-1 overflow-hidden">
                                                    <p class="text-truncate font-size-14 mb-2">Subject Students</p>
                                                    <h4 class="mb-0">27</h4>
                                                </div>
                                                <div class="text-primary ms-auto">
                                                    <i class="ri-group-line font-size-24"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body border-top py-3">
                                            <div class="text-truncate">
                                                <span class="text-muted ms-2">No. of Students offering your subjects</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card" style="background: linear-gradient(172deg, rgba(255,255,255,1) 2%, rgba(222,222,222,1) 25%, rgba(135,135,135,1) 100%, rgba(69,69,69,1) 100%);">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-1 overflow-hidden">
                                                    <p class="text-truncate font-size-14 mb-2">Class</p>
                                                    <h4 class="mb-0"><?=$class->digit.$class->groups ?></h4>
                                                </div>
                                                <div class="text-primary ms-auto">
                                                    <i class="ri-store-2-line font-size-24"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body border-to py-3">
                                            <div class="text-truncate">
                                                <span class="text-muted ms-2">The Class you are currently tutoring</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-1 overflow-hidden">
                                                    <p class="text-truncate font-size-14 mb-2">Class Students</p>
                                                    <h4 class="mb-0"><?= $studs ?></h4>
                                                </div>
                                                <div class="text-primary ms-auto">
                                                    <i class="ri-team-line font-size-24"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body border-top py-3">
                                            <div class="text-truncate">
                                                <span class="text-muted ms-2">No. of students in class you tutor</span>
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

                                    <h4 class="card-title mb-3">Subjects</h4>

                                    <Subjects>

                                        <div class="table-responsive mt-4">
                                            <table class="table table-hover mb-0 table-centered table-nowrap">
                                                <tbody>
<<<<<<< HEAD
                                                    <tr>

                                                        <td>
                                                            <h5 class="font-size-14 mb-0">ACCT</h5>
                                                        </td>
                                                        <td>ACCOUNTING</td>
                                                        <td>
                                                            <p class="text-muted mb-0">YEAR 9</p>
                                                        </td>
                                                    </tr>
                                                    <tr>

                                                        <td>
                                                            <h5 class="font-size-14 mb-0">MATH</h5>
                                                        </td>
                                                        <td>MATHEMATICS</td>
                                                        <td>
                                                            <p class="text-muted mb-0">YEAR 12</p>
                                                        </td>
                                                    </tr>
=======
                                                    <?php
                                                    foreach($su as $sub){
                                                    ?>
                                                    <tr>

                                                      
                                                        <td><?= $sub->subject_title ?></td>
                                                       
                                                    </tr>
                                                <?php }?>
                                                    
>>>>>>> c8701c2 (fresh)
                                                </tbody>
                                            </table>
                                        </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title mb-3">QUICK OPTION</h4>

                                    <div>

                                        <div class="table-responsive mt-4">
                                            <table class="table table-hover mb-0 table-centered table-nowrap">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h5 class="font-size-14 mb-0">SUBJECT STUDENTS</h5>
                                                        </td>
                                                        <td>
                                                            <a href="" class="text-primary">View</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h5 class="font-size-14 mb-0">CLASS STUDENTS</h5>
                                                        </td>
                                                        <td>
                                                            <a href="" class="text-primary">View</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

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
    <?php // include //'inc/right-bar.php'; 
     $this->load->view('administrator/inc/right-bar')
    ?>
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
