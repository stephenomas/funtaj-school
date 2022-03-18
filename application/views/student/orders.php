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
                        <h3>Orders</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="order-top-section">
                            <h4 class="mb-5 card-title text-center">Order Status</h4>
                            <div class="card-section mx-md-auto">
                                <div class="row mt-5">
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-5">
                                        <div class="o-cards">
                                            <h5 class="txt-o-placed">Order Placed</h5>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-6 mt-4">
                                                    <div id="o-progress-order-placed" class=""></div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-6 mt-4 text-right">
                                                    <h4><?php
                                                        $count = 0;

                                                        foreach($orders->result() as $order){
                                                            $count++;
                                                        }
                                                        echo $count;
                                                    ?></h4>
                                                    <h6>Order</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-5">
                                        <div class="o-cards">
                                            <h5 class="txt-o-preparing">Pending</h5>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-6 mt-4">
                                                    <div id="o-progress-preparing" class=""></div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-6 mt-4 text-right">
                                                    <h4><?php
                                                        $count = 0;
                                                        $this->db->where('user_id', $this->session->userdata('email'));
                                                        $this->db->where('status', 'pending');
                                                        $pend= $this->db->get('orders');
                                                        foreach($pend->result() as $order){
                                                            $count++;
                                                        }
                                                        echo $count;
                                                    ?></h4>
                                                    <h6>In Process</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-5">
                                        <div class="o-cards">
                                            <h5 class="txt-o-shipped">Delivered</h5>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-6 mt-4">
                                                    <div id="o-progress-shipped" class=""></div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-6 mt-4 text-right">
                                                    <h4><?php
                                                        $count = 0;
                                                        $this->db->where('user_id', $this->session->userdata('email'));
                                                        $this->db->where('status', 'received');
                                                        $pend= $this->db->get('orders');
                                                        foreach($pend->result() as $order){
                                                            $count++;
                                                        }
                                                        echo $count;
                                                    ?></h4>
                                                    <h6>received</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                                <th class="checkbox-column"> Record No. </th>
                                                <th>Order ID</th>
                                                <th>Purchased On</th>
                                                
                                                <th>Purchased Price</th>
                                                <th class="align-center">Status</th>
                                                <th class="align-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $id = 1;
                                            foreach($orders->result() as $order){
                                            ?>
                                            <tr>
                                                <td class="checkbox-column"> <?= $id ?> </td>
                                                <td><?= $order->id ?></td>
                                                <td><?= $order->date ?></td>
                                                <td>₦<?= number_format($order->price) ?></td>
                                                <td class="align-center"><span class="badge <?php echo $order->status == 'received' ? 'badge-success' : 'badge-warning'  ?>"><?= $order->status ?></span></td>
                                                <td class="align-center"><button type="button" class="btn btn-default btn-sm"><i class="icon-search"></i> View</button></td>
                                            </tr>
                                            <?php
                                            $id++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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
 $this->load->view('student/inc/footer');
 $this->load->view('student/inc/main-footer');
    ?>