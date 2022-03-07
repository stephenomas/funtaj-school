<div id="layout-wrapper">


<?php //include 'inc/topbar.php'; 
    $this->load->view('administrator/inc/topbar');
?>

<!-- ========== Left Sidebar Start ========== -->
<?php //include 'inc/sidebar.php';
 $this->load->view('administrator/inc/sidebar');
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
                        <h4 class="mb-sm-0">Assignment</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Funtaj</a></li>
                                <li class="breadcrumb-item active">Assignment</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-lg-3">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addInfo" class="card bg-primary text-white-50">
                        <div class="card-body">
                            <h5 class="text-white"><i class="mdi mdi-notebook-plus-outline me-3"></i> Add Assignment</h5>
                        </div>
                    </a>
                </div>
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

                            <?php if($this->session->flashdata('error')){ ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('error') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            
                            <?php } ?>
                            <span class="d-flex">
                                <form class="app-search row">
                                    <div class="position-relative col-10">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <!-- <span class="ri-search-line"></span> -->
                                    </div>
                                    <button type="button" class="btn btn-primary col-2"><i class="ri-search-line"></i></button>
                                </form>
                            </span>
                            

                            <div id="todo-task" class="task-list row">
                                <?php
                                  if($this->session->userdata('role') === 'Tutor'){
                                    $assignments = $tutorAssignments;
                                  }else{
                                    $assignments = $allAssignments;
                                  }   
                                ?>
                            <?php $count = 0; foreach ($assignments as $assignment) : $count++ ?>

                                <!-- end task card -->
                                <div class="card task-box col-md-3">
                                    <div class="progress progress-sm animated-progess" style="height: 3px;">
                                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="card-body">

                                        <div class="float-end ms-2">
                                            <div>
                                            <?=$assignment->start_date?> - <?=$assignment->end_date?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <a href="#" class="">PDF</a>
                                        </div>
                                        <div>
                                            <h5 class="font-size-16"><a href="javascript: void(0);" class="text-dark"><?=$assignment->assignment_title?></a></h5>
                                            <p class="mb-4"><?=$assignment->subject?></p>
                                        </div>

                                        <div class="d-inline-flex team mb-0">
                                            <div class="me-3 align-self-center">
                                                Tutor: <?php
                                                $this->db->where('id', $assignment->staff_id);
                                                $staffGet = $this->db->get('staff');
                                                foreach($staffGet->result() as $staff) :
                                                $staffName = $staff->fname.' '.$staff->lname;?><?=$staffName?>
                                                <?php endforeach;?>
                               
                                            </div>
                                        </div>
                                        <div class="mb-0 float-end">
                                            <a href="#" class=""><?=$assignment->prefix.' '.$assignment->digit?></a>
                                        </div>

                                    </div>
                                </div>
                             <?php endforeach;?>
                                <!-- end task card -->

                                <div class="text-center">
                                    <a href="javascript: void(0);" class="btn btn-primary mt-1 waves-effect waves-light"><i class="mdi mdi-plus me-1"></i> Add New</a>
                                </div>
                            </div>

                            <!-- <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Reg No.</th>
                                        <th>Class</th>
                                        <th>Status</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <tr>
                                        <td>Ade</td>
                                        <td>Mike</td>
                                        <td>Stew</td>
                                        <td>abc@xyz.com</td>
                                        <td>14365</td>
                                        <td>Year 9A</td>
                                        <td>Active</td>
                                        <td><a href="" data-bs-toggle="modal" data-bs-target="#viewDetails">View</a> | <a href="">Delete</a> | <a href="#" data-bs-toggle="modal" data-bs-target="#editInfo">Edit</a> | <a href="">deactivate</a></td>
                                    </tr>
                                </tbody>
                            </table> -->

                            <div class="col-sm-6 col-md-4 col-xl-3">
                                <!-- To edit note details -->
                                <?php //include 'inc/edit-note.php'; ?>

                                <!-- To add new note -->
                                <?php // include 'inc/add-note.php'; ?>
                                <?php 
                                 $this->load->view('administrator/inc/add-assignment')
                                //include 'inc/add-note.php'; ?>
                            </div>

                            <div class="col-sm-6 col-md-4 col-xl-3">
                                <!-- To display note information -->
                                <?php // include 'inc/note-details.php'; ?>
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
            <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="layout-1">
        </div>

        <div class="form-check form-switch mb-3">
            <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
            <label class="form-check-label" for="light-mode-switch">Light Mode</label>
        </div>

        <div class="mb-2">
            <img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="layout-2">
        </div>
        <div class="form-check form-switch mb-3">
            <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css">
            <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
        </div>

        <div class="mb-2">
            <img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="layout-3">
        </div>
        <div class="form-check form-switch mb-5">
            <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css">
            <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
        </div>


    </div>

</div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>