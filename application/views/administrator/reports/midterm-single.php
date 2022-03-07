<style>
    @media print {
        #printPageButton {
            display: none;
        }
    }
</style>

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
                                <h4 class="mb-sm-0">Mid Term Reports</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Funtaj</a></li>
                                        <li class="breadcrumb-item active">Mid Term Reports</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <button class="btn btn-primary" id="printPageButton" onclick="printReport()"><i class="fas fa-print"></i> Print</button>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="content" style="margin-top: 0.5%;">


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="">
                                                <!-- Mid Term -->
                                                <div class="text-center"><img src="<?= site_url('assets/images/logo-sm-dark.png') ?>" width="50px">
                                                    <h5 class="">Funtaj International School, LTD</h5>
                                                    Plot 584, David Jemibewon Crescent, Off Oladipo Diya Road, Gudu, Apo <br> info@funtajschoolltd.com, enquiries@funtajschoolltd.com
                                                    <br> 2347057928544, 2347057928066

                                                    <h6>MidTerm Report</h6>
                                                </div>
                                                <div class="row mb-1">
                                                    <div class="col-md-8">
                                                        <h5>Name: <?= $detail->fname." ".$detail->mname." ".$detail->lname ?></h5>
                                                        <h5 class="text-danger">Class: <?= $this->input->get('year') ?></h5>
                                                        <h5 class="text-primary">Reg No: <?= $detail->admno ?> | DoB: <?= $detail->dob ?> | <?= $this->input->get('term') ?> | <?= $this->input->get('session') ?> Session</h5>
                                                        <!--                            <h6>Possible Attendance: | Actual Attendance:</h6>-->
                                                        <h5 class="text-secondary">Form Tutor: <?php
                                                        foreach($student as $stud ){
                                               
                                                            $this->db->where('id',$stud->tutor_id);
                                                               
                                                            $tutor = $this->db->get('staff')->row();
                                                            if($tutor){
                                                                echo $tutor->fname." ".$tutor->lname;
                                                            }
                                                            break;
                                                        }
                                                     
                                                    
                                               
                                                        
                                                        ?> </h5>
                                                    </div>
                                                    <div class="col-md-4" id="printPageButton">
                                                        <img src="<?= site_url($detail->stu_img) ?>" style="height: 80px; width: 80px" alt="profile Picture">
                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered dt-responsive nowrap" style=" border-spacing: 0; width: 100%;">

                                                        <tr>
                                                            <th>#</th>
                                                            <th>Subject</th>
                                                            <th>Achievement</th>
                                                            <th>Effort</th>
                                                            <th>Homework</th>
                                                            <th>Behaviour</th>
                                                        </tr>
                                                        <tbody>
                                                            <?php
                                                              $x = 1;
                                                            foreach($student as $stud){
                                                          
                                                            ?>


                                                            <tr>
                                                                <td><?= $x ?></td>
                                                                <td><?= $stud->subject ?></td>
                                                                <td><?= $stud->achievement ?></td>
                                                                <td><?= $stud->effort ?></td>
                                                                <td><?= $stud->homework ?></td>
                                                                <td><?= $stud->behaviour ?></td>
                                                            </tr>
                                                             
                                                         
                                                          <?php 
                                                        $x++;
                                                        } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="text-danger" style="font-size: small">Key: (A: Excellent | 1: Highest) | (E: Poor -
                                                    5: Lowest) </div>
                                            </div>
                                            <!--  Mid Term Ends  -->

                                            <!-- End Of Term -->
                                            <!--  End Of Term Ends  -->

                                        </div>
                                    </div>
                                <div>


                                    <div class="text-center exec">
                                        <!--        Grade or Year style-->
                                        <!--Check if class is secondary-->
                                        <!--            Check if it's vp (Principal not selected)-->
                                        <!--Get the signature-->

                                        <img src="" height="60px" alt="Signature"><br>
                                        <h6>Dr Tina Ohai, Vice Principal</h6>
                                        
                                        <!--End if it's principals signature-->
                                        <!--                End if student's class is greater than Year 6-->
                                        <!--Check if class is primary-->
                                        <!--        End of if Grade or Year style    -->


                                        <!--      If class style  Junior/Senior-->
                                    </div>
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