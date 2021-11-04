<h2 class="mb-4" id="hiderow"><?= $pageTitle ?></h2>
<?php if ($this->session->userdata('role') == 'Account') : ?>
    <div class="float-left" id="hiderow"><a
                href="<?= base_url('account/students/' . $prefix . '/' . $digit . '/' . $groups) ?>"
                class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a></div>
<?php endif; ?>
<div class="float-right" id="hiderow">
    <button class="btn btn-success" onclick="printReport()"><i class="fas fa-print"></i> Print</button>

    <script>
        function printReport() {
            window.print();
        }
    </script>
</div>

<div class="text-center"><img src="<?= base_url($schoolLogo) ?>" class="rounded-circle" height="50px" width="50px">
    <p class="">
    <h3 class="text-primary"><?= $schoolName ?></h3>
    <?= $schoolAddress ?>
    <h5 class=""><?= 'funtajsch@yahoo.com' ?></h5>
    <h6 class=""><?= '08035927757' ?></h6>
    </p>

    <?php

    $_1 = 1;
    $_2 = 2;
    $_3 = 3;
    if (preg_match("/{$_1}/", $currentTerm)) {
        echo '<p><h4 class="text-danger">Term 1 Student\'s Bill</h4></p><br><br><br>';
    } elseif (preg_match("/{$_2}/", $currentTerm)) {
        echo '<p><h4 class="text-danger">Term 2 Student\'s Bill</h4></p><br><br><br>';
    } elseif (preg_match("/{$_3}/", $currentTerm)) {
        echo '<p><h4 class="text-danger">Term 3 Student\'s Bill</h4></p><br><br><br>';
    }

    ?>
</div>

<h4 class="mb-4 text-info"><?= $subTitle . ' - ' . $prefix . ' ' . $digit . $groups; ?></h4>

<div class="row mb-4">
    <div class="col-md">
        <div class="d-flex">
            <table>
                <thead>
                <tr>
                    <th scope="col">Bills</th>
                    <th scope="col">Amount</th>
                </tr>
                </thead>
                <tbody>
                <?php $this->db->where('id', $student_id);
                $stuget = $this->db->get('students');
                $student_type = $stuget->first_row();
                ?>

                <?php
                //For both student types
                $this->db->where('terms', $currentTerm);
                $this->db->where('sessions', $currentSession);
                $this->db->where('student_type', 'Both');

                if ((int)$student_type->curr_year < 4 && (int)$student_type->curr_year > 0) {
                    $this->db->where('bills', 'Tuition (Year 1-3)');
                } elseif ((int)$student_type->curr_year < 6 && (int)$student_type->curr_year > 3) {
                    $this->db->where('bills', 'Tuition (Year 4-5)');
                } elseif ((int)$student_type->curr_year == 6) {
                    $this->db->where('bills', 'Tuition (Year 6)');
                } elseif ((int)$student_type->curr_year > 6) {
                    $this->db->where('bills', 'Tuition');
                }

                $common = $this->db->get('accounts_fees');
                foreach ($common->result() as $pr) : ?>
                    <tr>
                        <td data-label="Bill"><?= $pr->bills ?></td>
                        <td data-label="Amount"><strong
                                    class="<?= ($pr->bills != 'Advance' || $pr->bills != 'Special Discounts' || $pr->bills != 'Discounts') ? 'text-danger' : 'text-success' ?>"><?= '<del>N</del><span></span>' . number_format($pr->amounts, '2') ?></strong>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <!--    GET BOARDING FEES -->
                <?php
                $this->db->where('terms', $currentTerm);
                $this->db->where('sessions', $currentSession);
                //    $this->db->where('student_type', 'Both');

                if ($student_type->student_type == 'Boarding' && $student_type->gender == 'Female') {
                    $this->db->where('bills', 'Boarding');
                    $this->db->or_where('bills', 'Boarding (Girls)');
                }
                if ($student_type->student_type == 'Boarding' && $student_type->gender == 'Male') {
                    $this->db->where('bills', 'Boarding');
                    $this->db->or_where('bills', 'Boarding (Boys)');
                }
                $get_b_fees = $this->db->get('accounts_fees');

                foreach ($get_b_fees->result() as $fee_) : ?>
                    <?php if ($student_type->student_type == 'Boarding') : ?>
                        <tr>
                            <td data-label="Bill"><?= $fee_->bills ?></td>
                            <td data-label="Amount"><strong
                                        class="<?= ($fee_->bills != 'Advance' || $fee_->bills != 'Special Discounts' || $fee_->bills != 'Discounts') ? 'text-danger' : 'text-success' ?>"><?= '<del>N</del><span></span>' . number_format($fee_->amounts, '2') ?></strong>
                            </td>
                        </tr>
                    <?php endif; endforeach; ?>

                <!--    END BOARDING FEES-->

                <?php
                $this->db->where('student_id', $student_id);
                $this->db->where('term', $currentTerm);
                $this->db->where('session', $currentSession);

                $personal = $this->db->get('accounts_students');
                foreach ($personal->result() as $pr) : ?>
                    <tr>
                        <td data-label="Bill"><?= ($pr->bills == 'Discounts' ? 'Discount Due to Covid-19' : $pr->bills) ?></td>
                        <td data-label="Amount"><strong
                                    class="<?= ($pr->bills == 'Advance' || $pr->bills == 'Special Discounts' || $pr->bills == 'Discounts') ? 'text-success' : 'text-danger' ?>"><?= ($pr->bills == 'Advance' || $pr->bills == 'Special Discounts' || $pr->bills == 'Discounts') ? '(' : '' ?><?= '<del>N</del><span></span>' . number_format($pr->amount, '2') ?><?= ($pr->bills == 'Advance' || $pr->bills == 'Special Discounts' || $pr->bills == 'Discounts') ? ')' : '' ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <!--                    Personal Sum-->
                <?php
                $this->db->where('student_id', $student_id);
                $this->db->where('term', $currentTerm);
                $this->db->where('session', $currentSession);
                $this->db->where('bills !=', 'Advance');
                $this->db->where('bills !=', 'Discounts');
                $this->db->where('bills !=', 'Special Discounts');
                $this->db->select_sum('amount');

                $personalSum = $this->db->get('accounts_students');
                foreach ($personalSum->result() as $ps) : ?>
                    <?php $personal_sum = $ps->amount; ?>
                <?php endforeach; ?>

                <?php
                $this->db->where('student_id', $student_id);
                $this->db->where('term', $currentTerm);
                $this->db->where('session', $currentSession);
                $this->db->where('bills', 'Advance');
                $this->db->select_sum('amount');

                $advanceSum = $this->db->get('accounts_students');
                foreach ($advanceSum->result() as $as) : ?>
                    <?php $advance_sum = $as->amount; ?>
                <?php endforeach; ?>

                <?php
                $this->db->where('student_id', $student_id);
                $this->db->where('term', $currentTerm);
                $this->db->where('session', $currentSession);
                $this->db->where('bills', 'Discounts');
                $this->db->select_sum('amount');

                $discountSum = $this->db->get('accounts_students');
                foreach ($discountSum->result() as $ds) : ?>
                    <?php $discount_sum = $ds->amount; ?>
                <?php endforeach; ?>

                <?php
                $this->db->where('student_id', $student_id);
                $this->db->where('term', $currentTerm);
                $this->db->where('session', $currentSession);
                $this->db->where('bills', 'Special Discounts');
                $this->db->select_sum('amount');

                $specialDiscountSum = $this->db->get('accounts_students');
                foreach ($specialDiscountSum->result() as $sds) : ?>
                    <?php $special_discount_sum = $sds->amount; ?>
                <?php endforeach; ?>

                <?php $this->db->where('id', $student_id);
                $stuget = $this->db->get('students');
                $student_type = $stuget->first_row();
                ?>

                <?php
                $this->db->where('student_type', 'Both');

                if ((int)$student_type->curr_year < 4 && (int)$student_type->curr_year > 0) {
                    $this->db->where('bills', 'Tuition (Year 1-3)');
                } elseif ((int)$student_type->curr_year < 6 && (int)$student_type->curr_year > 3) {
                    $this->db->where('bills', 'Tuition (Year 4-5)');
                } elseif ((int)$student_type->curr_year == 6) {
                    $this->db->where('bills', 'Tuition (Year 6)');
                } elseif ((int)$student_type->curr_year > 6) {
                    $this->db->where('bills', 'Tuition');
                }
                $this->db->where('terms', $currentTerm);
                $this->db->where('sessions', $currentSession);
                $this->db->select_sum('amounts');

                $commonSum = $this->db->get('accounts_fees');
                foreach ($commonSum->result() as $cs) : ?>
                    <?php $common_sum = $cs->amounts ?>
                <?php endforeach; ?>

                <!--    Get boarding fees total -->
                <?php if ($student_type->student_type == 'Boarding') : ?>

                    <?php
                    $this->db->where('terms', $currentTerm);
                    $this->db->where('sessions', $currentSession);
                    //    $this->db->where('student_type', 'Both');

                    if ($student_type->student_type == 'Boarding' && $student_type->gender == 'Female') {
                        $this->db->where('bills', 'Boarding');
                        $this->db->or_where('bills', 'Boarding (Girls)');
                    } elseif ($student_type->student_type == 'Boarding' && $student_type->gender == 'Male') {
                        $this->db->where('bills', 'Boarding');
                        $this->db->or_where('bills', 'Boarding (Boys)');
                    }
                    $this->db->select_sum('amounts');
                    $sum_b_fees = $this->db->get('accounts_fees');

                    foreach ($sum_b_fees->result() as $b_fee) : ?>

                        <?php $boarding_sum = $b_fee->amounts ?>

                    <?php endforeach; endif; ?>
                <?php if ($student_type->student_type == 'Day') : ?>
                    <?php $boarding_sum = 0 ?>
                <?php endif; ?>

                <?php if ($student_type->student_type == '') : ?>
                    <?php $boarding_sum = 0 ?>
                <?php endif; ?>

                <!--    END BOARDING FEES TOTAL-->

                <tr>
                    <td data-label="Total Payable"><?= '<strong>Total Payable</strong>' ?></td>
                    <td data-label="Amount"><strong
                                class="text-primary"><?= '<del>N</del><span></span>' . number_format($common_sum + $personal_sum + $boarding_sum - $advance_sum - $discount_sum - $special_discount_sum, '2') ?></strong>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
        <div class="text-center">
            <br><br><br><br>
            <h4 class="text-danger">Important Information</h4>
            <br>
        </div>
        <div class="">
            <Ol>
                <li><strong>BILLS SHOULD BE SETTLED THROUGH CERTIFIED BANK DRAFTS OR TRANSFER (ACCOUNT DETAIL BELOW).</strong></li>
                <li><strong>BENEFICIARY NAME - FUNTAJ INTERNATIONAL SCHOOL LTD.</strong></li>
                <li><strong>Payment due on or before <span
                                class="text-danger"><?= $payment_date ?></span></strong></li>
                <li>Parents who seek Concession for flexible payment of school fees must contact school accountant or management staff before
                    <strong><span class="text-danger"><?= $concession_date ?></span></strong>.
                    <br>
                    Request for Concession after this date may not be granted.
                </li>
                <li>Concession for flexible payment can only be granted for a maximum period of 2 weeks from date of
                    resumption.<br>
                    Failure to meet the deferment date; students/pupils or parents as the case maybe, shall forfeit all
                    rebate expected.
                </li>
                <li>Print and use bill for payment. You are expected to present this to the accountant for
                    reconciliation.
                </li>
            </Ol>
            <hr>
            <h6 class="mb-4 text-danger"> NB: cost of uniforms are not included in the bill</h6>
            <hr>
            <div class="text-center">
                <br>
                <h4 class="text-danger text-center">Account Details</h4>
                <br>
                <br>
                <?php if (base_url() == 'https://funtajschool.topleveleduapp.com/' || base_url() == 'https://funtajprimarygudu.topleveleduapp.com/') : ?>
                    <h6 class="text-primary">FCMB ACCOUNT NUMBER</h6>
                    <h5 class="text-danger">2503216031</h5>
                    <hr>
                    <h5>Call for further enquiries. Mr Momoh: <a href="tel:0803 592 7757">0803 592 7757</a></h5>
                    <span>You may pay using bank draft or direct payment into the account.</span>
                <?php endif; ?>
                <?php if (base_url() == 'https://funtajasokoro.topleveleduapp.com/') : ?>
                    <h6 class="text-primary">ZENITH BANK ACCOUNT NUMBER</h6>
                    <h5 class="text-danger">1014052892</h5>
                    <hr>
                    <h5>Call for further enquiries. Mrs Okonicha: <a href="tel:0803 330 5113">0803 330 5113</a></h5>
                    <span>You may pay using bank draft or direct payment into the account.</span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-md-2">
    </div>
</div>
<div class="fixed-bottom text-center exec">
    <h5 class="mb-4 text-info"><?= '<span class="text-danger">Account Summary for </span>' . $subTitle ?></h5>