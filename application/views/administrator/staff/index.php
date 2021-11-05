<div id="layout-wrapper">


<!-- <?php // include 'inc/topbar.php'; 
//        $this->load->view('inc/topbar');
?> -->

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
                        <h4 class="mb-sm-0">Staffs</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Funtaj</a></li>
                                <li class="breadcrumb-item active">Staffs</li>
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
                            <h5 class="text-white"><i class="mdi mdi-account-plus-outline me-3"></i> Add Staff</h5>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="staff/old" onclick="old()" class="card bg-warning text-white-50">
                        <div class="card-body">
                            <h5 class="text-white"><i class="mdi mdi-account--off-outline me-3"></i>Inactive Staffs</h5>
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
                            <ul class="nav nav-tabs nav-tabs-custom mb-4">
                                <li class="nav-item">
                                    <a class="nav-link fw-bold p-3 active" href="#">All active Staffs</a>
                                </li>
                                
                            </ul>
                            <h4 class="card-title">All Staffs</h4>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                         <th>#</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Also Teach</th>
                                        <th>Subjects</th>
                                        <th>Status</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>


                                <tbody>
                                <?php $count = 0; $teachescheckedcount = 0; foreach ($allStaff as $staff) : $count++ ?>
                                    <tr>
                                    <td><?=$count?></td>
                                        <td><?=$staff->fname?></td>
                                        <td><?=$staff->mname?></td>
                                        <td><?=$staff->lname?></td>
                                        <td><?=$staff->email?></td>
                                        <td><?php if ($staff->groups != 'Tutor'): $teachescheckedcount++ ?><form><input type="checkbox" oninput="alsoTeaches('<?=$teachescheckedcount?>', '<?=$staff->id?>')" id="alsoteach<?=$teachescheckedcount?>" name="also_teaches" <?php echo ((int)$staff->also_teaches === 1) ? 'checked' : ' '?>></form><?php endif;?></td>
                                        <td><?=($staff->groups === 'Tutor' || (int)$staff->also_teaches === 1)? '<a href="#" class="" data-bs-toggle="modal" data-bs-target="#subjectInfo'.$staff->id.'">Subject</a>' : ''?></td>
                                        <td><?php if($staff->is_active == 1){ echo "Active"; }else{echo 'Deactivated';} ?></td>
                                        <td> <?=anchor("staff/deleteStaff/" . $staff->id, "Delete", array('onclick' => "return confirm('Do you really want to delete this staff?')", 'class' => '')) ?>  | <a href="#" data-bs-toggle="modal" data-bs-target="#editInfo<?=$staff->id?>">Edit</a> | <?=anchor("staff/deactivateStaff/" . $staff->id, "deactivate", array('onclick' => "return confirm('Do you really want to deactivate this staff?')", 'class' => '')) ?></td>
                                    </tr>


                                    <div class="modal fade" id="subjectInfo<?=$staff->id?>" tabindex="-1" role="dialog" aria-labelledby="editInfoTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title w-100 font-weight-bold">Set Subjects For: <span class="text-primary"><?=$staff->fname?>&nbsp;<?=$staff->lname?></span></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                <div><?php
                                                    $this->db->where('tutor_id', $staff->id);
                                                    $getSub = $this->db->get('tutor_subjects');
                                                    foreach ($getSub->result() as $sub) : ?>
                                                        <div class="text-danger text-center"><?=strtoupper($sub->subject_title).' '.anchor("staff/deleteTutorSubject/" . $staff->id .'/'. $sub->id, "<i class='fa fa-trash'></i>", array('onclick' => "return confirm('Do you really want to delete this subject for this Tutor?')", 'class' => '')) ?></div>
                                                    <?php endforeach;?>
                                                </div>
                                                <div class="modal-body mx-3">
                                                    <?=form_open('staff/setTutorSubjects/'.$staff->id)?>
                                                    <input type="hidden" name="id" value="<?=$staff->id?>">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="">Subjects</i></span>
                                                        </div>
                                                        <select name="subject_title" class="form-control">
                                                            <option value="">Choose subjects...</option>
                                                            <?php foreach ($subjects as $sub) : ?>
                                                            <option value="<?=$sub->subjects?>"><?=$sub->subjects?></option>
                                                            <?php endforeach; ?>
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


                                    <div class="modal fade" id="editInfo<?=$staff->id?>" tabindex="-1" role="dialog" aria-labelledby="editInfoTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editInfoTitle">Edit Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                <?=form_open('staff/editStaff')?>
                                                <input type="hidden" name="id" value="<?=$staff->id?>">
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">Title</label>
                                                    <div class="col-sm-9">
                                                        <select name="title"  class="form-select" aria-label="select ">
                                                        <option value="<?=$staff->title?>"><?=$staff->title?></option>
                                                            <option value="1">Dr</option>
                                                            <option value="2">Mr</option>
                                                            <option value="2">Mrs</option>
                                                            <option value="2">Ms</option>
                                                            <option value="2">Miss</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="firstname" class="col-sm-3 col-form-label">First Name</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" name="fname" value="<?=$staff->fname?>" type="text" placeholder="" id="firstname">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="Other" class="col-sm-3 col-form-label">Other</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" name="mname" value="<?=$staff->mname?>" type="text" placeholder="" id="Other">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="firstname" class="col-sm-3 col-form-label">Last Name</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" name="lname" value="<?=$staff->lname?>" type="text" placeholder="" id="firstname">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">Sex</label>
                                                    <div class="col-sm-9">
                                                        <select name="gender" class="form-select" aria-label="select ">
                                                        <option value="<?=$staff->gender?>"><?=$staff->gender?></option>
                                                            <option value="1">Male</option>
                                                            <option value="2">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="example-tel-input" class="col-sm-3 col-form-label">Telephone</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="tel" name="phone" value="<?=$staff->phone?>" placeholder="0804522454254" id="example-tel-input">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control"  name="email" value="<?=$staff->email?>" type="email" placeholder="abc@xyz.com" id="email">
                                                    </div>
                                                </div>
                                            
                                                <div class="row mb-3">
                                                    <label for="example-password-input" class="col-sm-3 col-form-label">Password</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" name="password" type="password"  id="example-password-input">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">Staff Group</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-select" name="groups" aria-label="select ">
                                                        <option value="<?=$staff->groups?>"><?=$staff->groups?></option>
                                                        <?php foreach ($staffGroups as $sG) {
                                                            echo '<option value="'.$sG->groups.'">'.$sG->groups.'</option>';
                                                        } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">House</label>
                                                    <div class="col-sm-9">
                                                        <select name="house" class="form-select" aria-label="select ">
                                                        <option value="<?= $staff->house?>"  selected=""><?= $staff->house?></option>
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

                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">Status</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-select" aria-label="select ">
                                                            <?php if($staff->is_active == 1) { ?>
                                                            <option selected="" value="1">active</option>
                                                            <?php }else{?>
                                                            <option selected="" value="1">active</option>
                                                            <option selected="" value="2">Deactivated</option>
                                                            <?php } ?>
                                                            <option value="1">active</option>
                                                            <option value="2">deactivated</option>
                                                           
                                                        </select>
                                                    </div>
                                                </div>

                                               

                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                                            </div>
                                        </form><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->


                                
                                    <?php endforeach;?>
                                </tbody>
                            </table>

                            <div class="col-sm-6 col-md-4 col-xl-3">
                                <!-- To edit staff details -->
                           
                            <!-- To add new staff -->
                            <?php // include 'inc/add-staff.php';
                               $this->load->view('administrator/inc/add-staff')
                            ?>
                            </div>

                            <div class="col-sm-6 col-md-4 col-xl-3">
                                <!-- To display staff information -->
                                <?php 
                                   $this->load->view('administrator/inc/staff-details')
                                // include 'inc/staff-details.php'; ?>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <?php 
       $this->load->view('administrator/inc/footer')
    //include 'inc/footer.php'; ?>

</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php 
$this->load->view('administrator/inc/right-bar')
//include 'inc/right-bar.php'; ?>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>