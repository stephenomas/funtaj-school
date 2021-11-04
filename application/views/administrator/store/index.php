<div class="row mb-4">
    <div class="col-md-12">
        <div class="float-left"><h2><?= $pageTitle ?></h2></div>
        <div class="float-right"><a href="" data-toggle="modal" onclick="viewCart(<?= $this->session->userdata('id') ?>)" data-target="#cartView">Cart <i
                        class="fas fa-shopping-cart"></i><span id="itemCount" class="badge badge-pill bg-light align-text-bottom text-success"></span></a>
        </div>
    </div>
    <br>
</div>

<!-- Cart Modal -->

<div class="modal fade" id="cartView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">My Cart</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" onclick="">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div id="my_cart"></div>
            </div>

        </div>
    </div>
</div>

<!-- Cart Modal Ends  -->

<div class="row mb-4">
    <div class="col-md-12">
        <div class="d-flex">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-success">Products</h4>
                    <div class="col-md-12" id="products"></div>
                </div>
            </div>
        </div>
    </div>
</div>