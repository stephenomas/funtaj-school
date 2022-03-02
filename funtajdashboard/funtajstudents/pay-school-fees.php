<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Payment | Funtaj Schools - Students Dashboard </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="assets/css/ui-kit/tabs-accordian/custom-tabs.css" rel="stylesheet" type="text/css" />
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
                                                            <h3>2021/22 SCHOOL FEES</h3>
                                                            <h6 class="text-primary">YOU HAVE PAID ₦0 OUT OF ₦120,000 (YOU MUST PAY ATLEAST 50%)</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content widget-content-area">
                                                    <form class="form-row">
                                                        <div class="form-group col-md-6 mb-4">
                                                            <label for="exampleFormControlInput1">How much are you paying</label>
                                                            <input type="number" class="form-control-rounded form-control" id="exampleFormControlInput1" placeholder="e.g 120,000">
                                                        </div>
                                                        <div class="form-group col-md-6 mb-4">
                                                            <label for="exampleFormControlSelect1">Total Fees</label>
                                                            <input type="number" class="form-control-rounded form-control" id="exampleFormControlInput1" value="120000" readonly>
                                                        </div>
                                                        <input type="submit" name="time" value="pay now" class="mt-4 mb-4 btn btn-button-7 btn-rounded">
                                                    </form>
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
                                                                <h3>2021/22 SCHOOL FEES </h3>
                                                                <h6 class="text-primary">YOU HAVE PAID ₦0 OUT OF ₦120,000 (YOU MUST PAY ATLEAST 50%)</h6>
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
                                                                <input type="number" class="form-control-rounded form-control" id="exampleFormControlInput1" value="120000" readonly>
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

    <!--  BEGIN FOOTER  -->
    <footer class="footer-section theme-footer">

        <div class="footer-section-1  sidebar-theme">

        </div>

        <div class="footer-section-2 container-fluid">
            <div class="row">
                <div id="toggle-grid" class="col-xl-7 col-md-6 col-sm-6 col-12 text-sm-left text-center">
                    <ul class="list-inline links ml-sm-5">
                        <li class="list-inline-item mr-3">
                            <a href="javascript:void(0);">Home</a>
                        </li>
                        <li class="list-inline-item mr-3">
                            <a href="javascript:void(0);">Blog</a>
                        </li>
                        <li class="list-inline-item mr-3">
                            <a href="javascript:void(0);">About</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript:void(0);">Buy</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-5 col-md-6 col-sm-6 col-12">
                    <ul class="list-inline mb-0 d-flex justify-content-sm-end justify-content-center mr-sm-3 ml-sm-0 mx-3">
                        <li class="list-inline-item  mr-3">
                            <p class="bottom-footer">&#xA9; 2019 <a target="_blank" href="https://designreset.com/equation">Funtaj Schools</a></p>
                        </li>
                        <li class="list-inline-item align-self-center">
                            <div class="scrollTop"><i class="flaticon-up-arrow-fill-1"></i></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--  END FOOTER  -->

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
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
    <!-- END GLOBAL MANDATORY STYLES -->
</body>

</html>