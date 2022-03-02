

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
                        <h3>View Cart</h3>
                    </div>
                </div>
                
                <div class="row" id="cancel-row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Shopping Cart</h4>
                                    </div>
                                </div>
                            </div>
                            <?php if ($this->cart->total_items()) { ?>
                            <div class="widget-content widget-content-area view-cart-content">
                                <div class="container">
                                    <div class="row mb-5">
                                        <div class="col-md-12">
                                            
                                                <div class="table-responsive">
                                                    <table class="table view-cart-table">
                                                        <thead>
                                                            <tr>
                                                                <th class="col-thumbnail">Product</th>
                                                                <th class="col-title"></th>
                                                                <th class="col-price">Price</th>
                                                                <th class="col-quantity">Quantity</th>
                                                                <th class="col-subtotal">Total</th>
                                                                <th class="col-remove"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $i = 0;
                                                        foreach ($cart_contents as $cart_items) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td><a href="#"><img class="product-thumbnail img-fluid" src="assets/img/320x320.jpg" alt=""></a></td>
                                                                <td>
                                                                    <h6 class="mb-0"><a href="#"><?php echo $cart_items['name'] ?></a></h6>
                                                                    <p><small>Size : <?php
                                                                    $this->db->where('id', $cart_items['id']);
                                                                    $size = $this->db->get('products_sizes')->row();
                                                                    echo $size->product_size?></small></p>
                                                                </td>
                                                                <td>₦<?= $this->cart->format_number($cart_items['price']) ?></td>
                                                                <form action="<?php echo base_url('update/cart'); ?>" method="post">
                                                                <td>
                                                                    <input class="form-control" name="qty" type="number" step="1" min="1" value="<?= $cart_items['qty'] ?>">
                                                                </td>
                                                                <td>₦<?= $this->cart->format_number($cart_items['subtotal']) ?></td>
                                                                <td>
                                                                    
                                                                        
                                                                        <input type="hidden" name="rowid" value="<?php echo $cart_items['rowid'] ?>"/>
                                                                    <button type="submit" class="btn btn-primary btn-rounded">Update Cart</button>
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                <form action="<?php echo base_url('remove/cart'); ?>" method="post">
                                                                <input type="hidden" name="rowid" value="<?php echo $cart_items['rowid'] ?>"/>
                                                                <input type="submit" name="submit" value="X"/>
                                                                </form>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <input class="form-control" type="text" placeholder="Coupon Code">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <a class="btn btn-outline-dark btn-rounded" href="javascript:void(0);">Apply Coupon</a>
                                                        <i class="flaticon-question" data-toggle="tooltip" data-placement="top" title="Apply coupon to avail discount"></i>
                                                    </div>
                                                   
                                                </div>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table cart-table">
                                                <tbody>
                                                    
                                                    <tr>
                                                        <td>Total</td>
                                                        <td class="text-right">₦<?php echo $this->cart->format_number($this->cart->total()) ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="text-right"><a class="btn btn-primary btn-rounded mt-4 mb-3" href="<?= site_url('student-portal/store/checkout') ?>">Checkout</a></div>
                                        </div>
                                    </div>
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

    <?php //include 'student/inc/footer.php'; 
 $this->load->view('student/inc/footer')
    ?>
        <?php //include 'student/inc/footer.php'; 
 $this->load->view('student/inc/main-footer')
    ?>

