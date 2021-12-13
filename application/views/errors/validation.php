<?php if($this->session->flashdata('success')){ ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= $this->session->flashdata('success') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php } ?>

<?php if($this->session->flashdata('picerr')){ ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= $this->session->flashdata('picerr') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php } ?>
<?php if($this->session->flashdata('error')){ ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= $this->session->flashdata('error') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php } ?>
