<div class="modal fade" id="addInfo" tabindex="-1" role="dialog" aria-labelledby="addInfoTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInfoTitle">Add Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
				<form  method="post" action="students/addStudent" enctype="multipart/form-data">
               
                <input type="hidden" name="session" value="<?=$currentSession?>">
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Profile Picture</label>
                    <div class="col-sm-9">
                        <input type="file" name="image" class="form-control" id="customFile">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="admission-no" class="col-sm-3 col-form-label">Admission No.</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="admno" type="number" placeholder="" id="admission-no">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="firstname" class="col-sm-3 col-form-label">First Name</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="fname" type="text" placeholder="" id="firstname">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Other" class="col-sm-3 col-form-label">Other</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="mname" type="text" placeholder="" id="Other">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="firstname" class="col-sm-3 col-form-label">Last Name</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="lname" type="text" placeholder="" id="firstname">
                    </div>
                </div>
               
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Sex</label>
                    <div class="col-sm-9">
                        <select name="gender" class="form-select" aria-label="select ">
                            <option selected="">Choose Sex</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-date-input" class="col-sm-3 col-form-label">Date of Birth</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="dob" type="date" value="2011-08-19" id="example-date-input">
                    </div>
                </div>
              
                
                <div class="row mb-3">
                    <label for="example-password-input" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="password" type="password" required value="" id="example-password-input">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">House</label>
                    <div class="col-sm-9">
                        <select name="house" class="form-select" aria-label="select ">
                            <option selected="">Choose House</option>
                         
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
                            <option selected="">Class...</option>
                                
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
                        <option value="">Group...</option>
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
                <button type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
            </div>
        </form>
</div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
