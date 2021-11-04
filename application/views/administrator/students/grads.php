<div class="row mb-4">
    <div class="col-md">
        <h2 class="mb-4">
            <?=$pageTitle?>
        </h2>
    </div>
    <div class="col-md float-right">
        <a class="btn btn-outline-info" id="" href="<?=base_url('students/search')?>">Search Students...</a>
        <?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'SuperAdmin') : ?><div class="float-right"><?=anchor(base_url('students/deleted'), '<i class="fa fa-trash-alt"></i>  Deleted Students', 'class="btn btn-warning"')?></div><?php endif;?>

    </div>
</div>
<div class="row mb-4">
    <div class="col-md">
        <h2 class="mb-4">
            <?=anchor(base_url('students'), 'Back', 'class="btn btn-primary"')?>
        </h2>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md">
        <div class="d-flex btn" data-toggle="modal" data-target="#studentAdd">
            <div class="bg-info text-light p-4">
                <div class="d-flex align-items-center h-100">
                    <i class="fa fa-3x fa-fw fa-plus"></i>
                </div>
            </div>
            <div class="flex-grow-1 bg-white p-4">
                <p class="text-uppercase text-info mb-0">Add Student</p>
                <span>Active Students: <span class="font-weight-bold mb-0 text-danger"><?=$allStudentsNum?></span></span>
            </div>
        </div>
    </div>

    <div class="col-md">
        <div class="d-flex btn"  onclick="das()">
            <div class="bg-success text-light p-4">
                <div class="d-flex align-items-center h-100">
                    <i class="fa fa-3x fa-fw fa-graduation-cap"></i>
                </div>
            </div>
            <div class="flex-grow-1 bg-white p-4">
                <p class="text-uppercase text-secondary mb-0">Deactivated Students</p>
                <h3 class="font-weight-bold mb-0"></h3>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="d-flex btn" onclick="grads()">
            <div class="bg-danger text-light p-4">
                <div class="d-flex align-items-center h-100 mb-0">
                    <i class="fa fa-3x fa-fw fa-graduation-cap"></i>
                </div>
            </div>
            <div class="flex-grow-1 bg-white p-4">
                <p class="text-uppercase text-danger mb-0">Graduated Students</p>
                <h3 class="font-weight-bold mb-0"></h3>
            </div>
        </div>
    </div>
</div>


<script>
    //Buttons for navigating students
    function grads() {
        var base_url = "<?=base_url();?>";
        window.location.href = base_url + 'students/grads';
    }
    function das() {
        var base_url = "<?=base_url();?>";
        window.location.href = base_url + 'students/das';
    }
</script>

<div class="row mb-4">
    <div class="col-md">
        <div class="card">

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
                            <?=form_open('students/addStudent')?>
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
                            <div class="input-group mb-3 form-inline">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">Choose Class</i></span>
                                </div>
                                <?php if ($classPrefix === 'Junior_Senior') : ?>
                                    <select class="form-control" name="class_prefix" required>
                                        <option value="">Prefix...</option>
                                        <option value="Primary">Primary</option>
                                        <option value="JSS">JSS</option>
                                        <option value="SS">SS</option>
                                    </select>
                                <?php endif;?>
                                <?php if ($classPrefix !== 'Junior_Senior') : ?>
                                    <input type="text" value="<?=$classPrefix?>" name="class_prefix" class="form-control" readonly required>
                                <?php endif;?>
                                <select name="curr_year" class="form-control">
                                    <option value="">Class...</option>
                                    <?php foreach ($classesDigit as $class) : ?>
                                        <option value="<?=$class->digit?>"><?=$class->digit?></option>
                                    <?php endforeach;?>
                                </select>
                                <select name="branch" class="form-control">
                                    <option value="">Group...</option>
                                    <?php foreach ($classesGroup as $group) : ?>
                                        <option value="<?=$group->group?>"><?=$group->group?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-default">Add Student</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>

            <!-- Add student Modal Ends  -->
            <div class="card-header bg-white font-weight-bold">
                All Students
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Reg No.</th>
                        <th scope="col">Class Of</th>
                        <th scope="col">View</th>
                        <th scope="col"><i class="fa fa-lock"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 0; foreach ($graduatedStudents as $student) : $count++ ?>
                        <tr>
                            <td data-label="#"><?=$count?></td>
                            <td data-label="First Name"><?=$student->fname?></td>
                            <td data-label="Middle Name"><?=$student->mname?></td>
                            <td data-label="Last Name"><?=$student->lname?></td>
                            <td data-label="Reg No."><?=$student->admno?></td>
                            <td data-label="Class Of"><?=$student->class_of?></td>
                            <td data-label="Edit"><a href="" class="" data-toggle="modal" data-target="#studentEdit<?=$student->id?>">View</a></td>

                            <!-- Edit student Modal -->


                            <div class="modal fade" id="studentEdit<?=$student->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">View Student</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body mx-3">
                                            <div class="text-center"><img src="<?=base_url($student->stu_img)?>" class="rounded-circle" height="100px" width="100px"></div>
                                            <?=form_open('students/editstudent')?>
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
                                                <input type="text" name="fname" value="<?=$student->fname?>" class="form-control" required readonly>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="">Other</i></span>
                                                </div>
                                                <input type="text" name="mname" value="<?=$student->mname?>" class="form-control" readonly>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="">Last Name</i></span>
                                                </div>
                                                <input type="text" name="lname" value="<?=$student->lname?>" class="form-control" required readonly>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="">Email</i></span>
                                                </div>
                                                <input type="text" name="email" value="<?=$student->email?>" class="form-control" readonly>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="">Sex</i></span>
                                                </div>
                                                <select name="gender" class="form-control" required readonly>
                                                    <option value="<?=$student->gender?>"><?=$student->gender?></option>
<!--                                                    <option value="Male">Male</option>-->
<!--                                                    <option value="Female">Female</option>-->
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="">Date Of Birth</i></span>
                                                </div>
                                                <input type="date" name="dob" value="<?=$student->dob?>" class="form-control" readonly>
                                            </div>
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
                                            <?=form_open('students/editPassword')?>
                                            <input type="hidden" name="id" value="<?=$student->id?>">
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

                            <td data-label="Password"><a href="" class="" data-toggle="modal" data-target="#passwordEdit<?=$student->id?>"><i class="fa fa-key"></a></td>
                            </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>

            </div>
        </div>
        <button class="btn btn-outline-info" id="to-top">To Top</button>
    </div>
</div>
<script>
    //Scroll to top
    document.querySelector("#to-top").addEventListener("click", function(){

        var toTopInterval = setInterval(function(){

            var supportedScrollTop = document.body.scrollTop > 0 ? document.body : document.documentElement;

            if (supportedScrollTop.scrollTop > 0) {
                supportedScrollTop.scrollTop = supportedScrollTop.scrollTop - 50;
            }

            if (supportedScrollTop.scrollTop < 1) {
                clearInterval(toTopInterval);
            }

        }, 10);

    },false);
</script>