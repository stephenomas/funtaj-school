
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
                        <h3>Checkout</h3>
                    </div>
                </div>
                
                <div class="row margin-bottom-120" id="cancel-row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="statbox widget box box-shadow" id="form_wizard">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Checkout </h4>
                                    </div>                           
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div id="circle-basic" class="mt-5 mb-5">
                                    <!-- <h3>
                                        <span class="icon">
                                            <i class="done flaticon-double-check" style="display: none;"></i>
                                            <i class="active flaticon-user-7" style="display: none"></i>
                                        </span>
                                        <span class="mt-3">Login or Signup</span>
                                    </h3>
                                    <section>
                                        <h5 class="mt-5 mb-5 w-title">General Information</h5>
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-6 col-12">
                                                    <input type="text" class="form-control mt-3 mb-5" placeholder="Username">
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <input type="text" class="form-control mt-3 mb-5" placeholder="Email">
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <input type="text" class="form-control mt-3 mb-5" placeholder="Password">
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <input type="text" class="form-control mt-3 mb-5" placeholder="Retype Password">
                                                </div>
                                            </div>
                                        </form>
                                    </section> -->
                              
                                    <h3>
                                        <span class="icon">
                                            <i class="done flaticon-double-check" style="display: none;"></i>
                                            <i class="active flaticon-document-3" style="display: none"></i>
                                        </span>
                                        <span class="mt-3">Order Summary</span>
                                    </h3>
                                    <section>
                                        <h5 class="mt-5 mb-5 w-title">Order</h5>
                                        <div class="row">
                                            <div class="col-xl-4 col-12">
                                                <div class="total-amount text-center">
                                                    <i class="flaticon-cart-bag-1"></i>
                                                    <h6>Order Total</h6>
                                                    <p class="t-amount mb-2 mt-2"><?php echo $this->cart->format_number($this->cart->total()) ?></p>
                                                    <p class="t-product"><?= $this->cart->total_items() ?> Products</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-8 col-12 mt-xl-0 mt-4">
                                                <div class="order-product-list">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Product</th>
                                                                    <th scope="col">Qty</th>
                                                                    <th scope="col">Price</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                           <?php foreach ($cart_contents as $cart_items) {
                                                            
                                                            ?>
                                                                <tr>
                                                                    <th>
                                                                        <span><a href="#"><?php echo $cart_items['name'] ?></span>
                                                                        <p><small>Size : <?php   $this->db->where('id', $cart_items['id']);
                                                                    $size = $this->db->get('products_sizes')->row();
                                                                    echo $size->product_size?></small></p>
                                                                    </th>
                                                                    <td><?= $cart_items['qty'] ?></td>
                                                                    <td class="pricing">₦<?= $this->cart->format_number($cart_items['subtotal']) ?></td>
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
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <h3>
                                        <span class="icon">
                                            <i class="done flaticon-double-check" style="display: none;"></i>
                                            <i class="active flaticon-gift-fill" style="display: none"></i>
                                        </span>
                                        <span class="mt-3">Checkout</span>
                                    </h3>
                                    <section>
                                        <h5 class="mt-5 mb-5 w-title">Payment Method</h5>
                                        <div class="rounded-pills-icon checkout-method">
                                            <ul class="nav nav-pills mb-4  justify-content-center" id="rounded-pills-icon-tab" role="tablist">
                                                <li class="nav-item ml-2 mr-2">
                                                    <a class="nav-link mb-2 active text-center" id="rounded-pills-icon-home-tab" data-toggle="pill" href="#rounded-pills-icon-home" role="tab" aria-controls="rounded-pills-icon-home" aria-selected="true"><i class="flaticon-credit-card"></i> Credit Card</a>
                                                </li>
                             
                                                </li>
                                            </ul>

                                            <div class="tab-content" id="rounded-pills-icon-tabContent">
                                                <div class="tab-pane fade show active" id="rounded-pills-icon-home" role="tabpanel" aria-labelledby="rounded-pills-icon-home-tab">
                                                    <h5 class="p-methods-title mb-5 mt-5 text-center">Credit Card</h5>
                                                    <form id="paymentForm">

                                                   
                                                    <div class="row">
                                                        
                                                        <div class="col-sm-6 col-12">
                                                            <input type="text" class="form-control mt-3 mb-5" id="email" value="<?= $this->session->userdata('email')  ?>" readonly>
                                                        </div>
                                                        <input type="hidden"  name="amount" class="form-control-rounded form-control" id="who" value="<?= $this->session->userdata('id') ?>">
                                                        <div class="col-sm-6 col-12">
                                                            <input type="text" class="form-control mt-3 mb-5" id="amount" value="<?php echo $this->cart->format_number($this->cart->total()) ?>"  name="amount"  readonly>
                                                        </div>
                                                        <div class="col-md-12 text-center mt-4">
                                                            <script src="https://js.paystack.co/v1/inline.js"></script>

                                                            <!-- <button class="btn btn-success btn-rounded my-5" onclick="payWithPaystack()">Confirm</button> -->
                                                            <button type="button" class="btn btn-success btn-rounded"  onclick="payWithPaystack()"> Pay </button> 
                                                        </div>
                                                    </div>
                                         

                                                    </form>
                                                </div>
                                                <script>
                                                    function getalert(){
                                                        alert('fuckk')
                                                    }
                                                    function payWithPaystack(){
                                                        // e.preventDefault();
                                                        // paymentForm.addEventListener('submit', payWithPaystack);
                                                        var total = document.getElementById('amount').value;
                                                        let cut = total.length - 3;
                                                        var san = total.slice(0, cut);
                                                        var rep = san.replace(',', '');
                                                        var handler = PaystackPop.setup({
                                                      
                                                        key: 'pk_test_de58b9437eb7f2376baedae31117daced8503312',
                                                        email: document.getElementById('email').value,
                                                        amount: rep * 100,
                                                        currency: "NGN",
                                                        ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                                                        metadata: {
                                                            custom_fields: [
                                                                {
                                                                    payer_id: document.getElementById('who').value,
                                                                   
                                                                }
                                                            ]
                                                        },
                                                        callback: function(response){
                                                            var reference = response.reference;

                                                            $.ajax({
                                                                url: "checkout/confirm",
                                                                method: "POST",
                                                                type: "json",
                                                                data: {
                                                                    reference
                                                                },
                                                                success: function (response) {
                                                                swal({ title: 'Your Credit Card Payment is Successfull!', text: "Please click on finish button to place your order.", type: 'success', })
                                                                   location.replace('/funtaj-school/student-portal');
                                                                    console.log(response)
                                                                },
                                                                error: function (error){
                                                                    console.log(error)
                                                                }
                                                            });

                                                            },
                                                            onClose: function() {
                                                            alert('Transaction was not completed,' + san);
                                                            },
                                                            });

                                                            handler.openIframe();
                                                    }
                                                    </script>
                                                
                                              
                                            </div>
                                        </div>
                                    </section>
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
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
   
    <script>
        $("#circle-basic").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            autoFocus: true,
            titleTemplate: '#title#',
            cssClass: 'circle wizard',
            onFinished: function(event, currentIndex) { swal('Order Placed!', 'Your order has been successfully placed', 'success') }
        });
        $('.confirm-credi').on('click', function () {
            swal({ title: 'Your Credit Card Payment is Successfull!', text: "Please click on finish button to place your order.", type: 'success', })
        })
        $('.confirm-paypal').on('click', function () {
            swal({ title: 'Your Credit Paypal Payment is Successfull!', text: "Please click on finish button to place your order.", type: 'success', })
        })
        $('.confirm-cash').on('click', function () {
            swal({ title: 'Pay cash on delivery!', text: "Please click on finish button to place your order.", type: 'success', })
        })
    </script>
    <!--  END CUSTOM SCRIPT FILES  -->    
