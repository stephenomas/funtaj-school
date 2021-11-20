
<body>
    <!-- Tab Mobile View Header -->
    <?php //include 'inc/mobile-header.php';
    $this->load->view('student/inc/mobile-header')
    ?>
    <!-- Tab Mobile View Header -->

    <!--  BEGIN NAVBAR  -->
    <?php // include 'inc/desk-header.php'; 
    
    $this->load->view('student/inc/desk-header')
    ?>
    <!--  END NAVBAR  -->

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
                        <h3>Payment of Fees</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header border-bottom border-default">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>You either pay online or through the bank deposit</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area underline-content">

                                <ul class="nav nav-tabs  mb-3 text-center" id="lineTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="underline-home-tab" data-toggle="tab" href="#underline-home" role="tab" aria-controls="underline-home" aria-selected="true"><i class="flaticon-home-fill-1"></i> Pay Online</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="underline-profile-tab" data-toggle="tab" href="#underline-profile" role="tab" aria-controls="underline-profile" aria-selected="false"><i class="flaticon-user-7"></i> Bank Deposit</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="lineTabContent-3">
                                    <div class="tab-pane fade show active" id="underline-home" role="tabpanel" aria-labelledby="underline-home-tab">
                                        <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                            <div class="statbox widget box box-shadow">
                                                <div class="widget-header">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                            <h3><?= $currentSession ?> SCHOOL FEES</h3>
                                                            <h6 class="text-primary">YOU HAVE PAID ₦<?php if($paid != null){number_format($paid->amount_paid);}else{ echo 0;} ?> OUT OF ₦<?= number_format($fee->first_term + $fee->second_term + $fee->third_term) ?> (YOU MUST PAY ATLEAST <?= $fee->minimum ?>%)</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content widget-content-area">
                                                    <form  id="paymentForm">
                                                        <div class="form-group col-md-6 mb-4">
                                                            <label for="exampleFormControlInput1">How much are you paying</label>
                                                            <input type="number"  name="amount" class="form-control-rounded form-control pay_id amount" id="email" placeholder="e.g 120,000">
                                                        </div>
                                                        <div class="form-group col-md-6 mb-4">
                                                            <label for="exampleFormControlSelect1">Email</label>
                                                            <input type="text" class="form-control-rounded form-control email" id="exampleFormControlInput1" value="<?= $this->session->userdata('email')  ?>" readonly>
                                                        </div>
                                                        <div class="form-group col-md-6 mb-4">
                                                            <label for="exampleFormControlSelect1">Total Fees</label>
                                                            <input type="text" class="form-control-rounded form-control" id="exampleFormControlInput1" value="₦<?= number_format($fee->first_term + $fee->second_term + $fee->third_term) ?>" readonly>
                                                        </div>
                                                        <button  onclick="payWithPaystack()"   class="mt-4 mb-4 btn btn-button-7 btn-rounded">Pay Now</button>
                                                    </form>
                                                    <script src="https://js.paystack.co/v1/inline.js"></script> 
                                                    <script>


                                                        // function runit(){
                                                            var paymentForm = document.getElementById('paymentForm');
                                                            var email = document.getElementById('email').value;
                                                            paymentForm.addEventListener('submit', payWithPaystack);

                                                        function payWithPaystack(e) {
                                                            e.preventDefault();

                                                            alert(email);
                                                            
                                                            var handler = PaystackPop.setup({

                                                                    key: 'pk_test_b3e254392ba5d8f8382e46733a0d438990b10969', // Replace with your public key
                                                                    email: document.getElementByClassName('email').value,
                                                                    amount: document.getElementByClassName('amount').value * 100, 
                                                                    // the amount value is multiplied by 100 to convert to the lowest currency unit
                                                                    currency: 'NGN',
                                                                    metadata: {
                                                                        custom_fields: [
                                                                            {
                                                                                payer_id: <?= $this->session->userdata('id') ?>,
                                                                            
                                                                            }
                                                                        ]
                                                                    }, // Use GHS for Ghana Cedis or USD for US Dollars
                                                                    ref: 'TX'+Math.floor((Math.random() * 1000000000) + 1), // Replace with a reference you generated
                                                                    callback: function(response) {
                                                                        // Make an AJAX call to your server with the reference to verify the transaction
                                                                        var reference = response.reference;

                                                                        $.ajax({
                                                                            url: "pay/confirm",
                                                                            method: "POST",
                                                                            type: "json",
                                                                            data: {
                                                                                reference
                                                                            },
                                                                            success: function (response) {
                                                                                console.log(JSON.parse(response))
                                                                            },
                                                                            error: function (error){
                                                                                console.log(error)
                                                                            }
                                                                        });

                                                                    },
                                                                    onClose: function() {
                                                                        alert('Transaction was not completed, window closed.');
                                                                    },
                                                                });

                                                                handler.openIframe();

                                                            
                                                        }
                                                        // }
                                                        // var amount = <?php // if($paid != null){ echo $paid->amount_paid;}else{echo 0;} ?>

                                                        // if($amount == 0){
                                                        //     var min =  //$fee->minimum;
                                                        //     var total =  //$fee->first_term + $fee->second_term + $fee->third_term ;
                                                        //     var pay = document.getElementByClassName('pay_id').value;
                                                        //     var check = min / 100 * total;
                                                        //     if(pay < check){
                                                        //         alert("You must pay a minimum of " + check)
                                                        //     }else{
                                                        //         runit();
                                                        //     }
                                                        // }else{
                                                        //     runit();
                                                        // }
                                                        

                                                        
                                                    </script>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="underline-profile" role="tabpanel" aria-labelledby="underline-profile-tab">
                                        <div class="media mt-4 mb-3">
                                            <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                                <div class="statbox widget box box-shadow">
                                                    <div class="widget-header">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                            <h3><?= $currentSession ?> SCHOOL FEES</h3>
                                                            <h6 class="text-primary">YOU HAVE PAID ₦<?php if($paid != null){number_format($paid->amount_paid);}else{ echo 0;} ?> OUT OF ₦<?= number_format($fee->first_term + $fee->second_term + $fee->third_term) ?> (YOU MUST PAY ATLEAST <?= $fee->minimum ?>%)</h6>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-content widget-content-area">
                                                        <form class="form-row">
                                                            <div class="form-group col-md-6 mb-4">
                                                                <label for="exampleFormControlInput1">How much DID you paying</label>
                                                                <input type="number" class="form-control-rounded form-control" id="exampleFormControlInput1" placeholder="e.g 120,000">
                                                            </div>
                                                            <div class="form-group col-md-6 mb-4">
                                                                <label for="exampleFormControlSelect1">Total Fees</label>
                                                                <input type="text" class="form-control-rounded form-control" id="exampleFormControlInput1" value="₦<?= number_format($fee->first_term + $fee->second_term + $fee->third_term) ?>" readonly>
                                                            </div>
                                                            <div class="form-group mb-4 mt-3">
                                                                <label for="exampleFormControlFile1">UPLOAD BANK SLIP (NOTE: THIS WILL BE VERIFIED BY THE SCHOOL)</label>
                                                                <input type="file" class="form-control-file form-control-file-rounded" id="exampleFormControlFile1">
                                                            </div>
                                                            <input type="submit" name="time" class="mt-4 mb-4 btn btn-button-7 btn-rounded">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
        <?php //include 'student/inc/footer.php'; 
 $this->load->view('student/inc/main-footer')
    ?>