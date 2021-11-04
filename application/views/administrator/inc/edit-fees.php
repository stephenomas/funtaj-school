<div class="modal fade" id="editInfo" tabindex="-1" role="dialog" aria-labelledby="editInfoTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
    <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInfoTitle">Edit Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Branch</label>
                    <div class="col-sm-9">
                        <select class="form-select" aria-label="select ">
                            <option selected="">Choose </option>
                            <option value="1">Gudu</option>
                            <option value="2">Asokoro</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="admission-no" class="col-sm-3 col-form-label">Admission No.</label>
                    <div class="col-md-6">
                        <input class="form-control" list="datalistOptions" id="admission no" placeholder="Type to search...">
                        <datalist id="datalistOptions">
                            <option value="1234">
                            <option value="4423">
                            <option value="345564">
                        </datalist>
                    </div>
                </div>
                <div class="row">
                    <h5 class="font-size-14 mb-4">Form Radios</h5>
                    <div class="col-md-6">

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="formRadios" id="formRadios1" onclick="show1();">
                            <label class="form-check-label" for="formRadios1">
                                Pay by Term
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="formRadios" id="formRadios2" onclick="show2();">
                            <label class="form-check-label" for="formRadios2">
                                Pay by Session
                            </label>
                        </div>
                    </div>
                </div>
                <div id="div1" style="display: none;">
                    <div class="row mb-3">
                        <label for="firstname" class="col-sm-3 col-form-label">Session (Paid 750 out of 900,000)</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" placeholder="" id="firstname">
                        </div>
                    </div>
                </div>
                <div id="div2" style="display: none;">
                    <div class="row mb-3">
                        <label for="firstname" class="col-sm-3 col-form-label">First Term (Paid 150 out of 300,000)</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" placeholder="" id="firstname">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Other" class="col-sm-3 col-form-label">Second Term (Paid 250 out of 300,000)</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" placeholder="" id="Other">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="firstname" class="col-sm-3 col-form-label">Third Term (Paid 150 out of 300,000)</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" placeholder="" id="firstname">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">mode of payment</label>
                    <div class="col-sm-9">
                        <select class="form-select" aria-label="select ">
                            <option selected="">Choose </option>
                            <option value="1">Online</option>
                            <option value="2">Bank Draft</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Payment Status</label>
                    <div class="col-sm-9">
                        <select class="form-select" aria-label="select ">
                            <option value="Paid">Paid </option>
                            <option value="1">Awaiting Verification</option>
                            <option value="2">Part Payment</option>
                            <option value="2">Owing</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Upload Proof of Payment</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="customFile">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Note</label>
                    <div class="col-sm-9">
                        <textarea name="" id="" cols="40" rows="5"></textarea>
                    </div>
                </div>


                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light">Update Payment</button>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->