<h2 class="mb-4"><?=$pageTitle?></h2>
<hr>
<div class="row mb-4">
    <div class="col-md-8">
        <div class="">
            <div class="float-left">
                <button class="btn btn-primary"  data-toggle="modal" data-target="#productsAdd">Add Products</button>
            </div>
            <br>
        </div>
        <br>
        <hr>
        <div class="" style="width: 100%">
            <div>
                <h6 class="text-info text-center">PRODUCTS</h6>
                <hr>
                <div id="products">
                    <!--Holds the products being generated from javascript-->
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="">
            <div class="float-right">
                 <button class="btn btn-secondary" data-toggle="modal" data-target="#categoryAdd">Create Category</button>
            </div>
            <br>
        </div>
        <br>
        <hr>
        <div class="" style="width: 100%">
            <div>
                <h6 class="text-primary text-center">CATEGORIES</h6>
                <hr>
                <div id="categories">
<!--Holds the categories being generated from javascript-->
                </div>
            </div>

        </div>
    </div>
</div>

<!--<div class="row mb-4">-->
<!--    <div class="col-md-8">-->
<!--        <div class="d-flex">-->
<!---->
<!---->
<!---->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col-md-4">-->
<!--        <div class="d-flex">-->
<!---->
<!---->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!-- Add category Modal -->

<div class="modal fade" id="categoryAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="addCategory">
                <div class="modal-body mx-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Category Title</i></span>
                        </div>
                        <input type="text" id="categoryTitle" onkeyup="createCategorySku()" name="categoryTitle" class="form-control" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">SKU</i></span>
                        </div>
                        <input type="text" id="sku" name="sku" class="form-control" required readonly>
                    </div>
                    <div id="categoryError" class="text-danger">

                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-default" onclick="createCategory(this.form); return false;">Add Category</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Add category Modal Ends  -->

<!-- Add Products Modal -->

<div class="modal fade" id="productsAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Add Product(s)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="addProducts">
                <div class="modal-body mx-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Product Title</i></span>
                        </div>
                        <input type="text" id="productTitle" name="productTitle" onkeyup="createProductSku()" placeholder="Required" class="form-control" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Product Category</i></span>
                        </div>
                        <select name="productCategory" id="productCategory" onclick="createProductSku()" class="form-control" required>
                            <option value="">Choose Category... (Required)</option>
                            <?php $categoriesGet = $this->db->get('products_categories');
                            if($categoriesGet->num_rows() > 0) :
                                foreach ($categoriesGet->result() as $cat): ?>
                                    <option value="<?=$cat->categories?>"><?=$cat->categories?></option>
                                <?php endforeach;?>
                            <?php endif;?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Size</i></span>
                        </div>
                        <input type="number" id="size" name="size" onkeyup="createProductSku()" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Colour</i></span>
                        </div>
                        <select name="colour" id="colour" class="form-control" onclick="createProductSku()">
                            <option value="">Choose Colour...</option>
                            <option value="Blue">Blue</option>
                            <option value="Yellow">Yellow</option>
                            <option value="Pink">Pink</option>
                            <option value="White">white</option>
                            <option value="Green">Green</option>
                            <option value="Red">Red</option>
                            <option value="Purple">Purple</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Section</i></span>
                        </div>
                        <select name="section" id="section" class="form-control" onselect="createProductSku()" required>
                            <option value="">Select Section... (Required)</option>
                            <option value="Early Years">Early Years</option>
                            <option value="Primary">Primary</option>
                            <option value="Secondary">Secondary</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Price</i></span>
                        </div>
                        <input type="number" id="price" placeholder="Required" onkeyup="createProductSku()" name="price" class="form-control" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Quantity</i></span>
                        </div>
                        <input type="number" id="quantity" placeholder="Required" onkeyup="createProductSku()" name="quantity" class="form-control" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">SKU Pre</i></span>
                        </div>
                        <input type="text" id="productSku" name="productSku" class="form-control" required readonly>
                    </div>
                    <div id="productError" class="text-danger">

                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-default" onclick="createProducts(this.form); return false;">Add Product</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Add products Modal Ends  -->