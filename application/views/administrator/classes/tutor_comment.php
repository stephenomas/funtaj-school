<div class="row mb-4">
    <div class="col-md-12">
        <a class="btn btn-primary" href="<?= base_url('classtutor/go/' . $prefix . '/' . $digit . '/' . $groups) ?>">Back</a><br>
        <hr>
        <div class="">
            <?php
            $this->db->where('id', $student_id);
            $studentGet = $this->db->get('students');
            $student = $studentGet->first_row(); ?>
        </div>
    </div>
</div>
<br>
<hr>
<!--                Get GPA for Student-->
<?php
$this->db->where('student_id', $student->id);
$this->db->where('session', $currentSession);
$this->db->where('term', $currentTerm);
$this->db->select_avg('gp');
$gpa = $this->db->get('exam');
?>
<!--                Get Student's Average Score-->
<?php
$this->db->where('student_id', $student->id);
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
$this->db->where('student_id', $student->id);
$this->db->where('session', $currentSession);
$this->db->where('term', $currentTerm);
$examget = $this->db->get('exam');
?>
<?php
$this->db->where('student_id', $student->id);
$this->db->where('exam_name', $currentTerm.'-'.$currentSession);
$act_att = $this->db->get('class_tutor_comments_ratings');
?>
<?php
$this->db->where('tutor_id', $this->session->userdata('id'));
$this->db->where('session', $currentSession);
$this->db->where('term', $currentTerm);
$pos_att = $this->db->get('class_tutor');
?>

<div class="row mb-4">
    <div class="col-md-8">
        <div class="">
            <h5 class="text-primary">Name: <?= $student->fname . ' ' . $student->mname . ' ' . $student->lname ?></h5>
            <h6 class="text-success">Class: <?php if ($examget->num_rows() > 0) {
                    $class = $examget->first_row();

                } echo $this->uri->segment(3).' '.$this->uri->segment(4).$this->uri->segment(5); ?></h6>
            <h6>Reg No.:<?= ' ' . $student->admno . ' ' ?>| DoB:<?= ' ' . $student->dob . ' '; ?>
                | <?= $currentTerm; ?> | <?= $currentSession; ?> Session</h6>
            <h6>Class Avg: <?php foreach ($clAverage->result() as $cla) {
                    echo number_format($cla->average, 1);
                } ?> | Student Avg: <?php foreach ($stAverage->result() as $sta) {
                    echo number_format($sta->average, 1);
                } ?> | GPA: <?php foreach ($gpa->result() as $gp) {
                    echo number_format($gp->gp, 1);
                } ?></h6>
            <h6 class="text-success">Possible Attendance: <span class="text-info" id="actual_attendance"><?php if ($pos_att->num_rows() > 0) {
                        $pos = $pos_att->first_row();
                        echo $pos->possible_att;
                    } ?></span> | Actual Attendance: <span class="text-info" id="actual_attendance"><?php if ($act_att->num_rows() > 0) {
                        $att = $act_att->first_row();
                        echo $att->actual_att;
                    } ?></span></h6>
            <h6>Form Tutor: <?= $this->session->userdata('fname') . ' ' . $this->session->userdata('mname') . ' ' . $this->session->userdata('lname') ?></h6>
        </div>
    </div>
    <div class="col-md-4">
        <img src="<?= base_url($student->stu_img) ?>" style="height: 125px; width: 125px"
             class="rounded float-right">
    </div>
</div>


<table>
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Subject</th>
        <th scope="col">CA</th>
        <th scope="col">Exam</th>
        <th scope="col">Average</th>
        <th scope="col">Grade</th>
        <th scope="col">Comment</th>
    </tr>
    </thead>
    <tbody>
    <?php if ($examget->num_rows() > 0) : ?>
    <?php foreach ($examget->result() as $res) : ?>
        <tr>
            <td data-label="#"></td>
            <td data-label="Subject"><?= $res->subject_title ?></td>
            <td data-label="CA"><?= $res->ca ?></td>
            <td data-label="Exam"><?= $res->exam ?></td>
            <td data-label="Average"><?= $res->average ?></td>
            <td data-label="Grade">
                <?php if (empty($res->grade)) {
                    if ($res->average >= 90 && $res->average <= 100) {
                        $grade = 'A+';
                        $gp = 4.0;
                    } elseif ($res->average >= 75 && $res->average <= 89) {
                        $grade = 'A';
                        $gp = 4.0;
                    } elseif ($res->average >= 65 && $res->average <= 74) {
                        $grade = 'B';
                        $gp = 3.0;
                    } elseif ($res->average >= 50 && $res->average <= 64) {
                        $grade = 'C';
                        $gp = 2.0;
                    } elseif ($res->average >= 45 && $res->average <= 49) {
                        $grade = 'D';
                        $gp = 1.0;
                    } elseif ($res->average >= 40 && $res->average <= 44) {
                        $grade = 'E';
                        $gp = 0.7;
                    } elseif ($res->average < 40) {
                        $grade = 'F';
                        $gp = 0.0;
                    }else{
                        $grade = $res->grade;
                    }echo $grade;
                }else{
                    echo $res->grade;
                } ?></td>
            <td data-label="Comment"><?= $res->comment ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<p class="card text-danger" style="font-size: small">Key: A+: 90-100 | A: 75-89 | B: 65-74 | C: 50-64 | D: 45-49 | E:
    40-44 | F: 0-39</p>
<form name="commentRatings">
<?php
$this->db->where('student_id', $res->student_id);
$examname = $currentTerm . '-' . $currentSession;
$this->db->where('exam_name', $examname);
$comm_get = $this->db->get('class_tutor_comments_ratings');
$comment_ = $comm_get->first_row();
        ?>
        <div class="card ">
            <strong class="text-primary" style="font-size: large">FORM TUTOR'S COMMENT/STUDENTS ATTENDANCE:
                <div class="card-body">
                    <div class="form-group">
                        <label for="attendance" class="">Student's Attendance</label>
                        <input type="number" onkeyup="tutorCommentRatings(<?=$student->id?>)"  onchange="tutorCommentRatings(<?=$student->id?>)" class="form-control" value="<?=(empty($comment_)) ? '' : $comment_->actual_att?>" style="max-width: 12em" id="attendance" placeholder="Student's Attendance">
                    </div>
                    <div class="form-group">
                        <label for="tutor_comment" class="">Tutor's Comment</label>
                        <input type="text" onkeyup="tutorCommentRatings(<?=$student->id?>)"  onchange="tutorCommentRatings(<?=$student->id?>)" name="tutor_comment" id="tutor_comment"
                               value="<?=(empty($comment_)) ? '' : $comment_->class_tutor_comment ?>" placeholder="Tutor's Comment" class="form-control">
                    </div>
            </strong>
        </div>
        <div class="marging-top-25">
            <h6>Behavioral Analysis <span class="text-danger">(Lowest: 1, Highest: 5)</span></h6>
            <table>
                <thead>
                <tr>
                    <th scope="col">Behaviour</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Behaviour</th>
                    <th scope="col">Rating</th>
                </tr>
                </thead>
                <tbody>

                    <tr>
                        <td><?= 'Generosity' ?></td>
                        <td data-label="Rating"
                            style="max-width: 6em">
                            <input type="number" value="<?php
                            echo (empty($comment_)) ? '' : $comment_->generosity;
                            ?>" id="generosity" class="form-control" onkeyup="tutorCommentRatings(<?=$student->id?>)"  onchange="tutorCommentRatings(<?=$student->id?>)">
                        </td>
                        <td><?= 'Punctuality' ?></td>
                        <td data-label="Rating"
                            style="max-width: 6em"><input type="number" onkeyup="tutorCommentRatings(<?=$student->id?>)"  onchange="tutorCommentRatings(<?=$student->id?>)" value="<?php
                            echo (empty($comment_)) ? '' : $comment_->punctuality;
                            ?>" id="punctuality" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td><?= 'Class Attendance' ?></td>
                        <td data-label="Rating"
                            style="max-width: 6em"><input type="number" onkeyup="tutorCommentRatings(<?=$student->id?>)"  onchange="tutorCommentRatings(<?=$student->id?>)" value="<?php
                            echo (empty($comment_)) ? '' : $comment_->class_attendance;
                            ?>" id="class_attendance" class="form-control">
                        </td>
                        <td><?= 'Responsibility in Assignments' ?></td>
                        <td data-label="Rating"
                            style="max-width: 6em"><input type="number" onkeyup="tutorCommentRatings(<?=$student->id?>)"  onchange="tutorCommentRatings(<?=$student->id?>)" value="<?php
                            echo (empty($comment_)) ? '' : $comment_->responsibility;
                            ?>" id="responsibility" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td><?= 'Attentiveness' ?></td>
                        <td data-label="Rating"
                            style="max-width: 6em"><input type="number" onkeyup="tutorCommentRatings(<?=$student->id?>)"  onchange="tutorCommentRatings(<?=$student->id?>)" value="<?php
                            echo (empty($comment_)) ? '' : $comment_->attentiveness;
                            ?>" id="attentiveness" class="form-control">
                        </td>
                        <td><?= 'Initiative' ?></td>
                        <td data-label="Rating"
                            style="max-width: 6em"><input type="number" onkeyup="tutorCommentRatings(<?=$student->id?>)"  onchange="tutorCommentRatings(<?=$student->id?>)" value="<?php
                            echo (empty($comment_)) ? '' : $comment_->initiative;
                            ?>" id="initiative" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td><?= 'Neatness' ?></td>
                        <td data-label="Rating"
                            style="max-width: 6em"><input type="number" onkeyup="tutorCommentRatings(<?=$student->id?>)"  onchange="tutorCommentRatings(<?=$student->id?>)" value="<?php
                            echo (empty($comment_)) ? '' : $comment_->neatness;
                            ?>" id="neatness" class="form-control">
                        </td>
                        <td><?= 'Self Control' ?></td>
                        <td data-label="Rating"
                            style="max-width: 6em"><input type="number" onkeyup="tutorCommentRatings(<?=$student->id?>)"  onchange="tutorCommentRatings(<?=$student->id?>)" value="<?php
                            echo (empty($comment_)) ? '' : $comment_->self_control;
                            ?>" id="self_control" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td><?= 'Relationship With Staff' ?></td>
                        <td data-label="Rating"
                            style="max-width: 6em"><input type="number" onkeyup="tutorCommentRatings(<?=$student->id?>)"  onchange="tutorCommentRatings(<?=$student->id?>)" value="<?php
                            echo (empty($comment_)) ? '' : $comment_->staff_relations;
                            ?>" id="staff_relations" class="form-control">
                        </td>
                        <td><?= 'Relationship With Students' ?></td>
                        <td data-label="Rating"
                            style="max-width: 6em"><input type="number" onkeyup="tutorCommentRatings(<?=$student->id?>)"  onchange="tutorCommentRatings(<?=$student->id?>)" value="<?php
                            echo (empty($comment_)) ? '' : $comment_->students_relations;
                            ?>" id="students_relations" class="form-control">
                        </td>
                    </tr>
                </tbody>
                <form>
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
                            style="max-width: 6em">
                            <input type="number" onkeyup="tutorCommentRatings(<?=$student->id?>)"  onchange="tutorCommentRatings(<?=$student->id?>)" value="<?php
                            echo (empty($comment_)) ? '' : $comment_->merits;
                            ?>" id="merits" class="form-control">
                        </td>
                        <td colspan="1"><?= 'Demerits/Detention' ?></td>
                        <td colspan="1" data-label="No. of times occurred"
                            style="max-width: 6em">
                            <input type="number" onkeyup="tutorCommentRatings(<?=$student->id?>)"  onchange="tutorCommentRatings(<?=$student->id?>)" value="<?php
                            echo (empty($comment_)) ? '' : $comment_->demerits;
                            ?>" id="demerits" class="form-control">
                        </td>
                    </tr>
                </form>
                </tbody>
            </table>
        </div>
        <hr>
<?php endif; ?>