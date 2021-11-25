<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Login | Funtaj - Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?=base_url()?>assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="<?=base_url()?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?=base_url()?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?=base_url()?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">
        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-4">
                        <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                            <div class="w-100">
                                <div class="row justify-content-center">
                                    <div class="col-lg-9">
                                        <div>
                                            <div class="text-center">
                                                <div>
                                                    <a href="./" class="">
                                                        <img src="<?=base_url()?>/assets/images/logo-dark.png" alt="" height="20" class="auth-logo logo-dark mx-auto">
                                                        <img src="<?=base_url()?>/assets/images/logo-light.png" alt="" height="20" class="auth-logo logo-light mx-auto">
                                                    </a>
                                                </div>
    
                                                <h4 class="font-size-18 mt-4">Welcome Back !</h4>
                                                <p class="text-muted">Sign in to continue to Funtaj.</p>
                                            </div>
                                            <div class="text-center mb-4">
                                                <?php if ($this->session->flashdata('success')) { ?>
                                                    <div id="headerSuccess" class="alert alert-success">  <?= $this->session->flashdata('success') ?> </div>
                                                <?php } ?>
                                                <?php if ($this->session->flashdata('warning')) { ?>
                                                    <div id="headerWarning" class="alert alert-warning"> <?= $this->session->flashdata('warning') ?> </div>
                                                <?php } ?>
                                                <?php if ($this->session->flashdata('error')) { ?>
                                                    <div id="headerError" class="alert alert-error"> <?= $this->session->flashdata('error') ?> </div>
                                                <?php } ?>
                                                <?php if ($this->session->flashdata('info')) { ?>
                                                    <div id="headerInfo" class="alert alert-info"> <?= $this->session->flashdata('info') ?> </div>
                                                <?php } ?>
                                                    <div id="alertJavascript"> </div>
                                            </div>
                                            <div class="p-2 mt-5">
                                            <?php echo validation_errors(); ?>
                                            <?php echo form_open('authme/process')?>
                    
                                                    <div class="mb-3 auth-form-group-custom mb-4">
                                                        <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                        <label for="username">Username</label>
                                                        <input type="text" class="form-control" name="email" id="username" placeholder="Enter username">
                                                    </div>
                            
                                                    <div class="mb-3 auth-form-group-custom mb-4">
                                                        <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                        <label for="userpassword">Password</label>
                                                        <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password">
                                                    </div>
                            
                                                   

                                                    <div class="mt-4 text-center">
                                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                                    </div>

                                                    
                                                </form>
                                            </div>

                                            <div class="mt-5 text-center">
                                                <p>© <script>document.write(new Date().getFullYear())</script> Funtaj. by Envy365 Agency</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="authentication-bg">
                            <div class="bg-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        <!-- JAVASCRIPT -->
        <script src="funtajadmin/assets/libs/jquery/jquery.min.js"></script>
        <script src="funtajadmin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="funtajadmin/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="funtajadmin/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="funtajadmin/assets/libs/node-waves/waves.min.js"></script>

        <script src="funtajadmin/assets/js/app.js"></script>

    </body>
</html>
