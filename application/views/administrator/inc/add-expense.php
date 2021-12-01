<div class="modal fade" id="addInfo" tabindex="-1" role="dialog" aria-labelledby="addInfoTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInfoTitle">Add Expense</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                <?=form_open('fees/addExpenditure')?>
                <div class="row mb-3">
                    <label for="firstname" class="col-sm-3 col-form-label">Receiver</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="receiver" type="text" placeholder="" id="firstname">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="firstname" class="col-sm-3 col-form-label">Purpose</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="purpose" type="text" placeholder="" id="firstname">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="firstname" class="col-sm-3 col-form-label">Amount(₦)</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="amount" type="number" placeholder="" id="firstname">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Other" class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <textarea name="description" id="" cols="40" rows="5"></textarea>
                    </div>
                </div>

                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->