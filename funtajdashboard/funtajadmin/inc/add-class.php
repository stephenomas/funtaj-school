<div class="modal fade" id="addInfo" tabindex="-1" role="dialog" aria-labelledby="addInfoTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInfoTitle">Add CLass</h5>
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
                    <label for="pref" class="col-sm-3 col-form-label">Prefix</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" value="Year" id="pref" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Other" class="col-sm-3 col-form-label">Class Digit</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" placeholder="e.g 7, 9" id="code">
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
                <button type="button" class="btn btn-primary waves-effect waves-light">Add</button>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->