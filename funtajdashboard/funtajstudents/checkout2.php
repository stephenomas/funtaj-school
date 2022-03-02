<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Cart | Funtaj Schools - Students Dashboard </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="plugins/jquery-step/jquery.steps.css">
    <style>
        #formValidate .wizard>.content {
            min-height: 25em;
        }

        #example-vertical.wizard>.content {
            min-height: 24.5em;
        }
    </style>
    <!--  END CUSTOM STYLE FILE  -->
</head>

<body>
    <!-- Tab Mobile View Header -->
    <?php include 'inc/mobile-header.php'; ?>
    <!-- Tab Mobile View Header -->

    <!--  BEGIN NAVBAR  -->
    <?php include 'inc/desk-header.php'; ?>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <?php include 'inc/navbar.php'; ?>
        <!--  END TOPBAR  -->

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">

                <div class="row" id="cancel-row">

                    <div class="col-lg-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Checkout</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form id="formValidate" action="#">
                                    <div class="">
                                        <h3> Account </h3>
                                        <section>
                                            <div class="row">
                                                <div class="col-md-8 mx-auto">
                                                    <label for="buserName">User name *</label>
                                                    <input id="buserName" name="buserName" type="text" class="form-control required mb-4">
                                                    <label for="bpassword">Password *</label>
                                                    <input id="bpassword" name="bpassword" type="text" class="form-control required mb-4">
                                                    <label for="bconfirm">Confirm Password *</label>
                                                    <input id="bconfirm" name="bconfirm" type="text" class="form-control required mb-4">
                                                </div>
                                            </div>
                                        </section>
                                        <h3> Profile </h3>
                                        <section>
                                            <div class="row">
                                                <div class="col-md-8 mx-auto">
                                                    <label for="bname">First name *</label>
                                                    <input id="bname" name="bname" type="text" class="form-control required mb-4">
                                                    <label for="bsurname">Last name *</label>
                                                    <input id="bsurname" name="bsurname" type="text" class="form-control required mb-4">
                                                    <label for="bemail">Email *</label>
                                                    <input id="bemail" name="bemail" type="text" class="form-control required email mb-4">
                                                    <label for="baddress">Address</label>
                                                    <input id="baddress" name="baddress" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </section>
                                        <h3> Address </h3>
                                        <section>
                                            <div class="row">
                                                <div class="col-md-8 mx-auto">

                                                    <div class="custom-control rounded-chk custom-checkbox checkbox-primary mb-3">
                                                        <input type="checkbox" name="a" class="custom-control-input required" id="acceptTerms">
                                                        <label class="custom-control-label" for="acceptTerms">I agree with the Terms and Conditions.</label>
                                                    </div>
                                                    <div class="custom-control rounded-chk custom-checkbox checkbox-warning mb-3">
                                                        <input type="checkbox" name="a" class="custom-control-input required" id="privacyPolicy">
                                                        <label class="custom-control-label" for="privacyPolicy">Privacy Policy </label>
                                                    </div>
                                                    <div class="custom-control rounded-chk custom-checkbox checkbox-secondary">
                                                        <input type="checkbox" name="a" class="custom-control-input required" id="weeklyNP">
                                                        <label class="custom-control-label" for="weeklyNP">Send me a weekly newspaper</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </section>
                                        <h3> Finish </h3>
                                        <section>
                                            <h4 class="text-center"><i class="flaticon-fill-tick" style="color: #18d17f;"></i> <br>Please Click Finish Button to Submit.</h4>
                                        </section>
                                    </div>
                                </form>
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
    <?php include 'inc/footer.php'; ?>
    <!--  END FOOTER  -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/js/app.js"></script>

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="plugins/jquery-step/jquery.steps.min.js"></script>
    <script src="plugins/jquery-step/jquery.validate.min.js"></script>
    <script src="plugins/jquery-step/custom-jquery.steps.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>

</html>