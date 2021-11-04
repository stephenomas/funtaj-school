<h2 class="mb-4"><?= $pageTitle ?></h2>

<div class="row mb-4">
    <div class="col-md-2" style="margin-bottom: 5px">
        <div class="d-flex text-center">
            <?php
            $this->db->where('term', $currentTerm);
            $this->db->where('session', $currentSession);
            $getApproved = $this->db->get('approved_result')->first_row();
            if ($getApproved->midterm == 0) : ?>
                <select id="period" class="form-control" readonly onchange="getStudentsInClass()">
                    <option value="<?= 'midterm' ?>">Midterm</option>
                </select>
            <?php endif; ?>
            <?php if ($getApproved->midterm == 1) : ?>
                <select id="period" class="form-control" readonly onchange="getStudentsInClass()">
                    <option value="<?= 'endofterm' ?>">End of term</option>
                </select>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-2" style="margin-bottom: 5px">
        <div class="">
            <?php if ($classPrefix === 'Year' || $classPrefix === 'Grade') : ?>
                <input type="text" class="form-control" value="<?= $classPrefix ?>" id="prefix" readonly onchange="getStudentsInClass()">
            <?php endif; ?>
            <?php if ($classPrefix == 'Junior_Senior') : ?>
                <select id="prefix" class="form-control" onchange="getStudentsInClass()">
                    <?php foreach ($classes as $cl) : ?>
                        <option value="<?= $cl->prefix ?>"><?= $cl->prefix ?></option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-2" style="margin-bottom: 5px">
        <div class="">
            <select id="digit" class="form-control" onchange="getStudentsInClass()">
                <option value="">Choose year group</option>
                <?php foreach ($classesDigit as $cl) : ?>
                    <option value="<?= $cl->digit ?>"><?= $cl->digit ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-md-2" style="margin-bottom: 5px">
        <div class="">
            <select id="groups" class="form-control" onchange="getStudentsInClass()">
                <option value="">Choose form group</option>
                <?php foreach ($classesGroup as $cl) : ?>
                    <option value="<?= $cl->groups ?>"><?= $cl->groups ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-md-4" style="margin-bottom: 5px">
        <div class="">
            <div id="students_in_class"></div>
        </div>
    </div>
</div>

<div id="report_header"></div>

<div id="student_scores"></div>