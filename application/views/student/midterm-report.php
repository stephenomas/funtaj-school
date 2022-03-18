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
                        <h3>Mid Term Report</h3>
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
                            <h5>Name: <?= $detail->fname." ".$detail->mname." ".$detail->lname ?></h5>
                            <h5 class="text-danger">Class:  <?= $this->input->get('year') ?></h5>
                            <h5 class="text-primary">Reg No: <?= $detail->admno ?> | DoB: <?= $detail->dob ?> | <?= $this->input->get('term') ?> | <?= $this->input->get('session') ?> Session</h5>
                            <!--                            <h6>Possible Attendance: | Actual Attendance:</h6>-->
                            <h5 class="text-secondary">Form Tutor: <?php
                                                        foreach($results->result() as $stud ){
                                               
                                                            $this->db->where('id',$stud->tutor_id);
                                                               
                                                            $tutor = $this->db->get('staff')->row();
                                                            if($tutor){
                                                                echo $tutor->fname." ".$tutor->lname;
                                                            }
                                                            break;
                                                        }
                                                     
                                                    
                                               
                                                        
                                                        ?> </h5>
                            <div class="table-responsive mb-4">
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
                                                            foreach($results->result() as $stud){
                                                          
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
                                <div class="text-danger" style="font-size: small">Key: (A: Excellent | 1: Highest) | (E: Poor -
                                    5: Lowest)
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
 