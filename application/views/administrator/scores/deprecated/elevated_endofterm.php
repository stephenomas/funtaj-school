<div><?=anchor('scores/endofterm', '<i class="fa fa-arrow-alt-circle-left btn"></i><span class="btn">Back to subject selection</span>')?></div>
<div class="row mb-4">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
        <div class="d-flex">
            <?php if(!empty($this->uri->segment(3))) : ?>
            <?php
            $this->db->where('id', $this->uri->segment(3));
            $sub = $this->db->get('subjects');
            foreach ($sub->result() as $subs) :
            $scoreSubject = $subs->subjects;
            echo '<div><h4>Choose class to enter scores for '.'<span class="text-danger">'.strtoupper($subs->subjects).'</span>'.'</h4></div>';
            ?>
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
                                    <h4 class="modal-title w-100 font-weight-bold">Enter <span class="text-danger"><?=$scoreSubject?></span> Scores For: <span class="text-primary"><?=$cle->prefix.' '.$cle->digit.$cle->groups?></span></h4>
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
                                    <h5 class="text-center">Scroll for more students...</h5>
                                <?php endif;?>
                                <div class="modal-body mx-3">
                                    <p class="card text-danger" style="font-size: small">Key: A+: 90-100 | A: 75-89 | B: 65-74 | C: 50-64 | D: 45-49 | E: 40-44 | F: 0-39</p>
                                    <?=form_open('scores/enterEOTScores')?>
                                    <input type="hidden" name="class_details" value="<?=$classDetails?>">
                                    <input type="hidden" name="subject_title" value="<?=$scoreSubject?>">
                                    <input type="hidden" name="term" value="<?=$currentTerm?>">
                                    <input type="hidden" name="session" value="<?=$currentSession?>">
                                    <input type="hidden" name="tutor_id" value="<?=$this->session->userdata('fname').' '.$this->session->userdata('lname')?>">
                                    <input type="hidden" name="scoreUrl" value="<?='scores/'.$this->uri->segment(2).'/'.$this->uri->segment(3)?>">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Reg No</th>
                                            <th scope="col" style="width: 10px">CA%</th>
                                            <th scope="col" style="width: 10px">Exam%</th>
                                            <th scope="col">Comment</th>
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
                                            $this->db->where('subject_title', $scoreSubject);
                                            $endOfTermGet = $this->db->get('exam');
                                            ?>

                                            <input type="hidden" name="student_id[]" value="<?=(int)$stu->id?>">
                                            <tr>
                                                <td data-label="#"><?=$stuCount?></td>
                                                <td data-label="Name" class="text-info"><?=$stu->fname.' '.$stu->mname.' '.$stu->lname?></td>
                                                <td data-label="Reg No"><?=$stu->admno?></td>
                                                <td data-label="CA%" class="text-center">
                                                    <input type="text" name="ca[]" value="<?php foreach ($endOfTermGet->result() as $eotg){
                                                        echo (!empty($eotg->ca) ? $eotg->ca : ' ');}?>" class="col-sm form-control" maxlength="4" style="width: 50px">
                                                </td>
                                                <td data-label="Exam%" class="text-center">
                                                    <input type="text" name="exam[]" value="<?php foreach ($endOfTermGet->result() as $eotg){
                                                        echo (!empty($eotg->exam) ? $eotg->exam : ' ');}?>" class="col-sm form-control" maxlength="4" style="width: 50px">
                                                </td>
                                                <td data-label="Comment" class="text-center">
                                                        <textarea name="comment[]" class="form-control"><?php foreach ($endOfTermGet->result() as $eotg){
                                                                echo (!empty($eotg->comment) ? $eotg->comment : ' ');}?></textarea>
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
                </div>
            </div>
            <?php endforeach ?>

            <!--  Enter Scores Modal Ends  -->


            <?php endforeach ?>
            <?php endif;?>
        </div>
    </div>
        <div class="col-md-3">
        </div>
    </div>
