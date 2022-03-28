<div class="modal fade" id="commentmodal" tabindex="-1" role="dialog" aria-labelledby="commentmodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="commentmodalTitle">Add Comment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?=site_url('/comments/addcomment')?>">

                    <div class="mb-3">
                        <select name="category_input" class="form-select" aria-label="select ">
                            <option disabled selected="">Choose Category</option>
                            <?php foreach($categories as $cat){ ?>
                            <option value="<?= $cat->categories ?>"><?= $cat->categories ?></option>
                            
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                      
                            <textarea id="elm1" name="comment_input"></textarea>
                      
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Send <i class="fab fa-telegram-plane ms-1"></i></button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>