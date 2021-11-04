<h2 class="mb-4"><?= $pageTitle ?></h2>

<div class="row mb-4">
    <div class="col-md-8">
        <div class="d-flex border">
            <div class="bg-info text-light p-4">
                <div class="d-flex align-items-center h-100">
                    <span class="vericaltext">School Info Update</span>
                </div>
            </div>
            <div class="flex-grow-1 bg-white p-4">
                <?php $formIndex = 1 ?>
                <form id="<?= $formIndex ?>" name="schoolDetails">
                    <input type="hidden" id="id" name="id" value="<?= $schoolDetailsId ?>">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">School Name</i></span>
                        </div>
                        <input class="form-control" id="schoolName" value="<?= $schoolName ?>" type="text"
                               onblur="updateSchoolDetails(this.form)" onmouseleave="updateSchoolDetails(this.form)" name="schoolName" required
                               placeholder="School Name">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Address</i></span>
                        </div>
                        <input class="form-control" id="address" value="<?= $schoolAddress ?>" type="text"
                               onblur="updateSchoolDetails(this.form)" onmouseleave="updateSchoolDetails(this.form)" name="address" placeholder="School Address"
                               required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Email</i></span>
                        </div>
                        <input class="form-control" id="email" value="<?= $schoolEmail ?>" type="text"
                               onblur="updateSchoolDetails(this.form)" onmouseleave="updateSchoolDetails(this.form)" name="email" placeholder="School Email">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Phone</i></span>
                        </div>
                        <input class="form-control" id="phone" value="<?= $schoolPhone ?>" type="text"
                               onblur="updateSchoolDetails(this.form)" onmouseleave="updateSchoolDetails(this.form)" name="phone" placeholder="Phone" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Principal</i></span>
                        </div>
                        <input class="form-control" id="principal" value="<?= $schoolPrincipal ?>" type="text"
                               onblur="updateSchoolDetails(this.form)" onmouseleave="updateSchoolDetails(this.form)" name="principal" placeholder="School Principal"
                               required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Vice Principal</i></span>
                        </div>
                        <input class="form-control" id="vp" value="<?= $schoolVP ?>" type="text"
                               onblur="updateSchoolDetails(this.form)" onmouseleave="updateSchoolDetails(this.form)" name="vp" placeholder="School Vice Principal"
                               required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">App Slog</i></span>
                        </div>
                        <input class="form-control" id="appslog" value="<?= $appSlog ?>" type="text"
                               onblur="updateSchoolDetails(this.form)" onmouseleave="updateSchoolDetails(this.form)" name="appslog" placeholder="Custom App Slogan">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Website</i></span>
                        </div>
                        <input class="form-control" id="website" value="<?= $schoolWebsite ?>" type="text"
                               onblur="updateSchoolDetails(this.form)" onmouseleave="updateSchoolDetails(this.form)" name="website" placeholder="School Website"
                               required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Email Extension</i></span>
                        </div>
                        <input class="form-control" id="emailext" value="<?= $schoolEmailExt ?>" type="text"
                               onblur="updateSchoolDetails(this.form)" onmouseleave="updateSchoolDetails(this.form)" name="emailext" placeholder="Email Extension"
                               required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Default Students' Password</i></span>
                        </div>
                        <input class="form-control" id="defaultpw" value="<?= $defaultPassword ?>" type="text"
                               onblur="updateSchoolDetails(this.form)" onmouseleave="updateSchoolDetails(this.form)" name="defaultpw" placeholder="Default Students' Password"
                               required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Campus</i></span>
                        </div>
                        <input class="form-control" id="campus" value="<?= $campus ?>" type="text"
                               onblur="updateSchoolDetails(this.form)" onmouseleave="updateSchoolDetails(this.form)" name="campus" placeholder="Campus Display Name"
                               required>
                    </div>
                   
                    <!--                    <div class="form-group">-->
                    <!--                        <input class="form-control btn btn-info" type="submit" value="Edit Details">-->
                    <!--                    </div>-->
                </form>
            </div>
            
        </div>
    </div>
    <div class="col-md-4">
        <div class="d-flex border">
            <div class="bg-info text-light p-4">
                <div class="d-flex align-items-center h-100">
                    <span class="vericaltext">School Logo</span>
                </div>
            </div>
            <div class="flex-grow-1 bg-white p-4">
                <div class="margin-bottom-30">
                    <img src="<?= ($schoolLogo == '') ? base_url('assets/img/applogo.png') : base_url($schoolLogo) ?>"
                         class="img-thumbnail" width="100em"
                         height="100em" alt="school logo"><br>
                </div>
                <?php echo form_open_multipart('school/setSchoolLogo'); ?>

                <input type="hidden" name="id" value="<?= $schoolDetailsId ?>">

                <div class="form-group">
                    <input type="file" class="form-control" name="userfile">
                </div>&nbsp;
                <div class="form-group">
                    <input class="form-control btn btn-outline-success" type="submit" name="logo"
                           value="Upload Logo">
                </div>
                </form>
            </div>
        </div>
        




    </div>
</div>

<div class="row mb-4">
</div>
</div>