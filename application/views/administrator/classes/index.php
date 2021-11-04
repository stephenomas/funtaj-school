<h2 class="mb-4"><?=$pageTitle?></h2>
            <?php
                $this->db->where('curr_year', $digit);
                $this->db->where('class_prefix', $prefix);
                $this->db->where('branch', $groups);
                $this->db->where('has_graduated', 0);
                $this->db->where('left_school', 0);
                $this->db->order_by('fname', 'asc');

                $stug = $this->db->get('students');?>


        <div class="row mb-4">
            <div class="col-md">
                <div class="card">
                    <div class="card-header bg-white font-weight-bold">
                        <h4 class="text-info">Students <span><a href="" class="" data-toggle="modal" data-target="#studentAdd"><i class="fa fa-user-plus"></i></a></span></h4>
                    </div>
                    <div class="card-body">
                        <div id="chart_div_3">
                            <table class="table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Picture</th>
                                    <th scope="col">Student(s) Names</th>
                                    <th scope="col">Reg.No</th>
                                    <th scope="col">DOB</th>
                                    <th scope="col">Midterm Comment</th>
                                    <th scope="col">Exam Comment</th>
                                    <th scope="col">Add Picture</th>
                                    <th scope="col">Edit Student</th>
                                    <th scope="col">Edit Password</th>
                                    <th scope="col">Deactivate</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 0; foreach ($stug->result() as $student) : $count++ ?>
                                    <tr>
                                        <td data-label="#"><?=$count?></td>
                                        <td data-label="Image"><img data-toggle="modal" data-target="#viewPicture<?=$student->id?>" src="<?=(empty($student->stu_img) ? base_url($student->stu_img) : base_url($student->stu_img))?>" class="rounded-circle" height="50px" width="50px"></td>
                                        <td data-label="Student Names"><?='<strong>'.$student->fname.' '.$student->mname.' '.$student->lname.' '.'</strong>'?><?=(empty($student->email))? ' <span class="text-danger">No email!</span>' : ' '?></td>
                                        <td data-label="Reg.No"><?='<strong>'.$student->admno.'</strong>'?></td>
                                        <td data-label="DOB"><?='<strong>'.$student->dob.'</strong>'?></td>
                                        <td data-label="Midterm Comment" class="text-center"><a href="" class="" data-toggle="modal" data-target="#midtermComment<?=$student->id?>"><i class="fa fa-comment"></i></a></td>
                                        <td data-label="Exam Comment" class="text-center"><a href="<?=base_url('classtutor/examcomment/'.$prefix.'/'.$digit.'/'.$groups.'/'.$student->id)?>"><i class="fa fa-comment"></i></a></td>
                                        <td data-label="Add Picture"> <?='<a href="" class="" data-toggle="modal" data-target="#addPicture'.$student->id.'"><i class="fa fa-image"></i></a>'?></td>
                                        <td data-label="Edit Student"> <?='<a href="" class="" data-toggle="modal" data-target="#studentEdit'.$student->id.'"><i class="fa fa-edit"></i></a>'?></td>
                                        <td data-label="Edit Password"><?='<a href="" class="" data-toggle="modal" data-target="#passwordEdit'.$student->id.'"><i class="fa fa-key"></i></a>'?></td>
                                        <td data-label="Deactivate"><a href="" class="" data-toggle="modal" data-target="#deactivateStudent<?=$student->id?>"><i class="fa fa-exclamation-circle"></i></a></td>
                                        <!-- Edit student Modal -->

                                        <div class="modal fade" id="studentEdit<?=$student->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h4 class="modal-title w-100 font-weight-bold">Edit Student</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body mx-3">
                                                        <div class="text-center"><img src="<?=base_url($student->stu_img)?>" class="rounded-circle" height="100px" width="100px"></div>
                                                        <?=form_open('classtutor/editStudentInClass')?>
                                                        <input type="hidden" name="id" value="<?=$student->id?>">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="">Admission Number</i></span>
                                                            </div>
                                                            <input type="text" name="admno" value="<?=$student->admno?>" class="form-control" readonly required>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="">First Name</i></span>
                                                            </div>
                                                            <input type="text" name="fname" value="<?=$student->fname?>" class="form-control" required>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="">Other</i></span>
                                                            </div>
                                                            <input type="text" name="mname" value="<?=$student->mname?>" class="form-control">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="">Last Name</i></span>
                                                            </div>
                                                            <input type="text" name="lname" value="<?=$student->lname?>" class="form-control" required>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="">Email</i></span>
                                                            </div>
                                                            <input type="text" name="email" value="<?=$student->email?>" class="form-control">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="">Sex</i></span>
                                                            </div>
                                                            <select name="gender" class="form-control" required>
                                                                <option value="<?=$student->gender?>"><?=$student->gender?></option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="">Date Of Birth</i></span>
                                                            </div>
                                                            <input type="date" name="dob" value="<?=$student->dob?>" class="form-control">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="">Current Class</i></span>
                                                            </div>
                                                            <input type="text" value="<?=$student->class_prefix.' '.$student->curr_year.$student->branch?>" class="form-control" readonly>
                                                        </div>
                                                        <input type="hidden" value="<?=$student->class_prefix?>" name="class_prefix">
                                                        <input type="hidden" value="<?=$student->curr_year?>" name="curr_year">
                                                        <input type="hidden" value="<?=$student->branch?>" name="branch">
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <button class="btn btn-default">Edit student</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!--  Edit student Modal Ends  -->

                                        <!-- Edit Password Modal -->


                                        <div class="modal fade" id="passwordEdit<?=$student->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h4 class="modal-title w-100 font-weight-bold">Change Password for: <span class="text-primary"><?=$student->fname?>&nbsp;<?=$student->lname?></span></h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body mx-3">
                                                        <?=form_open('classtutor/editPassword')?>
                                                        <input type="hidden" name="id" value="<?=$student->id?>">
                                                        <input type="hidden" value="<?=$student->class_prefix?>" name="class_prefix">
                                                        <input type="hidden" value="<?=$student->curr_year?>" name="curr_year">
                                                        <input type="hidden" value="<?=$student->branch?>" name="branch">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="">Password</i></span>
                                                            </div>
                                                            <input type="password" name="password" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <button class="btn btn-default">Change Password</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!--  Edit password Modal Ends  -->

                                        <!-- Add Picture Modal -->


                                        <div class="modal fade" id="addPicture<?=$student->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h4 class="modal-title w-100 font-weight-bold">Add or Change Picture for: <span class="text-primary"><?=$student->fname?>&nbsp;<?=$student->lname?></span></h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body mx-3">
                                                        <?=form_open_multipart('classtutor/addStudentImage')?>
                                                        <input type="hidden" name="id" value="<?=$student->id?>">
                                                        <input type="hidden" value="<?=$student->class_prefix?>" name="class_prefix">
                                                        <input type="hidden" value="<?=$student->curr_year?>" name="curr_year">
                                                        <input type="hidden" value="<?=$student->branch?>" name="branch">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-image"></i></span>
                                                            </div>
                                                            <input type="file" class="form-control" name="userfile" >
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <button class="btn btn-default">Upload Picture</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!--  Add Picture Modal Ends  -->

                                        <!-- Deactivate student Modal -->


                                        <div class="modal fade" id="deactivateStudent<?=$student->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h4 class="modal-title w-100 font-weight-bold">Deactivate <span class="text-primary"><?=$student->fname?>&nbsp;<?=$student->lname?>?</span></h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body mx-3">
                                                        <?=form_open('classtutor/deactivateStudent/'.$student->class_prefix.'/'.$student->curr_year.'/'.$student->branch)?>
                                                        <input type="hidden" name="id" value="<?=$student->id?>">
                                                        <input type="hidden" name="term" value="<?=$currentTerm?>">
                                                        <input type="hidden" name="session" value="<?=$currentSession?>">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="">Admission No.</i></span>
                                                            </div>
                                                            <input type="text" name="admno" value="<?=$student->admno?>" class="form-control" readonly required>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="">Reason</i></span>
                                                            </div>
                                                            <input type="text" name="reason" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <button class="btn btn-default">Deactivate Student</button>
                                                    </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- Deactivate Student Modal Ends  -->


                                        <!-- View Picture Modal -->


                                        <div class="modal fade" id="viewPicture<?=$student->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h4 class="modal-title w-100 font-weight-bold"><span class="text-primary"><?=$student->fname?>&nbsp;<?=$student->lname?></span></h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body mx-3 text-center">
                                                        <img src="<?=(empty($student->stu_img) ? base_url($student->stu_img) : base_url($student->stu_img))?>" class="rounded-circle" height="300em" width="300em">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!--  View Picture Modal Ends  -->

                                        <!-- Midterm Comment Modal -->


                                        <div class="modal fade" id="midtermComment<?=$student->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content ">
                                                    <div class="modal-header text-center">
                                                        <h4 class="modal-title w-100 font-weight-bold"><span class="text-primary"><?=$student->fname?>&nbsp;<?=$student->lname?></span></h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body mx-3">
                                                        <?php
                                                        $this->db->where('student_id', $student->id);
                                                        $this->db->where('session', $currentSession);
                                                        $this->db->where('term', $currentTerm);

                                                        $midtermGet = $this->db->get('midterm');
                                                        ?>
                                                        <div class="row mb-4">
                                                        <div class="col-md-8">
                                                            Name: <?=$student->fname.' '.$student->mname.' '.$student->lname?><br>
                                                            Class:  <?php if($midtermGet->num_rows() > 0){$class = $midtermGet->first_row(); echo $class->class_details;}?><br>
                                                            Reg No: <?=$student->admno?> | DoB: <?=$student->dob?> | <?=$currentTerm?> | <?=$currentSession?> Session<br>
                                                            P.Attendance: | A.Attendance: <br>
                                                            Form Tutor: <?=$this->session->userdata('fname').' '.$this->session->userdata('mname').' '.$this->session->userdata('lname')?><br>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <img src="<?=base_url($student->stu_img)?>" style="height: 125px; width: 125px" class="rounded float-right">
                                                        </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <div class="col-md-12">
                                                                <h4 class="text-primary text-center" style="font-weight: bolder">Scores</h4><hr>
                                                                <?php foreach ($midtermGet->result() as $midget) : ?>
                                                                <p><?php if($midget->effort != 0){
                                                                    echo '<span class="text-info" style="font-weight: bold">'.strtoupper($midget->subject).'</span> 
                                                                            <span class="text-capitalize" style="font-weight: bolder">| Achievement: <span class="text-danger">'.$midget->achievement.'</span> - Effort: <span class="text-danger">'.$midget->effort.'</span> - Homework: <span class="text-danger">'.$midget->homework.'</span> - Behaviour: <span class="text-danger">'.$midget->behaviour.'</span></span><hr>';}?></p>
                                                                <?php endforeach;?>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <div class="col-md-12 text-center">
                                                                <h5>Form Tutor's Comment</h5>
                                                                <?php
                                                                $this->db->where('student_id', $student->id);
                                                                $this->db->where('term', $currentTerm);
                                                                $this->db->where('session', $currentSession);

                                                                $tutor_comment_get = $this->db->get('midterm_class_tutor_comments');
                                                                ?>
                                                                    <?=form_open('classtutor/midtermComment/'.$student->id)?>
                                                                <input type="hidden" name="prefix" value="<?=$student->class_prefix?>">
                                                                <input type="hidden" name="digit" value="<?=$student->curr_year?>">
                                                                <input type="hidden" name="groups" value="<?=$student->branch?>">
                                                                    <div class="form-group">
                                                                      <?php if($tutor_comment_get->num_rows() > 0) : ?>
                                                                          <textarea class="form-control" name="comment" placeholder="Enter Comment" required><?php $tutor_comment = $tutor_comment_get->first_row(); echo $tutor_comment->comment?></textarea>
                                                                      <?php endif; ?>
                                                                        <?php if($tutor_comment_get->num_rows() < 1) : ?>
                                                                          <textarea class="form-control" name="comment" placeholder="Enter Comment" required></textarea>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                <div class="form-group">
                                                                    <input type="submit" class="form-control btn btn-primary" value="Post Comment">
                                                                </div>
                                                                    </form>
                                                            </div>
                                                        </div>


                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!--  Midterm Comment Modal Ends  -->

                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Add student Modal -->

            <div class="modal fade" id="studentAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Add Student</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-3">
                            <?=form_open('classtutor/addStudent')?>
                            <div class="input-group mb-3">
                                <h5 id="taken_msg" class="text-danger"></h5>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">Admission No.</i></span>
                                </div>
                                <input type="number" id="admno" name="admno" class="form-control" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">First Name</i></span>
                                </div>
                                <input type="text" name="fname" class="form-control" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">Other</i></span>
                                </div>
                                <input type="text" name="mname" class="form-control">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">Last Name</i></span>
                                </div>
                                <input type="text" name="lname" class="form-control" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">Sex</i></span>
                                </div>
                                <select name="gender" class="form-control" required>
                                    <option value=" ">Choose sex...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">Date Of Birth</i></span>
                                </div>
                                <input type="date" name="dob" class="form-control" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">Password</i></span>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="Leave this empty to use 'password' as default Password">
                            </div>
                            <input type="hidden" name="class_prefix" value="<?=$prefix?>">
                            <input type="hidden" name="curr_year" value="<?=$digit?>">
                            <input type="hidden" name="branch" value="<?=$groups?>">

                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-default">Add Student</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>

            <!-- Add student Modal Ends  -->

        </div>

        </div>