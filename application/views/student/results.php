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

        <?php // include 'inc/navbar.php'; 
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

                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Order Listing</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive mb-4">
                                    <table id="ecommerce-order-list" class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="checkbox-column"> Term</th>
                                                <th class="align-center">Mid Term</th>
                                                <th class="align-center">End of Term</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="checkbox-column"> 1st </td>
                                                <td class="align-center"><a href="<?= site_url('/student-portal/results/midterm?term=Term 1') ?>" class="badge badge-success">View</a></td>
                                                <td class="align-center"><a href="<?= site_url('/student-portal/results/endofterm?term=Term 1') ?>" class="btn btn-primary"><i class="icon-search"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="checkbox-column"> 2nd </td>
                                                <td class="align-center"><a href="<?= site_url('/student-portal/results/midterm?term=Term 2') ?>" class="badge badge-success">View</a></td>
                                                <td class="align-center"><a href="<?= site_url('/student-portal/results/endofterm?term=Term 2') ?>" class="btn btn-primary"><i class="icon-search"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="checkbox-column"> 3rd </td>
                                                <td class="align-center"><a href="<?= site_url('/student-portal/results/midterm?term=Term 3') ?>" class="badge badge-success">View</a></td>
                                                <td class="align-center"><a href="<?= site_url('/student-portal/results/endofterm?term=Term 3') ?>" class="btn btn-primary"><i class="icon-search"></i> View</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    Click here to view yearly report<a href="<?= site_url('/student-portal/results/endofyear') ?>" class="badge badge-success">View</a>
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