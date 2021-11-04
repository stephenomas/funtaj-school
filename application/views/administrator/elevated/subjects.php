    <h2 class="mb-4"><?=$pageTitle?></h2>

    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white font-weight-bold">
                    All Subjects
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Subjects</th>
                            <th scope="col">Code</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($subjects as $subs):?>

                            <!-- Modal Setup-->


                            <div class="modal fade" id="subjectEdit<?=$subs->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Edit Subject</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body mx-3">
                                            <?=form_open('school/editSubject')?>
                                            <input type="hidden" name="id" value="<?=$subs->id?>">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="">Subject</i></span>
                                                </div>
                                                <input type="text" name="subject"  value="<?=$subs->subjects?>" class="form-control">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="">Code</i></span>
                                                </div>    <input type="text" name="code" value="<?=$subs->code?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button class="btn btn-default">Edit</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!--  Modal Ends  -->
                            <tr>
                            <td data-label="Subject"><?=$subs->subjects?></td>
                            <td data-label="Code"><?=$subs->code?></td>
                            <td data-label="Edit"><a href="" class="" data-toggle="modal" data-target="#subjectEdit<?=$subs->id?>">Edit</a></td>
                            <td data-label="Delete"><?=anchor("school/deleteSubject/" . $subs->id, "<i class='fa fa-trash'></i>", array('onclick' => "return confirm('Do you really want to delete this subject?')", 'class' => '')) ?></td>
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
                    Add Subjects
                </div>
                <div class="card-body">
                    <?=form_open('school/addSubject')?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Subject</i></span>
                        </div>
                        <input type="text" name="subject" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="">Code</i></span>
                        </div>    <input type="text" name="code" class="form-control">
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <button class="btn btn-default">Add Subject</button>
                </div>
                    </form>
                </div>
            </div>
        </div>