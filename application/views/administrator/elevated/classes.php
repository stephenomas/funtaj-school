<h2 class="mb-4"><?=$pageTitle?></h2>

<div class="row mb-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white font-weight-bold">
                All Classes - <span class="text-danger">Click class name to view or add student(s) to class.</span>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Class</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Tutor</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($classes as $cla):?>

                        <!--Edit Class Modal-->


                        <div class="modal fade" id="classEdit<?=$cla->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h4 class="modal-title w-100 font-weight-bold">Edit Class</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body mx-3">
                                        <?=form_open('school/editClass')?>
                                        <input type="hidden" name="id" value="<?=$cla->id?>">
                                        <?php if ($classPrefix === 'Junior_Senior') : ?>
                                        <div class="input-group mb-3">
                                            <select class="form-control" name="prefix" required>
                                                <option value="">Choose class prefix...</option>
                                                <option value="JSS">JSS</option>
                                                <option value="SS">SS</option>
                                            </select>
                                        </div>
                                        <?php endif;?>
                                        <?php if ($classPrefix !== 'Junior_Senior') : ?>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="">Prefix</i></span>
                                            </div>
                                            <input type="text" value="<?=$classPrefix?>" name="prefix" class="form-control" readonly required>
                                        </div>
                                        <?php endif;?>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="">Class Digit</i></span>
                                            </div>
                                            <input type="text" name="digit" value="<?=$cla->digit?>" class="form-control" required>
                                        </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="">Class Group</i></span>
                                        </div>
                                        <input type="text" name="group" value="<?=ucfirst(strtolower($cla->groups))?>" class="form-control" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="">Current Session</i></span>
                                        </div>
                                        <input type="text" name="current_session" value="<?=$currentSession?>" class="form-control" readonly>
                                    </div>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button class="btn btn-default">Edit</button>
                                    </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>

                        <!--Edit Class Modal Ends  -->

            <!--Set Class Tutor Modal-->


            <div class="modal fade" id="setClassTutor<?=$cla->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Set Class Tutor: <span class="text-secondary"><?=$classPrefix.' '.$cla->digit.ucfirst(strtolower($cla->groups))?></span></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-3"><?php
                            // This gets form tutor for the class
//                            $this->db->where('class_id', $cla->id);
                            $this->db->where('term', $currentTerm);
                            $this->db->where('session', $currentSession);
                            $this->db->where('prefix', $cla->prefix);
                            $this->db->where('digit', $cla->digit);
                            $this->db->where('groups', $cla->groups);
                            $getFormTut = $this->db->get('class_tutor');
                            if ($getFormTut->num_rows() > 0){
                                foreach ($getFormTut->result() as $cltut){
                                    $tutid = $cltut->tutor_id;
                                    $this->db->where('id', $tutid);
                                    $tutorGet = $this->db->get('staff');
                                    foreach ($tutorGet->result() as $ttget){
                                        echo '<h5 class="text-center text-danger modal-title w-100 font-weight-bold">Class Tutor: '.$ttget->fname.' '.$ttget->lname.'</h5><hr>';
                                    }
                                }
                            }else{
                                echo '<h5 class="text-center text-danger modal-title w-100 font-weight-bold"> Class tutor not set this term! Choose a tutor...</h5><hr>';
                            }
                                ?>
                            <?=form_open('school/setClassTutor')?>
                            <input type="hidden" name="id" value="<?=$cla->id?>">
                            <input type="hidden" value="<?=$classPrefix?>" name="prefix" class="form-control">
                            <input type="hidden" name="digit" value="<?=$cla->digit?>" class="form-control" required>
                            <input type="hidden" name="group" value="<?=ucfirst(strtolower($cla->groups))?>" class="form-control" required>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">Current Term</i></span>
                                </div>
                                <input type="text" name="current_term" value="<?=$currentTerm?>" class="form-control" readonly>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">Current Session</i></span>
                                </div>
                                <input type="text" name="current_session" value="<?=$currentSession?>" class="form-control" readonly>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">Tutors</i></span>
                                </div>
                                <select name="tutor_id" class="form-control" required>
                                    <option value="">Choose Class Tutor for class...</option>
                                    <?php foreach ($tutors as $tut) : ?>
                                        <option value="<?=$tut->id?>"><?=$tut->fname.' '.$tut->lname?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-default">Set Class Tutor</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--Set Class Tutor Modal Ends  -->


                        <tr>
                            <td data-label="Class"><?=anchor('school/students/'.$cla->prefix.'/'.$cla->digit.'/'.$cla->groups, $cla->prefix.' '.$cla->digit.$cla->groups, 'class="btn btn-info"')?></td>
                            <td data-label="Edit"><a href="" class="" data-toggle="modal" data-target="#classEdit<?=$cla->id?>"><i class="fa fa-edit"></i></a></td>
                            <td data-label="Tutor"><a href="" class="" data-toggle="modal" data-target="#setClassTutor<?=$cla->id?>"><i class="fa fa-user"></i></a></td>
                            <td data-label="Delete"><?=anchor("school/deleteClass/" . $cla->id, "<i class='fa fa-trash'></i>", array('onclick' => "return confirm('Do you really want to delete this class?')", 'class' => '')) ?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-white font-weight-bold">
                Choose Class Prefix Style
            </div>
            <div class="card-body">
                <?=form_open('school/setClassPrefix')?>
                <div class="input-group mb-3">
                <select class="form-control" name="prefix" required>
                    <option value="">Choose prefix style...</option>
                    <option value="Grade">Grade</option>
                    <option value="Junior_Senior">Junior/Senior</option>
                    <option value="Year">Year</option>
                </select>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <button class="btn btn-default">Set Prefix</button>
            </div>
                </form>
        </div>
        <div class="card">
            <div class="card-header bg-white font-weight-bold">
                Add Classes
            </div>
            <div class="card-body">
                <?=form_open('school/addClass')?>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="">Current Session</i></span>
                    </div>
                    <input type="text" value="<?=$currentSession?>" name="current_session" class="form-control" readonly required>
                </div>
                <?php if ($classPrefix === 'Junior_Senior') : ?>
                <div class="input-group mb-3">
                    <select class="form-control" name="prefix" required>
                        <option value="">Choose class prefix...</option>
                        <option value="Primary">Primary</option>
                        <option value="JSS">JSS</option>
                        <option value="SS">SS</option>
                    </select>
                </div>
                <?php endif;?>
                <?php if ($classPrefix !== 'Junior_Senior') : ?>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="">Prefix</i></span>
                    </div>
                    <input type="text" value="<?=$classPrefix?>" name="prefix" class="form-control" readonly required>
                </div>
                <?php endif;?>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="">Class Digit</i></span>
                    </div>
                    <input type="text" name="digit" class="form-control" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="">Group</i></span>
                    </div>
                    <input type="text" name="group" class="form-control" required>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <button class="btn btn-default">Create Class</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
