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
        <!--  END TOPBAR  -->

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>End of Term Report</h3>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <button type="button" onclick="printDiv()" class="btn btn-primary btn-sm"><i class="icon-search"></i> Print Result</button>
                    <div id="GFG" class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4></h4>
                                    <img src="assets/img/logo-3.png" class="img-fluid" alt="logo">
                                    <br>Plot 584, David Jemibewon Crescent, Off Oladipo Diya Road, Gudu, Apo <br> info@funtajschoolltd.com, enquiries@funtajschoolltd.com
                                    <br> 2347057928544, 2347057928066
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                        
                        <h6>Possible Attendance: <span class="text-info" id="actual_attendance">110</span> | Actual Attendance: <span class="text-info" id="actual_attendance">110</span></h6>
                            <div class="table-responsive mb-4">
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
                                                        <?php foreach($results->result() as $stud){ ?>
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
      $this->load->view('student/inc/footer')
    ?>
    <!--  END FOOTER  -->