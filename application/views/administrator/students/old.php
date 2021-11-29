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
                        <h4 class="mb-sm-0">Students</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Funtaj</a></li>
                                <li class="breadcrumb-item active">Students</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-lg-3">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addInfo" class="btn card bg-primary text-white-50">
                        <div class="card-body">
                            <h5 class="text-white"><i class="mdi mdi-account-plus-outline me-3"></i> Add Students </h5>
                        </div>
                    </a>
                </div>

               
               
                <script>
                    //Buttons for navigating students
                    function grads() {
                        var base_url = "<?=base_url();?>";
                        window.location.href = base_url + 'students';
                    }
                    function das() {
                        var base_url = "<?=base_url();?>";
                        window.location.href = base_url + 'students/das';
                    }
                </script>
                <!-- <div class="col-lg-4">
                    <a href="#" class="card bg-light text-white-50">
                        <div class="card-body">
                            <h5 class="text-dark"><i class="mdi mdi-school-outline me-3"></i> All</h5>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="#" class="card bg-light text-white-50">
                        <div class="card-body">
                            <h5 class="text-dark"><i class="mdi mdi-school-outline me-3"></i> Asokoro</h5>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="#" class="card bg-light text-white-50">
                        <div class="card-body">
                            <h5 class="text-dark"><i class="mdi mdi-school-outline me-3"></i> Gudu</h5>
                        </div>
                    </a>
                </div> -->
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if($this->session->flashdata('success')){ ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('success') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            
                            <?php } ?>

                            <?php if($this->session->flashdata('picerr')){ ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('picerr') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            
                            <?php } ?>


                            <?php if($this->session->flashdata('picsuc')){ ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('picsuc') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            
                            <?php } ?>

                            <?php if($this->session->flashdata('success1')){ ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('success1') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            
                            <?php } ?>
                            <?php if($this->session->flashdata('error')){ ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('error') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php } ?>
                            <ul class="nav nav-tabs nav-tabs-custom mb-4">
                                <li class="nav-item">
                                    <a class="nav-link fw-bold p-3 active" href="#">Old Students</a>
                                </li>
                          
                            </ul>
                            <h4 class="card-title">Old Students</h4>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Reg No.</th>
                                        <th>Class</th>
                             
                                        <th>Options</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php if(empty($this->uri->segment(3))){
                                        $count = 0;
                                    }else{
                                        $count = (int)$this->uri->segment(3);
                                    } foreach ($students_pagination->result() as $student) : $count++ ?>
                                    <tr>
                                    <td data-label="#"><?=$count?></td>
                                    <td data-label="First Name"><?=$student->fname?></td>
                                    <td data-label="Middle Name"><?=$student->mname?></td>
                                    <td data-label="Last Name"><?=$student->lname?><?=(empty($student->email))? ' <span class="text-danger">No email!</span>' : ' '?></td>
                                    <td data-label="Email"><?=$student->email?></td>
                                    <td data-label="Reg No."><?=$student->admno?></td>
                                    <td data-label="Class"><?=$student->class_prefix.' '.$student->curr_year.$student->branch?></td>
                                
                                    <td><a href="" data-bs-toggle="modal" data-bs-target="#viewDetails<?=$student->id?>">View</a> | <a href="">Delete</a> | <a href="#" data-bs-toggle="modal" data-bs-target="#editInfo<?=$student->id?>">Edit</a> | <a href="">deactivate</a></td>
                                 </tr>
                                 <div class="col-sm-6 col-md-4 col-xl-3">
                                <!-- To edit student details -->
                                <?php 
                                  // $this->load->view('inc/edit-student')
                                //include 'inc/edit-student.php'; ?>
                                    <div class="modal fade" id="editInfo<?=$student->id?>" tabindex="-1" role="dialog" aria-labelledby="editInfoTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editInfoTitle">Edit Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                <div class="row mb-3">
                                                    <label for="" class="col-sm-3 col-form-label">Profile Picture</label>

                                                    <div class="col-sm-9">
                                                        <img src="<?=base_url($student->stu_img)?>" class="rounded-circle" height="100px" width="100px" alt="profile pic">
                                                      
                                                    </div>
                                                 
                                                </div>
                                                <?=form_open_multipart('students/edit_old')?>
                                                <input type="hidden" name="url" value="<?=current_url()?>">
                                                <input type="hidden" name="id" value="<?=$student->id?>">
                                                <input type="hidden" name="session" value="<?=$currentSession?>">
                                                <div class="row mb-3">
                                                
                                            </div>
                                            <div class="row mb-3">
                                                    <label for="admission-no" class="col-sm-3 col-form-label">Admission No.</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" name="admno" value="<?= $student->admno ?>" type="number" placeholder="" id="admission-no">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="firstname" class="col-sm-3 col-form-label">First Name</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" value="<?= $student->fname ?>" name="fname" type="text" placeholder="" id="firstname">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="Other" class="col-sm-3 col-form-label">Other</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" value="<?= $student->mname ?>" name="mname" type="text" placeholder="" id="Other">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="firstname" class="col-sm-3 col-form-label">Last Name</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" value="<?= $student->lname ?>" name="lname" type="text" placeholder="" id="firstname">
                                                    </div>
                                                </div>
                                            
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">Sex</label>
                                                    <div class="col-sm-9">
                                                        <select name="gender" class="form-select" aria-label="select ">
                                                        <option value="<?= $student->gender ?>"><?= $student->gender ?></option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="example-date-input" class="col-sm-3 col-form-label">Date of Birth</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" value="<?= $student->dob ?>" name="dob" type="date" value="2011-08-19" id="example-date-input">
                                                    </div>
                                                </div>
                                            
                                                
                                                <div class="row mb-3">
                                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" value="<?= $student->email ?>" name="email" type="email" placeholder="abc@xyz.com" id="email">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="example-password-input" class="col-sm-3 col-form-label">Password</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" name="password" type="password" required value="" id="example-password-input">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="" class="col-sm-3 col-form-label">Results Document (.pdf)</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" required name="result" class="form-control" id="customFile">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">House</label>
                                                    <div class="col-sm-9">
                                                        <select name="house" class="form-select" aria-label="select ">
                                                        <option value="<?= $student->house?>"><?= $student->house?></option>
                                                        
                                                                <?php 
                                                                foreach ($houses as $house) {
                                                                    ?>
                                                                    <option value="<?= $house->name?>"><?= $house->name?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <?php if ($classPrefix === 'Junior_Senior') : ?>
                                                    <select class="form-control" name="class_prefix" required>
                                                        <option value="">Prefix...</option>
                                                        <option value="JSS">JSS</option>
                                                        <option value="SS">SS</option>
                                                    </select>
                                                <?php endif;?>
                                                <?php if ($classPrefix !== 'Junior_Senior') : ?>
                                                    <input hidden type="text" value="<?=$classPrefix?>" name="class_prefix" class="form-control" readonly required>
                                                <?php endif;?>

                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">Class Year</label>
                                                    <div class="col-sm-9">
                                                        <select name="curr_year" class="form-select" aria-label="select ">
                                                        <option value="<?= $student->curr_year?>"><?= $student->curr_year?></option>
                                                                
                                                            <?php foreach ($classesDigit as $class) : ?>
                                                                <option value="<?=$class->digit?>"><?=$class->digit?></option>
                                                            <?php endforeach;?>
                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">Class Group</label>
                                                    <div class="col-sm-9">
                                                    <select name="branch" class="form-control">
                                                    <option value="<?= $student->branch?>"><?= $student->branch?></option>
                                                        <?php foreach ($classesGroup as $group) : ?>
                                                            <option value="<?=$group->groups?>"><?=$group->groups?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                    </div>
                                                </div>

                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                                            </div>
                                            </form>
                                     </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                 <!-- To add new student -->
                                <?php 
                                 //  $this->load->view('inc/add-student')
                                //include 'inc/add-student.php'; ?>
                                <div id="viewDetails<?=$student->id?>" class="modal fade" tabindex="-1" aria-labelledby="#viewDetailsLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-fullscreen">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewDetailsLabel"><?=$student->fname." ".$student->mname." ".$student->lname?> - Profile</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-3 border-right">
                                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="<?=base_url($student->stu_img)?>"><span class="font-weight-bold"><?=$student->fname." ".$student->mname." ".$student->lname?></span><span><?=$student->admno?></span></div>
                                                    </div>
                                                    <div class="col-md-5 border-right">
                                                        <div class="p-3 py-5">
                                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                                <h4 class="text-right">Profile</h4>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col-md-6"><label class="labels">Date of Birth</label>
                                                                    <h6><?=$student->dob?> </h6>
                                                                </div>
                                                                
                                                                <div class="col-md-6"><label class="labels">House</label>
                                                                    <h6><?=$student->house?></h6>
                                                                </div>
                                                                <div class="col-md-6"><label class="labels">Status</label>
                                                                    <h6><?php if($student->left_school == 1 || $student->has_graduated == 1  ){ echo "Inactive";}else{ echo 'Active';}?></h6>
                                                                </div>
                                                                <div class="col-md-6"><label class="labels">Class</label>
                                                                    <h6><?=$student->curr_year."".$student->branch?></h6>
                                                                </div>
                                                                
                                                                <div class="col-md-6"><label class="labels">Sex</label>
                                                                    <h6><?=$student->gender?></h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="p-3 py-5">
                                                            <div class="d-flex justify-content-between align-items-center experience"><label class="labels">Result History</label></div><br>
                                                            <div class="d-flex justify-content-between align-items-center experience"><span>2018/2019 Session - (year 9)</span><a href="" class="btn btn-primary waves-effect waves-light px-3 p-1 add-experience"><i class="fa fa-eye"></i>&nbsp;View</a></div><br>
                                                            <div class="d-flex justify-content-between align-items-center experience"><span>2018/2019 Session - (year 9)</span><a href="" class="btn btn-primary waves-effect waves-light px-3 p-1 add-experience"><i class="fa fa-eye"></i>&nbsp;View</a></div><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                                 </div>
                                
                                <?php endforeach;?>
                                </tbody>
                            </table>
                            <div class="col-sm-6 col-md-4 col-xl-3">
                                <!-- To edit student details -->
                           

                                 <!-- To add new student -->
                                <?php  $this->load->view('administrator/inc/add-old-student') ?>
                            </div>

                           
                         
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Funtaj.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        by Envy365 Agency
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
<div data-simplebar class="h-100">
    <div class="rightbar-title d-flex align-items-center px-3 py-4">

        <h5 class="m-0 me-2">Settings</h5>

        <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
            <i class="mdi mdi-close noti-icon"></i>
        </a>
    </div>

    <!-- Settings -->
    <hr class="mt-0" />
    <h6 class="text-center mb-0">Choose Layouts</h6>

    <div class="p-4">
        <div class="mb-2">
            <img src="<?=base_url()?>assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="layout-1">
        </div>

        <div class="form-check form-switch mb-3">
            <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
            <label class="form-check-label" for="light-mode-switch">Light Mode</label>
        </div>

        <div class="mb-2">
            <img src="<?=base_url()?>assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="layout-2">
        </div>
        <div class="form-check form-switch mb-3">
            <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="<?=base_url()?>assets/css/bootstrap-dark.min.css" data-appStyle="<?=base_url()?>assets/css/app-dark.min.css">
            <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
        </div>

        <div class="mb-2">
            <img src="<?=base_url()?>assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="layout-3">
        </div>
        <div class="form-check form-switch mb-5">
            <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appStyle="<?=base_url()?>assets/css/app-rtl.min.css">
            <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
        </div>


    </div>

</div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>