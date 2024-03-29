<div id="layout-wrapper">


<?php 
$this->load->view('administrator/inc/topbar')
//include 'inc/topbar.php'; ?>

<!-- ========== Left Sidebar Start ========== -->
<?php 
 $this->load->view('administrator/inc/sidebar')
//include 'inc/sidebar.php'; ?>
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
                        <h4 class="mb-sm-0">Notes</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Funtaj</a></li>
                                <li class="breadcrumb-item active">Notes</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <?php if($this->session->userdata('Elevated')) : ?>
            <div class="row">
                <div class="col-lg-3">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addInfo" class="card bg-primary text-white-50">
                        <div class="card-body">
                            <h5 class="text-white"><i class="mdi mdi-notebook-plus-outline me-3"></i> Add Notes</h5>
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
                            <?php $count = 0; foreach ($allNotes as $notes) : $count++ ?>
                                <!-- end task card -->
                                <div class="card task-box col-md-3">
                                    <div class="progress progress-sm animated-progess" style="height: 3px;">
                                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="card-body">

                                        <div class="float-end ms-2">
                                            <div>
                                            <?=$notes->prefix.' '.$notes->digit?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <a href="#" class=""><?php
                                            $pos = strrpos(base_url($notes->note_link), '.');
                                            $type = ($pos === false) ? base_url($notes->note_link) : substr(base_url($notes->note_link), $pos + 1);
                                            echo '<span class="text-danger">'.strtoupper($type).'</span>';?></a>
                                        </div>
                                        <div>
                                            <h5 class="font-size-16"><a href="javascript: void(0);" class="text-dark"><?=$notes->subject?></a></h5>
                                            <p class="mb-4"><?=$notes->note_title?></p>
                                        </div>

                                        <div class="d-inline-flex team mb-0">
                                            <div class="me-3 align-self-center">
                                                Staff :
                                            </div>
                                            <div class="team-member">
                                                <a href="javascript: void(0);" class="team-member d-inline-block">
                                                    <div class="">
                                                        <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                        <?php
                                                        $this->db->where('id', $notes->staff_id);
                                                        $staffGet = $this->db->get('staff');
                                                        foreach($staffGet->result() as $staff) :
                                                            $staffName = $staff->fname.' '.$staff->lname;
                                                            echo $staffName;
                                                            ?>
                                                           
                                                        <?php endforeach;?>
                                                        </span>
                                                    </div>
                                                </a>
                                            </div>


                                        </div>


                                        <!-- To display note information -->
                                        <!-- sample modal content -->
                                        <div class="col-sm-6 col-md-4 col-xl-3">
                                            <div id="viewDetails<?= $notes->id ?>" class="modal fade" tabindex="-1" aria-labelledby="#viewDetailsLabel<?= $notes->id ?>" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-fullscreen">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="viewDetailsLabel<?= $notes->id ?>">Title - Description</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12 border-right text-center">
                                                                <iframe src="<?= $notes->note_link ?>" style="width:85vw; height:85vh;" frameborder="0"></iframe>
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
                                        <!-- To display note information -->
                                        <!-- sample modal content -->

                                       
                                        <div class="mb-0 float-end">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#viewDetails<?= $notes->id ?>" class="">View</a> | <?php if($this->session->userdata('Elevated')){echo anchor("notes/deleteNote/" . $notes->id, "Delete", array('onclick' => "return confirm('Do you really want to delete this note?')", 'class' => " "));} ?>
                                        </div>
                                        
                                    </div>
                                </div>
                              
                                      
                                <?php endforeach;?>
                                <!-- end task card -->

                            <div class="col-sm-6 col-md-4 col-xl-3">

                                        <!-- To add new note -->
                                        <?php 
                                        $this->load->view('administrator/inc/add-note')
                                        //include 'inc/add-note.php'; ?>
                            </div>

                            
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
            <?php endif; ?>

            <?php if($this->session->userdata('role') == 'Tutor') : ?>
            <div class="row">
                <div class="col-lg-3">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addInfo" class="card bg-primary text-white-50">
                        <div class="card-body">
                            <h5 class="text-white"><i class="mdi mdi-notebook-plus-outline me-3"></i> Add Notes</h5>
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
                            <?php $count = 0; foreach ($tutorNotes as $notes) : $count++ ?>
                                <!-- end task card -->
                                <div class="card task-box col-md-3">
                                    <div class="progress progress-sm animated-progess" style="height: 3px;">
                                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="card-body">

                                        <div class="float-end ms-2">
                                            <div>
                                            <?=$notes->prefix.' '.$notes->digit?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <a href="#" class=""><?php
                                            $pos = strrpos(base_url($notes->note_link), '.');
                                            $type = ($pos === false) ? base_url($notes->note_link) : substr(base_url($notes->note_link), $pos + 1);
                                            echo '<span class="text-danger">'.strtoupper($type).'</span>';?></a>
                                        </div>
                                        <div>
                                            <h5 class="font-size-16"><a href="javascript: void(0);" class="text-dark"><?=$notes->subject?></a></h5>
                                            <p class="mb-4"><?=$notes->note_title?></p>
                                        </div>

                                        <div class="d-inline-flex team mb-0">
                                            <div class="me-3 align-self-center">
                                                Staff :
                                            </div>
                                            <div class="team-member">
                                                <a href="javascript: void(0);" class="team-member d-inline-block">
                                                    <div class="">
                                                        <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                        <?php
                                                        $this->db->where('id', $notes->staff_id);
                                                        $staffGet = $this->db->get('staff');
                                                        foreach($staffGet->result() as $staff) :
                                                            $staffName = $staff->fname.' '.$staff->lname;
                                                            echo $staffName;
                                                            ?>
                                                           
                                                        <?php endforeach;?>
                                                        </span>
                                                    </div>
                                                </a>
                                            </div>


                                        </div>
                                        <!-- To display note information -->
                                        <!-- sample modal content -->
                                        <div class="col-sm-6 col-md-4 col-xl-3">
                                            <div id="viewDetails<?= $notes->id ?>" class="modal fade" tabindex="-1" aria-labelledby="#viewDetailsLabel<?= $notes->id ?>" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-fullscreen">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="viewDetailsLabel<?= $notes->id ?>">Title - Description</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12 border-right text-center">
                                                                <iframe src="<?= $notes->note_link ?>" style="width:85vw; height:85vh;" frameborder="0"></iframe>
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
                                        <!-- To display note information -->
                                        <!-- sample modal content -->
                                       
                                        <div class="mb-0 float-end">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#viewDetails<?= $notes->id ?>" class="">View</a> | <?php if($this->session->userdata('role') == 'Admin'){echo anchor("notes/deleteNote/" . $notes->id, "Delete", array('onclick' => "return confirm('Do you really want to delete this note?')", 'class' => " "));} ?>
                                        </div>
                                        
                                    </div>
                                </div>
                                <?php endforeach;?>
                                <!-- end task card -->

                                
                                
                            </div>

                        
                            <div class="col-sm-6 col-md-4 col-xl-3">

                                <!-- To add new note -->
                                <?php 
                                 $this->load->view('administrator/inc/add-note')
                                //include 'inc/add-note.php'; ?>
                            </div>

                           
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
            <?php endif; ?>


            <?php if($this->session->userdata('role') == 'Student') :
                redirect('/student-portal/note');
                ?>
            

            <?php endif; ?>



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