<div class="modal fade" id="commentmodal" tabindex="-1" role="dialog" aria-labelledby="commentmodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="commentmodalTitle">Add Comment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="mb-3">
                        <select class="form-select" aria-label="select ">
                            <option selected="">Choose Category</option>
                            <option value="1">Average</option>
                            <option value="2">Constructive</option>
                            <option value="2">Excellent</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <form method="post">
                            <textarea id="elm1" name="area"></textarea>
                        </form>
                    </div>
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary">Send <i class="fab fa-telegram-plane ms-1"></i></button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>