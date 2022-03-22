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
                                <h4 class="mb-sm-0">End of Term Reports</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Funtaj</a></li>
                                        <li class="breadcrumb-item active">End of Term Reports</li>
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
                                                <!-- End of Term -->
                                                <div class="text-center"><img src="assets/images/logo-sm-dark.png" width="50px">
                                                    <h5 class="">Funtaj International School, LTD</h5>
                                                    Plot 584, David Jemibewon Crescent, Off Oladipo Diya Road, Gudu, Apo <br> info@funtajschoolltd.com, enquiries@funtajschoolltd.com
                                                    <br> 2347057928544, 2347057928066

                                                    <h6>End ofTerm Report</h6>
                                                </div>
                                                <div class="row mb-1">
                                                    <div class="col-md-8">
                                                    <h5>Name: <?= $detail->fname." ".$detail->mname." ".$detail->lname ?></h5>
                                                    <h5 class="text-danger">Class:  <?= $this->input->get('year') ?></h5>
                                                    <h5 class="text-primary">Reg No: <?= $detail->admno ?> | DoB:  <?= $detail->dob ?> |  <?= $this->input->get('term') ?>   | <?= $this->input->get('session') ?>  Session</h5>
                                                    <!--                            <h6>Possible Attendance: | Actual Attendance:</h6>-->
                                                    <h5>Class Avg.: <?php 
                                                    $sum = 0;
                                                    $count = 0;
                                                    foreach ($classaverage->result() as $av){
                                                        $avg = ($av->term1avg + $av->term2avg + $av->term3avg) / 3;
                                                        $sum = $sum + $avg;
                                                        $count = $count + 1;
                                                    }
                                                    echo number_format($sum / $count,1);
                                                    ?> | Student Avg.:  <?php 
                                                    $minisum = 0;
                                                    $minicount = 0;
                                                    foreach ($results->result() as $av2){
                                                        $avg2 = ($av2->term1avg + $av2->term2avg + $av2->term3avg) / 3;
                                                        $minisum = $minisum + $avg2;
                                                        $minicount = $minicount + 1;
                                                    }
                                                    echo number_format($minisum / $minicount,1);
                                                    ?> | GPA: <?= number_format($average->gp,1 )?> </h5>
                                                        <h6>Possible Attendance: <span class="text-info" id="actual_attendance">110</span> | Actual Attendance: <span class="text-info" id="actual_attendance">110</span></h6>
                                                    </div>
                                                    <div class="col-md-4" id="printPageButton">
                                                    <img src="<?= site_url($detail->stu_img) ?>" style="height: 80px; width: 80px" alt="profile Picture">
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-bordered dt-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="colgroup" colspan="4">Term 1</th>
                                                            <th scope="colgroup" colspan="4">Term 2</th>
                                                            <th scope="colgroup" colspan="4">Term 3</th>
                                                            <th scope="colgroup" colspan="2">Year</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">Subject</th>
                                                            <th scope="col">CA</th>
                                                            <th scope="col">Exam</th>
                                                            <th scope="col">Avg</th>
                                                            <th scope="col">Grade</th>
                                                            <th scope="col">CA</th>
                                                            <th scope="col">Exam</th>
                                                            <th scope="col">Avg</th>
                                                            <th scope="col">Grade</th>
                                                            <th scope="col">CA</th>
                                                            <th scope="col">Exam</th>
                                                            <th scope="col">Avg</th>
                                                            <th scope="col">Grade</th>
                                                            <th scope="col">Avg</th>
                                                            <th scope="col">Grade</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                            foreach($results->result() as $result){

                                                        
                                                            ?>
                                                            <tr>
                                                                <td data-label="Subject"><?= $result->subject ?> </td>
                                                                <td data-label="CA"><?= $result->term1ca ?> </td>
                                                                <td data-label="Exam"><?= $result->term1exam ?> </td>
                                                                <td data-label="Avg"><?= $result->term1avg ?> </td>
                                                                <td data-label="Grade"> <?php 
                                                                    if ($result->term1avg >= 90 && $result->term1avg <= 100) {
                                                                        $grade = 'A+';
                                                                        $gp = 4.0;
                                                                    } elseif ($result->term1avg >= 75 && $result->term1avg <= 89.9) {
                                                                        $grade = 'A';
                                                                        $gp = 4.0;
                                                                    } elseif ($result->term1avg >= 65 && $result->term1avg <= 74.9) {
                                                                        $grade = 'B';
                                                                        $gp = 3.0;
                                                                    } elseif ($result->term1avg >= 50 && $result->term1avg <= 64.9) {
                                                                        $grade = 'C';
                                                                        $gp = 2.0;
                                                                    } elseif ($result->term1avg >= 45 && $result->term1avg <= 49.9) {
                                                                        $grade = 'D';
                                                                        $gp = 1.0;
                                                                    } elseif ($result->term1avg >= 40 && $result->term1avg <= 44.9) {
                                                                        $grade = 'E';
                                                                        $gp = 0.7;
                                                                    } else {
                                                                        $grade = 'F';
                                                                        $gp = 0.0;
                                                                    }
                                                                    echo $grade;
                                                                    ?></td>
                                                                <!--                                    Term 2-->
                                                                <td data-label="CA"><?= $result->term2ca ?> </td>
                                                                <td data-label="Exam"><?= $result->term2exam ?> </td>
                                                                <td data-label="Avg"><?= $result->term2avg ?> </td>
                                                                <td data-label="Grade"> <?php 
                                                                    if ($result->term2avg >= 90 && $result->term2avg <= 100) {
                                                                        $grade = 'A+';
                                                                        $gp = 4.0;
                                                                    } elseif ($result->term2avg >= 75 && $result->term2avg <= 89.9) {
                                                                        $grade = 'A';
                                                                        $gp = 4.0;
                                                                    } elseif ($result->term2avg >= 65 && $result->term2avg <= 74.9) {
                                                                        $grade = 'B';
                                                                        $gp = 3.0;
                                                                    } elseif ($result->term2avg >= 50 && $result->term2avg <= 64.9) {
                                                                        $grade = 'C';
                                                                        $gp = 2.0;
                                                                    } elseif ($result->term2avg >= 45 && $result->term2avg <= 49.9) {
                                                                        $grade = 'D';
                                                                        $gp = 1.0;
                                                                    } elseif ($result->term2avg >= 40 && $result->term2avg <= 44.9) {
                                                                        $grade = 'E';
                                                                        $gp = 0.7;
                                                                    } else {
                                                                        $grade = 'F';
                                                                        $gp = 0.0;
                                                                    }
                                                                    echo $grade;
                                                                    ?></td>
                                                                <!--                                    Term 3-->
                                                                <td data-label="CA"><?= $result->term3ca ?> </td>
                                                                <td data-label="Exam"><?= $result->term3exam ?> </td>
                                                                <td data-label="Avg"><?= $result->term3avg ?> </td>
                                                                <td data-label="Grade"> <?php 
                                                                    if ($result->term3avg >= 90 && $result->term3avg <= 100) {
                                                                        $grade = 'A+';
                                                                        $gp = 4.0;
                                                                    } elseif ($result->term3avg >= 75 && $result->term3avg <= 89.9) {
                                                                        $grade = 'A';
                                                                        $gp = 4.0;
                                                                    } elseif ($result->term3avg >= 65 && $result->term3avg <= 74.9) {
                                                                        $grade = 'B';
                                                                        $gp = 3.0;
                                                                    } elseif ($result->term3avg >= 50 && $result->term3avg <= 64.9) {
                                                                        $grade = 'C';
                                                                        $gp = 2.0;
                                                                    } elseif ($result->term3avg >= 45 && $result->term3avg <= 49.9) {
                                                                        $grade = 'D';
                                                                        $gp = 1.0;
                                                                    } elseif ($result->term3avg >= 40 && $result->term3avg <= 44.9) {
                                                                        $grade = 'E';
                                                                        $gp = 0.7;
                                                                    } else {
                                                                        $grade = 'F';
                                                                        $gp = 0.0;
                                                                    }
                                                                    echo $grade;
                                                                    ?></td>

                                                                    <td><?= $final = number_format(($result->term1avg + $result->term2avg + $result->term3avg) / 3,1)?></td>
                                                                    <td><?php 
                                                                    if ($final >= 90 && $final <= 100) {
                                                                        $grade = 'A+';
                                                                        $gp = 4.0;
                                                                    } elseif ($final >= 75 && $final <= 89.9) {
                                                                        $grade = 'A';
                                                                        $gp = 4.0;
                                                                    } elseif ($final >= 65 && $final <= 74.9) {
                                                                        $grade = 'B';
                                                                        $gp = 3.0;
                                                                    } elseif ($final >= 50 && $final <= 64.9) {
                                                                        $grade = 'C';
                                                                        $gp = 2.0;
                                                                    } elseif ($final >= 45 && $final <= 49.9) {
                                                                        $grade = 'D';
                                                                        $gp = 1.0;
                                                                    } elseif ($final >= 40 && $final <= 44.9) {
                                                                        $grade = 'E';
                                                                        $gp = 0.7;
                                                                    } else {
                                                                        $grade = 'F';
                                                                        $gp = 0.0;
                                                                    }
                                                                    echo $grade;
                                                                    ?></td>
                                                            </tr>
                                                        <?php 
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <div class="">
                                                    <p class="card text-danger" style="font-size: small">Key: A+: 90-100 | A: 75-89 | B: 65-74 | C:
                                                        50-64 | D: 45-49 | E: 40-44 | F: 0-39</p>
                                                </div>
                                            </div>
                                            <!--  End of Term Ends  -->

                                            <!-- End Of Term -->
                                            <!--  End Of Term Ends  -->

                                        </div>
                                    </div>
                                    <div>

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