<div class="text-center" id="hiderow"><h2 class="mb-4"><?= $pageTitle ?></h2></div>
<div class="float-left"
     id="hiderow"><?= anchor('reports/students/' . str_replace(' ', '_', $year) . '/' . str_replace(' ', '_', $term) . '/' . str_replace('/', '_', $session) . '/' . $period, '<i class="fas fa-arrow-left"></i> Back', 'class="btn btn-primary"') ?></div>
<div class="float-right" id="hiderow">
    <button class="btn btn-primary" onclick="printReport()"><i class="fas fa-print"></i> Print</button>
    </p>

    <script>
        function printReport() {
            window.print();
        }
    </script>
</div>

<?php
$this->db->where('session', $session);
$this->db->where('term', $term);
$check_approved = $this->db->get('approved_result');
foreach ($check_approved->result() as $chkApprv) :
    $is_approved_midterm = $chkApprv->midterm;
    $is_approved_endofterm = $chkApprv->endofterm;
endforeach;
if ($check_approved->num_rows() < 1) {
    $is_approved_midterm = 0;
    $is_approved_endofterm = 0;
}
?>

<div class="row mb-4">
    <div class="col-md-12">
        <div class="">
            <!-- Mid Term -->
            <?php if ($period === 'midterm') : ?>
                <div class="text-center"><img src="<?= base_url($schoolLogo) ?>" class="rounded-circle" height="50px"
                                              width="50px">

                    <p class="">
                    <h3 class=""><?= $schoolName ?></h3>
                    <?= $schoolAddress ?>
                    <h5 class=""><?= $schoolEmail ?></h5>
                    <h6 class=""><?= $schoolPhone ?></h6>
                    </p>

                    <p class=""><h4><?= 'MidTerm Report' ?></h4></p>
                </div>
                <?php
                $this->db->where('student_id', $student_id);
                $this->db->where('session', $session);
                $this->db->where('term', $term);
                $this->db->order_by('subject', 'asc');
                $midget = $this->db->get('midterm');
                ?>
                <div class="">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <div class="">
                                <?php $class_group = str_replace('_', ' ', $year); ?>
                                <h4>Name: <?= $studentName ?></h4>
                                <h5 class="text-danger">Class: <?= $class_group ?></h5>
                                <h5 class="text-primary">Reg No: <?= $studentAdmno ?> | DoB: <?= $studentDOB ?>
                                    | <?= $term ?> | <?= $session . ' Session' ?></h5>
                                <!--                            <h6>Possible Attendance: | Actual Attendance:</h6>-->
                                <h5 class="text-secondary">Form Tutor: <?php foreach ($classTutor as $cltut) : ?>
                                        <?php
                                        $class_details = $cltut->prefix . ' ' . $cltut->digit . $cltut->groups;
                                        if ($class_details == $class_group) {
                                            $tutor_id = $cltut->tutor_id;
                                            $this->db->where('id', $tutor_id);
                                            $tut = $this->db->get('staff');
                                            $tuto_q = $tut->first_row();
                                            echo $tuto_q->fname . ' ' . $tuto_q->lname;
                                        }
                                        ?>
                                    <?php endforeach; ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="<?= base_url($studentImage) ?>" style="height: 125px; width: 125px"
                                 class="rounded float-right">
                        </div>
                    </div>
                    <table class="table-striped">
                        <thead <?php if ($midget->num_rows() > 12) {
                            echo 'style="font-size: medium"';
                        } else {
                            echo 'style="font-size: large"';
                        }
                        ?>>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Achievement</th>
                            <th scope="col">Effort</th>
                            <th scope="col">Homework</th>
                            <th scope="col">Behaviour</th>
                        </tr>
                        </thead>
                        <tbody <?php if ($midget->num_rows() > 12) {
                            echo 'style="font-size: medium"';
                        } else {
                            echo 'style="font-size: large"';
                        }
                        ?>>
                        <?php $i = 0;
                        foreach ($midget->result() as $mid) : ?>
                            <?php if ($mid->effort > 0) : $i++ ?>
                                <tr>
                                    <td data-label="#"><?= $i ?></td>
                                    <td data-label="Subject"><?= $mid->subject ?></td>
                                    <td data-label="Achievement"><?= $mid->achievement ?></td>
                                    <td data-label="Effort"><?= $mid->effort ?></td>
                                    <td data-label="Homework"><?= $mid->homework ?></td>
                                    <td data-label="Behaviour"><?= $mid->behaviour ?></td>
                                </tr>
                            <?php endif ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <p class="card text-danger" style="font-size: small">Key: (A: Excellent | 1: Highest) | (E: Poor -
                        5: Lowest) </p>
                    <?php
                    $this->db->where('student_id', $student_id);
                    $midterm_name = $term . '-' . $session;
//                    $this->db->where('midterm_name', $midterm_name);
                    $this->db->where('term', $term);
                    $this->db->where('session', $session);
                    $midterm_get = $this->db->get('midterm_class_tutor_comments');
                    if ($midterm_get->num_rows() > 0) :
                    foreach ($midterm_get->result() as $midterm_comment) :
                    ?>
                        <?php
                        if($midterm_comment->comment != null){
                            echo '<div class="">
                           <p><div class="text-danger" style="font-size: large">CLASS TUTOR\'S COMMENT: <span class="text-primary">' . $midterm_comment->comment . '</span></div></p>
                            </div>';}
                        ?>
                    <?php endforeach; endif;?>
                </div>
            <?php endif; ?>
            <!--  Mid Term Ends  -->

            <!-- End Of Term -->
            <?php if ($period === 'endofterm') : ?>

                <div class="text-center"><img src="<?= base_url($schoolLogo) ?>" class="rounded-circle" height="50px"
                                              width="50px">

                    <p class="">
                    <h3 class=""><?= $schoolName ?></h3>
                    <?= $schoolAddress ?>
                    <h5 class=""><?= $schoolEmail ?></h5>
                    <h6 class=""><?= $schoolPhone ?></h6>
                    </p>

                    <?php
                    $this->db->where('student_id', $student_id);
                    $this->db->where('session', $session);
                    $this->db->where('term', $term);
                    $checkYear = $this->db->get('exam');
                        $stuYear = $checkYear->first_row();?>
                    <p class=""><h4>
                        <?php
                        if($term == 'Term 2' && strpos($stuYear->class_details, '9')){
                            echo 'Year 9 Mock Result';
                        }elseif($term == 'Term 2' && strpos($stuYear->class_details, '12')){
                            echo 'Year 12 Mock Result';
                        }else{
                            echo 'End of Term Report';
                        }
                        ?>
                       </h4>
                    </p>
                </div>
                <!--                Get GPA for Student-->
                <?php
                $this->db->where('student_id', $student_id);
                $this->db->where('session', $session);
                $this->db->where('term', $term);
                $this->db->select_avg('gp');
                $gpa = $this->db->get('exam');
                ?>
                <!--                Get Student's Average Score-->
                <?php
                $class_group = str_replace('_', ' ', $year);
                $this->db->where('class_details', $class_group);
                $this->db->where('student_id', $student_id);
                $this->db->where('session', $session);
                $this->db->where('term', $term);
                $this->db->select_avg('average');
                $stAverage = $this->db->get('exam');
                ?>
                <!--                Get Class Average-->
                <?php
                $class_group = str_replace('_', ' ', $year);
                $this->db->where('class_details', $class_group);
                $this->db->where('session', $session);
                $this->db->where('term', $term);
                $this->db->select_avg('average');
                $clAverage = $this->db->get('exam');
                ?>
                <!--     Get Student's Scores           -->
                <?php
                $this->db->where('student_id', $student_id);
                $this->db->where('session', $session);
                $this->db->where('term', $term);
                $examget = $this->db->get('exam');
                ?>

                <?php
                $this->db->where('student_id', $student_id);
                $this->db->where('exam_name', $term . '-' . $session);
                $act_att = $this->db->get('class_tutor_comments_ratings');
                ?>
                <div class="">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <?php $class_group = str_replace('_', ' ', $year); ?>
                            <h4>Name: <?= $studentName ?></h4>
                            <h5 class="text-danger">Class: <?= $class_group ?></h5>
                            <h5 class="text-primary">Reg No: <?= $studentAdmno ?> | DoB: <?= $studentDOB ?>
                                | <?= $term ?> | <?= $session . ' Session' ?></h5>
                            <h5>Class Avg.: <?php foreach ($clAverage->result() as $cla) {
                                    echo number_format($cla->average, 1);
                                } ?> | Student Avg.: <?php foreach ($stAverage->result() as $sta) {
                                    echo number_format($sta->average, 1);
                                } ?> | GPA: <?php foreach ($gpa->result() as $gp) {
                                    echo number_format($gp->gp, 1);
                                } ?></h5>
                            <h5 class="text-secondary">Form Tutor: <?php foreach ($classTutor as $cltut) : ?>
                                    <?php
                                    $class_details = $cltut->prefix . ' ' . $cltut->digit . $cltut->groups;
                                    if ($class_details == $class_group) {
                                        $tutor_id = $cltut->tutor_id;
                                        $this->db->where('id', $tutor_id);
                                        $tut = $this->db->get('staff');
                                        $tuto_q = $tut->first_row();
                                        echo $tuto_q->fname . ' ' . $tuto_q->lname;
                                    }
                                    ?>
                                <?php endforeach; ?></h5>
                            <?php
                            $this->db->where('tutor_id', $tutor_id);
                            $this->db->where('term', $term);
                            $this->db->where('session', $session);
                            $pos_att = $this->db->get('class_tutor');
                            ?>
                            <h6>Possible Attendance: <span class="text-info"
                                                           id="actual_attendance"><?php if ($pos_att->num_rows() > 0) {
                                        $pos = $pos_att->first_row();
                                        echo $pos->possible_att;
                                    } ?></span> | Actual Attendance: <span class="text-info"
                                                                           id="actual_attendance"><?php if ($act_att->num_rows() > 0) {
                                        $att = $act_att->first_row();
                                        echo $att->actual_att;
                                    } ?></span></h6>
                        </div>
                        <div class="col-md-4">
                            <img src="<?= base_url($studentImage) ?>" style="height: 125px; width: 125px"
                                 class="rounded float-right">
                        </div>
                    </div>
                    <table class="table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Subject</th>
                            <th scope="col">CA</th>
                            <th scope="col">Exam</th>
                            <th scope="col">Average</th>
                            <th scope="col">Grade</th>
                            <th scope="col">Comment</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $j = 0;
                        foreach ($examget->result() as $res) : ?>
                            <?php if ($res->ca > 0) : ?>
                                <tr>
                                    <td data-label="Subject"><?= $res->subject_title ?></td>
                                    <td data-label="CA"><?= $res->ca ?></td>
                                    <td data-label="Exam"><?= $res->exam ?></td>
                                    <td data-label="Avg"><?= $res->average ?></td>
                                    <td data-label="Grade"><?php if ($res->grade == null) {
                                            if ($res->average >= 90 && $res->average <= 100) {
                                                $grade = 'A+';
                                                $gp = 4.0;
                                            } elseif ($res->average >= 75 && $res->average <= 89.9) {
                                                $grade = 'A';
                                                $gp = 4.0;
                                            } elseif ($res->average >= 65 && $res->average <= 74.9) {
                                                $grade = 'B';
                                                $gp = 3.0;
                                            } elseif ($res->average >= 50 && $res->average <= 64.9) {
                                                $grade = 'C';
                                                $gp = 2.0;
                                            } elseif ($res->average >= 45 && $res->average <= 49.9) {
                                                $grade = 'D';
                                                $gp = 1.0;
                                            } elseif ($res->average >= 40 && $res->average <= 44.9) {
                                                $grade = 'E';
                                                $gp = 0.7;
                                            } else {
                                                $grade = 'F';
                                                $gp = 0.0;
                                            }
                                            echo $grade;
                                        }else{
                                            echo $res->grade;
                                        } ?></td>
                                    <td data-label="Comment"><?= $res->comment ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <p class="card text-danger" style="font-size: small">Key: A+: 90-100 | A: 75-89 | B: 65-74 | C:
                        50-64 | D: 45-49 | E: 40-44 | F: 0-39</p>
                    <?php
                    $this->db->where('student_id', $student_id);
                    $examname = $term . '-' . $session;
                    $this->db->where('exam_name', $examname);
                    $comm_get = $this->db->get('class_tutor_comments_ratings');
                    if ($comm_get->num_rows() > 0) :
                    foreach ($comm_get->result() as $comment_) :
                    ?>
                    <?php if ($comment_->generosity > 0) : ?>
                    <div class="marging-top-25">
                        <h6>Behavioral Analysis <span class="text-danger">(Lowest: 1, Highest: 5)</span></h6>
                        <table>
                            <thead>

                            </thead>
                            <tbody>
                            <tr>
                                <th scope="col">Behaviour</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Behaviour</th>
                                <th scope="col">Rating</th>
                            </tr>
                            <tr>
                                <td><?= 'Generosity' ?></td>
                                <td data-label="Rating"
                                    style="max-width: 4em"><?php
                                    echo $comment_->generosity;
                                    ?>
                                </td>
                                <td><?= 'Punctuality' ?></td>
                                <td data-label="Rating"
                                    style="max-width: 4em"><?php
                                    echo $comment_->punctuality;
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= 'Class Attendance' ?></td>
                                <td data-label="Rating"
                                    style="max-width: 4em"><?php
                                    echo $comment_->class_attendance;
                                    ?>
                                </td>
                                <td><?= 'Responsibility in Assignments' ?></td>
                                <td data-label="Rating"
                                    style="max-width: 4em"><?php
                                    echo $comment_->responsibility;
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= 'Attentiveness' ?></td>
                                <td data-label="Rating"
                                    style="max-width: 4em"><?php
                                    echo $comment_->attentiveness;
                                    ?>
                                </td>
                                <td><?= 'Initiative' ?></td>
                                <td data-label="Rating"
                                    style="max-width: 4em"><?php
                                    echo $comment_->initiative;
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= 'Neatness' ?></td>
                                <td data-label="Rating"
                                    style="max-width: 4em"><?php
                                    echo $comment_->neatness;
                                    ?>
                                </td>
                                <td><?= 'Self Control' ?></td>
                                <td data-label="Rating"
                                    style="max-width: 4em"><?php
                                    echo $comment_->self_control;
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= 'Relationship With Staff' ?></td>
                                <td data-label="Rating"
                                    style="max-width: 4em"><?php
                                    echo $comment_->staff_relations;
                                    ?>
                                </td>
                                <td><?= 'Relationship With Students' ?></td>
                                <td data-label="Rating"
                                    style="max-width: 4em"><?php
                                    echo $comment_->students_relations; ?>
                                </td>
                            </tr>
                            </tbody>
                            <tbody>
                            <tr>
                                <th scope="col" colspan="4" class="text-center">Merits/Demerits or Detention</th>
                            </tr>
                            <tr>
                                <th scope="col" colspan="1">Event</th>
                                <th scope="col" colspan="1">Number of occurrences</th>
                                <th scope="col" colspan="1">Event</th>
                                <th scope="col" colspan="1">Number of occurrences</th>
                            </tr>
                            <tr>
                                <td colspan="1"><?= 'Merits' ?></td>
                                <td colspan="1" data-label="No. of times occurred"
                                    style="max-width: 4em"><?php
                                    if ($comment_->merits === '0') {
                                        echo 'none';
                                    } else {
                                        echo $comment_->merits;
                                    } ?>
                                </td>
                                <td colspan="1"><?= 'Demerits/Detention' ?></td>
                                <td colspan="1" data-label="No. of times occurred"
                                    style="max-width: 4em"><?php
                                    if ($comment_->demerits === '0') {
                                        echo 'none';
                                    } else {
                                        echo $comment_->demerits;
                                    } ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <?php endif;
                        ?>
                        <?php
                        if($comment_->class_tutor_comment != null){
                        echo '<div class="">
                           <p><div class="text-danger" style="font-size: large">CLASS TUTOR\'S COMMENT: <span class="text-primary">' . $comment_->class_tutor_comment . '</span></div></p>
                            </div>';}
                        ?>
                        <?php endforeach;
                        ?>
                        <?php endif; ?>
                        <?php
                        $this->db->where('student_id', $student_id);
                        $this->db->where('exam_name', $currentTerm.' - '.$currentSession);
                        $getHtComment = $this->db->get('head_tutor_comments_ratings');
                        if($getHtComment->num_rows() > 0) :
                            $htComment = $getHtComment->first_row();
                        echo '<div class="">
                           <p><div class="text-danger" style="font-size: large">HEAD TUTOR\'S COMMENT: <span class="text-primary">' . $htComment->head_tutor_comment . '</span></div></p>
                            </div>';
                        endif;
                        ?>
                    </div>
            <?php endif; ?>
            <!--  End Of Term Ends  -->

        </div>
    </div>
</div>
<div>

    <?php $this->db->where('id', $student_id);
    $student_query = $this->db->get('students');
    $student_class = $student_query->first_row();
    ?>

    <div class="container text-center exec">
        <!--        Grade or Year style-->
        <?php if ($classPrefix == 'Grade' || $classPrefix == 'Year') : ?>
            <!--Check if class is secondary-->
            <?php if ((int)$student_class->curr_year > 6) : ?>
                <?php $sfs = $this->db->get('signature_for_secondary');
                $sgs = $sfs->first_row();
                if ($sgs->principals == '1') : ?>
                    <!--Get the signature-->
                    <?php $this->db->where('position', 'Principal');
                    $signStatus = $this->db->get('signatures');
                    $ss = $signStatus->first_row(); ?>

                    <img src="<?= base_url() . $ss->signature ?>" width="100em" height="100em" alt="Signed"><br>
                    <h5><?= $ss->full_name ?></h5>
                    <p><?= $ss->position ?></p>
                    <!--End if it's principals signature-->
                <?php endif; ?>
                <!--            Check if it's vp (Principal not selected)-->
                <?php if ($sgs->principals == '0') : ?>
                    <!--Get the signature-->
                    <?php $this->db->where('position', 'Vice Principal');
                    $signStatus = $this->db->get('signatures');
                    $ss = $signStatus->first_row(); ?>

                    <img src="<?= base_url() . $ss->signature ?>" width="100em" height="100em" alt="Signed"><br>
                    <h5><?= $ss->full_name ?></h5>
                    <p><?= $ss->position ?></p>
                    <!--End if it's principals signature-->
                <?php endif; ?>
                <!--                End if student's class is greater than Year 6-->
            <?php endif; ?>
            <!--Check if class is primary-->
            <?php if ((int)$student_class->curr_year < 7) : ?>
                <?php $sfs = $this->db->get('signature_for_reports');
                $sgs = $sfs->first_row();
                if ($sgs->name == '1') : ?>
                    <!--Get the signature-->
                    <?php $this->db->where('position', 'Head Teacher');
                    $signStatus = $this->db->get('signatures');
                    $ss = $signStatus->first_row(); ?>

                    <img src="<?= base_url() . $ss->signature ?>" width="100em" height="100em" alt="Signed"><br>
                    <h5><?= $ss->full_name ?></h5>
                    <p><?= $ss->position ?></p>
                    <!--End if it's headteachers signature-->
                <?php endif; ?>
                <!--            Check if it's deputy headteacher (Headteacher not selected)-->
                <?php if ($sgs->name == '0') : ?>
                    <!--Get the signature-->
                    <?php $this->db->where('position', 'Asst. Head Teacher');
                    $signStatus = $this->db->get('signatures');
                    $ss = $signStatus->first_row(); ?>

                    <img src="<?= base_url() . $ss->signature ?>" width="100em" height="100em" alt="Signed"><br>
                    <h5><?= $ss->full_name ?></h5>
                    <p><?= $ss->position ?></p>
                    <!--End if it's deputy head teacher signature-->
                <?php endif; ?>
                <!--                End if student's class is less than Year t-->
            <?php endif; ?>
            <!--        End of if Grade or Year style    -->
        <?php endif; ?>


<!--      If class style  Junior/Senior-->
        <?php if ($classPrefix == 'Junior_Senior') : ?>
            <!--Check if class is secondary or primary-->
            <?php if ($student_class->class_prefix == 'JSS' || $student_class->class_prefix == 'SS') : ?>
                <?php $sfs = $this->db->get('signature_for_secondary');
                $sgs = $sfs->first_row();
                if ($sgs->principals == '1') : ?>
                    <!--Get the signature-->
                    <?php $this->db->where('position', 'Principal');
                    $signStatus = $this->db->get('signatures');
                    $ss = $signStatus->first_row(); ?>

                    <img src="<?= base_url() . $ss->signature ?>" width="100em" height="100em" alt="Signed"><br>
                    <h5><?= $ss->full_name ?></h5>
                    <p><?= $ss->position ?></p>
                    <!--End if it's principals signature-->
                <?php endif; ?>
                <!--            Check if it's vp (Principal not selected)-->
                <?php if ($sgs->principals == '0') : ?>
                    <!--Get the signature-->
                    <?php $this->db->where('position', 'Vice Principal');
                    $signStatus = $this->db->get('signatures');
                    $ss = $signStatus->first_row(); ?>

                    <img src="<?= base_url() . $ss->signature ?>" width="100em" height="100em" alt="Signed"><br>
                    <h5><?= $ss->full_name ?></h5>
                    <p><?= $ss->position ?></p>
                    <!--End if it's principals signature-->
                <?php endif; ?>
                <!--                End if student's class is Junior->

            <?php endif; ?>
            <!--        End of if Junior Senior Style    -->
        <?php endif; ?>
    </div>
</div>
