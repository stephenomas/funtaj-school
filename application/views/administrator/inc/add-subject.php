<div class="modal fade" id="addInfo" tabindex="-1" role="dialog" aria-labelledby="addInfoTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInfoTitle">Add Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?=form_open('school/addSubject')?>
            <div class="modal-body">
                <p>

                <div class="row mb-3">
                    <label for="firstname" class="col-sm-3 col-form-label">Subject</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="subject" type="text" placeholder="e.g Mathematics" id="subject">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Other"  class="col-sm-3 col-form-label">Code</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="code" type="text" placeholder="e.g Math" id="code">
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