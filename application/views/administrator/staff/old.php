<h2 class="mb-4"><?=$pageTitle?></h2>

<div class="row mb-4">
    <div class="col-md">
        <div class="d-flex btn" data-toggle="modal" data-target="#staffAdd">
            <div class="bg-info text-light p-4">
                <div class="d-flex align-items-center h-100">
                    <i class="fa fa-3x fa-fw fa-plus"></i>
                </div>
            </div>
            <div class="flex-grow-1 bg-white p-4">
                <p class="text-uppercase text-info mb-0">Add Staff</p>
                <h4 class="font-weight-bold mb-0 text-danger"></h4>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="d-flex btn" onclick="curr()">
            <div class="bg-primary text-light p-4">
                <div class="d-flex align-items-center h-100">
                    <i class="fa fa-3x fa-fw fa-id-badge"></i>
                </div>
            </div>
            <div class="flex-grow-1 bg-white p-4">
                <p class="text-uppercase text-secondary mb-0">All Staff</p>
                <h4 class="font-weight-bold mb-0"></h4>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="d-flex btn" onclick="old()">
            <div class="bg-danger text-light p-4">
                <div class="d-flex align-items-center h-100">
                    <i class="fa fa-3x fa-fw fa-id-card-alt"></i>
                </div>
            </div>
            <div class="flex-grow-1 bg-white p-4">
                <p class="text-uppercase text-danger mb-0">Inactive Staff</p>
                <h4 class="font-weight-bold mb-0"></h4>
            </div>
        </div>
    </div>
</div>

<script>
    //Buttons for navigating students
    function old() {
        var base_url = "<?=base_url();?>";
        window.location.href = base_url + 'staff/old';
    }
    function curr() {
        var base_url = "<?=base_url();?>";
        window.location.href = base_url + 'staff';
    }
</script>

<div class="row mb-4">
    <div class="col-md">
        <div class="card">

            <!-- Add Staff Modal -->


            <div class="modal fade" id="staffAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Add Staff</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-3">
                            <?=form_open('staff/addStaff')?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">First Name</i></span>
                                </div>
                                <input type="text" name="fname" class="form-control" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">Other Names</i></span>
                                </div>
                                <input type="text" name="mname" class="form-control">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">Last Name</i></span>
                                </div>
                                <input type="text" name="lname" class="form-control" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">Sex</i></span>
                                </div>
                                <select name="gender" class="form-control" required>
                                    <option value=" ">Choose sex...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">Staff Group</i></span>
                                </div>
                                <select name="groups" class="form-control" required>
                                    <option value=" ">Choose staff group...</option>
                                    <?php foreach ($staffGroups as $sG) : ?>
                                        <option value="<?=$sG->groups?>"><?=$sG->groups?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">Email</i></span>
                                </div>
                                <input type="text" name="email" class="form-control" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">Password</i></span>
                                </div>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-default">Add Staff</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Add Staff  Modal Ends  -->


            <div class="card-header bg-white font-weight-bold">
                All Staff
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Edit</th>
                        <th scope="col"><i class="fa fa-lock"></th>
                        <th scope="col">Activate</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 0; foreach ($oldStaff as $staff) : $count++ ?>
                        <tr>
                            <td data-label="#"><?=$count?></td>
                            <td data-label="First Name"><?=$staff->fname?></td>
                            <td data-label="Middle Name"><?=$staff->mname?></td>
                            <td data-label="Last Name"><?=$staff->lname?></td>
                            <td data-label="email"><?=$staff->email?></td>
                            <td data-label="Edit"><a href="" class="" data-toggle="modal" data-target="#staffEdit<?=$staff->id?>">Edit</a></td>

                            <!-- Edit Staff Modal -->


                            <div class="modal fade" id="staffEdit<?=$staff->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Edit Staff</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body mx-3">
                                            <?=form_open('staff/editStaff')?>
                                            <input type="hidden" name="id" value="<?=$staff->id?>">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="">First Name</i></span>
                                                </div>
                                                <input type="text" name="fname" value="<?=$staff->fname?>" class="form-control" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="">Other Names</i></span>
                                                </div>
                                                <input type="text" name="mname" value="<?=$staff->mname?>" class="form-control">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="">Last Name</i></span>
                                                </div>
                                                <input type="text" name="lname" value="<?=$staff->lname?>" class="form-control" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="">Email</i></span>
                                                </div>
                                                <input type="text" name="email" value="<?=$staff->email?>" class="form-control" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="">Sex</i></span>
                                                </div>
                                                <select name="gender" class="form-control" required>
                                                    <option value="<?=$staff->gender?>"><?=$staff->gender?></option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="">Change Staff Group</i></span>
                                                </div>
                                                <select name="groups" class="form-control" required>
                                                    <option value="<?=$staff->groups?>"><?=$staff->groups?></option>
                                                    <?php foreach ($staffGroups as $sG) {
                                                        echo '<option value="'.$sG->groups.'">'.$sG->groups.'</option>';
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button class="btn btn-default">Edit Staff</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!--  Edit Staff Modal Ends  -->


                            <!-- Edit Password Modal -->


                            <div class="modal fade" id="passwordEdit<?=$staff->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Change Password for: <span class="text-primary"><?=$staff->fname?>&nbsp;<?=$staff->lname?></span></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body mx-3">
                                            <?=form_open('staff/editPassword')?>
                                            <input type="hidden" name="id" value="<?=$staff->id?>">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="">Password</i></span>
                                                </div>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button class="btn btn-default">Change Password</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!--  Edit password Modal Ends  -->

                            <td data-label="Password"><a href="" class="" data-toggle="modal" data-target="#passwordEdit<?=$staff->id?>"><i class="fa fa-key"></a></td>
                            <td data-label="Activate"><?=anchor("staff/activateStaff/" . $staff->id, "<i class='fa fa-exclamation-circle'></i>", array('onclick' => "return confirm('Do you really want to activate this staff?')", 'class' => '')) ?></td>
                            <td data-label="Delete"><?=anchor("staff/deleteOldStaff/" . $staff->id, "<i class='fa fa-trash'></i>", array('onclick' => "return confirm('Do you really want to delete this staff?')", 'class' => '')) ?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</div>



</div>
