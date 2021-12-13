<div class="modal fade" id="addInfo" tabindex="-1" role="dialog" aria-labelledby="addInfoTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <form method="POST" action="<?= base_url('store/addproduct') ?>" enctype="multipart/form-data" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInfoTitle">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <p>

                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Product Picture</label>
                    <div class="col-sm-9">
                        <input type="file" name="product_image" class="form-control" id="customFile">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pn" class="col-sm-3 col-form-label">Product Name</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="name" type="text" placeholder="" id="pn">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="price" class="col-sm-3 col-form-label">Price</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="price" type="number" placeholder="" id="price">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="disc" class="col-sm-3 col-form-label">Discount(%)</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="discount" type="number" placeholder="" id="disc">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Sex</label>
                    <div class="col-sm-9">
                        <select class="form-select" name="gender" aria-label="select ">
                            <option selected="">Choose Sex</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Category</label>
                    <div class="col-sm-9">
                        <select class="form-select" name="category" aria-label="select ">
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
                            <input class="form-control" type="number" name="size1" placeholder="12" id="example-tel-input">
                        </div>
                        <div class="col-sm-6">
                            <label for="example-tel-input" class="col-form-label">Quantity</label>
                            <input class="form-control" type="number" name="quantity1" placeholder="10" id="example-tel-input">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="example-tel-input" class="col-form-label">Size</label>
                            <input class="form-control" type="number" name="size2" placeholder="12" id="example-tel-input">
                        </div>
                        <div class="col-sm-6">
                            <label for="example-tel-input" class="col-form-label">Quantity</label>
                            <input class="form-control" type="number" name="quantity2" placeholder="10" id="example-tel-input">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="example-tel-input" class="col-form-label">Size</label>
                            <input class="form-control" type="number" name="size3" placeholder="12" id="example-tel-input">
                        </div>
                        <div class="col-sm-6">
                            <label for="example-tel-input" class="col-form-label">Quantity</label>
                            <input class="form-control" type="number" name="quantity3" placeholder="10" id="example-tel-input">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary waves-effect waves-light">Add more</button>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Product Description</label>
                    <div class="col-sm-9">
                        <textarea name="description" id="" cols="40" rows="5"></textarea>
                    </div>
                </div>

                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Add Product</button>
            </div>
        </form><!-- /.modal-content -->
   
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->