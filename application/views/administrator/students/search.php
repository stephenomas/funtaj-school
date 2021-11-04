<div class="row mb-4">
    <div class="col-md">
        <h2 class="mb-4">
            <?=$pageTitle?>
        </h2>
    </div>
    <div class="col-md float-right">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-binoculars"></i></span>
            </div>
            <input type="text" class="form-control" name="searchBox" onkeyup="searchStudents()" id="searchBox" placeholder="Search by student's name or Reg number">
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md">
        <h2 class="mb-4">
            <?=anchor(base_url('students'), 'Back', 'class="btn btn-primary"')?>
        </h2>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md">
        <div class="card">

            <div class="card">
                <div id="studentsSearchResult"></div>
            </div>
        </div>
    </div>
</div>
