<div class="modal fade" id="addInfo" tabindex="-1" role="dialog" aria-labelledby="addInfoTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInfoTitle">Upload Assignment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?=form_open_multipart('assignments/uploadAssignment')?>
            <input type="hidden" name="term" value="<?=$currentTerm?>">
            <input type="hidden" name="session" value="<?=$currentSession?>">
            <div class="modal-body">
                <p>
                <div class="row mb-3">
                    <label for="admission-no" class="col-sm-3 col-form-label">Assignment title</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="title" id="title" placeholder="Enter Assignment title" id="admission-no">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Subject</label>
                    <div class="col-sm-9">
                        <select name="subject" class="form-select" aria-label="select ">
                            <option selected="">Choose Subject</option>
                            <?php foreach ($subjects as $subject) : ?>
                                <option value="<?=$subject->subjects?>"><?=$subject->subjects?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <?php if($classPrefix == 'Year' || $classPrefix == 'Grade') : ?>
                <div class="row mb-3">
                    <label for="firstname" class="col-sm-3 col-form-label">Class Prefix</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?=$classPrefix?>" name="prefix" id="prefix" readonly>
                    </div>
                </div>
                <?php endif; ?>
            
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Upload File</label>
                    <div class="col-sm-9">
                    <input type="file" name="userfile" id="userfile" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Classes</label>
                    <div class="col-sm-9">
                        <select name="digit" class="form-select" aria-label="select ">
                        <option value="">Choose class...</option>
                            <?php foreach ($classesDigit as $cl) : ?>
                                <option value="<?=$cl->digit?>"><?=$cl->digit?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label"> Start date</label>
                    <div class="col-sm-9">
                    <input type="date" name="start_date" id="start_date" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label"> end_date date</label>
                    <div class="col-sm-9">
                    <input type="date" name="end_date" id="end_date" class="form-control" required>
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