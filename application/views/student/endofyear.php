
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
                        <h3>Results</h3>
                    </div>
                </div>

                <div class="row layout-spacing">
                <?php 
                $prev = "";
                foreach($year->result() as $years){
                 if($prev != $years->session){
                ?>
                    <a href="<?= site_url('student-portal/results/endofyear-report?session='.$years->session) ?>" class="col-xl-4 col-md-6 col-12">
                        <div class="widget-content-area br-4 mb-4">
                            <div class="d-flex justify-content-between t-likes">                                
                                <div class="">
                                   
                                    <h5 class="mb-0"><?= $years->session ?></h5>
                                </div>
                                <div class="">
                                    <i class="flaticon-note-1"></i>
                                </div>
                            </div>
                        </div>
                    </a>

                <?php 
                    }
                   $prev= $years->session;
                 }
                ?>

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