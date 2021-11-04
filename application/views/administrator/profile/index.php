    <h2 class="mb-4"><?=$pageTitle?></h2>

    <?php foreach ($userData as $userInfo) : ?>
        <?php if ($this->session->userdata('role') != 'Student') : ?>
<!--  Staff Profile-->
    <!--    Change User Info Change /start    -->
<div class="row mb-4">
    <div class="col-md">
        <div class="d-flex border">
            <div class="bg-info text-light p-4">
                <div class="d-flex align-items-center h-100">
                    <span class="vericaltext">User Info Update</span>
                </div>
            </div>
            <div class="flex-grow-1 bg-white p-4">
                <?=form_open('profile/updateUserProfile')?>
                <input type="hidden" name="id" value="<?=$userInfo->id?>">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input class="form-control" value="<?=$userInfo->email?>" type="email" name="email" readonly placeholder="Email">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="">First Name</i></span>
                    </div>
                    <input class="form-control" value="<?=$userInfo->fname?>" type="text" name="fname" placeholder="First Name" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="">Middle Name</i></span>
                    </div>
                    <input class="form-control" value="<?=$userInfo->mname?>" type="text" name="mname" placeholder="Middle Name">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="">Last Name</i></span>
                    </div>
                    <input class="form-control" value="<?=$userInfo->lname?>" type="text" name="lname" placeholder="Last Name" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="">Sex</i></span>
                    </div>
                    <select class="form-control" name="gender" required>
                        <option value="<?=$userInfo->gender?>"><?=$userInfo->gender?></option>
                        <option value="<?='Female'?>"><?='Female'?></option>
                        <option value="<?='Male'?>"><?='Male'?></option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="">User Type</i></span>
                    </div>
                    <input class="form-control" value="<?=$userInfo->groups?>" type="text" name="groups" placeholder="Groups" required readonly>
                </div>
                <div class="form-group">
                    <input class="form-control btn btn-info" type="submit" value="Edit Details">
                </div>
                </form>
            </div>
        </div>
    </div>


    <!--    Change User Info Change /end    -->

<!--    User Data Display, Image and password change /start    -->

        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-info text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <span class="vericaltext">User Photo</span>
                    </div>
                </div>
                    <div class="flex-grow-1 bg-white p-4">
                        <div class="d-flex align-items-center">
                            <img src="<?=$userInfo->profile_img?>" style="height: 200px; width: 200px">

                        </div>
                        <br>
                        <?=form_open_multipart('profile/addUserImage')?>
                        <input type="hidden" name="id" value="<?=$userInfo->id?>">
                        <div class="form-group">
                            <input type="file" class="form-control" name="userfile" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control btn btn-outline-success" type="submit" value="Upload Image">
                        </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-md">
                <div class="d-flex border">
                    <div class="bg-info text-light p-4">
                        <div class="d-flex align-items-center h-100">
                            <span class="vericaltext">Change Password</span>
                        </div>
                    </div>
                    <div class="flex-grow-1 bg-white p-4">
                    <?=form_open('profile/changePassword')?>
                    <input type="hidden" name="id" value="<?=$userInfo->id?>">

                    <p class="text-info"><span id="message">Please enter desired password!</span></p>
                    <hr/>
                    <div class="form-group">
                        <input class="form-control" type="password" id="password" name="password" onkeyup="check()" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" id="confirm_password" name="confirm_password" onkeyup="check()" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control btn btn-warning" type="submit" value="Change Password">
                    </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--    User Data Display, Image and password change /end    -->
        <?php endif; ?>
<!--  Student Profile-->
        <?php if ($this->session->userdata('role') == 'Student') : ?>

<div class="row mb-4">
                <div class="col-md">
                    <div class="d-flex border">
                        <div class="bg-info text-light p-4">
                            <div class="d-flex align-items-center h-100">
                                <span class="vericaltext">Student's Bio</span>
                            </div>
                        </div>
                        <div class="flex-grow-1 bg-white p-4">
                            <?=form_open('profile/updateUserProfile')?>
                            <input type="hidden" name="id" value="<?=$userInfo->id?>">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                </div>
                                <input class="form-control" value="<?=$userInfo->email?>" type="email" name="email" readonly placeholder="Email">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">First Name</i></span>
                                </div>
                                <input class="form-control" value="<?=$userInfo->fname?>" type="text" name="fname" placeholder="First Name" required readonly>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">Middle Name</i></span>
                                </div>
                                <input class="form-control" value="<?=$userInfo->mname?>" type="text" name="mname" placeholder="Middle Name" readonly>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">Last Name</i></span>
                                </div>
                                <input class="form-control" value="<?=$userInfo->lname?>" type="text" name="lname" placeholder="Last Name" required readonly>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">Date of Birth</i></span>
                                </div>
                                <input class="form-control" value="<?=$userInfo->dob?>" type="text" name="dob" placeholder="Date of Birth" required readonly>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">Sex</i></span>
                                </div>
                                <select class="form-control" name="gender" required readonly>
                                    <option value="<?=$userInfo->gender?>"><?=$userInfo->gender?></option>
                                    <option value="<?='Female'?>"><?='Female'?></option>
                                    <option value="<?='Male'?>"><?='Male'?></option>
                                </select>
                            </div>
<!--                            <div class="form-group">-->
<!--                                <input class="form-control btn btn-info" type="submit" value="Edit Details">-->
<!--                            </div>-->
                            </form>
                        </div>
                    </div>
                </div>


                <!--    Change User Info Change /end    -->

                <!--    User Data Display, Image and password change /start    -->

                <div class="col-md">
                    <div class="d-flex border">
                        <div class="bg-info text-light p-4">
                            <div class="d-flex align-items-center h-100">
                                <span class="vericaltext">Picture</span>
                            </div>
                        </div>
                        <div class="flex-grow-1 bg-white p-4">
                            <div class="d-flex align-items-center">
                                <img src="<?=$userInfo->stu_img?>" style="height: 200px; width: 200px">

                            </div>
                            <br>
                            <?=form_open_multipart('profile/addUserImage')?>
                            <input type="hidden" name="id" value="<?=$userInfo->id?>">
<!--                            <div class="form-group">-->
<!--                                <input type="file" class="form-control" name="userfile">-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <input class="form-control btn btn-outline-success" type="submit" value="Upload Image">-->
<!--                            </div>-->
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-md">
                    <div class="d-flex border">
                        <div class="bg-info text-light p-4">
                            <div class="d-flex align-items-center h-100">
                                <span class="vericaltext">Change Password</span>
                            </div>
                        </div>
                        <div class="flex-grow-1 bg-white p-4">
                            <?=form_open('profile/changePassword')?>
                            <input type="hidden" name="id" value="<?=$userInfo->id?>">

                            <p class="text-info"><span id="message">Please enter desired password!</span></p>
                            <hr/>
                            <div class="form-group">
                                <input class="form-control" type="password" id="password" name="password" onkeyup="check()" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" id="confirm_password" name="confirm_password" onkeyup="check()" placeholder="Confirm Password" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control btn btn-warning" type="submit" value="Change Password">
                            </div>
                            <div class="border-warning"><p class="text-info">Make sure you choose a password you can easily remember and
                                ensure you keep it to yourself.</p><hr>
                                <p class="text-capitalize text-danger">
                                    Do not disclose your password to your fellow students!
                                </p></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>
    <?php endforeach;?>