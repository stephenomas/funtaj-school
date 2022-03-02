<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Checkout | Funtaj - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- twitter-bootstrap-wizard css -->
    <link rel="stylesheet" href="assets/libs/twitter-bootstrap-wizard/prettify.css">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <?php include 'inc/topbar.php'; ?>

        <!-- ========== Left Sidebar Start ========== -->
        <?php include 'inc/sidebar.php'; ?>
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
                                                <a href="#billing-info" class="nav-link" data-toggle="tab">
                                                    <span class="step-number">01</span>
                                                    <span class="step-title">Billing Info</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#shipping-info" class="nav-link" data-toggle="tab">
                                                    <span class="step-number">02</span>
                                                    <span class="step-title">Shipping Info</span>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="#payment-info" class="nav-link" data-toggle="tab">
                                                    <span class="step-number">03</span>
                                                    <span class="step-title">Payment Info</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content twitter-bs-wizard-tab-content">
                                            <div class="tab-pane" id="billing-info">
                                                <h5 class="card-title">Billing information</h5>
                                                <p class="card-title-desc">If several languages coalesce, the grammar of the resulting</p>

                                                <form>
                                                    <div>

                                                        <div>

                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <div class="mb-4">
                                                                        <label class="form-label" for="billing-name">Name</label>
                                                                        <input type="text" class="form-control" id="billing-name" placeholder="Enter name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="mb-4">
                                                                        <label class="form-label" for="billing-email-address">Email Address</label>
                                                                        <input type="email" class="form-control" id="billing-email-address" placeholder="Enter email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="mb-4">
                                                                        <label class="form-label" for="billing-phone">Phone</label>
                                                                        <input type="text" class="form-control" id="billing-phone" placeholder="Enter Phone no.">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mb-4">
                                                                <label class="form-label" for="billing-address">Address</label>
                                                                <textarea class="form-control" id="billing-address" rows="3" placeholder="Enter full address"></textarea>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <div class="mb-4 mb-lg-0">
                                                                        <label class="form-label">Country</label>
                                                                        <select class="form-select" title="Country">
                                                                            <option value="0">Select Country</option>
                                                                            <option value="AF">Afghanistan</option>
                                                                            <option value="AL">Albania</option>
                                                                            <option value="DZ">Algeria</option>
                                                                            <option value="AS">American Samoa</option>
                                                                            <option value="AD">Andorra</option>
                                                                            <option value="AO">Angola</option>
                                                                            <option value="AI">Anguilla</option>
                                                                            <option value="AQ">Antarctica</option>
                                                                            <option value="AR">Argentina</option>
                                                                            <option value="AM">Armenia</option>
                                                                            <option value="AW">Aruba</option>
                                                                            <option value="AU">Australia</option>
                                                                            <option value="AT">Austria</option>
                                                                            <option value="AZ">Azerbaijan</option>
                                                                            <option value="BS">Bahamas</option>
                                                                            <option value="BH">Bahrain</option>
                                                                            <option value="BD">Bangladesh</option>
                                                                            <option value="BB">Barbados</option>
                                                                            <option value="BY">Belarus</option>
                                                                            <option value="BE">Belgium</option>
                                                                            <option value="BZ">Belize</option>
                                                                            <option value="BJ">Benin</option>
                                                                            <option value="BM">Bermuda</option>
                                                                            <option value="BT">Bhutan</option>
                                                                            <option value="BO">Bolivia</option>
                                                                            <option value="BW">Botswana</option>
                                                                            <option value="BV">Bouvet Island</option>
                                                                            <option value="BR">Brazil</option>
                                                                            <option value="BN">Brunei Darussalam</option>
                                                                            <option value="BG">Bulgaria</option>
                                                                            <option value="BF">Burkina Faso</option>
                                                                            <option value="BI">Burundi</option>
                                                                            <option value="KH">Cambodia</option>
                                                                            <option value="CM">Cameroon</option>
                                                                            <option value="CA">Canada</option>
                                                                            <option value="CV">Cape Verde</option>
                                                                            <option value="KY">Cayman Islands</option>
                                                                            <option value="CF">Central African Republic</option>
                                                                            <option value="TD">Chad</option>
                                                                            <option value="CL">Chile</option>
                                                                            <option value="CN">China</option>
                                                                            <option value="CX">Christmas Island</option>
                                                                            <option value="CC">Cocos (Keeling) Islands</option>
                                                                            <option value="CO">Colombia</option>
                                                                            <option value="KM">Comoros</option>
                                                                            <option value="CG">Congo</option>
                                                                            <option value="CK">Cook Islands</option>
                                                                            <option value="CR">Costa Rica</option>
                                                                            <option value="CI">Cote d'Ivoire</option>
                                                                            <option value="HR">Croatia (Hrvatska)</option>
                                                                            <option value="CU">Cuba</option>
                                                                            <option value="CY">Cyprus</option>
                                                                            <option value="CZ">Czech Republic</option>
                                                                            <option value="DK">Denmark</option>
                                                                            <option value="DJ">Djibouti</option>
                                                                            <option value="DM">Dominica</option>
                                                                            <option value="DO">Dominican Republic</option>
                                                                            <option value="EC">Ecuador</option>
                                                                            <option value="EG">Egypt</option>
                                                                            <option value="SV">El Salvador</option>
                                                                            <option value="GQ">Equatorial Guinea</option>
                                                                            <option value="ER">Eritrea</option>
                                                                            <option value="EE">Estonia</option>
                                                                            <option value="ET">Ethiopia</option>
                                                                            <option value="FK">Falkland Islands (Malvinas)</option>
                                                                            <option value="FO">Faroe Islands</option>
                                                                            <option value="FJ">Fiji</option>
                                                                            <option value="FI">Finland</option>
                                                                            <option value="FR">France</option>
                                                                            <option value="GF">French Guiana</option>
                                                                            <option value="PF">French Polynesia</option>
                                                                            <option value="GA">Gabon</option>
                                                                            <option value="GM">Gambia</option>
                                                                            <option value="GE">Georgia</option>
                                                                            <option value="DE">Germany</option>
                                                                            <option value="GH">Ghana</option>
                                                                            <option value="GI">Gibraltar</option>
                                                                            <option value="GR">Greece</option>
                                                                            <option value="GL">Greenland</option>
                                                                            <option value="GD">Grenada</option>
                                                                            <option value="GP">Guadeloupe</option>
                                                                            <option value="GU">Guam</option>
                                                                            <option value="GT">Guatemala</option>
                                                                            <option value="GN">Guinea</option>
                                                                            <option value="GW">Guinea-Bissau</option>
                                                                            <option value="GY">Guyana</option>
                                                                            <option value="HT">Haiti</option>
                                                                            <option value="HN">Honduras</option>
                                                                            <option value="HK">Hong Kong</option>
                                                                            <option value="HU">Hungary</option>
                                                                            <option value="IS">Iceland</option>
                                                                            <option value="IN">India</option>
                                                                            <option value="ID">Indonesia</option>
                                                                            <option value="IQ">Iraq</option>
                                                                            <option value="IE">Ireland</option>
                                                                            <option value="IL">Israel</option>
                                                                            <option value="IT">Italy</option>
                                                                            <option value="JM">Jamaica</option>
                                                                            <option value="JP">Japan</option>
                                                                            <option value="JO">Jordan</option>
                                                                            <option value="KZ">Kazakhstan</option>
                                                                            <option value="KE">Kenya</option>
                                                                            <option value="KI">Kiribati</option>
                                                                            <option value="KR">Korea, Republic of</option>
                                                                            <option value="KW">Kuwait</option>
                                                                            <option value="KG">Kyrgyzstan</option>
                                                                            <option value="LV">Latvia</option>
                                                                            <option value="LB">Lebanon</option>
                                                                            <option value="LS">Lesotho</option>
                                                                            <option value="LR">Liberia</option>
                                                                            <option value="LY">Libyan Arab Jamahiriya</option>
                                                                            <option value="LI">Liechtenstein</option>
                                                                            <option value="LT">Lithuania</option>
                                                                            <option value="LU">Luxembourg</option>
                                                                            <option value="MO">Macau</option>
                                                                            <option value="MG">Madagascar</option>
                                                                            <option value="MW">Malawi</option>
                                                                            <option value="MY">Malaysia</option>
                                                                            <option value="MV">Maldives</option>
                                                                            <option value="ML">Mali</option>
                                                                            <option value="MT">Malta</option>
                                                                            <option value="MH">Marshall Islands</option>
                                                                            <option value="MQ">Martinique</option>
                                                                            <option value="MR">Mauritania</option>
                                                                            <option value="MU">Mauritius</option>
                                                                            <option value="YT">Mayotte</option>
                                                                            <option value="MX">Mexico</option>
                                                                            <option value="MD">Moldova, Republic of</option>
                                                                            <option value="MC">Monaco</option>
                                                                            <option value="MN">Mongolia</option>
                                                                            <option value="MS">Montserrat</option>
                                                                            <option value="MA">Morocco</option>
                                                                            <option value="MZ">Mozambique</option>
                                                                            <option value="MM">Myanmar</option>
                                                                            <option value="NA">Namibia</option>
                                                                            <option value="NR">Nauru</option>
                                                                            <option value="NP">Nepal</option>
                                                                            <option value="NL">Netherlands</option>
                                                                            <option value="AN">Netherlands Antilles</option>
                                                                            <option value="NC">New Caledonia</option>
                                                                            <option value="NZ">New Zealand</option>
                                                                            <option value="NI">Nicaragua</option>
                                                                            <option value="NE">Niger</option>
                                                                            <option value="NG">Nigeria</option>
                                                                            <option value="NU">Niue</option>
                                                                            <option value="NF">Norfolk Island</option>
                                                                            <option value="MP">Northern Mariana Islands</option>
                                                                            <option value="NO">Norway</option>
                                                                            <option value="OM">Oman</option>
                                                                            <option value="PW">Palau</option>
                                                                            <option value="PA">Panama</option>
                                                                            <option value="PG">Papua New Guinea</option>
                                                                            <option value="PY">Paraguay</option>
                                                                            <option value="PE">Peru</option>
                                                                            <option value="PH">Philippines</option>
                                                                            <option value="PN">Pitcairn</option>
                                                                            <option value="PL">Poland</option>
                                                                            <option value="PT">Portugal</option>
                                                                            <option value="PR">Puerto Rico</option>
                                                                            <option value="QA">Qatar</option>
                                                                            <option value="RE">Reunion</option>
                                                                            <option value="RO">Romania</option>
                                                                            <option value="RU">Russian Federation</option>
                                                                            <option value="RW">Rwanda</option>
                                                                            <option value="KN">Saint Kitts and Nevis</option>
                                                                            <option value="LC">Saint LUCIA</option>
                                                                            <option value="WS">Samoa</option>
                                                                            <option value="SM">San Marino</option>
                                                                            <option value="ST">Sao Tome and Principe</option>
                                                                            <option value="SA">Saudi Arabia</option>
                                                                            <option value="SN">Senegal</option>
                                                                            <option value="SC">Seychelles</option>
                                                                            <option value="SL">Sierra Leone</option>
                                                                            <option value="SG">Singapore</option>
                                                                            <option value="SK">Slovakia (Slovak Republic)</option>
                                                                            <option value="SI">Slovenia</option>
                                                                            <option value="SB">Solomon Islands</option>
                                                                            <option value="SO">Somalia</option>
                                                                            <option value="ZA">South Africa</option>
                                                                            <option value="ES">Spain</option>
                                                                            <option value="LK">Sri Lanka</option>
                                                                            <option value="SH">St. Helena</option>
                                                                            <option value="PM">St. Pierre and Miquelon</option>
                                                                            <option value="SD">Sudan</option>
                                                                            <option value="SR">Suriname</option>
                                                                            <option value="SZ">Swaziland</option>
                                                                            <option value="SE">Sweden</option>
                                                                            <option value="CH">Switzerland</option>
                                                                            <option value="SY">Syrian Arab Republic</option>
                                                                            <option value="TW">Taiwan, Province of China</option>
                                                                            <option value="TJ">Tajikistan</option>
                                                                            <option value="TZ">Tanzania, United Republic of</option>
                                                                            <option value="TH">Thailand</option>
                                                                            <option value="TG">Togo</option>
                                                                            <option value="TK">Tokelau</option>
                                                                            <option value="TO">Tonga</option>
                                                                            <option value="TT">Trinidad and Tobago</option>
                                                                            <option value="TN">Tunisia</option>
                                                                            <option value="TR">Turkey</option>
                                                                            <option value="TM">Turkmenistan</option>
                                                                            <option value="TC">Turks and Caicos Islands</option>
                                                                            <option value="TV">Tuvalu</option>
                                                                            <option value="UG">Uganda</option>
                                                                            <option value="UA">Ukraine</option>
                                                                            <option value="AE">United Arab Emirates</option>
                                                                            <option value="GB">United Kingdom</option>
                                                                            <option value="US">United States</option>
                                                                            <option value="UY">Uruguay</option>
                                                                            <option value="UZ">Uzbekistan</option>
                                                                            <option value="VU">Vanuatu</option>
                                                                            <option value="VE">Venezuela</option>
                                                                            <option value="VN">Viet Nam</option>
                                                                            <option value="VG">Virgin Islands (British)</option>
                                                                            <option value="VI">Virgin Islands (U.S.)</option>
                                                                            <option value="WF">Wallis and Futuna Islands</option>
                                                                            <option value="EH">Western Sahara</option>
                                                                            <option value="YE">Yemen</option>
                                                                            <option value="ZM">Zambia</option>
                                                                            <option value="ZW">Zimbabwe</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4">
                                                                    <div class="mb-4 mb-lg-0">
                                                                        <label class="form-label" for="billing-city">City</label>
                                                                        <input type="text" class="form-control" id="billing-city" placeholder="Enter City">
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4">
                                                                    <div class="mb-0">
                                                                        <label class="form-label" for="zip-code">Zip / Postal code</label>
                                                                        <input type="text" class="form-control" id="zip-code" placeholder="Enter Postal code">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane" id="shipping-info">
                                                <h5 class="card-title">Shipping information</h5>
                                                <p class="card-title-desc">It will be as simple as occidental in fact</p>

                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="card border rounded active shipping-address">
                                                            <div class="card-body">
                                                                <a href="#" class="float-end ms-1">Edit</a>
                                                                <h5 class="font-size-14 mb-4">Address 1</h5>

                                                                <h5 class="font-size-14">Bradley McMillian</h5>
                                                                <p class="mb-1">109 Clarksburg Park Road Show Low, AZ 85901</p>
                                                                <p class="mb-0">Mo. 012-345-6789</p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="card border rounded shipping-address">
                                                            <div class="card-body">
                                                                <a href="#" class="float-end ms-1">Edit</a>
                                                                <h5 class="font-size-14 mb-4">Address 2</h5>

                                                                <h5 class="font-size-14">Bradley McMillian</h5>
                                                                <p class="mb-1">109 Clarksburg Park Road Show Low, AZ 85901</p>
                                                                <p class="mb-0">Mo. 012-345-6789</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

                                                        <div class="col-lg-4 col-sm-6">
                                                            <div>
                                                                <label class="form-label card-radio-label mb-3">
                                                                    <input type="radio" name="pay-method" id="pay-methodoption2" class="card-radio-input">

                                                                    <span class="card-radio">
                                                                        <i class="fab fa-cc-paypal font-size-24 align-middle me-2"></i>
                                                                        <span>Paypal</span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-sm-6">
                                                            <div>
                                                                <label class="form-label card-radio-label mb-3">
                                                                    <input type="radio" name="pay-method" id="pay-methodoption3" class="card-radio-input" checked>

                                                                    <span class="card-radio">
                                                                        <i class="far fa-money-bill-alt font-size-24 align-middle me-2"></i>
                                                                        <span>Cash on Delivery</span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <h5 class="my-3 font-size-14">For card Payment</h5>
                                                    <div class="p-4 border">
                                                        <form>
                                                            <div class="mb-3">
                                                                <label class="form-label" for="cardnameInput">Name on card</label>
                                                                <input type="text" class="form-control" id="cardnameInput" placeholder="Name on Card">
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-4 col-sm-6">
                                                                    <div class="mb-3 mb-lg-0">
                                                                        <label class="form-label" for="cardnumberInput">Card Number</label>
                                                                        <input type="text" class="form-control" id="cardnumberInput" placeholder="0000 0000 0000 0000">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-sm-6">
                                                                    <div class="mb-3 mb-lg-0">
                                                                        <label class="form-label" for="expirydateInput">Expiry date</label>
                                                                        <input type="text" class="form-control" id="expirydateInput" placeholder="MM/YY">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-sm-6">
                                                                    <div class="mb-3 mb-lg-0">
                                                                        <label class="form-label" for="cvvcodeInput">CVV Code</label>
                                                                        <input type="text" class="form-control" id="cvvcodeInput" placeholder="Enter CVV Code">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="mt-4 text-end">
                                                        <a href="#" class="btn btn-success">
                                                            Complete order
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <li class="previous"><a href="#">Previous</a></li>
                                            <li class="next"><a href="#">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card checkout-order-summary">
                                <div class="card-body">
                                    <div class="p-3 bg-light mb-4">
                                        <h5 class="font-size-14 mb-0">Order Summary <span class="float-end ms-2">#SK2356</span></h5>
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
                                                <tr>
                                                    <th scope="row"><img src="assets/images/product/img-1.png" alt="product-img" title="product-img" class="avatar-md"></th>
                                                    <td>
                                                        <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">Full sleeve T-shirt</a></h5>
                                                        <p class="text-muted mb-0">$ 240 x 2</p>
                                                    </td>
                                                    <td>$ 480</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><img src="assets/images/product/img-2.png" alt="product-img" title="product-img" class="avatar-md"></th>
                                                    <td>
                                                        <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">Half sleeve T-shirt</a></h5>
                                                        <p class="text-muted mb-0">$ 225 x 1</p>
                                                    </td>
                                                    <td>$ 225</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <h6 class="m-0 text-end">Sub Total:</h6>
                                                    </td>
                                                    <td>
                                                        $ 705
                                                    </td>
                                                </tr>
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
                                                        $ 705
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

            <?php include 'inc/footer.php'; ?>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <?php include 'inc/right-bar.php'; ?>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- twitter-bootstrap-wizard js -->
    <script src="assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>

    <script src="assets/libs/twitter-bootstrap-wizard/prettify.js"></script>
    <!-- ecommerce-checkout init -->
    <script src="assets/js/pages/ecommerce-checkout.init.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>