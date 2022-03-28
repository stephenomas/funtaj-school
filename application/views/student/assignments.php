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
                        <h3>Assignments</h3>
                    </div>
                </div>
                
                <div class="row layout-spacing">
                    <div class="col-lg-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Assignments</h4>
                                    </div>
                                </div>
                            </div>
                            <?php foreach($assignments->result() as $assignment){ ?>
                            <div class="widget-content widget-content-area">
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <blockquote class="blockquote">
                                            <p> <?=$assignment->start_date?> - <?=$assignment->end_date?><br>
                                                <h4><b><?=$assignment->assignment_title?></b></h4>
                                            <br><?php
                                                $this->db->where('id', $assignment->staff_id);
                                                $staffGet = $this->db->get('staff');
                                                foreach($staffGet->result() as $staff) :
                                                $staffName = $staff->fname.' '.$staff->lname;?><?=$staffName?>
                                                <?php endforeach;?>
                                        </p>
                                        </blockquote>
                                    </div>
                                </div>
                                        <!-- To display note information -->
                                        <!-- sample modal content -->
                                        <div class="col-sm-6 col-md-4 col-xl-3">
                                            <div id="viewDetails<?= $assignment->id ?>" class="modal fade" tabindex="-1" aria-labelledby="#viewDetailsLabel<?= $assignment->id ?>" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-fullscreen">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="viewDetailsLabel<?= $assignment->id ?>">Title - Description</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12 border-right text-center">
                                                                <iframe src="<?= $assignment->assignment_link ?>" style="width:85vw; height:85vh;" frameborder="0"></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                                        
                                        </div>
                                        <!-- To display note information -->
                                        <!-- sample modal content -->

                                        <div class="mb-0 ">
                                            <a href="#" class=""><?=$assignment->prefix.' '.$assignment->digit?></a>
                                        </div>
                                        <div class="mb-0 float-end">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#viewDetails<?= $assignment->id ?>" class="">View</a> 
                                        </div>
                            </div>
                            <?php } ?>
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

