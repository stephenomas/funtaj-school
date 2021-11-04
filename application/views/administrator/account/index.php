<h2 class="mb-4"><?= $pageTitle ?></h2>

<div class="row mb-4">
    <div class="col-md-8">
        <h5 class="text-info">Set Tuition for Students</h5>
        <div id="error" class="text-danger"></div>
        <div class="d-flex">
            <form name="createFee" class="form-inline">
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
                <input type="hidden" id="schoolLevel" value="Primary">
<!--                <div class="form-group">-->
<!--                    <select id="schoolLevel" class="form-control" required>-->
<!--                                              <option value="">Choose School level</option>-->
<!--                        <option value="Primary">Primary</option>-->
<!--                        <option value="Secondary">Secondary</option>-->
<!--                    </select>-->
<!--                </div>&nbsp;-->
                <input type="hidden" id="studentType" value="Both">
<!--                <div class="form-group">-->
<!--                    <select title="Student Type" id="studentType" class="form-control" required>-->
<!--                        <option value="">Choose category</option>-->
<!--                        <option value="Both">Both</option>-->
<!--                        <option value="Day">Day</option>-->
<!--                        <option value="Boarding">Boarding</option>-->
<!--                    </select>-->
<!--                </div>-->

                <div class="form-group">
                    <select id="bills" class="form-control" required>
                        <option value="">Select fee</option>
                        <option value="Boarding">Boarding</option>
                        <option value="Boarding (Boys)">Boarding (Boys)</option>
                        <option value="Boarding (Girls)">Boarding (Girls)</option>
                        <option value="Tuition">Tuition</option>
                        <option value="Tuition (Year 1-3)">Tuition (Year 1 - 3)</option>
                        <option value="Tuition (Year 4-5)">Tuition (Year 4 - 5)</option>
                        <option value="Tuition (Year 6)">Tuition (Year 6)</option>
                        <!--                            <option value="Photo Album/Year Book">Photo Album/Year Book</option>-->
                        <!--                            <option value="External Exams/Extension Classes">External Exams/Extension Classes</option>-->
                        <!--                            <option value="Outstanding Payments">Outstanding Payments</option>-->
                        <!--                            <option value="Graduation">Graduation</option>-->
                        <!--                            <option value="Advance Payment">Advance Payment</option>-->
                        <!--                            <option value="Discounts">Discounts</option>-->
                    </select>
                </div>&nbsp;
                <div class="form-group">
                    <input id="amounts" type="text" class="form-control" placeholder="Amount" required>
                </div>&nbsp;<br><br>
                <div class="form-group">
                    <input type="submit" value="Add Fee" onclick="createFees(); return false;"
                           class="form-control btn btn-danger">
                </div>
            </form>

        </div>
    </div>

    <div class="col-md-4">
        <h5 class="text-info">Add Payment Deadline Dates</h5>
        <div class="d-flex">
            <form id="addPaymentDates" class="form-inline">
                <div class="form-group">
                    <label class="text-danger" for="payment_date">Payment Deadline &nbsp;</label>
                    <input id="payment_date" value="<?= (!empty($payment_dates)) ? $payment_date : '' ?>" type="date"
                           class="form-control" placeholder="Payment Date" required>
                </div>&nbsp;
                <div class="form-group">
                    <label class="text-danger" for="concession_date">Concession Deadline &nbsp;</label>
                    <input id="concession_date" value="<?= (!empty($payment_dates)) ? $concession_date : '' ?>"
                           type="date" class="form-control" placeholder="Concession Date" required>
                </div>&nbsp;<br><br>
                <div class="form-group">
                    <input type="submit" value="Add Dates" onclick="addDates(); return false;"
                           class="form-control btn btn-warning">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-8">
        <div id="fees_div"></div>
    </div>
    <div class="col-md-4">
        <table>
            <thead>
            <tr>
                <th scope="col" colspan="2" class="text-center">Class</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($classes as $class) : ?>
                <tr>
                    <td data-label="Class"><?= $class->prefix . ' ' . $class->digit . $class->groups ?></td>
                    <td data-label=""><?= anchor('account/students/' . $class->prefix . '/' . $class->digit . '/' . $class->groups, 'Enter') ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
