
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