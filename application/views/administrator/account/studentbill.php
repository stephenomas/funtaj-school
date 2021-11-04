<a class="btn btn-primary" href="<?= base_url('account/students/' . $prefix . '/' . $digit . '/' . $groups) ?>">Back</a>

<div class="text-center">
    <img data-toggle="modal"
         data-target="#viewPicture<?= $student->id ?>"
         src="<?= (empty($student->stu_img) ? base_url($student->stu_img) : base_url($student->stu_img)) ?>"
         class="rounded-circle" height="100px" width="100px">
    <br>
    <h4 class="modal-title w-100 font-weight-bold"><span class="text-primary"><?= $student->fname . ' ' ?>
            <?= $student->mname . ' ' ?><?= $student->lname . ' - ' ?></span><span
                class="text-danger"><?= '(' . $student->student_type . ' Student)' ?></span></h4>
    <?= 'Gender: ' . $student->gender ?>
</div>

<hr>

<h5 class="text-center text-danger">Bills</h5>
<hr>
<div id="errortext<?= $student->id ?>" class="text-danger"></div>
<form name="addstufee<?= $student->id ?>" class="form-inline">
    <div class="form-group">
        <select id="session" class="form-control" required>
            <option value="<?= $currentSession ?>"><?= $currentSession ?></option>
            <?php foreach ($allSessions as $sessionList) : ?>
                <option value="<?= $sessionList->sessions ?>"><?= $sessionList->sessions ?></option>
            <?php endforeach; ?>
        </select>
    </div>&nbsp;
    <div class="form-group">
        <select id="term" class="form-control" required>
            <option value="<?= $currentTerm ?>"><?= $currentTerm ?></option>
            <?php foreach ($allTerms as $termList) : ?>
                <option value="<?= $termList->terms ?>"><?= $termList->terms ?></option>
            <?php endforeach; ?>
        </select>
    </div>&nbsp;
    <div class="form-group">
        <select id="bills" class="form-control" required>
            <option value="">Select fee</option>
            <!--                                                <option value="Tuition">Tuition</option>-->
            <!--                                                <option value="Boarding">Boarding</option>-->
            <option value="Books">Books</option>
            <option value="Medical">Medical</option>
            <option value="Damages">Damages</option>
            <option value="Photo Album/Year Book">Photo Album/Year Book</option>
            <option value="External Exams/Extension Classes">External Exams/Extension Classes</option>
            <option value="Outstanding Payments">Outstanding Payments</option>
            <option value="Year 9/12">Year 9/12</option>
            <option value="Graduation">Graduation</option>
            <option value="Advance">Advance Payment</option>
            <option value="Discounts">Discount Due to Covid-19</option>
            <option value="Special Discounts">Special Discounts</option>
        </select>
    </div>
    <div class="form-group">
        <input type="number" class="form-control" id="amounts" placeholder="Amount" required>
    </div>
    <input type="hidden" id="admno" class="form-control" value="<?= $student->admno ?>" required>
    <input type="hidden" id="student_type" class="form-control" value="<?= $student->student_type ?>" required>
    <div class="form-group">
        <input type="submit" value="Add"
               onclick="createStuFees('<?= $prefix ?>', '<?= $digit ?>', '<?= $groups ?>', '<?= $student->id ?>'); return false;"
               class="form-control btn btn-outline-info">
    </div>
</form>
<div id="studentFeeList"></div>
<hr>
<ul id="fees_list<?= $student->id ?>">
    <!--    Get general fees-->
    <?php
    $this->db->where('terms', $currentTerm);
    $this->db->where('sessions', $currentSession);
    //    $this->db->where('student_type', 'Both');

    if ((int)$student->curr_year < 4 && (int)$student->curr_year > 0) {
        $this->db->where('bills', 'Tuition (Year 1-3)');
    } elseif ((int)$student->curr_year < 6 && (int)$student->curr_year > 3) {
        $this->db->where('bills', 'Tuition (Year 4-5)');
    } elseif ((int)$student->curr_year == 6) {
        $this->db->where('bills', 'Tuition (Year 6)');
    } elseif ((int)$student->curr_year > 6) {
        $this->db->where('bills', 'Tuition');
    }
    $get_fees = $this->db->get('accounts_fees');

    foreach ($get_fees->result() as $fee) : ?>
        <li>
            <span class="pull-left"> <?= $fee->bills ?></span>&nbsp;<span class="pull-right text-success"><del>N</del><span></span><?= number_format($fee->amounts, '2') ?></span>
        </li>
    <?php endforeach; ?>

    <!--    END GENERAL FEES-->

    <!--    Get boarding fees -->
    <?php
    $this->db->where('terms', $currentTerm);
    $this->db->where('sessions', $currentSession);
    //    $this->db->where('student_type', 'Both');

    if ($student->student_type == 'Boarding' && $student->gender == 'Female') {
        $this->db->where('bills', 'Boarding');
        $this->db->or_where('bills', 'Boarding (Girls)');
    }
    if ($student->student_type == 'Boarding' && $student->gender == 'Male') {
        $this->db->where('bills', 'Boarding');
        $this->db->or_where('bills', 'Boarding (Boys)');
    }
    $get_b_fees = $this->db->get('accounts_fees');

    foreach ($get_b_fees->result() as $fee_) : ?>
        <?php if ($student->student_type == 'Boarding') : ?>
            <li>
                <span class="pull-left"> <?= $fee_->bills ?></span>&nbsp;<span class="pull-right text-success"><del>N</del><span></span><?= number_format($fee_->amounts, '2') ?></span>
            </li>
        <?php endif; endforeach; ?>

    <!--    END BOARDING FEES-->

    <?php
    $this->db->where('term', $currentTerm);
    $this->db->where('session', $currentSession);
    $this->db->where('student_id', $student->id);

    $get_cust_fees = $this->db->get('accounts_students');

    foreach ($get_cust_fees->result() as $fee0) : ?>
        <li><span class="pull-left"> <?= $fee0->bills ?></span>&nbsp;<span class="pull-right text-success"><del>N</del><span></span><?= number_format($fee0->amount, '2') ?></span> <?= anchor('account/deleteStudentFee/' . $fee0->id . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $student->id, '<i class="fas fa-trash"></i>') ?>
        </li>
    <?php endforeach; ?>
</ul>
<ul>
    <?php
    $this->db->where('term', $currentTerm);
    $this->db->where('session', $currentSession);
    $this->db->where('student_id', $student->id);
    $this->db->where('bills !=', 'Advance');
    $this->db->where('bills !=', 'Discounts');
    $this->db->where('bills !=', 'Special Discounts');
    $this->db->select_sum('amount');

    $oth = $this->db->get('accounts_students');

    foreach ($oth->result() as $fees) : ?>
        <?php $personal_sum = $fees->amount ?>
    <?php endforeach; ?>

    <?php
    $this->db->where('term', $currentTerm);
    $this->db->where('session', $currentSession);
    $this->db->where('student_id', $student->id);
    $this->db->where('bills', 'Advance');
    $this->db->select_sum('amount');

    $advs = $this->db->get('accounts_students');

    foreach ($advs->result() as $adv) : ?>
        <?php $advance_sum = $adv->amount ?>
    <?php endforeach; ?>

    <?php
    $this->db->where('term', $currentTerm);
    $this->db->where('session', $currentSession);
    $this->db->where('student_id', $student->id);
    $this->db->where('bills', 'Special Discounts');
    $this->db->select_sum('amount');

    $bil = $this->db->get('accounts_students');

    foreach ($bil->result() as $spec) : ?>
        <?php $spec_disc_sum = $spec->amount ?>
    <?php endforeach; ?>

    <?php
    $this->db->where('term', $currentTerm);
    $this->db->where('session', $currentSession);
    $this->db->where('student_id', $student->id);
    $this->db->where('bills', 'Discounts');
    $this->db->select_sum('amount');

    $totalP = $this->db->get('accounts_students');

    foreach ($totalP->result() as $disc) : ?>
        <?php $disc_sum = $disc->amount ?>
    <?php endforeach; ?>

    <?php
    //    $this->db->where('student_type', 'Both');
    $this->db->where('terms', $currentTerm);
    $this->db->where('sessions', $currentSession);

    if ((int)$student->curr_year < 4 && (int)$student->curr_year > 0) {
        $this->db->where('bills', 'Tuition (Year 1-3)');
    } elseif ((int)$student->curr_year < 6 && (int)$student->curr_year > 3) {
        $this->db->where('bills', 'Tuition (Year 4-5)');
    } elseif ((int)$student->curr_year == 6) {
        $this->db->where('bills', 'Tuition (Year 6)');
    } elseif ((int)$student->curr_year > 6) {
        $this->db->where('bills', 'Tuition');
    }
    $this->db->select_sum('amounts');

    $get_fees_total = $this->db->get('accounts_fees');

    foreach ($get_fees_total->result() as $fe) : ?>
        <?php $common_sum = $fe->amounts ?>
    <?php endforeach; ?>

    <!--    Get boarding fees total -->
    <?php if ($student->student_type == 'Boarding') : ?>

        <?php
        $this->db->where('terms', $currentTerm);
        $this->db->where('sessions', $currentSession);
        //    $this->db->where('student_type', 'Both');

        if ($student->student_type == 'Boarding' && $student->gender == 'Female') {
            $this->db->where('bills', 'Boarding');
            $this->db->or_where('bills', 'Boarding (Girls)');
        } elseif ($student->student_type == 'Boarding' && $student->gender == 'Male') {
            $this->db->where('bills', 'Boarding');
            $this->db->or_where('bills', 'Boarding (Boys)');
        }
        $this->db->select_sum('amounts');
        $sum_b_fees = $this->db->get('accounts_fees');

        foreach ($sum_b_fees->result() as $b_fee) : ?>

            <?php $boarding_sum = $b_fee->amounts ?>

        <?php endforeach; endif; ?>
    <?php if ($student->student_type == 'Day') : ?>
        <?php $boarding_sum = 0 ?>
    <?php endif; ?>

    <?php if ($student->student_type == '') : ?>
        <?php $boarding_sum = 0 ?>
    <?php endif; ?>

    <!--    END BOARDING FEES TOTAL-->

    <li><span class="pull-left"> <?= 'Total = ' ?></span>&nbsp;<span class="pull-right text-success"><del>N</del><span></span><?= number_format($common_sum + $personal_sum + $boarding_sum - $advance_sum - $spec_disc_sum - $disc_sum, '2') ?></span>
    </li>

</ul>