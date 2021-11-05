<div id="layout-wrapper">


<?php // include 'inc/topbar.php';
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
                        <h4 class="mb-sm-0">Classes</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Funtaj</a></li>
                                <li class="breadcrumb-item active">Classes</li>
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
                            <h5 class="text-white"><i class="mdi mdi-account-plus-outline me-3"></i> Add Classes</h5>
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
                            
                            <h4 class="card-title">All Classes</h4>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Class</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>


                                <tbody>
                                <?php foreach ($classes as $cla):?>
                                    <tr>
                                        <td><?=anchor('school/students/'.$cla->prefix.'/'.$cla->digit.'/'.$cla->groups, $cla->prefix.' '.$cla->digit.$cla->groups, 'class="btn btn-info"')?></td>
                                        <td><a href="" data-bs-toggle="modal" data-bs-target="#editInfo<?=$cla->id?>">Edit</a> | <a href="" data-bs-toggle="modal" data-bs-target="#editTutor<?=$cla->id?>">Tutor</a>  | <?=anchor("school/deleteClass/" . $cla->id, "<i class='fa fa-trash'></i>", array('onclick' => "return confirm('Do you really want to delete this class?')", 'class' => '')) ?></td>
                                    </tr>

                                    <div class="modal fade" id="editTutor<?=$cla->id?>" tabindex="-1" role="dialog" aria-labelledby="editInfoTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editInfoTitle">Edit Tutor</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                <?php
                                                // This gets form tutor for the class
                                //                            $this->db->where('class_id', $cla->id);
                                                $this->db->where('term', $currentTerm);
                                                $this->db->where('session', $currentSession);
                                                $this->db->where('prefix', $cla->prefix);
                                                $this->db->where('digit', $cla->digit);
                                                $this->db->where('groups', $cla->groups);
                                                $getFormTut = $this->db->get('class_tutor');
                                                if ($getFormTut->num_rows() > 0){
                                                    foreach ($getFormTut->result() as $cltut){
                                                        $tutid = $cltut->tutor_id;
                                                        $this->db->where('id', $tutid);
                                                        $tutorGet = $this->db->get('staff');
                                                        foreach ($tutorGet->result() as $ttget){
                                                            echo '<h5 class="text-center text-danger modal-title w-100 font-weight-bold">Class Tutor: '.$ttget->fname.' '.$ttget->lname.'</h5><hr>';
                                                        }
                                                    }
                                                }else{
                                                    echo '<h5 class="text-center text-danger modal-title w-100 font-weight-bold"> Class tutor not set this term! Choose a tutor...</h5><hr>';
                                                }
                                                    ?>
                                                <?=form_open('school/setClassTutor')?>
                                                <div class="row mb-3">
                                                    <label for="Session" class="col-sm-3 col-form-label">Current Session</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" name="current_session" value="<?=$currentSession?>" type="text" value="2020/2021" id="Session" readonly>
                                                    </div>
                                                </div>
                                              
                                                <input type="hidden" name="id" value="<?=$cla->id?>">
                                                <input type="hidden" value="<?=$classPrefix?>" name="prefix" class="form-control">
                                                <input type="hidden" name="digit" value="<?=$cla->digit?>" class="form-control" required>
                                                <input type="hidden" name="group" value="<?=ucfirst(strtolower($cla->groups))?>" class="form-control" required>
                                                <div class="row mb-3">
                                                    <label for="pref" class="col-sm-3 col-form-label">Current Term</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control"  name="current_term" value="<?=$currentTerm?>" type="text" value="Term 3" id="pref" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="Other" class="col-sm-3 col-form-label">Tutors</label>
                                                    <div class="col-sm-9">
                                                        <select  name="tutor_id" class="form-select" id="validationCustom03" required>
                                                            <option selected disabled value="">Choose class tutor</option>
                                                            <?php foreach ($tutors as $tut) : ?>
                                                            <option value="<?=$tut->id?>"><?=$tut->fname.' '.$tut->lname?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="Other" class="col-sm-3 col-form-label">Group</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" name="group" value="<?=ucfirst(strtolower($cla->groups))?>" type="text" placeholder="e.g A" id="code">
                                                    </div>
                                                </div>

                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                                            </div>
                                        </form><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->


                                    <div class="modal fade" id="editInfo<?=$cla->id?>" tabindex="-1" role="dialog" aria-labelledby="editInfoTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editInfoTitle">Edit CLass</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <?=form_open('school/editClass')?>
                                            <div class="modal-body">
                                            <input type="hidden" name="id" value="<?=$cla->id?>">
                                                <p>

                                                <div class="row mb-3">
                                                    <label for="Session" class="col-sm-3 col-form-label">Current Session</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" value="<?=$currentSession?>" id="Session" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="pref" class="col-sm-3 col-form-label">Prefix</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" name="prefix" type="text" value="<?=$classPrefix?>" id="pref" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="Other" class="col-sm-3 col-form-label">Class Digit</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control"  name="digit" value="<?=$cla->digit?>" type="text" placeholder="e.g 7, 9" id="code">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="Other" class="col-sm-3 col-form-label">Group</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" name="group" value="<?=ucfirst(strtolower($cla->groups))?>" type="text" placeholder="e.g A" id="code">
                                                    </div>
                                                </div>
                                                
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                                            </div>
                                        </form><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                                                            
                               
                               
                                    <?php endforeach;?> 
                                </tbody>
                            </table>

                            <div class="col-sm-6 col-md-4 col-xl-3">
                                <!-- To edit class details -->
                               
                                 <!-- To add new class -->
                                <?php //include 'inc/add-class.php'; 
                                  $this->load->view('administrator/inc/add-class');
                                ?>

                                <!-- To manage Tutor -->
                                
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