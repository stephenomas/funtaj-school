<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Helpdesk | Funtaj Schools - Students Dashboard </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="assets/css/pages/helpdesk.css" rel="stylesheet" type="text/css" />
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
                <div class="page-header">
                    <div class="page-title">
                        <h3>Helpdesk</h3>
                    </div>
                </div>

                <div class="helpdesk layout-spacing">

                    <div class="hd-header-wrapper mb-5">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h4 class="mb-5">How May I Help You?</h4>

                                <div class="row">
                                    <div class="col-xl-5 col-lg-7 col-md-7 col-sm-11 col-11 mx-auto">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="flaticon-search"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Let's find your question in fast way" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hd-tab-section">
                        <div class="row">
                            <div class="col-md-12 mb-5 mt-5">
                                <ul class="nav nav-pills mb-5 justify-content-between" id="pills-tab" role="tablist">
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-12 nav-item text-center mb-5">
                                        <a class="nav-link active" id="pills-statistics-tab" data-toggle="pill" href="#pills-statistics" role="tab" aria-controls="pills-statistics" aria-selected="true">
                                            <i class="flaticon-pie-line-chart"></i>
                                            <h6 class="mt-3 mb-3">Statistics</h6>
                                            <p>Lorem ipsum dolor dolore magna aliqua.</p>
                                        </a>
                                    </li>

                                    <li class="col-xl-4 col-lg-4 col-md-6 col-12 nav-item text-center mb-5">
                                        <a class="nav-link" id="pills-performance-tab" data-toggle="pill" href="#pills-performance" role="tab" aria-controls="pills-performance" aria-selected="false">
                                            <i class="flaticon-lightning-1"></i>
                                            <h6 class="mt-3 mb-3">Performance</h6>
                                            <p>Lorem ipsum dolor dolore magna aliqua.</p>
                                        </a>
                                    </li>

                                    <li class="col-xl-4 col-lg-4 col-md-6 col-12 nav-item text-center mb-5">
                                        <a class="nav-link" id="pills-reports-tab" data-toggle="pill" href="#pills-reports" role="tab" aria-controls="pills-reports" aria-selected="false">
                                            <i class="flaticon-note-1"></i>
                                            <h6 class="mt-3 mb-3">Reports</h6>
                                            <p>Lorem ipsum dolor dolore magna aliqua.</p>
                                        </a>
                                    </li>

                                    <li class="col-xl-4 col-lg-4 col-md-6 col-12 nav-item text-center mb-md-0 mb-5">
                                        <a class="nav-link" id="pills-backup-tab" data-toggle="pill" href="#pills-backup" role="tab" aria-controls="pills-backup" aria-selected="false">
                                            <i class="flaticon-cloud"></i>
                                            <h6 class="mt-3 mb-3">Backup</h6>
                                            <p>Lorem ipsum dolor dolore magna aliqua.</p>
                                        </a>
                                    </li>

                                    <li class="col-xl-4 col-lg-4 col-md-6 col-12 nav-item text-center mb-md-0 mb-5">
                                        <a class="nav-link" id="pills-service-tab" data-toggle="pill" href="#pills-service" role="tab" aria-controls="pills-service" aria-selected="false">
                                            <i class="flaticon-3d-cube"></i>
                                            <h6 class="mt-3 mb-3">Service</h6>
                                            <p>Lorem ipsum dolor dolore magna aliqua.</p>
                                        </a>
                                    </li>

                                    <li class="col-xl-4 col-lg-4 col-md-6 col-12 nav-item text-center">
                                        <a class="nav-link" id="pills-updates-tab" data-toggle="pill" href="#pills-updates" role="tab" aria-controls="pills-updates" aria-selected="false">
                                            <i class="flaticon-clock-2"></i>
                                            <h6 class="mt-3 mb-3">Updates</h6>
                                            <p>Lorem ipsum dolor dolore magna aliqua.</p>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content mb-5" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-statistics" role="tabpanel" aria-labelledby="pills-statistics-tab">
                                        <div class="accordion" id="hd-statistics">
                                            <div class="card">
                                                <div class="card-header" id="hd-statistics-1">
                                                    <div class="mb-0">
                                                        <div class="" data-toggle="collapse" data-target="#collapse-hd-statistics-1" aria-expanded="true" aria-controls="collapse-hd-statistics-1">
                                                            Statistics #1
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="collapse-hd-statistics-1" class="collapse show" aria-labelledby="hd-statistics-1" data-parent="#hd-statistics">
                                                    <div class="card-body">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="hd-statistics-2">
                                                    <div class="mb-0">
                                                        <div class=" collapsed" data-toggle="collapse" data-target="#collapse-hd-statistics-2" aria-expanded="false" aria-controls="collapse-hd-statistics-2">
                                                            Statistics #2
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="collapse-hd-statistics-2" class="collapse" aria-labelledby="hd-statistics-2" data-parent="#hd-statistics">
                                                    <div class="card-body">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="hd-statistics-3">
                                                    <div class="mb-0">
                                                        <div class=" collapsed" data-toggle="collapse" data-target="#collapse-hd-statistics-3" aria-expanded="false" aria-controls="collapse-hd-statistics-3">
                                                            Statistics #3
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="collapse-hd-statistics-3" class="collapse" aria-labelledby="hd-statistics-3" data-parent="#hd-statistics">
                                                    <div class="card-body">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade" id="pills-performance" role="tabpanel" aria-labelledby="pills-performance-tab">
                                        <div class="accordion" id="hd-performance">
                                            <div class="card">
                                                <div class="card-header" id="hd-performance-1">
                                                    <div class="mb-0">
                                                        <div class="" data-toggle="collapse" data-target="#collapse-hd-performance-1" aria-expanded="true" aria-controls="collapse-hd-performance-1">
                                                            Performance #1
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="collapse-hd-performance-1" class="collapse show" aria-labelledby="hd-performance-1" data-parent="#hd-performance">
                                                    <div class="card-body">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header" id="hd-performance-2">
                                                    <div class="mb-0">
                                                        <div class=" collapsed" data-toggle="collapse" data-target="#collapse-hd-performance-2" aria-expanded="false" aria-controls="collapse-hd-performance-2">
                                                            Performance #2
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="collapse-hd-performance-2" class="collapse" aria-labelledby="hd-performance-2" data-parent="#hd-performance">
                                                    <div class="card-body">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header" id="hd-performance-3">
                                                    <div class="mb-0">
                                                        <div class=" collapsed" data-toggle="collapse" data-target="#collapse-hd-performance-3" aria-expanded="false" aria-controls="collapse-hd-performance-3">
                                                            Performance #3
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="collapse-hd-performance-3" class="collapse" aria-labelledby="hd-performance-3" data-parent="#hd-performance">
                                                    <div class="card-body">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade" id="pills-reports" role="tabpanel" aria-labelledby="pills-reports-tab">
                                        <div class="accordion" id="hd-reports">
                                            <div class="card">
                                                <div class="card-header" id="hd-reports-1">
                                                    <div class="mb-0">
                                                        <div class="" data-toggle="collapse" data-target="#collapse-hd-reports-1" aria-expanded="true" aria-controls="collapse-hd-reports-1">
                                                            Reports #1
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="collapse-hd-reports-1" class="collapse show" aria-labelledby="hd-reports-1" data-parent="#hd-reports">
                                                    <div class="card-body">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="hd-reports-2">
                                                    <div class="mb-0">
                                                        <div class=" collapsed" data-toggle="collapse" data-target="#collapse-hd-reports-2" aria-expanded="false" aria-controls="collapse-hd-reports-2">
                                                            Reports #2
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="collapse-hd-reports-2" class="collapse" aria-labelledby="hd-reports-2" data-parent="#hd-reports">
                                                    <div class="card-body">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="hd-reports-3">
                                                    <div class="mb-0">
                                                        <div class=" collapsed" data-toggle="collapse" data-target="#collapse-hd-reports-3" aria-expanded="false" aria-controls="collapse-hd-reports-3">
                                                            Reports #3
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="collapse-hd-reports-3" class="collapse" aria-labelledby="hd-reports-3" data-parent="#hd-reports">
                                                    <div class="card-body">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade" id="pills-backup" role="tabpanel" aria-labelledby="pills-backup-tab">

                                        <div class="accordion" id="hd-backup">
                                            <div class="card">
                                                <div class="card-header" id="hd-backup-1">
                                                    <div class="mb-0">
                                                        <div class="" data-toggle="collapse" data-target="#collapse-hd-backup-1" aria-expanded="true" aria-controls="collapse-hd-backup-1">
                                                            Backup #1
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="collapse-hd-backup-1" class="collapse show" aria-labelledby="hd-backup-1" data-parent="#hd-backup">
                                                    <div class="card-body">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="hd-backup-2">
                                                    <div class="mb-0">
                                                        <div class=" collapsed" data-toggle="collapse" data-target="#collapse-hd-backup-2" aria-expanded="false" aria-controls="collapse-hd-backup-2">
                                                            Backup #2
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="collapse-hd-backup-2" class="collapse" aria-labelledby="hd-backup-2" data-parent="#hd-backup">
                                                    <div class="card-body">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="hd-backup-3">
                                                    <div class="mb-0">
                                                        <div class=" collapsed" data-toggle="collapse" data-target="#collapse-hd-backup-3" aria-expanded="false" aria-controls="collapse-hd-backup-3">
                                                            Backup #3
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="collapse-hd-backup-3" class="collapse" aria-labelledby="hd-backup-3" data-parent="#hd-backup">
                                                    <div class="card-body">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade" id="pills-service" role="tabpanel" aria-labelledby="pills-service-tab">

                                        <div class="accordion" id="hd-service">
                                            <div class="card">
                                                <div class="card-header" id="hd-service-1">
                                                    <div class="mb-0">
                                                        <div class="" data-toggle="collapse" data-target="#collapse-hd-service-1" aria-expanded="true" aria-controls="collapse-hd-service-1">
                                                            Service #1
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="collapse-hd-service-1" class="collapse show" aria-labelledby="hd-service-1" data-parent="#hd-service">
                                                    <div class="card-body">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="hd-service-2">
                                                    <div class="mb-0">
                                                        <div class=" collapsed" data-toggle="collapse" data-target="#collapse-hd-service-2" aria-expanded="false" aria-controls="collapse-hd-service-2">
                                                            Service #2
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="collapse-hd-service-2" class="collapse" aria-labelledby="hd-service-2" data-parent="#hd-service">
                                                    <div class="card-body">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="hd-service-3">
                                                    <div class="mb-0">
                                                        <div class=" collapsed" data-toggle="collapse" data-target="#collapse-hd-service-3" aria-expanded="false" aria-controls="collapse-hd-service-3">
                                                            Service #3
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="collapse-hd-service-3" class="collapse" aria-labelledby="hd-service-3" data-parent="#hd-service">
                                                    <div class="card-body">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="tab-pane fade" id="pills-updates" role="tabpanel" aria-labelledby="pills-updates-tab">

                                        <div class="accordion" id="hd-updates">
                                            <div class="card">
                                                <div class="card-header" id="hd-updates-1">
                                                    <div class="mb-0">
                                                        <div class="" data-toggle="collapse" data-target="#collapse-hd-updates-1" aria-expanded="true" aria-controls="collapse-hd-updates-1">
                                                            Updates #1
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="collapse-hd-updates-1" class="collapse show" aria-labelledby="hd-updates-1" data-parent="#hd-updates">
                                                    <div class="card-body">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="hd-updates-2">
                                                    <div class="mb-0">
                                                        <div class=" collapsed" data-toggle="collapse" data-target="#collapse-hd-updates-2" aria-expanded="false" aria-controls="collapse-hd-updates-2">
                                                            Updates #2
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="collapse-hd-updates-2" class="collapse" aria-labelledby="hd-updates-2" data-parent="#hd-updates">
                                                    <div class="card-body">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="hd-updates-3">
                                                    <div class="mb-0">
                                                        <div class=" collapsed" data-toggle="collapse" data-target="#collapse-hd-updates-3" aria-expanded="false" aria-controls="collapse-hd-updates-3">
                                                            Updates #3
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="collapse-hd-updates-3" class="collapse" aria-labelledby="hd-updates-3" data-parent="#hd-updates">
                                                    <div class="card-body">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="hd-contact-section">
                        <div class="row">
                            <div class="col-xl-12 text-center mb-4">
                                <div class="hd-contact-header my-4">
                                    <h5>Submit Query</h5>
                                </div>
                            </div>

                            <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 col-12 mx-auto">
                                <form class="mt-4 mb-4">
                                    <div class="row mb-4">
                                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                            <input type="text" class="form-control" placeholder="First name">
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <input type="text" class="form-control" placeholder="Last name">
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-sm-12 col-12">
                                            <input type="text" class="form-control" placeholder="Subject">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col text-sm-left text-center">
                                            <button class="btn btn-primary btn-rounded mt-4">Submit</button>
                                        </div>
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