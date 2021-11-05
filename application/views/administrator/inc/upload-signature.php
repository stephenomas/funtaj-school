<div class="modal fade" id="addInfo" tabindex="-1" role="dialog" aria-labelledby="addInfoTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInfoTitle">Add Signature</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?=form_open_multipart('school/uploadSignature')?>
            <div class="modal-body">
                <p>
                
                <div class="row mb-3">
                    <label for="firstname" class="col-sm-3 col-form-label">Full Name</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="full_name" type="text" placeholder="" id="fullname">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Position</label>
                    <div class="col-sm-9">
                        <select class="form-select" name="position" aria-label="select ">
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
                        <select class="form-select" name="term" aria-label="select ">
                            <option selected="">Choose Term</option>
                            <?php foreach ($allTerms as $terms) :?>
                            <option value="<?=$terms->terms?>"><?=$terms->terms?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Session</label>
                    <div class="col-sm-9">
                        <select class="form-select"  name="session"  aria-label="select ">
                            <option selected="">Choose Session</option>
                            <?php foreach ($allSessions as $sessions) :?>
                            <option value="<?=$sessions->sessions?>"><?=$sessions->sessions?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Signature</label>
                    <div class="col-sm-9">
                        <input type="file" name="userfile" class="form-control" id="customFile">
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