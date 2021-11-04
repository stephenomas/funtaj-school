<h2 class="mb-4"><?=$pageTitle?></h2>
<style>
    .tooltip{
        display: inline;
        position: relative;
        text-decoration-color: #0A7EC5;
    }

    .tooltip:hover:after{
        background: #333;
        background: rgba(0,0,0,.8);
        border-radius: 5px;
        bottom: 26px;
        color: #fff;
        content: attr(title);
        left: 20%;
        padding: 5px 15px;
        position: absolute;
        z-index: 98;
        width: 220px;
    }
</style>
<?php if($this->session->userdata('Elevated')) : ?>
<div class="row mb-4">
    <div class="col-md-4">
        <div class="d-flex">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-info">Upload Subject Assignment</h5>
                    <h2><?php echo CI_VESRSION; ?></h2>
                    <h6>Allowed types: <span class="text-danger">PDF, JPEG, TXT, GIF, JPG, PNG</span></h6>
                    <?=form_open_multipart('assignments/uploadAssignment')?>
                    <input type="hidden" name="term" value="<?=$currentTerm?>">
                    <input type="hidden" name="session" value="<?=$currentSession?>">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Assignment title</i></span>
                        </div>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter assignment title or file name..." required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Subject</i></span>
                        </div>
                        <select name="subject" class="form-control" id="subject" required>
                            <option value="">Choose your subject...</option>
                            <?php foreach ($subjects as $subject) : ?>
                                <option value="<?=$subject->subjects?>"><?=$subject->subjects?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <?php if($classPrefix == 'Year' || $classPrefix == 'Grade') : ?>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="">Class prefix</i></span>
                            </div>
                            <input type="text" class="form-control" value="<?=$classPrefix?>" name="prefix" id="prefix" readonly>
                        </div>
                    <?php endif; ?>
                    <?php if($classPrefix == 'Junior_Senior') : ?>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="">Class prefix</i></span>
                            </div>
                            <select name="prefix" class="form-control" id="prefix" required>
                                <option value="">Choose class prefix...</option>
                                <?php foreach ($classesPrefix as $pr) : ?>
                                    <option value="<?=$pr->prefix?>"><?=$pr->prefix?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Classes</i></span>
                        </div>
                        <select name="digit" class="form-control" id="digit" required>
                            <option value="">Choose class...</option>
                            <?php foreach ($classesDigit as $cl) : ?>
                                <option value="<?=$cl->digit?>"><?=$cl->digit?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Start Date</i></span>
                        </div>
                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">End Date</i></span>
                        </div>
                        <input type="date" name="end_date" id="end_date" class="form-control" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Upload File</i></span>
                        </div>
                        <input type="file" name="userfile" id="userfile" class="form-control" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="submit" id="submit" value="Upload" class="form-control btn btn-primary" >
                    </div>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <h6 class="text-danger">All Assignments</h6>
        <div class="d-flex">


                    <table class="table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Assignment title</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Tutor</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Class</th>
                            <th scope="col">View</th>
                            <?php if($this->session->userdata('Elevated')){
                                echo '<th scope="col">Delete</th>';
                            }?>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $count = 0; foreach ($allAssignments as $assignment) : $count++ ?>
                            <tr>
                                <td data-label="#"><?=$count?></td>
                                <td data-label="Assignment Title"><?=$assignment->assignment_title?></td>
                                <td data-label="Start Date"><?=$assignment->start_date?></td>
                                <td data-label="End Date"><?=$assignment->end_date?></td>
                                <td data-label="Tutor"><span class="text-danger text-center"><?php
                                    $this->db->where('id', $assignment->staff_id);
                                    $staffGet = $this->db->get('staff');
                                    foreach($staffGet->result() as $staff) :
                                        $staffName = $staff->fname.' '.$staff->lname;?><?=$staffName?></span>
                                        <?php endforeach;?>
                                </td>

                                <td data-label="Subject"><?=$assignment->subject?></td>
                                <td data-label="Class"><?=$assignment->prefix.' '.$assignment->digit?></td>
                                <td data-label="View"><?=anchor('assignments/viewAssignment/'.$assignment->id, '<i class="fa fa-eye"></i>', 'class="btn btn-outline-primary"')?></td>
                                <?php if($this->session->userdata('Elevated')){
                                    echo '<td data-label="Delete Assignment">'.anchor("assignments/deleteAssignment/" . $assignment->id, "<i class='fa fa-trash-alt'></i>", array('onclick' => "return confirm('Do you really want to delete this assignment?')", 'class' => " ")).'</td>';
                                }?>
                            </tr>
                        <?php endforeach;?>

                        </tbody>
                    </table>
                </div>

    </div>
</div>
<?php endif; ?>
<?php if($this->session->userdata('role') == 'Tutor') : ?>
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="d-flex">
                <div class="card">
                    <div class="card-body">
                <h5 class="text-info">Upload Subject Assignment</h5>
                        <h6>Allowed types: <span class="text-danger">PDF, JPEG, TXT, GIF, JPG, PNG</span></h6>
                <?=form_open_multipart('assignments/uploadAssignment')?>
                        <input type="hidden" name="term" value="<?=$currentTerm?>">
                        <input type="hidden" name="session" value="<?=$currentSession?>">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Assignment title</i></span>
                        </div>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter assignment title or file name..." required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Subject</i></span>
                        </div>
                        <select name="subject" class="form-control" id="subject" required>
                            <option value="">Choose your subject...</option>
                            <?php foreach ($tutorSubjects as $subject) : ?>
                                <option value="<?=$subject->subject_title?>"><?=$subject->subject_title?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <?php if($classPrefix == 'Year' || $classPrefix == 'Grade') : ?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Class prefix</i></span>
                        </div>
                        <input type="text" class="form-control" value="<?=$classPrefix?>" name="prefix" id="prefix" readonly>
                    </div>
                    <?php endif; ?>
                    <?php if($classPrefix == 'Junior_Senior') : ?>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="">Class prefix</i></span>
                            </div>
                            <select name="prefix" class="form-control" id="prefix" required>
                                <option value="">Choose class prefix...</option>
                                <?php foreach ($classesPrefix as $pr) : ?>
                                    <option value="<?=$pr->prefix?>"><?=$pr->prefix?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Classes</i></span>
                        </div>
                        <select name="digit" class="form-control" id="digit" required>
                            <option value="">Choose class...</option>
                            <?php foreach ($classesDigit as $cl) : ?>
                                <option value="<?=$cl->digit?>"><?=$cl->digit?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="">Start Date</i></span>
                            </div>
                            <input type="date" name="start_date" id="start_date" class="form-control" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="">End Date</i></span>
                            </div>
                            <input type="date" name="end_date" id="end_date" class="form-control" required>
                        </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Upload File</i></span>
                        </div>
                        <input type="file" name="userfile" id="userfile" class="form-control" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="submit" id="submit" value="Upload" class="form-control btn btn-primary" >
                    </div>
                </form>

                    </div>
                    </div>
            </div>
        </div>
        <hr>
        <div class="col-md-8">
            <h6 class="text-danger">My Assignments</h6>
            <div class="d-flex">
                    <table class="table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Assignment title</th>
                            <th scope="col">Type</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Class</th>
                            <th scope="col">View</th>
                            <?php if($this->session->userdata('role') == 'Admin'){
                                echo '<th scope="col">View</th>';
                            }?>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $count = 0; foreach ($tutorAssignments as $assignment) : $count++ ?>
                            <tr>
                                <td data-label="#"><?=$count?></td>
                                <td data-label="Assignment Title"><?=$assignment->assignment_title?></td>
                                <td data-label="Type"><?php
                                    $pos = strrpos(base_url($assignment->assignment_link), '.');
                                    $type = ($pos === false) ? base_url($assignment->assignment_link) : substr(base_url($assignment->assignment_link), $pos + 1);
                                    echo '<span class="text-danger">'.strtoupper($type).'</span>';?></td>
                                <td data-label="Subject"><?=$assignment->subject?></td>
                                <td data-label="Start Date"><?=$assignment->start_date?></td>
                                <td data-label="End Date"><?=$assignment->end_date?></td>
                                <td data-label="Class"><?=$assignment->prefix.' '.$assignment->digit?></td>
                                <td data-label="View"><?=anchor('assignments/viewAssignment/'.$assignment->id, '<i class="fa fa-eye"></i>', 'class="btn btn-outline-primary"')?></td>
                                <?php if($this->session->userdata('role') == 'Admin'){
                                    echo '<td data-label="Delete Assignment"></td>';
                                }?>
                            </tr>
                        <?php endforeach;?>

                        </tbody>
                    </table>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if($this->session->userdata('role') == 'Student') : ?>
    <div class="row mb-4">
        <div class="col-md">
            <h6 class="text-danger">Your Current Assignments</h6>
            <div class="d-flex">
                        <table class="table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Assignment Title</th>
                                <th scope="col">Type</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">View</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $count = 0; foreach ($studentsAssignments as $assignment) : $count++ ?>
                                <tr>
                                    <td data-label="#"><?=$count?></td>
                                    <td data-label="Assignment Title"><?=$assignment->assignment_title?></td>
                                    <td data-label="Type"><?php
                                        $pos = strrpos(base_url($assignment->assignment_link), '.');
                                        $type = ($pos === false) ? base_url($assignment->assignment_link) : substr(base_url($assignment->assignment_link), $pos + 1);
                                        echo '<span class="text-danger">'.strtoupper($type).'</span>';?></td>
                                    <td data-label="Subject"><?=$assignment->subject?></td>
                                    <td data-label="Start Date"><?=$assignment->start_date?></td>
                                    <td data-label="End Date"><?=$assignment->end_date?></td>
                                    <td data-label="View"><?=anchor('assignments/viewAssignment/'.$assignment->id, 'View Assignment', 'class="btn btn-outline-primary"')?></td>
                                </tr>
                            <?php endforeach;?>

                            </tbody>
                        </table>
                    </div>
                </div>

        <div class="col-md-7">

        </div>
    </div>
<?php endif; ?>