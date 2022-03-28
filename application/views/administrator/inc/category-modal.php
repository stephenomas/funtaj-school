<div class="modal fade" id="categorymodal" tabindex="-1" role="dialog" aria-labelledby="categorymodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categorymodalTitle">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= site_url('/comments/addcategory') ?>"> 
                    <div class="mb-3">
                        <input type="text" name="category_input" class="form-control" placeholder="Category Name">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Category <i class="fab fa-telegram-plane ms-1"></i></button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>