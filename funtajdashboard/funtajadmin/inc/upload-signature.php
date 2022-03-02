<div class="modal fade" id="addInfo" tabindex="-1" role="dialog" aria-labelledby="addInfoTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInfoTitle">Add Signature</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                <div class="row mb-3">
                    <label for="admission-no" class="col-sm-3 col-form-label">Admission No.</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="number" placeholder="" id="admission-no">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="firstname" class="col-sm-3 col-form-label">Full Name</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" placeholder="" id="firstname">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Position</label>
                    <div class="col-sm-9">
                        <select class="form-select" aria-label="select ">
                            <option selected="">Choose Position</option>
                            <option value="Principal">Principal</option>
                            <option value="Vice Principal">Vice Principal</option>
                            <option value="Head Teacher">Head Teacher</option>
                            <option value="Assistant head Teacher">Asst. Head Teacher</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Term</label>
                    <div class="col-sm-9">
                        <select class="form-select" aria-label="select ">
                            <option selected="">Choose Term</option>
                            <option value="1">Term 1</option>
                            <option value="2">Term 2</option>
                            <option value="2">Term 3</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Session</label>
                    <div class="col-sm-9">
                        <select class="form-select" aria-label="select ">
                            <option selected="">Choose Session</option>
                            <option value="1">2021/2022</option>
                            <option value="2">2020/2021</option>
                            <option value="2">2019/2020</option>
                            <option value="2">2018/2019</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Signature</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="customFile">
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