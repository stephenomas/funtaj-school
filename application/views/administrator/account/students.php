<h2 class="mb-4"><?= $pageTitle ?></h2>
<h5 class="mb-4"><?= $subTitle ?></h5>
<a class="btn btn-primary" href="<?= base_url('account') ?>">Back</a>
<hr>
<div class="row mb-4">
    <div class="col-md">
        <div class="d-flex border">

            <table id="students">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" colspan="3">Students</th>
                    <th scope="col">School Fees Status</th>
                    <th scope="col">Student Category</th>
                    <th scope="col">Bills</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1;
                foreach ($studentsInClass as $student) : ?>
                    <tr>
                        <td data-label="#"><?= $i ?></td>
                        <td data-label="Student's Image"><img data-toggle="modal"
                                                              data-target="#viewPicture<?= $student->id ?>"
                                                              src="<?= (empty($student->stu_img) ? base_url($student->stu_img) : base_url($student->stu_img)) ?>"
                                                              class="rounded-circle" height="50px" width="50px"></td>
                        <td data-label="Reg. No"><a href="<?=base_url('account/studentbill/'.$prefix.'/'.$digit.'/'.$groups.'/'.$student->id)?>" class="btn btn-outline-info"><?= $student->admno ?></a></td>
                        <td data-label="Student"><?= $student->fname . ' ' . $student->mname . ' ' . $student->lname ?></td>
                        <td data-label="School Fees Status"><div id="feebutton<?=$student->id?>"><?=($student->has_paid_school_fees == 1) ? '<button class="btn btn-success" onclick="hasNotPaid('.$student->id.'); return false;">Paid</button>' : '<button class="btn btn-warning" onclick="hasPaid('.$student->id.'); return false;">UnPaid</button>'?></div></td>
                        <td data-label="Student Category">
                            <select id="student_type<?= $student->id ?>" class="form-control"
                                    onchange="setStudentType(<?= $student->id ?>, <?= $student->admno ?>)">
                                <option value=""><?= (empty($student->student_type) ? 'Choose Category...' : $student->student_type) ?></option>
                                <option value="Day">Day</option>
                                <option value="Boarding">Boarding</option>
                            </select>
                        </td>
                        <td data-label="Bill"><?=anchor(base_url('account/viewbill/'.$student->id), '<i class="fas fa-eye"> View</i>', ' class="btn btn-primary"')?></td>
                    </tr>


                    <!-- View Picture Modal -->


                    <div class="modal fade" id="viewPicture<?= $student->id ?>" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold"><span
                                                class="text-primary"><?= $student->fname ?>
                                            &nbsp;<?= $student->mname ?>&nbsp;<?= $student->lname ?></span></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body mx-3 text-center">
                                    <img src="<?= (empty($student->stu_img) ? base_url($student->stu_img) : base_url($student->stu_img)) ?>"
                                         class="rounded-circle" height="300em" width="300em">
                                </div>

                            </div>
                        </div>
                    </div>

                    <!--  View Picture Modal Ends  -->

                    <?php $i++;
                endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
