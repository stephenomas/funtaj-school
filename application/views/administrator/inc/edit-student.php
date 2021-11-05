<div class="modal fade" id="editInfo" tabindex="-1" role="dialog" aria-labelledby="editInfoTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoTitle">Edit Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Profile Picture</label>
                    <div class="col-sm-9">
                        <img src="<?=base_url($student->stu_img)?>" alt="profile pic">
                        <button type="button" class="btn btn-primary waves-effect waves-light">Delete</button>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="admission-no" class="col-sm-3 col-form-label">Admission No.</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="number" placeholder="" id="admission-no">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="firstname" class="col-sm-3 col-form-label">First Name</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" value="<?= $student->fname ?>" placeholder="" id="firstname">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Other" class="col-sm-3 col-form-label">Other</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" placeholder="" id="Other">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="firstname" class="col-sm-3 col-form-label">Last Name</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" placeholder="" id="firstname">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Sex</label>
                    <div class="col-sm-9">
                        <select class="form-select" aria-label="select ">
                            <option selected="">Choose Sex</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-date-input" class="col-sm-3 col-form-label">Date of Birth</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-tel-input" class="col-sm-3 col-form-label">Telephone</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="tel" placeholder="234-(80)-555-5555" id="example-tel-input">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="email" placeholder="abc@xyz.com" id="email">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-password-input" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="password" value="hunter2" id="example-password-input">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">House</label>
                    <div class="col-sm-9">
                        <select class="form-select" aria-label="select ">
                            <option selected="">Choose House</option>
                            <option value="1">Red</option>
                            <option value="2">Blue</option>
                            <option value="2">Green</option>
                            <option value="2">Yellow</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                        <select class="form-select" aria-label="select ">
                            <option selected="">Choose Status</option>
                            <option value="1">active</option>
                            <option value="2">deactivated</option>
                            <option value="2">graduated</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Branch</label>
                    <div class="col-sm-9">
                        <select class="form-select" aria-label="select ">
                            <option selected="">Choose Branch</option>
                            <option value="1">Gudu</option>
                            <option value="2">Asokoro</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Class Year</label>
                    <div class="col-sm-9">
                        <select class="form-select" aria-label="select ">
                            <option selected="">Class...</option>
                            <option value="1">7</option>
                            <option value="2">8</option>
                            <option value="2">9</option>
                            <option value="2">10</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Class Group</label>
                    <div class="col-sm-9">
                        <select class="form-select" aria-label="select ">
                            <option selected="">Group...</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>
                </div>

                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->