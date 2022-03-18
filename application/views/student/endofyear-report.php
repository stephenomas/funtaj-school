
<body>
<?php //include 'inc/mobile-header.php';
    $this->load->view('student/inc/mobile-header')
    ?>

    <?php // include 'inc/desk-header.php'; 
    
    $this->load->view('student/inc/desk-header')
    ?>

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <?php //include 'inc/navbar.php';
            $this->load->view('student/inc/navbar')
        ?>

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>End of year</h3>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <button type="button" onclick="printDiv()" class="btn btn-primary btn-sm"><i class="icon-search"></i> Print Result</button>
                    <div id="GFG" class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h6><br>
                                    <img src="assets/img/logo-3.png" class="img-fluid" alt="logo">
                                    <br>Plot 584, David Jemibewon Crescent, Off Oladipo Diya Road, Gudu, Apo <br> info@funtajschoolltd.com, enquiries@funtajschoolltd.com
                                    <br> 2347057928544, 2347057928066</h6>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                        <h5>Name: <?= $detail->fname." ".$detail->mname." ".$detail->lname ?></h5>
                        <h5 class="text-danger">Class:  <?= $this->input->get('year') ?></h5>
                        <h5 class="text-primary">Reg No: <?= $detail->admno ?> | DoB:  <?= $detail->dob ?> |  <?= $this->input->get('term') ?>   | <?= $this->input->get('session') ?>  Session</h5>
                        <!--                            <h6>Possible Attendance: | Actual Attendance:</h6>-->
                        <h5>Class Avg.: <?= number_format($classaverage->average, 1) ?> | Student Avg.:  <?= number_format($average->average, 1) ?> | GPA: <?= number_format($gpa->gp,1 )?> </h5>
                        <h5 class="text-secondary">Form Tutor: <?= $results->row()->tutor_id ?> </h5>
                            <h6>Possible Attendance: <span class="text-info" id="actual_attendance">110</span> | Actual Attendance: <span class="text-info" id="actual_attendance">110</span></h6>
                            <div class="table-responsive mb-4">
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
                                        <tr>
                                            <td data-label="Subject">Agric. Science</td>
                                            <td data-label="CA">63.0</td>
                                            <td data-label="Exam">74.0</td>
                                            <td data-label="Avg">69.0</td>
                                            <td data-label="Grade">B</td>
                                            <!--                                    Term 2-->
                                            <td data-label="CA">54.0</td>
                                            <td data-label="Exam">70.0</td>
                                            <td data-label="Avg">62.0</td>
                                            <td data-label="Grade">C</td>
                                            <!--                                    Term 3-->
                                            <td data-label="CA">55.0</td>
                                            <td data-label="Exam">78.0</td>
                                            <td data-label="Avg">67.0</td>
                                            <td data-label="Grade">B</td>
                                            <td data-label="Year Avg">66.0</td>
                                            <td data-label="Year Grade">
                                                B </td>
                                        </tr>
                                        <tr>
                                            <td data-label="Subject">Basic Science</td>
                                            <td data-label="CA">76.0</td>
                                            <td data-label="Exam">64.0</td>
                                            <td data-label="Avg">70.0</td>
                                            <td data-label="Grade">B</td>
                                            <!--                                    Term 2-->
                                            <td data-label="CA">42.0</td>
                                            <td data-label="Exam">58.0</td>
                                            <td data-label="Avg">50.0</td>
                                            <td data-label="Grade">C</td>
                                            <!--                                    Term 3-->
                                            <td data-label="CA">67.0</td>
                                            <td data-label="Exam">57.0</td>
                                            <td data-label="Avg">62.0</td>
                                            <td data-label="Grade">C</td>
                                            <td data-label="Year Avg">60.7</td>
                                            <td data-label="Year Grade">
                                                C </td>
                                        </tr>
                                        <tr>
                                            <td data-label="Subject">Basic Tech</td>
                                            <td data-label="CA">72.0</td>
                                            <td data-label="Exam">54.0</td>
                                            <td data-label="Avg">63.0</td>
                                            <td data-label="Grade">C</td>
                                            <!--                                    Term 2-->
                                            <td data-label="CA">56.0</td>
                                            <td data-label="Exam">51.0</td>
                                            <td data-label="Avg">54.0</td>
                                            <td data-label="Grade">C</td>
                                            <!--                                    Term 3-->
                                            <td data-label="CA">68.0</td>
                                            <td data-label="Exam">54.0</td>
                                            <td data-label="Avg">61.0</td>
                                            <td data-label="Grade">C</td>
                                            <td data-label="Year Avg">59.3</td>
                                            <td data-label="Year Grade">
                                                C </td>
                                        </tr>
                                        <tr>
                                            <td data-label="Subject">Business Studies</td>
                                            <td data-label="CA">90.0</td>
                                            <td data-label="Exam">86.0</td>
                                            <td data-label="Avg">88.0</td>
                                            <td data-label="Grade">A</td>
                                            <!--                                    Term 2-->
                                            <td data-label="CA">80.0</td>
                                            <td data-label="Exam">76.0</td>
                                            <td data-label="Avg">78.0</td>
                                            <td data-label="Grade">A</td>
                                            <!--                                    Term 3-->
                                            <td data-label="CA">76.0</td>
                                            <td data-label="Exam">62.0</td>
                                            <td data-label="Avg">69.0</td>
                                            <td data-label="Grade">B</td>
                                            <td data-label="Year Avg">78.3</td>
                                            <td data-label="Year Grade">
                                                A </td>
                                        </tr>
                                     
                                    </tbody>
                                </table>
                                <div class="">
                                    <p class="card text-danger" style="font-size: small">Key: A+: 90-100 | A: 75-89 | B: 65-74 | C:
                                        50-64 | D: 45-49 | E: 40-44 | F: 0-39</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!--  BEGIN FOOTER  -->
    <?php //include 'inc/footer.php'; 
     $this->load->view('student/inc/navbar')
    ?>
    <!--  END FOOTER  -->