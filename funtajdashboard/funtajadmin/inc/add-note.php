<div class="modal fade" id="addInfo" tabindex="-1" role="dialog" aria-labelledby="addInfoTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInfoTitle">Add Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                <div class="row mb-3">
                    <label for="admission-no" class="col-sm-3 col-form-label">Note Title.</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="number" placeholder="Enter note  title or file namw" id="admission-no">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Subject</label>
                    <div class="col-sm-9">
                        <select class="form-select" aria-label="select ">
                            <option selected="">Choose Subject</option>
                            <option value="1">Math</option>
                            <option value="2">English</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="firstname" class="col-sm-3 col-form-label">Class Prefix</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" value="year" id="firstname" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Upload File</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="customFile">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Sex</label>
                    <div class="col-sm-9">
                        <select class="form-select" aria-label="select ">
                            <option selected="">Choose branch</option>
                            <option value="1">Gudu</option>
                            <option value="2">Asokoro</option>
                        </select>
                    </div>
                </div>

                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light">Add</button>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->