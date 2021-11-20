<body>
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
                        <h3>School Fees</h3>
                    </div>
                </div>

                <div class="helpdesk layout-spacing">


                    <div class="hd-tab-section">
                        <div class="row">
                            <div class="col-md-12 mb-5 mt-5">
                                <ul class="nav nav-pills mb-5 justify-content-between" id="pills-tab" role="tablist">
                                    <li class="col-xl-6 col-lg-6 col-md-6 col-12 nav-item text-center mb-5">
                                        <a class="nav-link" href="pay-school-fees">
                                            <i class="flaticon-money"></i>
                                            <h6 class="mt-3 mb-3">Pay School Fees</h6>
                                            <p>Lorem ipsum dolor dolore magna aliqua.</p>
                                        </a>
                                    </li>

                                    <li class="col-xl-6 col-lg-6 col-md-6 col-12 nav-item text-center mb-5">
                                        <a class="nav-link" href="#feeslist">
                                            <i class="flaticon-note-1"></i>
                                            <h6 class="mt-3 mb-3">School Fees History</h6>
                                            <p>Lorem ipsum dolor dolore magna aliqua.</p>
                                        </a>
                                    </li>

                                </ul>


                            </div>
                        </div>
                    </div>

                    <div class="row layout-spacing">
                        <div class="col-lg-12">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header" id="feeslist">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>School Fees History</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area" >
                                    <div class="table-responsive mb-4">
                                        <table id="column-filter" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Session</th>
                                                    <th>Class</th>
                                                    <th>Mode of Payment</th>
                                                    <th>Status</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2022/2023</td>
                                                    <td>Year 9</td>
                                                    <td>Online</td>
                                                    <td><span class="shadow-none badge badge-success">Completed</span></td>
                                                    <td class="text-center"><button class="btn btn-outline-primary">Receipt</button></td>
                                                </tr>
                                                <tr>
                                                    <td>2021/2022</td>
                                                    <td>Year 8</td>
                                                    <td>Bank Transfer</td>
                                                    <td><span class="shadow-none badge badge-info">Part Payment</span></td>
                                                    <td class="text-center"><button class="btn btn-outline-primary">Receipt</button></td>
                                                </tr>
                                                <tr>
                                                    <td>2021/2022</td>
                                                    <td>Year 8</td>
                                                    <td>Bank Transfer</td>
                                                    <td><span class="shadow-none badge badge-warning">Pending Approval</span></td>
                                                    <td class="text-center"><button class="btn btn-outline-primary">Receipt</button></td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Session</th>
                                                    <th>Class</th>
                                                    <th>Mode of Payment</th>
                                                    <th>Status</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
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

    <?php //include 'student/inc/footer.php'; 
 $this->load->view('student/inc/footer')
    ?>