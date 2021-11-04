<div class="text-center" id="hiderow"><h2 class="mb-4"><?= $pageTitle ?></h2></div>
<div class="float-left"
     id="hiderow"><?= anchor('reports/student/'. $this->uri->segment(5).'/' .str_replace('/', '_', $session), '<i class="fas fa-arrow-left"></i> Back', 'class="btn btn-primary"') ?></div>
<div class="float-right" id="hiderow">
    <button class="btn btn-primary" onclick="printReport()"><i class="fas fa-print"></i> Print</button>
    <p></p>

    <script>
        function printReport() {
            window.print();
        }
    </script>
</div>

<?php
$this->db->where('session', $session);
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
<style>

</style>
<div class="row mb-4">
    <div class="col-md-12">
        <div class="wrapper">
            <!-- End Of Term -->
                <div class="text-center"><img src="<?= base_url($schoolLogo) ?>" class="rounded-circle" height="50px"
                                              width="50px">

                    <p class="">
                    <h3 class=""><?= $schoolName ?></h3>
                    <?= $schoolAddress ?>
                    <h5 class=""><?= $schoolEmail ?></h5>
                    <h6 class=""><?= $schoolPhone ?></h6>
                    </p>

                    <?php $this->db->where('id', $student_id);$checkYear = $this->db->get('students');
                        $stuYear = $checkYear->first_row();?>
                    <p class=""><h4>
                        <?php
                            echo 'Year Report';
                        ?>
                       </h4>
                    </p>
                </div>
                <!--                Get GPA for Student-->
                <?php
                $this->db->where('class_details', $class_group);
                $this->db->where('student_id', $student_id);
                $this->db->where('session', $session);
//                $this->db->where('term', $term);
                $this->db->select_avg('gp');
                $gpa = $this->db->get('exam');
                ?>
                <!--                Get Student's Average Score-->
                <?php
                $this->db->where('class_details', $class_group);
                $this->db->where('student_id', $student_id);
                $this->db->where('session', $session);
//                $this->db->where('term', $term);
                $this->db->select_avg('average');
                $stAverage = $this->db->get('exam');
                ?>
                <!--                Get Class Average-->
                <?php
                $this->db->where('class_details', $class_group);
                $this->db->where('session', $session);
//                $this->db->where('term', $term);
                $this->db->select_avg('average');
                $clAverage = $this->db->get('exam');
                ?>
                <?php
                $this->db->where('class_details', $class_group);
                $this->db->where('student_id', $student_id);
                $this->db->where('session', $session);
                $this->db->group_by('subject_title');
//                $this->db->where('term', $term);
                $examget = $this->db->get('exam');
                ?>

                <div class="">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <h4>Name: <?= $studentName ?></h4>
                            <h5 class="text-danger">Class: <?= $class_group ?></h5>
                            <h5 class="text-primary">Reg No: <?= $studentAdmno ?> | DoB: <?= $studentDOB ?>
                                | <?= $session . ' Session' ?></h5>
                            <h5>Class Avg.: <?php foreach ($clAverage->result() as $cla) {
                                    echo number_format($cla->average, 1);
                                } ?> | Student Avg.: <?php foreach ($stAverage->result() as $sta) {
                                    echo number_format($sta->average, 1);
                                } ?> | GPA: <?php foreach ($gpa->result() as $gp) {
                                    echo number_format($gp->gp, 1);
                                } ?></h5>
                        </div>
                        <div class="col-md-4">
                            <img src="<?= base_url($studentImage) ?>" style="height: 125px; width: 125px"
                                 class="rounded float-right">
                        </div>
                    </div>
                    <table class="table-striped">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="colgroup" colspan="4">Term 1</th>
                            <th scope="colgroup" colspan="4">Term 2</th>
                            <th scope="colgroup" colspan="4">Term 3</th>
                            <th scope="colgroup" colspan="2">Year</th>
                        </tr>
                        <tr>
                            <th scope="col">Subject</th>
                            <th scope="col">CA</th>
                            <th scope="col">Exam</th>
                            <th scope="col">Avg</th>
                            <th scope="col">Grade</th>
                            <th scope="col">CA</th>
                            <th scope="col">Exam</th>
                            <th scope="col">Avg</th>
                            <th scope="col">Grade</th>
                            <th scope="col">CA</th>
                            <th scope="col">Exam</th>
                            <th scope="col">Avg</th>
                            <th scope="col">Grade</th>
                            <th scope="col">Avg</th>
                            <th scope="col">Grade</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $j = 0;
                        foreach ($examget->result() as $res) : ?>
                            <?php if ($res->ca > 0) : ?>
                                <tr>
                                    <td data-label="Subject"><?= $res->subject_title ?></td>
                                    <?php
                                        $this->db->where('session', $session);
                                        $this->db->where('subject_title', $res->subject_title);
                                        $this->db->where('student_id', $student_id);
                                        $this->db->where('term', 'Term 1');
                                        $term1get = $this->db->get('exam');
                                        $tRes = $term1get->first_row();
                                        if($term1get->num_rows() > 0 && $tRes->average != null){
                                            $avg1 = $tRes->average;
                                        }else{
                                            $avg1 = 0;
                                        };
                                    ?>
                                    <?php if($term1get->num_rows() > 0) :?>
                                    <td data-label="CA"><?= ($tRes->ca != null) ? $tRes->ca : '' ?></td>
                                    <td data-label="Exam"><?= ($tRes->exam != null) ? $tRes->exam : '' ?></td>
                                    <td data-label="Avg"><?= ($tRes->average != null) ? $tRes->average : '' ?></td>
                                    <td data-label="Grade"><?php
                                        if ($tRes->grade == null) {
                                            if ($tRes->average >= 90 && $tRes->average <= 100) {
                                                $grade = 'A+';
                                                $gp = 4.0;
                                            } elseif ($tRes->average >= 75 && $tRes->average <= 89.9) {
                                                $grade = 'A';
                                                $gp = 4.0;
                                            } elseif ($tRes->average >= 65 && $tRes->average <= 74.9) {
                                                $grade = 'B';
                                                $gp = 3.0;
                                            } elseif ($tRes->average >= 50 && $tRes->average <= 64.9) {
                                                $grade = 'C';
                                                $gp = 2.0;
                                            } elseif ($tRes->average >= 45 && $tRes->average <= 49.9) {
                                                $grade = 'D';
                                                $gp = 1.0;
                                            } elseif ($tRes->average >= 40 && $tRes->average <= 44.9) {
                                                $grade = 'E';
                                                $gp = 0.7;
                                            } else {
                                                $grade = 'F';
                                                $gp = 0.0;
                                            }
                                            echo $grade;
                                        }else{
                                            echo $tRes->grade;
                                        }?></td>
                                    <?php endif;?>
                                    <?php if($term1get->num_rows() < 1) :?>
                                        <td data-label="CA"><?=' - '?></td>
                                        <td data-label="Exam"><?=' - '?></td>
                                        <td data-label="Avg"><?=' - '?></td>
                                        <td data-label="Grade"><?=' - '?></td>
                                    <?php endif;?>
<!--                                    Term 2-->
                                    <?php
                                    $this->db->where('session', $session);
                                    $this->db->where('subject_title', $res->subject_title);
                                    $this->db->where('student_id', $student_id);
                                    $this->db->where('term', 'Term 2');
                                    $term2get = $this->db->get('exam');
                                    $_Res = $term2get->first_row();
                                    if($term2get->num_rows() > 0 && $_Res->average != null){
                                        $avg2 = $_Res->average;
                                    }else{
                                        $avg2 = 0;
                                    };
                                    ?>
                                    <?php if($term2get->num_rows() > 0) :?>
                                    <td data-label="CA"><?= ($_Res->ca != null) ? $_Res->ca : ' - ' ?></td>
                                    <td data-label="Exam"><?= ($_Res->exam != null) ? $_Res->exam : ' - ' ?></td>
                                    <td data-label="Avg"><?= ($_Res->average != null) ? $_Res->average : ' - ' ?></td>
                                    <td data-label="Grade"><?php
                                        if ($_Res->grade == null) {
                                            if ($_Res->average >= 90 && $_Res->average <= 100) {
                                                $grade = 'A+';
                                                $gp = 4.0;
                                            } elseif ($_Res->average >= 75 && $_Res->average <= 89.9) {
                                                $grade = 'A';
                                                $gp = 4.0;
                                            } elseif ($_Res->average >= 65 && $_Res->average <= 74.9) {
                                                $grade = 'B';
                                                $gp = 3.0;
                                            } elseif ($_Res->average >= 50 && $_Res->average <= 64.9) {
                                                $grade = 'C';
                                                $gp = 2.0;
                                            } elseif ($_Res->average >= 45 && $_Res->average <= 49.9) {
                                                $grade = 'D';
                                                $gp = 1.0;
                                            } elseif ($_Res->average >= 40 && $_Res->average <= 44.9) {
                                                $grade = 'E';
                                                $gp = 0.7;
                                            } else {
                                                $grade = 'F';
                                                $gp = 0.0;
                                            }
                                            echo $grade;
                                        }else{
                                            echo $_Res->grade;
                                        }?></td>
                                    <?php endif;?>
                                        <?php if($term2get->num_rows() === 0) :?>
                                            <td data-label="CA"><?=' - '?></td>
                                            <td data-label="Exam"><?=' - '?></td>
                                            <td data-label="Avg"><?=' - '?></td>
                                            <td data-label="Grade"><?=' - '?></td>
                                        <?php endif;?>
<!--                                    Term 3-->
                                    <?php
                                    $this->db->where('session', $session);
                                    $this->db->where('subject_title', $res->subject_title);
                                    $this->db->where('student_id', $student_id);
                                    $this->db->where('term', 'Term 3');
                                    $term3get = $this->db->get('exam');
                                    $rRes = $term3get->first_row();
                                    if($term3get->num_rows() > 0 && $rRes->average != null){
                                        $avg3 = $rRes->average;
                                    }else{
                                        $avg3 = 0;
                                    };
                                    ?>
                                    <?php if($term3get->num_rows() > 0) :?>
                                    <td data-label="CA"><?= ($rRes->ca != null) ? $rRes->ca : '' ?></td>
                                    <td data-label="Exam"><?= ($rRes->exam != null) ? $rRes->exam : '' ?></td>
                                    <td data-label="Avg"><?= ($rRes->average != null) ? $rRes->average : '' ?></td>
                                    <td data-label="Grade"><?php
                                        if ($rRes->grade == null) {
                                            if ($rRes->average >= 90 && $rRes->average <= 100) {
                                                $grade = 'A+';
                                                $gp = 4.0;
                                            } elseif ($rRes->average >= 75 && $rRes->average <= 89.9) {
                                                $grade = 'A';
                                                $gp = 4.0;
                                            } elseif ($rRes->average >= 65 && $rRes->average <= 74.9) {
                                                $grade = 'B';
                                                $gp = 3.0;
                                            } elseif ($rRes->average >= 50 && $rRes->average <= 64.9) {
                                                $grade = 'C';
                                                $gp = 2.0;
                                            } elseif ($rRes->average >= 45 && $rRes->average <= 49.9) {
                                                $grade = 'D';
                                                $gp = 1.0;
                                            } elseif ($rRes->average >= 40 && $rRes->average <= 44.9) {
                                                $grade = 'E';
                                                $gp = 0.7;
                                            } else {
                                                $grade = 'F';
                                                $gp = 0.0;
                                            }
                                            echo $grade;
                                        }else{
                                            echo $rRes->grade;
                                        }?></td>
                                    <?php endif;?>
                                    <?php if($term3get->num_rows() < 1) :?>
                                        <td data-label="CA"><?=' - '?></td>
                                        <td data-label="Exam"><?=' - '?></td>
                                        <td data-label="Avg"><?=' - '?></td>
                                        <td data-label="Grade"><?=' - '?></td>
                                    <?php endif;?>
                                    <td data-label="Year Avg"><?php
                                        $yearAverage = 0;
                                        if($avg1 == 0 && $avg2 == 0 && $avg3 == 0){
                                            $yearAverage = '-';
                                        }
                                        if($avg1 > 0 && $avg2 == 0 && $avg3 == 0){
                                            $yearAverage = $avg1;
                                        }
                                        if($avg1 == 0 && $avg2 > 0 && $avg3 == 0){
                                            $yearAverage = $avg2;
                                        }
                                        if($avg1 == 0 && $avg2 == 0 && $avg3 > 0){
                                            $yearAverage = $avg3;
                                        }
                                        if($avg1 > 0 && $avg2 > 0 && $avg3 == 0){
                                            $yearAverage = number_format(($avg1 + $avg2) / 2, 1);
                                        }
                                        if($avg1 == 0 && $avg2 > 0 && $avg3 > 0){
                                            $yearAverage = number_format(($avg2 + $avg3) / 2, 1);
                                        }
                                        if($avg1 > 0 && $avg2 > 0 && $avg3 > 0){
                                            $yearAverage = number_format(($avg1 + $avg2 + $avg3) / 3, 1) ;
                                        }
                                        if($avg1 > 0 && $avg2 == 0 && $avg3 > 0){
                                            $yearAverage = number_format(($avg1 + $avg3) / 2, 1) ;
                                        }
                                        echo $yearAverage;?></td>
                                    <td data-label="Year Grade">
                                        <?php
                                        if ($yearAverage != null) {
                                            $grade = '';
                                            if ($yearAverage >= 90 && $yearAverage <= 100) {
                                                $grade = 'A+';
                                                $gp = 4.0;
                                            } elseif ($yearAverage >= 75 && $yearAverage <= 89.9) {
                                                $grade = 'A';
                                                $gp = 4.0;
                                            } elseif ($yearAverage >= 65 && $yearAverage <= 74.9) {
                                                $grade = 'B';
                                                $gp = 3.0;
                                            } elseif ($yearAverage >= 50 && $yearAverage <= 64.9) {
                                                $grade = 'C';
                                                $gp = 2.0;
                                            } elseif ($yearAverage >= 45 && $yearAverage <= 49.9) {
                                                $grade = 'D';
                                                $gp = 1.0;
                                            } elseif ($yearAverage >= 40 && $yearAverage <= 44.9) {
                                                $grade = 'E';
                                                $gp = 0.7;
                                            } else {
                                                $grade = 'F';
                                                $gp = 0.0;
                                            }
                                            echo $grade;
                                        }?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <p class="card text-danger" style="font-size: small">Key: A+: 90-100 | A: 75-89 | B: 65-74 | C:
                        50-64 | D: 45-49 | E: 40-44 | F: 0-39</p>

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

                    <img src="<?= base_url() . $ss->signature ?>" width="100em" height="100em" alt="school logo"><br>
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

                    <img src="<?= base_url() . $ss->signature ?>" width="100em" height="100em" alt="school logo"><br>
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

                    <img src="<?= base_url() . $ss->signature ?>" width="100em" height="100em" alt="school logo"><br>
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

                    <img src="<?= base_url() . $ss->signature ?>" width="100em" height="100em" alt="school logo"><br>
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

                    <img src="<?= base_url() . $ss->signature ?>" width="100em" height="100em" alt="school logo"><br>
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

                    <img src="<?= base_url() . $ss->signature ?>" width="100em" height="100em" alt="school logo"><br>
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
