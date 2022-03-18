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
                                                        <h5>Class Avg.: <?= number_format($classaverage->average, 1) ?> | Student Avg.:  <?= number_format($average->average, 1) ?> | GPA: <?= number_format($gpa->gp,1 )?> </h5>
                                                        <h5 class="text-secondary">Form Tutor: <?= $student->row()->tutor_id ?> </h5>
                                                        <h6>Possible Attendance: <span class="text-info" id="actual_attendance">110</span> | Actual Attendance: <span class="text-info" id="actual_attendance">110</span></h6>
                                                    </div>
                                                    <div class="col-md-4" id="printPageButton">
                                                        <img src="<?= site_url($detail->stu_img) ?>" style="height: 80px; width: 80px" alt="profile Picture">
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-bordered dt-responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Subject</th>
                                                            <th scope="col">CA</th>
                                                            <th scope="col">Exam</th>
                                                            <th scope="col">Average</th>
                                                            <th scope="col">Grade</th>
                                                            <th scope="col">Comment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($student->result() as $stud){ ?>
                                                        <tr>
                                                            <td data-label="Subject"><?= $stud->subject_title ?></td>
                                                            <td data-label="CA"><?= $stud->ca ?></td>
                                                            <td data-label="Exam"><?= $stud->exam ?></td>
                                                            <td data-label="Avg"><?= $stud->average ?></td>
                                                            <td data-label="Grade">
                                                                <?php 
                                                                        if ($stud->average >= 90 && $stud->average <= 100) {
                                                                            $grade = 'A+';
                                                                            $gp = 4.0;
                                                                        } elseif ($stud->average >= 75 && $stud->average <= 89.9) {
                                                                            $grade = 'A';
                                                                            $gp = 4.0;
                                                                        } elseif ($stud->average >= 65 && $stud->average <= 74.9) {
                                                                            $grade = 'B';
                                                                            $gp = 3.0;
                                                                        } elseif ($stud->average >= 50 && $stud->average <= 64.9) {
                                                                            $grade = 'C';
                                                                            $gp = 2.0;
                                                                        } elseif ($stud->average >= 45 && $stud->average <= 49.9) {
                                                                            $grade = 'D';
                                                                            $gp = 1.0;
                                                                        } elseif ($stud->average >= 40 && $stud->average <= 44.9) {
                                                                            $grade = 'E';
                                                                            $gp = 0.7;
                                                                        } else {
                                                                            $grade = 'F';
                                                                            $gp = 0.0;
                                                                        }
                                                                        echo $grade;
                                                                ?>
                                                            </td>
                                                            <td data-label="Comment"> <?= $stud->comment ?> </td>
                                                        </tr>
                                                       <?php } ?>
                                                    </tbody>
                                                </table>
                                                <p class="card text-danger" style="font-size: small">Key: A+: 90-100 | A: 75-89 | B: 65-74 | C:
                                                    50-64 | D: 45-49 | E: 40-44 | F: 0-39</p>
                                                <div class="marging-top-25">
                                                    <h6>Behavioral Analysis <span class="text-danger">(Lowest: 1, Highest: 5)</span></h6>
                                                    <table class="table table-striped table-bordered dt-responsive nowrap">
                                                        <thead>

                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="col">Behaviour</th>
                                                                <th scope="col">Rating</th>
                                                                <th scope="col">Behaviour</th>
                                                                <th scope="col">Rating</th>
                                                            </tr>
                                                            <tr>
                                                                <td>Generosity</td>
                                                                <td data-label="Rating" style="max-width: 4em">4 </td>
                                                                <td>Punctuality</td>
                                                                <td data-label="Rating" style="max-width: 4em">3 </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Class Attendance</td>
                                                                <td data-label="Rating" style="max-width: 4em">4 </td>
                                                                <td>Responsibility in Assignments</td>
                                                                <td data-label="Rating" style="max-width: 4em">4 </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Attentiveness</td>
                                                                <td data-label="Rating" style="max-width: 4em">4 </td>
                                                                <td>Initiative</td>
                                                                <td data-label="Rating" style="max-width: 4em">3 </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Neatness</td>
                                                                <td data-label="Rating" style="max-width: 4em">5 </td>
                                                                <td>Self Control</td>
                                                                <td data-label="Rating" style="max-width: 4em">4 </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Relationship With Staff</td>
                                                                <td data-label="Rating" style="max-width: 4em">4 </td>
                                                                <td>Relationship With Students</td>
                                                                <td data-label="Rating" style="max-width: 4em">3 </td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="col" colspan="4" class="text-center">Merits/Demerits or Detention</th>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col" colspan="1">Event</th>
                                                                <th scope="col" colspan="1">Number of occurrences</th>
                                                                <th scope="col" colspan="1">Event</th>
                                                                <th scope="col" colspan="1">Number of occurrences</th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="1">Merits</td>
                                                                <td colspan="1" data-label="No. of times occurred" style="max-width: 4em">none </td>
                                                                <td colspan="1">Demerits/Detention</td>
                                                                <td colspan="1" data-label="No. of times occurred" style="max-width: 4em">none </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="">
                                                        <p>
                                                        <div class="text-danger" style="font-size: large">CLASS TUTOR'S COMMENT: <span class="text-primary">Abande has achieved a very good report. Please encourage him to study each day to enhance understanding and improve his grades.</span></div>
                                                        </p>
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