<div id="layout-wrapper">


    <?php //include 'inc/topbar.php'; 
    $this->load->view('administrator/inc/topbar')
    ?>

    <!-- ========== Left Sidebar Start ========== -->
    <?php //include 'inc/sidebar.php'; 
    $this->load->view('administrator/inc/sidebar')
    ?>
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Checkout</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                            <li class="breadcrumb-item active">Checkout</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div id="checkout-nav-pills-wizard" class="twitter-bs-wizard">
                            <ul class="twitter-bs-wizard-nav">
                             

                                <li class="nav-item">
                                    <a href="#payment-info" class="nav-link" data-toggle="tab">
                                        <span class="step-number">01</span>
                                        <span class="step-title">Payment Info</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content twitter-bs-wizard-tab-content">
                                
                                <div class="tab-pane" id="payment-info">
                                    <h5 class="card-title">Payment information</h5>
                                    <p class="card-title-desc">It will be as simple as occidental in fact</p>

                                    <div>
                                        <h5 class="font-size-14">Payment method :</h5>

                                        <div class="row">

                                            <div class="col-lg-4 col-sm-6">
                                                <div>
                                                    <label class="form-label card-radio-label mb-3">
                                                        <input type="radio" name="pay-method" id="pay-methodoption1" class="card-radio-input">

                                                        <span class="card-radio">
                                                            <i class="fab fa-cc-mastercard font-size-24 align-middle me-2"></i>
                                                            <span>Credit / Debit Card</span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>

                                           

                                           

                                        </div>

                                        <h5 class="my-3 font-size-14">For card Payment</h5>
                                        <div class="p-4 border">
                                            <form>
                                                <div class="mb-3">
                                                    <label class="form-label" for="cardnameInput">Email</label>
                                                    <input type="text" class="form-control" id="email" value="<?= $this->session->userdata('email')  ?>" readonly>
                                                </div>

                                                <div class="row">
                                                <input type="hidden"  name="amount" class="form-control-rounded form-control" id="who" value="<?= $this->session->userdata('id') ?>">
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="mb-3 mb-lg-0">
                                                            <label class="form-label" for="cvvcodeInput">Amount</label>
                                                            <input type="text" class="form-control" id="amount" value="<?php echo $this->cart->format_number($this->cart->total()) ?>"  name="amount"  readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="mt-4 text-end">
                                            <a href="#"  onclick="payWithPaystack()" class="btn btn-success">
                                                Complete order
                                            </a>
                                        </div>
                                        <script src="https://js.paystack.co/v1/inline.js"></script>
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
                                                                url: "/funtaj-school/student-portal/store/checkout/confirm",
                                                                method: "POST",
                                                                type: "json",
                                                                data: {
                                                                    reference
                                                                },
                                                                success: function (response) {
                                                                swal({ title: 'Your Credit Card Payment is Successfull!', text: "Please click on finish button to place your order.", type: 'success', })
                                                                   location.replace('/funtaj-school/store/orders');
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
                            </div>

                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card checkout-order-summary">
                    <div class="card-body">
                        <div class="p-3 bg-light mb-4">
                            <h5 class="font-size-14 mb-0">Order Summary <span class="float-end ms-2"></span></h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-centered mb-0 table-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0" style="width: 110px;" scope="col">Product</th>
                                        <th class="border-top-0" scope="col">Product Desc</th>
                                        <th class="border-top-0" scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($cart_contents as $cart_items) { ?>
                                    <tr>
                                        <th scope="row"><img src="<?= site_url($cart_items['options']['product_image']) ?>" alt="product-img" title="product-img" class="avatar-md"></th>
                                        <td>
                                            <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark"><?php echo $cart_items['name'] ?></a></h5>
                                            <p class="text-muted mb-0">₦ <?= $this->cart->format_number($cart_items['price'])." X ".$cart_items['qty'] ?>  </p>
                                        </td>
                                        <td>₦ <?= $this->cart->format_number($cart_items['subtotal']) ?></td>
                                    </tr>

                                <?php }?>
                                  
                                
                                    <tr>
                                        <td colspan="3">
                                            <div class="bg-soft-primary p-3 rounded">
                                                <h5 class="font-size-14 text-primary mb-0"><i class="fas fa-shipping-fast me-2"></i> Shipping <span class="float-end">Free</span></h5>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h6 class="m-0 text-end">Total:</h6>
                                        </td>
                                        <td>
                                        ₦<?= $this->cart->format_number($this->cart->total()); ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

<?php // include 'inc/footer.php';
$this->load->view('administrator/inc/footer')
?>

</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php //include 'inc/right-bar.php'; 
$this->load->view('administrator/inc/right-bar')
?>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>