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
                    $this->db->where('session', $currentSession);
                    $this->db->where('term', $currentTerm);
                    $this->db->order_by('subject', 'asc');
                    $midget = $this->db->get('midterm');
                    ?>
            <div class="">
                <div class="row mb-4">
                    <div class="col-md-8">
                        <div class="">
                            <?php $class_group = $studentsClass;?>
                            Name: <?=$studentName?><br>
                            Class: <?=$class_group?><br>
                            Reg No: <?=$studentAdmno?> | DoB: <?=$studentDOB?> | <?=$currentTerm?> | <?=$currentSession.' Session'?><br>
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
                                <th scope="col">Subject</th>
                                <th scope="col">Achievement</th>
                                <th scope="col">Effort</th>
                                <th scope="col">Homework</th>
                                <th scope="col">Behaviour</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; $j = 0; foreach ($midget->result() as $mid) : $i++ ?>

                                    <form id="<?=$j?>">
                                        <?php if($mid->effort > 0) : ?>
                                    <tr>
                                        <td data-label="Subject"><?=$mid->subject?></td>
                                        <td data-label="Achievement">
                                            <select id="achievement<?=$i?>" onclick="editSubjectScoreMidterm('<?=$student_id?>', '<?=$mid->subject?>', '<?=$j?>', '<?=$i?>')" onchange="editSubjectScoreMidterm('<?=$student_id?>', '<?=$mid->subject?>', '<?=$j?>', '<?=$i?>')">
                                                <option value="<?=$mid->achievement?>"><?=$mid->achievement?></option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                            </select>
                                        </td>
                                        <td data-label="Effort">
                                            <select id="effort<?=$i?>" onclick="editSubjectScoreMidterm('<?=$student_id?>', '<?=$mid->subject?>', '<?=$j?>', '<?=$i?>')" onchange="editSubjectScoreMidterm('<?=$student_id?>', '<?=$mid->subject?>', '<?=$j?>', '<?=$i?>')">
                                                <option value="<?=$mid->effort?>"><?=$mid->effort?></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                        <td data-label="Homework" onclick="editSubjectScoreMidterm('<?=$student_id?>', '<?=$mid->subject?>', '<?=$j?>', '<?=$i?>')" onchange="editSubjectScoreMidterm('<?=$student_id?>', '<?=$mid->subject?>', '<?=$j?>', '<?=$i?>')">
                                            <select id="homework<?=$i?>">
                                                <option value="<?=$mid->homework?>"><?=$mid->homework?></option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                            </select>
                                        </td>
                                        <td data-label="Behaviour" onclick="editSubjectScoreMidterm('<?=$student_id?>', '<?=$mid->subject?>', '<?=$j?>', '<?=$i?>')" onchange="editSubjectScoreMidterm('<?=$student_id?>', '<?=$mid->subject?>', '<?=$j?>', '<?=$i?>')">
                                            <select id="behaviour<?=$i?>">
                                                <option value="<?=$mid->behaviour?>"><?=$mid->behaviour?></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                    </tr>
                                <?php endif ?>
                                    </form>

                            <?php $j++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
            <?php endif;?>
            <!--  Mid Term Ends  -->

        </div>
    </div>
</div>
