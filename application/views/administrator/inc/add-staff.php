<div class="modal fade" id="addInfo" tabindex="-1" role="dialog" aria-labelledby="addInfoTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInfoTitle">Add Staff</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?=form_open('staff/addStaff')?>
                <p>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Title</label>
                    <div class="col-sm-9">
                        <select name="title" class="form-select" aria-label="select ">
                            <option selected="">Choose Title</option>
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
                        <input class="form-control"  name="fname" type="text" placeholder="" id="firstname">
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
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-tel-input" class="col-sm-3 col-form-label">Telephone</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="phone" type="tel" placeholder="234-(80)-555-5555" id="example-tel-input">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="email" type="email" placeholder="abc@xyz.com" id="email">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-password-input" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="password" name="password" id="example-password-input">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Staff Group</label>
                    <div class="col-sm-9">
                                 <select name="groups" class="form-control" required>
                                    <option value=" ">Choose staff group...</option>
                                    <?php foreach ($staffGroups as $sG) : ?>
                                        <option value="<?=$sG->groups?>"><?=$sG->groups?></option>
                                    <?php endforeach; ?>
                                </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">House</label>
                    <div class="col-sm-9">
                        <select class="form-select" name="house" aria-label="select ">
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

                

               

                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->