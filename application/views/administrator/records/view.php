<div class="text-center"><h2 class="mb-4"><?=$pageTitle?></h2></div>
<?=anchor('reports/students/'.str_replace(' ', '_', $year).'/'.str_replace(' ', '_', $term).'/'.str_replace('/', '_', $session).'/'.$period, '<i class="fas fa-arrow-left"></i> Back', 'class="btn btn-primary"')?>
<?php
$this->db->where('session', $session);
$this->db->where('term', $term);
$check_approved = $this->db->get('approved_result');
foreach($check_approved->result() as $chkApprv) :
    $is_approved_midterm = $chkApprv->midterm;
    $is_approved_endofterm = $chkApprv->endofterm;
endforeach;
if($check_approved->num_rows() < 1){
    $is_approved_midterm = 0;
    $is_approved_endofterm = 0;
}
?>

<div class="row mb-4">
    <div class="col-md-12">
        <div class="">
            <!-- Mid Term -->
            <?php if($period === 'midterm') : ?>
                <div class="text-center"><img src="<?=base_url($schoolLogo)?>" class="rounded-circle" height="50px" width="50px">

                    <p class="">
                    <h3 class=""><?=$schoolName?></h3>
                    <?=$schoolAddress?>
                    <h5 class=""><?=$schoolEmail?></h5>
                    <h6 class=""><?=$schoolPhone?></h6>
                    </p>

                    <p class=""><h4><?='MidTerm Report'?></h4></p>
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
                            <?php $class_group = str_replace('_', ' ', $year);?>
                            Name: <?=$studentName?><br>
                            Class: <?=$class_group?><br>
                            Reg No: <?=$studentAdmno?> | DoB: <?=$studentDOB?> | <?=$term?> | <?=$session.' Session'?><br>
                            P.Attendance: | A.Attendance: <br>
                            Form Tutor: <?php foreach ($classTutor as $cltut) :?>
                                <?php
                                $class_details = $cltut->prefix.' '.$cltut->digit.$cltut->groups;
                                if($class_details == $class_group){
                                    $tutor_id = $cltut->tutor_id;
                                    $this->db->where('id', $tutor_id);
                                    $tut = $this->db->get('staff');
                                    $tuto_q = $tut->first_row();
                                    echo $tuto_q->fname.' '.$tuto_q->lname;
                                }
                                ?>
                            <?php endforeach;?>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="<?=base_url($studentImage)?>" style="height: 125px; width: 125px" class="rounded float-right">
                    </div>
                </div>
                        <table class="table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Achievement</th>
                                <th scope="col">Effort</th>
                                <th scope="col">Homework</th>
                                <th scope="col">Behaviour</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($midget->result() as $mid) : ?>
                                <?php if($mid->effort > 0) : ?>
                                    <tr>
                                        <td data-label="#"></td>
                                        <td data-label="Subject"><?=$mid->subject?></td>
                                        <td data-label="Achievement"><?=$mid->achievement?></td>
                                        <td data-label="Effort"><?=$mid->effort?></td>
                                        <td data-label="Homework"><?=$mid->homework?></td>
                                        <td data-label="Behaviour"><?=$mid->behaviour?></td>
                                    </tr>
                                <?php endif ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
            <?php endif;?>
            <!--  Mid Term Ends  -->

            <!-- End Of Term -->
            <?php if($period === 'endofterm') : ?>

                <div class="text-center"><img src="<?=base_url($schoolLogo)?>" class="rounded-circle" height="50px" width="50px">

                    <p class="">
                    <h3 class=""><?=$schoolName?></h3>
                    <?=$schoolAddress?>
                    <h5 class=""><?=$schoolEmail?></h5>
                    <h6 class=""><?=$schoolPhone?></h6>
                    </p>

                    <p class=""><h4><?='End Of Term Report'?></h4></p>
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
                    $this->db->where('student_id', $student_id);
                    $this->db->where('session', $session);
                    $this->db->where('term', $term);
                    $this->db->select_avg('average');
                    $stAverage = $this->db->get('exam');
                    ?>
                    <!--                Get Class Average-->
                    <?php
                    $this->db->where('session', $session);
                    $this->db->where('term', $term);
                    $this->db->select_avg('average');
                    $clAverage = $this->db->get('exam');
                    ?>
                    <?php
                    $this->db->where('student_id', $student_id);
                    $this->db->where('session', $session);
                    $this->db->where('term', $term);
                    $examget = $this->db->get('exam');
                    ?>
                    <div class="">
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <?php $class_group = str_replace('_', ' ', $year);?>
                                Name: <?=$studentName?><br>
                                Class: <?php $class = $examget->first_row(); echo $class->class_details?><br>
                                Reg No.:<?=' '.$studentAdmno.' '?>| DoB:<?=' '.$studentDOB.' ';?>| <?=$term;?> | <?=$session;?> Session<br>
                                Class Avg.: <?php foreach ($clAverage->result() as $cla){echo round($cla->average, 1);}?> | Student Avg.: <?php foreach ($stAverage->result() as $sta){echo round($sta->average, 1);}?> | GPA: <?php foreach ($gpa->result() as $gp){echo round($gp->gp, 1);}?><br>
                                P.Attendance: | A.Attendance: <br>
                                Form Tutor: <?php foreach ($classTutor as $cltut) :?>
                                    <?php
                                    $class_details = $cltut->prefix.' '.$cltut->digit.$cltut->groups;
                                    if($class_details == $class_group){
                                        $tutor_id = $cltut->tutor_id;
                                        $this->db->where('id', $tutor_id);
                                        $tut = $this->db->get('staff');
                                        $tuto_q = $tut->first_row();
                                        echo $tuto_q->fname.' '.$tuto_q->lname;
                                    }
                                    ?>
                                <?php endforeach;?><br>
                            </div>
                            <div class="col-md-4">
                                <img src="<?=base_url($studentImage)?>" style="height: 125px; width: 125px" class="rounded float-right">
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
                            <?php foreach ($examget->result() as $res) :?>
                                <tr>
                                    <td data-label="Subject"><?=$res->subject_title?></td>
                                    <td data-label="CA"><?=$res->ca?></td>
                                    <td data-label="Exam"><?=$res->exam?></td>
                                    <td data-label="Exam"><?=$res->average?></td>
                                    <td data-label="Grade"><?php if($res->grade == null){
                                            if($res->average >= 90 && $res->average <= 100){$grade = 'A+'; $gp = 4.0;
                                            }elseif ($res->average >= 75 && $res->average <= 89){$grade = 'A'; $gp = 4.0;
                                            }elseif ($res->average >= 65 && $res->average <= 74){$grade = 'B'; $gp = 3.0;
                                            }elseif ($res->average >= 50 && $res->average <= 64){$grade = 'C'; $gp = 2.0;
                                            }elseif ($res->average >= 45 && $res->average <= 49){$grade = 'D'; $gp = 1.0;
                                            }elseif ($res->average >= 40 && $res->average <= 44){$grade = 'E'; $gp = 0.7;
                                            }else{$grade = 'F'; $gp = 0.0;
                                            }
                                            echo $grade;
                                        }?></td>
                                    <td data-label="Comment"><?=$res->comment?></td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                        <p class="card text-danger" style="font-size: small">Key: A+: 90-100 | A: 75-89 | B: 65-74 | C: 50-64 | D: 45-49 | E: 40-44 | F: 0-39</p>
                        <?php
                        $this->db->where('student_id', $student_id);
                        $examname = $term.'-'.$session;
                        $this->db->where('exam_name' , $examname);
                        $comm_get = $this->db->get('class_tutor_comments_ratings');
                        if($comm_get->num_rows() > 0) :
                        foreach ($comm_get->result() as $comment_) :
                        ?>
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
                                        echo $comment_->students_relations;?>
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
                                        if($comment_->merits === '0'){
                                            echo 'none';
                                        }else{
                                            echo $comment_->merits;
                                        } ?>
                                    </td>
                                    <td colspan="1"><?= 'Demerits/Detention' ?></td>
                                    <td colspan="1" data-label="No. of times occurred"
                                        style="max-width: 4em"><?php
                                        if($comment_->demerits === '0'){
                                            echo 'none';
                                        }else{
                                            echo $comment_->demerits;
                                        } ?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <?php
                            echo '<div class="">
                           <p><strong class="card float-left text-primary" style="font-size: large">FORM TUTOR\'S COMMENT: '.$comment_->class_tutor_comment.'</strong></p>
                            </div>';
                            ?>
                            <?php endforeach;?>
                            <?php endif;?>
                        </div>
                    </div>
            <?php endif;?>
            <!--  End Of Term Ends  -->

        </div>
    </div>
</div>
