<h2 class="mb-4"><?= $pageTitle ?></h2>
<?php if ($this->session->userdata('role') === 'Admin' || $this->session->userdata('role') === 'SuperAdmin') : ?>
    <div><?= anchor('school/classes', '<i class="fa fa-arrow-alt-circle-left btn"></i><span class="btn">Back</span>') ?></div>
<?php endif; ?>
<?php if ($this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'SuperAdmin') : ?>
    <div><?= anchor('start', '<i class="fa fa-arrow-alt-circle-left btn"></i><span class="btn">Back</span>') ?></div>
<?php endif; ?>
<!--  Elevated Panel  -->
<?php if ($this->session->userdata('Elevated')) : ?>


    <div class="row mb-4">
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-primary text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-id-badge"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Form Tutor</p>
                    <h5 class="font-weight-bold mb-0"><?= $tutorName ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-success text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-female"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">No of female students</p>
                    <h5 class="font-weight-bold mb-0"><?= $femaleCount ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-danger text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-male"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">No of Male students</p>
                    <h5 class="font-weight-bold mb-0"><?= $maleCount ?></h5>
                </div>
            </div>
        </div>
    </div>


    <div class="row mb-4">
        <div class="col-md">
            <div class="card">
                <div class="card-header bg-white font-weight-bold">
                    <h4 class="text-info">Students <span><a href="" class="" data-toggle="modal"
                                                            data-target="#studentAdd"><i
                                        class="fa fa-user-plus"></i></a></span></h4>
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
                                <th scope="col">View/Add Parents Info</th>
                                <th scope="col">Add Picture</th>
                                <th scope="col">Edit Student</th>
                                <th scope="col">Edit Password</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $count = 0;
                            foreach ($studentsInClass as $student) : $count++ ?>
                                <tr>
                                    <td data-label="#"><?= $count ?></td>
                                    <td data-label="#"><img data-toggle="modal"
                                                            data-target="#viewPicture<?= $student->id ?>"
                                                            src="<?= (empty($student->stu_img) ? base_url($student->stu_img) : base_url($student->stu_img)) ?>"
                                                            class="rounded-circle" height="50px" width="50px"></td>
                                    <td data-label="Student Names"><?= '<strong>' . $student->fname . ' ' . $student->mname . ' ' . $student->lname . ' ' . '</strong>' ?><?= (empty($student->email)) ? ' <span class="text-danger">No email!</span>' : ' ' ?></td>
                                    <td data-label="Reg.No"><?= '<strong>' . $student->admno . '</strong>' ?></td>
                                    <td data-label="DOB"><?= '<strong>' . $student->dob . '</strong>' ?></td>
                                    <td data-label="View/Add Parents Info"> <?= '<a href="" class="" data-toggle="modal" data-target="#addParentsInfo' . $student->id . '"><i class="fa fa-users"></i></a>' ?></td>
                                    <td data-label="Add Picture"> <?= '<a href="" class="" data-toggle="modal" data-target="#addPicture' . $student->id . '"><i class="fa fa-image"></i></a>' ?></td>
                                    <td data-label="Edit Student"> <?= '<a href="" class="" data-toggle="modal" data-target="#studentEdit' . $student->id . '"><i class="fa fa-edit"></i></a>' ?></td>
                                    <td data-label="Edit Password"><?= '<a href="" class="" data-toggle="modal" data-target="#passwordEdit' . $student->id . '"><i class="fa fa-key"></i></a>' ?></td>
                                    <td data-label="Delete"><?= ($this->session->userdata('role') === 'Admin' || $this->session->userdata('role') === 'SuperAdmin') ? anchor("school/deleteStudent/" . $student->id . '/' . $prefix . '/' . $digit . '/' . $group, "<i class='fa fa-trash-alt'></i>", array('onclick' => "return confirm('Do you really want to delete this student?')", 'class' => '')) : '' ?></td>

                                    <!-- Edit student Modal -->

                                    <div class="modal fade" id="studentEdit<?= $student->id ?>" tabindex="-1"
                                         role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h4 class="modal-title w-100 font-weight-bold">Edit Student</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body mx-3">
                                                    <div class="text-center"><img
                                                                src="<?= base_url($student->stu_img) ?>"
                                                                class="rounded-circle" height="100px" width="100px">
                                                    </div>
                                                    <?= form_open('school/editStudentInClass') ?>
                                                    <input type="hidden" name="id" value="<?= $student->id ?>">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="">Admission Number</i></span>
                                                        </div>
                                                        <input type="text" name="admno"
                                                               value="<?= $student->admno ?>" class="form-control"
                                                               readonly required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                            class="">First Name</i></span>
                                                        </div>
                                                        <input type="text" name="fname"
                                                               value="<?= $student->fname ?>" class="form-control"
                                                               required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                            class="">Other</i></span>
                                                        </div>
                                                        <input type="text" name="mname"
                                                               value="<?= $student->mname ?>" class="form-control">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="">Last Name</i></span>
                                                        </div>
                                                        <input type="text" name="lname"
                                                               value="<?= $student->lname ?>" class="form-control"
                                                               required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                            class="">Email</i></span>
                                                        </div>
                                                        <input type="text" name="email"
                                                               value="<?= $student->email ?>" class="form-control">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                            class="">Sex</i></span>
                                                        </div>
                                                        <select name="gender" class="form-control" required>
                                                            <option value="<?= $student->gender ?>"><?= $student->gender ?></option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                            class="">Date Of Birth</i></span>
                                                        </div>
                                                        <input type="date" name="dob" value="<?= $student->dob ?>"
                                                               class="form-control">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                            class="">Current Class</i></span>
                                                        </div>
                                                        <input type="text"
                                                               value="<?= $student->class_prefix . ' ' . $student->curr_year . $student->branch ?>"
                                                               class="form-control" readonly>
                                                    </div>
                                                    <input type="hidden" value="<?= $student->class_prefix ?>"
                                                           name="class_prefix">
                                                    <input type="hidden" value="<?= $student->curr_year ?>"
                                                           name="curr_year">
                                                    <input type="hidden" value="<?= $student->branch ?>"
                                                           name="branch">
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


                                    <div class="modal fade" id="passwordEdit<?= $student->id ?>" tabindex="-1"
                                         role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h4 class="modal-title w-100 font-weight-bold">Change Password
                                                        for: <span class="text-primary"><?= $student->fname ?>
                                                            &nbsp;<?= $student->lname ?></span></h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body mx-3">
                                                    <?= form_open('school/editPassword') ?>
                                                    <input type="hidden" name="id" value="<?= $student->id ?>">
                                                    <input type="hidden" value="<?= $student->class_prefix ?>"
                                                           name="class_prefix">
                                                    <input type="hidden" value="<?= $student->curr_year ?>"
                                                           name="curr_year">
                                                    <input type="hidden" value="<?= $student->branch ?>"
                                                           name="branch">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="">Password</i></span>
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


                                    <div class="modal fade" id="addPicture<?= $student->id ?>" tabindex="-1"
                                         role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h4 class="modal-title w-100 font-weight-bold">Add or Change
                                                        Picture for: <span
                                                                class="text-primary"><?= $student->fname ?>
                                                            &nbsp;<?= $student->lname ?></span></h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body mx-3">
                                                    <?= form_open_multipart('school/addStudentImage') ?>
                                                    <input type="hidden" name="id" value="<?= $student->id ?>">
                                                    <input type="hidden" value="<?= $student->class_prefix ?>"
                                                           name="class_prefix">
                                                    <input type="hidden" value="<?= $student->curr_year ?>"
                                                           name="curr_year">
                                                    <input type="hidden" value="<?= $student->branch ?>"
                                                           name="branch">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                            class="fa fa-image"></i></span>
                                                        </div>
                                                        <input type="file" class="form-control" name="userfile">
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


                                    <!-- View Picture Modal -->


                                    <div class="modal fade" id="viewPicture<?= $student->id ?>" tabindex="-1"
                                         role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h4 class="modal-title w-100 font-weight-bold"><span
                                                                class="text-primary"><?= $student->fname ?>
                                                            &nbsp;<?= $student->lname ?></span></h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body mx-3 text-center">
                                                    <img src="<?= (empty($student->stu_img) ? base_url($student->stu_img) : base_url($student->stu_img)) ?>"
                                                         class="rounded-circle" height="300em" width="300em">
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <!--  View Picture Modal Ends  -->

                                </tr>

                            <?php endforeach; ?>
                            </tbody>
                        </table>


                        <?php foreach ($studentsInClass as $student) : ?>

                            <!-- Add Parents Info Modal -->

                            <div class="modal fade" id="addParentsInfo<?= $student->id ?>" tabindex="-1"
                                 role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Update Parent's
                                                Details for: <span
                                                        class="text-primary"><?= $student->fname ?>
                                                    &nbsp;<?= $student->lname ?></span></h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body mx-3">
                                            <?php $this->db->where('student_id', $student->id);
                                            $parents = $this->db->get('parents')->result(); ?>
                                            <?php $c = 0; if (!empty($parents)) : $c++ ?>
                                                <table class="table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th><?='#'?></th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                        <th>ID Number</th>
                                                        <th>Relationship</th>
                                                        <th><i class="fas fa-trash"></i></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($parents as $parent_info) : ?>
                                                        <tr>
                                                            <td data-label="#"><?= $c ?></td>
                                                            <td data-label="First Name"><?= $parent_info->fname ?></td>
                                                            <td data-label="Last Name"><?= $parent_info->lname ?></td>
                                                            <td data-label="Email"><?= $parent_info->email ?></td>
                                                            <td data-label="Phone"><?= $parent_info->phone1 ?></td>
                                                            <td data-label="Home Address"><?= $parent_info->homeaddress ?></td>
                                                            <td data-label="ID Number"><?= $parent_info->idcardnum ?></td>
                                                            <td data-label="Relationship"><?= $parent_info->relationship ?></td>
                                                            <td data-label="Delete"><i class='fas fa-trash'></i></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            <?php endif; ?>
                                            <hr>
                                            <?= form_open_multipart('school/addParentsInfo') ?>
                                            <input type="hidden" name="student_id" value="<?= $student->id ?>">
                                            <h5 class="text-danger">Add Parent</h5>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="">First Name</i></span>
                                                </div>
                                                <input id="fname" name="fname" placeholder="First Name"
                                                       type="text" required
                                                       class="form-control">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="">Last Name</i></span>
                                                </div>
                                                <input id="lname" name="lname" placeholder="Last Name"
                                                       type="text" required
                                                       class="form-control">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input id="phone" name="phone" placeholder="Phone" type="text"
                                                       required
                                                       class="form-control">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="fas fa-envelope"></i></span>
                                                </div>
                                                <input id="email" placeholder="Email" name="email" type="email"
                                                       class="form-control">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="">Home Address</i></span>
                                                </div>
                                                <textarea id="address" name="address"
                                                          class="form-control"></textarea>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="fas fa-id-card"></i></span>
                                                </div>
                                                <input id="id_number" placeholder="ID Number" name="id_number"
                                                       type="text"
                                                       class="form-control">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="">Relationship</i></span>
                                                </div>
                                                <select id="relationship" name="relationship" required
                                                        class="form-control">
                                                    <option value="">Select relationship</option>
                                                    <option value="Father">Father</option>
                                                    <option value="Mother">Mother</option>
                                                    <option value="Guardian">Guardian</option>
                                                    <option value="Other Relations">Other Relations</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button class="btn btn-info">Submit Info</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!--  Add Parents Info Modal Ends  -->
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>

        <!-- Add student Modal -->

        <div class="modal fade" id="studentAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Add Student</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <?= form_open('school/addStudent') ?>
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
                            <input type="password" name="password" class="form-control"
                                   placeholder="Leave this empty to use 'password' as default Password">
                        </div>
                        <input type="hidden" name="class_prefix" value="<?= $prefix ?>">
                        <input type="hidden" name="curr_year" value="<?= $digit ?>">
                        <input type="hidden" name="branch" value="<?= $group ?>">

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
<?php endif; ?>
<!-- Elevated Panel Ends -->
<?php if ($this->session->userdata('Role') == 'Tutor') : ?>

<?php endif; ?>
<!-- Account panel starts-->
<?php if ($this->session->userdata('Role') == 'account') : ?>

<?php endif; ?>
<!--  Account Panel Ends  -->
<!--    Medical Staff Panel-->
<?php if ($this->session->userdata('Role') == 'Medical') : ?>

<?php endif; ?>
<!--   Medical Staff Panel ends -->
