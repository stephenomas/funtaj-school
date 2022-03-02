<div class="modal fade" id="editTutor" tabindex="-1" role="dialog" aria-labelledby="editInfoTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoTitle">Edit Tutor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>

                <div class="row mb-3">
                    <label for="Session" class="col-sm-3 col-form-label">Current Session</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" value="2020/2021" id="Session" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pref" class="col-sm-3 col-form-label">Current Term</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" value="Term 3" id="pref" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Other" class="col-sm-3 col-form-label">Tutors</label>
                    <div class="col-sm-9">
                        <select class="form-select" id="validationCustom03" required>
                            <option selected disabled value="">Choose class tutor</option>
                            <option></option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Other" class="col-sm-3 col-form-label">Group</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" placeholder="e.g A" id="code">
                    </div>
                </div>

                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light">Update</button>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->