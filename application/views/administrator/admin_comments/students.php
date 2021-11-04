<h2 class="mb-4"><?=$pageTitle?></h2>

    <h5 class="mb-4 text-info"><?=$subTitle?></h5>
    <div class="row mb-4">
        <div class="col-md-2">

            <a href="<?=base_url('headtutor')?>" class="btn-link">Back</a>

        </div>
        <div class="col-md-8">
            <div class="d-flex border">

                <table class="text-center">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Students</th>
                        <th scope="col">Average Score/Grade</th>
                        <th scope="col">Subject Count</th>
                        <th scope="col">Comment</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $this->db->where('class_prefix', $prefix);
                    $this->db->where('curr_year', $digit);
                    $this->db->where('branch', $groups);
                    $this->db->where('left_school', 0);
                    $this->db->where('has_graduated', 0);
                    $this->db->order_by('fname', 'asc');
                    $query = $this->db->get('students');
                    $i = 0;
                    foreach ($query->result() as $stu) : $i++?>
                    <tr>
                        <td data-label="#"><?=$i?></td>
                        <td data-label="Student's Name"><?='<span class="text-info">'.$stu->fname.' '.$stu->mname.' '.$stu->lname.'</span>'?></td>
                        <?php
                        $this->db->where('student_id', $stu->id);
                        $this->db->where('term', $currentTerm);
                        $this->db->where('session', $currentSession);
                        $this->db->select_avg('average');
                        $getStuAvg = $this->db->get('exam');
                        foreach ($getStuAvg->result() as $getStu) :
                            $average = $getStu->average;
                            if($average >= 90 && $average <= 100){$grade = 'A+'; $gp = 4.0;
                            }elseif ($average >= 75 && $average < 90){$grade = 'A'; $gp = 4.0;
                            }elseif ($average >= 65 && $average < 75){$grade = 'B'; $gp = 3.0;
                            }elseif ($average >= 50 && $average < 65){$grade = 'C'; $gp = 2.0;
                            }elseif ($average >= 45 && $average < 50){$grade = 'D'; $gp = 1.0;
                            }elseif ($average >= 40 && $average < 45){$grade = 'E'; $gp = 0.7;
                            }else{$grade = 'F'; $gp = 0.0;}
                        ?>
                            <td data-label="Average Score/Grade"><?php if($average > 0) : ?><?=($getStuAvg->num_rows() > 0) ? '<span class="text-danger">'.number_format($average, '1').' - '.$grade.'</span>' : ''?><?php endif;?></td>
                        <?php endforeach; ?>
                        <?php
                            $this->db->where('student_id', $stu->id);
                            $this->db->where('exam_name', $currentTerm.' - '.$currentSession);
                            $getCR = $this->db->get('head_tutor_comments_ratings');
                            $stuComment = $getCR->first_row();
                        ?>
                        <?php
                            $this->db->where('student_id', $stu->id);
                            $this->db->where('term', $currentTerm);
                            $this->db->where('session', $currentSession);
                            $subjCount = $this->db->get('exam');?>
                        <td data-label="Subject Count"><?=$subjCount->num_rows()?></td>
                        <td data-label="Comment"><form name="<?=$stu->id?>"><textarea id="htComment<?=$stu->id?>" class="form-control" onblur="headTutorComments('<?=$stu->id?>')" onmouseleave="headTutorComments('<?=$stu->id?>')" onchange="headTutorComments('<?=$stu->id?>')" placeholder="Type your comment"><?=($getCR->num_rows() > 0) ? $stuComment->head_tutor_comment : ''?></textarea></form></td>
                        <td data-label="Delete"><?=($this->session->userdata('role') === 'Admin' || $this->session->userdata('role') === 'SuperAdmin') ? anchor("headtutor/deleteHtComment/" . $stu->id.'/'.$prefix.'/'.$digit.'/'.$groups, "<i class='fa fa-trash-alt'></i>", array('onclick' => "return confirm('Do you really want to delete this comment?')", 'class' => '')) : '' ?></td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
