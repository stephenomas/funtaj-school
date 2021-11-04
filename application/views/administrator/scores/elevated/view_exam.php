<div class="text-center"><h2 class="mb-4"><?=$pageTitle?></h2></div>
<?=anchor('editreports/period/'.$student_id, '<i class="fas fa-arrow-left"></i> Back', 'class="btn btn-primary"')?>
<?php
$this->db->where('session', $currentSession);
$this->db->where('term', $currentTerm);
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
            <!-- End Of Term -->
            <?php if($period === 'endofterm') : ?>

                <div class="text-center"><img src="<?=base_url($schoolLogo)?>" class="rounded-circle" height="50px" width="50px">

                    <p class="">
                    <h3 class=""><?=$schoolName?></h3>
                    <?=$schoolAddress?>
                    <h5 class=""><?=$schoolEmail?></h5>
                    <h6 class=""><?=$schoolPhone?></h6>
                    </p>

                    <?php $this->db->where('id', $student_id);$checkYear = $this->db->get('students');
                    $stuYear = $checkYear->first_row();?>
                    <p class=""><h4>
                        <?php
                        if($currentTerm == 'Term 2' && (int)$stuYear->curr_year == 9){
                            echo 'Year 9 Mock Result';
                        }elseif($currentTerm == 'Term 2' && (int)$stuYear->curr_year == 12){
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
                    $this->db->where('session', $currentSession);
                    $this->db->where('term', $currentTerm);
                    $this->db->select_avg('gp');
                    $gpa = $this->db->get('exam');
                    ?>
                    <!--                Get Student's Average Score-->
                    <?php
                    $this->db->where('student_id', $student_id);
                    $this->db->where('session', $currentSession);
                    $this->db->where('term', $currentTerm);
                    $this->db->select_avg('average');
                    $stAverage = $this->db->get('exam');
                    ?>
                    <!--                Get Class Average-->
                    <?php
                    $this->db->where('session', $currentSession);
                    $this->db->where('term', $currentTerm);
                    $this->db->select_avg('average');
                    $clAverage = $this->db->get('exam');
                    ?>
                    <?php
                    $this->db->where('student_id', $student_id);
                    $this->db->where('session', $currentSession);
                    $this->db->where('term', $currentTerm);
                    $examget = $this->db->get('exam');
                    ?>
                    <div class="">
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <?php $class_group = $studentsClass;?>
                                Name: <?=$studentName?><br>
                                Class: <?php if(!empty($examget->first_row())){$class = $examget->first_row(); echo $class->class_details;}else{echo $studentsClass;}?><br>
                                Reg No.:<?=' '.$studentAdmno.' '?>| DoB:<?=' '.$studentDOB.' ';?>| <?=$currentTerm;?> | <?=$currentSession;?> Session<br>
                                Class Avg.: <?php foreach ($clAverage->result() as $cla){echo number_format($cla->average, 1);}?> | Student Avg.: <?php foreach ($stAverage->result() as $sta){echo number_format($sta->average, 1);}?> | GPA: <?php foreach ($gpa->result() as $gp){echo number_format($gp->gp, 1);}?><br>
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
                            <?php  $i = 0; $j = 0; foreach ($examget->result() as $res) : $i++ ?>
                            <form id="<?=$j?>">
                                <tr>
                                    <td data-label="Subject"><?=$res->subject_title?></td>
                                    <td data-label="CA"><input class="form-control" type="text" id="ca<?=$i?>" onchange="editSubjectScoreExam('<?=$student_id?>', '<?=$res->subject_title?>', '<?=$j?>', '<?=$i?>')" onmouseleave="editSubjectScoreExam('<?=$student_id?>', '<?=$res->subject_title?>', '<?=$j?>', '<?=$i?>')" onblur="editSubjectScoreExam('<?=$student_id?>', '<?=$res->subject_title?>', '<?=$j?>', '<?=$i?>')" value="<?=(int)$res->ca?>" maxlength="4" style="width: 50px"></td>
                                    <td data-label="Exam"><input class="form-control" type="text" id="exam<?=$i?>" onchange="editSubjectScoreExam('<?=$student_id?>', '<?=$res->subject_title?>', '<?=$j?>', '<?=$i?>')" onmouseleave="editSubjectScoreExam('<?=$student_id?>', '<?=$res->subject_title?>', '<?=$j?>', '<?=$i?>')" onblur="editSubjectScoreExam('<?=$student_id?>', '<?=$res->subject_title?>', '<?=$j?>', '<?=$i?>')" value="<?=(int)$res->exam?>" maxlength="4" style="width: 50px"></td>
                                    <td data-label="Average"><input class="form-control" readonly type="text" id="average<?=$i?>" value="<?=$res->average?>" maxlength="4" style="width: 50px"></td>
                                    <td data-label="Grade"><input class="form-control" readonly type="text" id="grade<?=$i?>" value="<?php if(empty($res->grade)){
                                            if($res->average >= 90 && $res->average <= 100){$grade = 'A+'; $gp = 4.0;
                                            }elseif ($res->average >= 75 && $res->average < 90){$grade = 'A'; $gp = 4.0;
                                            }elseif ($res->average >= 65 && $res->average < 75){$grade = 'B'; $gp = 3.0;
                                            }elseif ($res->average >= 50 && $res->average < 65){$grade = 'C'; $gp = 2.0;
                                            }elseif ($res->average >= 45 && $res->average < 50){$grade = 'D'; $gp = 1.0;
                                            }elseif ($res->average >= 40 && $res->average < 45){$grade = 'E'; $gp = 0.7;
                                            }else{$grade = 'F'; $gp = 0.0;
                                            }
                                            echo $grade;
                                        }else{
                                        echo $res->grade;
                                        }?>" maxlength="4" style="width: 50px"></td>
                                    <td data-label="Comment"><textarea class="form-control" id="comment<?=$i?>" onchange="editSubjectScoreExam('<?=$student_id?>', '<?=$res->subject_title?>', '<?=$j?>', '<?=$i?>')" onmouseleave="editSubjectScoreExam('<?=$student_id?>', '<?=$res->subject_title?>', '<?=$j?>', '<?=$i?>')" onblur="editSubjectScoreExam('<?=$student_id?>', '<?=$res->subject_title?>', '<?=$j?>', '<?=$i?>')"><?=$res->comment?></textarea></td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                        <p class="card text-danger" style="font-size: small">Key: A+: 90-100 | A: 75-89 | B: 65-74 | C: 50-64 | D: 45-49 | E: 40-44 | F: 0-39</p>
                        <?php
                        $this->db->where('student_id', $student_id);
                        $examname = $currentTerm.'-'.$currentSession;
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
                                        style="max-width: 4em"><input type="number" value="<?php
                                        echo $comment_->generosity;
                                        ?>" class="form-control" onkeyup="editTutorCommentRatings(<?=$comment_->student_id?>)" id="generosity" onchange="editTutorCommentRatings(<?=$comment_->student_id?>)">
                                    </td>
                                    <td><?= 'Punctuality' ?></td>
                                    <td data-label="Rating"
                                        style="max-width: 4em"><input type="number" value="<?php
                                        echo $comment_->punctuality;
                                        ?>" class="form-control" onkeyup="editTutorCommentRatings(<?=$comment_->student_id?>)" id="punctuality" onchange="editTutorCommentRatings(<?=$comment_->student_id?>)">
                                    </td>
                                </tr>
                                <tr>
                                    <td><?= 'Class Attendance' ?></td>
                                    <td data-label="Rating"
                                        style="max-width: 4em"><input type="number" value="<?php
                                        echo $comment_->class_attendance;
                                        ?>" class="form-control" onkeyup="editTutorCommentRatings(<?=$comment_->student_id?>)" id="class_attendance" onchange="editTutorCommentRatings(<?=$comment_->student_id?>)">
                                    </td>
                                    <td><?= 'Responsibility in Assignments' ?></td>
                                    <td data-label="Rating"
                                        style="max-width: 4em"><input type="number" value="<?php
                                        echo $comment_->responsibility;
                                        ?>" class="form-control" onkeyup="editTutorCommentRatings(<?=$comment_->student_id?>)" id="responsibility" onchange="editTutorCommentRatings(<?=$comment_->student_id?>)">
                                    </td>
                                </tr>
                                <tr>
                                    <td><?= 'Attentiveness' ?></td>
                                    <td data-label="Rating"
                                        style="max-width: 4em"><input type="number" value="<?php
                                        echo $comment_->attentiveness;
                                        ?>" class="form-control" onkeyup="editTutorCommentRatings(<?=$comment_->student_id?>)" id="attentiveness" onchange="editTutorCommentRatings(<?=$comment_->student_id?>)">
                                    </td>
                                    <td><?= 'Initiative' ?></td>
                                    <td data-label="Rating"
                                        style="max-width: 4em"><input type="number" value="<?php
                                        echo $comment_->initiative;
                                        ?>" class="form-control" onkeyup="editTutorCommentRatings(<?=$comment_->student_id?>)" id="initiative" onchange="editTutorCommentRatings(<?=$comment_->student_id?>)">
                                    </td>
                                </tr>
                                <tr>
                                    <td><?= 'Neatness' ?></td>
                                    <td data-label="Rating"
                                        style="max-width: 4em"><input type="number" value="<?php
                                        echo $comment_->neatness;
                                        ?>" class="form-control" onkeyup="editTutorCommentRatings(<?=$comment_->student_id?>)" id="neatness" onchange="editTutorCommentRatings(<?=$comment_->student_id?>)">
                                    </td>
                                    <td><?= 'Self Control' ?></td>
                                    <td data-label="Rating"
                                        style="max-width: 4em"><input type="number" value="<?php
                                        echo $comment_->self_control;
                                        ?>" class="form-control" onkeyup="editTutorCommentRatings(<?=$comment_->student_id?>)" id="self_control" onchange="editTutorCommentRatings(<?=$comment_->student_id?>)">
                                    </td>
                                </tr>
                                <tr>
                                    <td><?= 'Relationship With Staff' ?></td>
                                    <td data-label="Rating"
                                        style="max-width: 4em"><input type="number" value="<?php
                                        echo $comment_->staff_relations;
                                        ?>" class="form-control" onkeyup="editTutorCommentRatings(<?=$comment_->student_id?>)" id="staff_relations" onchange="editTutorCommentRatings(<?=$comment_->student_id?>)">
                                    </td>
                                    <td><?= 'Relationship With Students' ?></td>
                                    <td data-label="Rating"
                                        style="max-width: 4em"><input type="number" value="<?php
                                        echo $comment_->students_relations;
                                        ?>" class="form-control" onkeyup="editTutorCommentRatings(<?=$comment_->student_id?>)" id="students_relations" onchange="editTutorCommentRatings(<?=$comment_->student_id?>)">
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
                                        style="max-width: 4em"><input type="number" value="<?php
                                        echo (int)$comment_->merits;
                                        ?>" class="form-control" onkeyup="editTutorCommentRatings(<?=$comment_->student_id?>)" id="merits" onchange="editTutorCommentRatings(<?=$comment_->student_id?>)">
                                    </td>
                                    <td colspan="1"><?= 'Demerits/Detention' ?></td>
                                    <td colspan="1" data-label="No. of times occurred"
                                        style="max-width: 4em"><input type="number" value="<?php
                                        echo (int)$comment_->demerits;
                                        ?>" class="form-control" onkeyup="editTutorCommentRatings(<?=$comment_->student_id?>)" id="demerits" onchange="editTutorCommentRatings(<?=$comment_->student_id?>)">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <hr>
                            <form>
                                <input type="hidden" id="attendance" value="<?=$comment_->actual_att?>" onkeyup="editTutorCommentRatings(<?=$comment_->student_id?>)" onchange="editTutorCommentRatings(<?=$comment_->student_id?>)">
                            </form>
                            <div class="">
                                <strong class="card float-left text-primary" style="font-size: large">FORM TUTOR'S COMMENT</strong><br><br>
                                <input type="text" class="form-control" onblur="editTutorCommentRatings(<?=$comment_->student_id?>)" id="tutor_comment" onchange="editTutorCommentRatings(<?=$comment_->student_id?>)" value="<?=$comment_->class_tutor_comment?>">
                            </div>
                            <?php endforeach;?>
                            <?php endif;?>
                        </div>

                    </div>
            <?php endif;?>
            <!--  End Of Term Ends  -->

        </div>
    </div>
</div>
