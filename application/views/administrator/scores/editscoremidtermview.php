<div><?=anchor('scores/midtermscores/'.$subjectId, '<i class="fa fa-arrow-alt-circle-left btn"></i><span class="btn">Back to class</span>')?></div>
    <div class="row mb-4">
        <div class="col-md-1">
            <div class="d-flex">


            </div>
        </div>

        <?php $formIndex = 0;?>

        <div class="col-md-10">
            <div class="d-flex border">

                <h4 class="modal-title w-100 font-weight-bold text-center">Enter <span class="text-danger"><?=$scoreSubject?></span> Scores For: <span class="text-primary"><?=$prefix.' '.$digit.$groups?></span></h4>
            </div>
            <?php
            $this->db->where('class_prefix', $prefix);
            $this->db->where('curr_year', $digit);
            $this->db->where('branch', $groups);
            $this->db->where('left_school', 0);
            $this->db->where('has_graduated', 0);
            $stunum = $this->db->get('students');
            if($stunum->num_rows() > 12 ) :
                ?>
                <h5 class="text-center">Scroll for more students...</h5>
            <?php endif;?>
            <div class="modal-body mx-3">
                <form id="midtermform<?=$formIndex?>">
                    <input type="hidden" id="subject_title" name="subject_title" value="<?=$scoreSubject?>">
                    <input type="hidden" id="term" name="term" value="<?=$currentTerm?>">
                    <input type="hidden" id="session" name="session" value="<?=$currentSession?>">
                    <input type="hidden" id="tutor_id" name="tutor_id" value="<?=(int)$this->session->userdata('id')?>">
                    <input type="hidden" name="scoreUrl" value="<?='scores/'.$this->uri->segment(2).'/'.$this->uri->segment(3)?>">
                    <table>
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Reg No</th>
                            <th scope="col">Achievements</th>
                            <th scope="col">Efforts</th>
                            <th scope="col">HomeWork</th>
                            <th scope="col">Behaviour</th>
                            <th scope="col">Save</th>
                            <th scope="col">Clear</th>
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
                        $stuget = $this->db->get('students');
                        $stuCount = 0;
                        $recordArrayIndex = 0;
                        foreach ($stuget->result() as $stu) : $stuCount++; ?>
                            <input type="hidden" id="class_details<?=$recordArrayIndex?>" name="class_details" value="<?=$stu->class_prefix.' '.$stu->curr_year.$stu->branch?>">
                            <input type="hidden" id="student_id<?=$recordArrayIndex?>" name="student_id[]" value="<?=(int)$stu->id?>">
                            <tr>
                                <?php
                                $this->db->where('student_id', (int)$stu->id);
                                $this->db->where('subject', $scoreSubject);
                                $this->db->where('session', $currentSession);
                                $this->db->where('term', $currentTerm);
                                $midtermGet = $this->db->get('midterm');
                                $midtermData = $midtermGet->first_row();
                                ?>
                                <td data-label="#"><?=$stuCount?></td>
                                <td data-label="Name" class="text-info"><?=$stu->fname.' '.$stu->mname.' '.$stu->lname?></td>
                                <td data-label="Reg No"><?=$stu->admno?></td>
                                <td data-label="Achievement">
                                    <select id="achievement<?=$recordArrayIndex?>" name="achievement[]" required>
                                        <option value="<?=(!empty($midtermData->achievement)) ? $midtermData->achievement : ' '?>"><?=(!empty($midtermData->achievement)) ? $midtermData->achievement : ' '?></option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    </select>
                                </td>
                                <td data-label="Effort">
                                    <select id="effort<?=$recordArrayIndex?>" name="effort[]" required>
                                        <option value="<?=(!empty($midtermData->effort)) ? $midtermData->effort : ' '?>"><?=(!empty($midtermData->effort)) ? $midtermData->effort : ' '?></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </td>
                                <td data-label="HomeWork">
                                    <select id="homework<?=$recordArrayIndex?>" name="homework[]" required>
                                        <option value="<?=(!empty($midtermData->homework)) ? $midtermData->homework : ' '?>"><?=(!empty($midtermData->homework)) ? $midtermData->homework : ' '?></option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    </select>
                                </td>
                                <td data-label="Behaviour">
                                    <select id="behaviour<?=$recordArrayIndex?>" onclick="viewMidtermSaveButton('<?=$recordArrayIndex?>', '<?=$formIndex?>')" name="behaviour[]" required>
                                        <option value="<?=(!empty($midtermData->behaviour)) ? $midtermData->behaviour : ' '?>"><?=(!empty($midtermData->behaviour)) ? $midtermData->behaviour : ' '?></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </td>
                                <td data-label="Save">
                                    <button id="saveb<?=$recordArrayIndex?>" onclick="getSetMidterm('<?=$recordArrayIndex?>', '<?=$formIndex?>'); return false" class="btn btn-warning" style="visibility: hidden"><i class="fas fa-save"></i></button>
                                </td>
                                <td data-label="Clear">
                                    <button type="reset" onclick="clearMidtermScore('<?=(int)$stu->id?>', '<?=$scoreSubject?>', '<?=$recordArrayIndex?>', '<?=$formIndex?>')" class=" btn btn-dark" value="Reset">Reset</button>
                                </td>
                            </tr>
                            <?php $recordArrayIndex++ ?>
                        <?php endforeach; $formIndex++ ?>
                        </tbody>
                    </table>
                    <hr>

                </form>
            </div>
        </div>


        <!--  Enter Scores Ends  -->
        <div class="col-md-1">
            <div class="d-flex">


            </div>
        </div>
    </div>