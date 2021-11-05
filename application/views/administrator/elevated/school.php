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
                            <h4 class="mb-sm-0">Dashboard</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Funtaj</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">School Info Update</h4>
                                <?php $formIndex = 1 ?>
                                <form id="<?= $formIndex ?>" method="post" action="school/updateSchoolDetails"  name="schoolDetails">
                                <input type="hidden" id="id"  name="id" value="<?= $schoolDetailsId ?>">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">School Name</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" id="schoolName" value="<?= $schoolName ?>" type="text"
                                        onblur="updateSchoolDetails(this.form)"  onmouseleave="updateSchoolDetails(this.form)" name="name" required
                                        placeholder="School Name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-search-input" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" id="address" value="<?= $schoolAddress ?>" type="text"
                                         onblur="updateSchoolDetails(this.form)" onmouseleave="updateSchoolDetails(this.form)" name="address" placeholder="School Address"
                                        required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" id="email" value="<?= $schoolEmail ?>" type="text"
                                    onblur="updateSchoolDetails(this.form)" onmouseleave="updateSchoolDetails(this.form)" name="email" placeholder="School Email">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-tel-input" class="col-sm-2 col-form-label">Telephone</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" id="phone" value="<?= $schoolPhone ?>" type="text"
                                    onblur="updateSchoolDetails(this.form)" onmouseleave="updateSchoolDetails(this.form)" name="phone" placeholder="Phone" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Principal</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" id="principal" value="<?= $schoolPrincipal ?>" type="text"
                                      onblur="updateSchoolDetails(this.form)" onmouseleave="updateSchoolDetails(this.form)" name="principal" placeholder="School Principal"
                                    required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Vice Principal</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" id="vp" value="<?= $schoolVP ?>" type="text"
                                        onblur="updateSchoolDetails(this.form)" onmouseleave="updateSchoolDetails(this.form)" name="vp" placeholder="School Vice Principal"
                                        required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">App Slog</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" id="appslog" value="<?= $appSlog ?>" type="text"
                                    onblur="updateSchoolDetails(this.form)" onmouseleave="updateSchoolDetails(this.form)" name="appslog" placeholder="Custom App Slogan">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-url-input" class="col-sm-2 col-form-label">URL</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" id="website" value="<?= $schoolWebsite ?>" type="text"
                                    onblur="updateSchoolDetails(this.form)" onmouseleave="updateSchoolDetails(this.form)" name="website" placeholder="School Website"
                                    required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-url-input" class="col-sm-2 col-form-label">Email Extension</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" id="emailext" value="<?= $schoolEmailExt ?>" type="text"
                                     onblur="updateSchoolDetails(this.form)" onmouseleave="updateSchoolDetails(this.form)" name="emailext" placeholder="Email Extension"
                                    required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-password-input" class="col-sm-2 col-form-label">Default students' Password</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" id="defaultpw" value="<?= $defaultPassword ?>" type="text"
                                    onblur="updateSchoolDetails(this.form)" onmouseleave="updateSchoolDetails(this.form)" name="defaultpw" placeholder="Default Students' Password"
                                    required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Campus</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" id="campus" value="<?= $campus ?>" type="text"
                                    onblur="updateSchoolDetails(this.form)" onmouseleave="updateSchoolDetails(this.form)" name="campus" placeholder="Campus Display Name"
                                    required>
                                    </div>
                                </div>
                                <div>
                                <input class="form-control btn btn-outline-success" type="submit" 
                                value="Update">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- end col -->

                    <script>
                          
                              
                            function my_code(){
                                   //     alert('works');
                                let form = document.forms["schoolDetails"];

                                let id = form.elements['id'].value;

                                let name = form.elements['schoolName'].value;

                                let address = form.elements['address'].value;
                                let email = form.elements['email'].value;
                                let phone = form.elements['phone'].value;
                                let principal = form.elements['principal'].value;
                                let vp = form.elements['vp'].value;
                                let appslog = form.elements['appslog'].value;
                                let website = form.elements['website'].value;
                                let emailext = form.elements['emailext'].value;
                                let defaultpw = form.elements['defaultpw'].value;
                                let campus = form.elements['campus'].value;

                                let dataString = 'id=' + id + '&name=' + name + '&address=' + address + '&email=' + email + '&phone=' + phone + '&principal=' + principal + '&vp=' + vp + '&appslog=' + appslog + '&website=' + website + '&emailext=' + emailext + '&defaultpw=' + defaultpw + '&campus=' + campus;

                                $.ajax({
                                    type: "POST",
                                    url: base_url + "school/updateSchoolDetails",
                                    data: dataString,
                                    cache: false,
                                    success: function (html) {
                                    
                                        let data = JSON.parse(html);
                                        form.elements['schoolName'].value = data.schoolName;
                                        form.elements['address'].value = data.address;
                                        form.elements['email'].value = data.email;
                                        form.elements['phone'].value = data.phone;
                                        form.elements['principal'].value = data.principal;
                                        form.elements['vp'].value = data.vp;
                                        form.elements['appslog'].value = data.appslog;
                                        form.elements['website'].value = data.website;
                                        form.elements['emailext'].value = data.emailext;
                                        form.elements['defaultpw'].value = data.default_password;
                                        form.elements['campus'].value = data.campus;

                                        console.log(data.campus)
                                    
                                    }
                                });
                                return false;
                            }
                      
                             
                           // alert('woring');
                           
                       
                          
                        
                        function updateSchoolDetails() {
                        //    alert('working');
                        
                    }

                    </script>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Logo</h4>
                                <div>
                                    <div class="mb-4">
                                    <img src="<?= ($schoolLogo == '') ? base_url('assets/img/applogo.png') : base_url($schoolLogo) ?>"
                                    class="img-thumbnail" width="100em"
                                    height="100em" alt="school logo"><br>
                                    </div>
                                    <?php echo form_open_multipart('school/setSchoolLogo'); ?>
                                    <input type="hidden" name="id" value="<?= $schoolDetailsId ?>">
                                        <div class="mb-4">
                                        <input type="file" class="form-control" name="userfile">
                                        </div>
                                        <div>
                                        <input class="form-control btn btn-outline-success" type="submit" name="logo"
                                         value="Upload Logo">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->


                <!-- end row -->
            </div>

        </div>
        <!-- End Page-content -->

        <?php //include 'inc/footer.php';
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