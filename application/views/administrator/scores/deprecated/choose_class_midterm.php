<div><?=anchor('scores/midterm', '<i class="fa fa-arrow-alt-circle-left btn"></i><span class="btn">Back to subject selection</span>')?></div>

<div class="row mb-4">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <div class="row mb-4">
                <div class="col-md">
                    <div class="d-flex">
                        <?php if(!empty($this->uri->segment(3))) : ?>
                        <?php
                        $this->db->where('id', $this->uri->segment(3));
                        $sub = $this->db->get('tutor_subjects');
                        foreach ($sub->result() as $subs) :
                        $tutor_sub = $subs->subject_title;
                        echo '<div><h4>Choose class to enter scores for '.'<span class="text-danger">'.strtoupper($subs->subject_title).'</span>'.'</h4></div>';
                        ?>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md">
                    <div class="d-flex">
                        <div class="table">
                            <table>
                                <thead>
                                <tr>
                                    <th scope="col">Class</th>
                                    <th scope="col">Go</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($classes as $cl) : ?>

                                    <tr>
                                        <td data-label="Class" class="text-info"><?=$cl->prefix.' '.$cl->digit.$cl->groups?></td>
                                        <td data-label=""><button class="btn btn-primary" data-toggle="modal" data-target="#enterScores<?=$cl->id?>">Enter Scores</button></td>
                                    </tr>

                                <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>


                        <!-- Enter Scores Modal -->

                        <?php foreach($classes as $cle) : ?>
                            <?php $classDetails = $cle->prefix.' '.$cle->digit.$cle->groups?>
                            <div class="modal fade" id="enterScores<?=$cle->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Enter <span class="text-danger"><?=$tutor_sub?></span> Scores For: <span class="text-primary"><?=$cle->prefix.' '.$cle->digit.$cle->groups?></span></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?php
                                        $this->db->where('class_prefix', $cle->prefix);
                                        $this->db->where('curr_year', $cle->digit);
                                        $this->db->where('branch', $cle->groups);
                                        $this->db->where('left_school', 0);
                                        $this->db->where('has_graduated', 0);
                                        $stunum = $this->db->get('students');
                                        if($stunum->num_rows() > 12 ) :
                                            ?>
                                            <h5 class="text-center">Scroll for more students</h5>
                                        <?php endif;?>
                                        <div class="modal-body mx-3">
                                            <p class="card text-danger" style="font-size: small">Key: (A: Excellent | 1: Highest) | (E: Poor - 5: Lowest) </p>
                                            <?=form_open('scores/enterMTScores')?>
                                            <input type="hidden" name="class_details" value="<?=$classDetails?>">
                                            <input type="hidden" name="subject" value="<?=$tutor_sub?>">
                                            <input type="hidden" name="term" value="<?=$currentTerm?>">
                                            <input type="hidden" name="session" value="<?=$currentSession?>">
                                            <input type="hidden" name="tutor_id" value="<?=(int)$this->session->userdata('id')?>">
                                            <input type="hidden" name="scoreUrl" value="<?='scores/'.$this->uri->segment(2).'/'.$this->uri->segment(3)?>">

                                            <table>
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Reg No</th>
                                                    <th scope="col">Dob</th>
                                                    <th scope="col">Achievements</th>
                                                    <th scope="col">Efforts</th>
                                                    <th scope="col">HomeWork</th>
                                                    <th scope="col">Behaviour</th>
                                                    <th scope="col">Clear</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $this->db->where('class_prefix', $cle->prefix);
                                                $this->db->where('curr_year', $cle->digit);
                                                $this->db->where('branch', $cle->groups);
                                                $this->db->where('left_school', 0);
                                                $this->db->where('has_graduated', 0);
                                                $this->db->order_by('fname', 'asc');
                                                $stuget = $this->db->get('students');
                                                $stuCount = 0;
                                                foreach ($stuget->result() as $stu) : $stuCount++; ?>
                                                    <?php
                                                    $this->db->where('student_id', $stu->id);
                                                    $this->db->where('term', $currentTerm);
                                                    $this->db->where('session', $currentSession);
                                                    $this->db->where('subject', $tutor_sub);
                                                    $midTermGet = $this->db->get('midterm');
                                                    ?>

                                                    <input type="hidden" name="student_id[]" value="<?=(int)$stu->id?>">
                                                    <tr>
                                                        <td data-label="#"><?=$stuCount?></td>
                                                        <td data-label="Name" class="text-info"><?=$stu->fname.' '.$stu->mname.' '.$stu->lname?></td>
                                                        <td data-label="Reg No"><?=$stu->admno?></td>
                                                        <td data-label="DOB"><?=$stu->dob?></td>
                                                        <td data-label="Achievement" class="text-center">
                                                            <select id="achievement" name="achievement[]">
                                                                <option value="<?php foreach ($midTermGet->result() as $mtg){
                                                                    echo (!empty($mtg->achievement) ? $mtg->achievement : '');}?>"><?php foreach ($midTermGet->result() as $mtg){
                                                                        echo (!empty($mtg->achievement) ? $mtg->achievement : '');}?></option>
                                                                <option value="A">A</option>
                                                                <option value="B">B</option>
                                                                <option value="C">C</option>
                                                                <option value="D">D</option>
                                                                <option value="E">E</option>
                                                            </select>
                                                        </td>
                                                        <td data-label="Effort" class="text-center">
                                                            <select id="effort" name="effort[]">
                                                                <option value="<?php foreach ($midTermGet->result() as $mtg){
                                                                    echo (!empty($mtg->effort) ? $mtg->effort : '');}?>"><?php foreach ($midTermGet->result() as $mtg){
                                                                        echo (!empty($mtg->effort) ? $mtg->effort : '');}?></option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </td>
                                                        <td data-label="HomeWork" class="text-center">
                                                            <select id="homework" name="homework[]">
                                                                <option value="<?php foreach ($midTermGet->result() as $mtg){
                                                                    echo (!empty($mtg->homework) ? $mtg->homework : '');}?>"><?php foreach ($midTermGet->result() as $mtg){
                                                                        echo (!empty($mtg->homework) ? $mtg->homework : '');}?></option>
                                                                <option value="A">A</option>
                                                                <option value="B">B</option>
                                                                <option value="C">C</option>
                                                                <option value="D">D</option>
                                                                <option value="E">E</option>
                                                            </select>
                                                        </td>
                                                        <td data-label="Behaviour" class="text-center">
                                                            <select id="behaviour" name="behaviour[]">
                                                                <option value="<?php foreach ($midTermGet->result() as $mtg){
                                                                    echo (!empty($mtg->behaviour) ? $mtg->behaviour : '');}?>"><?php foreach ($midTermGet->result() as $mtg){
                                                                        echo (!empty($mtg->behaviour) ? $mtg->behaviour : '');}?></option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </td>
                                                        <td data-label="Clear" class="text-center">
                                                            <button type="reset" onclick="clearMidtermScore('<?=(int)$stu->id?>', '<?=$tutor_sub?>')" class=" btn btn-outline-dark" value="Reset">Reset</button>
                                                        </td>
                                                    </tr>

                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                            <hr>
                                            <div class="text-center">
                                                <input type="submit" value="Submit Scores" class="btn btn-success">
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>

                        <!--  Enter Scores Modal Ends  -->


                        <?php endforeach ?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">

        </div>
    </div>
