<body class="default-sidebar">

    <!-- Tab Mobile View Header -->
    <?php //include 'student/inc/mobile-header.php'; 
    $this->load->view('student/inc/mobile-header')
    ?>
    <!-- Tab Mobile View Header -->

    <!--  BEGIN NAVBAR  -->
    <?php //include 'student/inc/desk-headerude.php'; 
    $this->load->view('student/inc/desk-header')
    ?>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <?php //include 'student/inc/navbar.php'; 
         $this->load->view('student/inc/navbar')
        ?>



        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Hello, <?=$this->session->userdata('fname')?></h3>
                    </div>
                </div>

                <div class="row layout-spacing ">

                    <a href="school-fees" class="col-xl-3 mb-xl-0 col-lg-6 mb-4 col-md-6 col-sm-6">

                        <div class="widget-content-area  data-widgets br-4">
                            <div class="widget  t-income-widget">
                                <div class="media">
                                    <div class="icon ml-2">
                                        <i class="flaticon-money"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <p class="widget-text mb-0">School Fees</p>
                                        <p class="widget-numeric-value">₦<?= number_format($fee->first_term + $fee->second_term + $fee->third_term) ?></p>
                                    </div>
                                </div>
                                <p class="widget-total-stats mt-2 text-secondary">click to view</p>
                            </div>
                        </div>
                    </a>

                    <a href="results" class="col-xl-3 mb-xl-0 col-lg-6 mb-4 col-md-6 col-sm-6">
                        <div class="widget-content-area  data-widgets br-4">
                            <div class="widget  t-sales-widget">
                                <div class="media">
                                    <div class="icon ml-2">
                                        <i class="flaticon-line-chart"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <p class="widget-text mb-0">Results</p>
                                        <p class="widget-numeric-value">&nbsp;</p>
                                    </div>
                                </div>
                                <p class="widget-total-stats mt-2 text-secondary">click to view</p>
                            </div>
                        </div>
                    </a>

                    <a href="school-store" class="col-xl-3 mb-xl-0 col-lg-6 mb-4 col-md-6 col-sm-6">
                        <div class="widget-content-area  data-widgets br-4">
                            <div class="widget  t-order-widget">
                                <div class="media">
                                    <div class="icon ml-2">
                                        <i class="flaticon-cart-bag"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <p class="widget-text mb-0">Store</p>
                                        <p class="widget-numeric-value">&nbsp;</p>
                                    </div>
                                </div>
                                <p class="widget-total-stats mt-2 text-secondary">click to view</p>
                            </div>
                        </div>
                    </a>

                    <a href="" class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-sm-0 mb-4">
                        <div class="widget-content-area  data-widgets br-4">
                            <div class="widget  t-customer-widget">
                                <div class="media">
                                    <div class="icon ml-2">
                                        <i class="flaticon-map"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <p class="widget-text mb-0">Archive</p>
                                        <h6 class="text-sm widget-numeric-value">Notes & Assignments</h6>
                                    </div>
                                </div>
                                <p class="widget-total-stats mt-2 text-secondary">click to view</p>
                            </div>
                        </div>
                    </a>



                </div>

                <div class="row">

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget-content-area card-widget p-0  br-4">
                            <div class="card-1 br-4">
                                <div class="d-flex justify-content-between mb-5">
                                    <p class="card-title">Team Meeting</p>
                                    <p class="meta-time">12:30 - 2:30 PM</p>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        <p> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>

                                    <div class="col-md-12 text-center mt-sm-3">
                                        <button class="btn btn-outline-default btn-rounded">View Details</button>
                                    </div>
                                </div>

                                <ul class="list-inline badge-collapsed-img badge-tooltip mt-5 mb-0 text-right mr-3">
                                    <li class="list-inline-item chat-online-usr">
                                        <img data-original-title="Alma Clarke" alt="admin-profile" src="assets/img/90x90.jpg" class="ml-0 bs-tooltip">
                                    </li>
                                    <li class="list-inline-item chat-online-usr">
                                        <img data-original-title="Alan Green" alt="admin-profile" src="assets/img/90x90.jpg" class="bs-tooltip">
                                    </li>
                                    <li class="list-inline-item chat-online-usr">
                                        <img data-original-title="Daisy Anderson" alt="admin-profile" src="assets/img/90x90.jpg" class="bs-tooltip">
                                    </li>
                                    <li class="list-inline-item chat-online-usr">
                                        <img data-original-title="Judy Holmes" alt="admin-profile" src="assets/img/90x90.jpg" class="bs-tooltip">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 layout-spacing">
                        <div class="widget-content-area p-0 card-widget-content ">
                            <div id="user-profile-card-1" class="card br-4" style="">
                                <div class="card-body p-0">
                                    <div class="usr-img-meta mx-auto">
                                        <img alt="admin-profile" src="assets/img/90x90.jpg" class="rounded-circle">
                                    </div>
                                    <div class="usr-info-meta text-center">
                                        <p class="usr-name mb-0"><?=$this->session->userdata('fname')?></p>
                                        <p class="usr-occupation"><?=$this->session->userdata('prefix')." ".$this->session->userdata('digit')?></p>
                                        <button class="btn btn-secondary btn-rounded">View Profile</button>
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
    <?php //include 'student/inc/footer.php'; 
 $this->load->view('student/inc/footer')
    ?>
    <!--  END FOOTER  -->
    <?php //include 'student/inc/footer.php'; 
 $this->load->view('student/inc/main-footer')
    ?>
