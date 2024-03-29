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
                    <label for="" class="col-sm-3 col-form-label">Product Picture</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="customFile">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pn" class="col-sm-3 col-form-label">Product Name</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" placeholder="" id="pn">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="price" class="col-sm-3 col-form-label">Price</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="number" placeholder="" id="price">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="disc" class="col-sm-3 col-form-label">Discount(%)</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="number" placeholder="" id="disc">
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
                    <label class="col-sm-3 col-form-label">Category</label>
                    <div class="col-sm-9">
                        <select class="form-select" aria-label="select ">
                            <option selected="">Choose category</option>
                            <option value="1">Primary</option>
                            <option value="2">Secondary</option>
                        </select>
                    </div>
                </div>
                <label for="example-tel-input" class="col-form-label">Variation</label>
                <div id="variations">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="example-tel-input" class="col-form-label">Size</label>
                            <input class="form-control" type="number" placeholder="12" id="example-tel-input">
                        </div>
                        <div class="col-sm-6">
                            <label for="example-tel-input" class="col-form-label">Quantity</label>
                            <input class="form-control" type="number" placeholder="10" id="example-tel-input">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="example-tel-input" class="col-form-label">Size</label>
                            <input class="form-control" type="number" placeholder="12" id="example-tel-input">
                        </div>
                        <div class="col-sm-6">
                            <label for="example-tel-input" class="col-form-label">Quantity</label>
                            <input class="form-control" type="number" placeholder="10" id="example-tel-input">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="example-tel-input" class="col-form-label">Size</label>
                            <input class="form-control" type="number" placeholder="12" id="example-tel-input">
                        </div>
                        <div class="col-sm-6">
                            <label for="example-tel-input" class="col-form-label">Quantity</label>
                            <input class="form-control" type="number" placeholder="10" id="example-tel-input">
                        </div>
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