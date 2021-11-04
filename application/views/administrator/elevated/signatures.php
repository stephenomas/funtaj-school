<h2 class="mb-4"><?=$pageTitle?></h2>

<div class="row mb-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white font-weight-bold">
                Uploaded Signatures
            </div>
            <div class="card-body">
                <table>
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Position</th>
                        <th scope="col">Term</th>
                        <th scope="col">Session</th>
                        <th scope="col">Signature</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $this->db->order_by('full_name', 'ASC');
                        $signs = $this->db->get('signatures');
                        $count = 0;
                        foreach ($signs->result() as $sign) : $count++ ?>
                            <tr>
                                <td data-label="#"><?=$count?></td>
                                <td data-label="Name"><span class="text-info"><?=$sign->full_name?></span></td>
                                <td data-label="Position"><?=$sign->position?></td>
                                <td data-label="Term"><?=$sign->term?></td>
                                <td data-label="Session"><?=$sign->session?></td>
                                <td data-label="Signature"><img src="<?=base_url($sign->signature)?>" style="height: 15px; width: 50px"></td>
                                <td data-label="Delete"><?=($this->session->userdata('role') === 'Admin' || $this->session->userdata('role') === 'SuperAdmin') ? anchor("school/deleteSignature/" . $sign->id, "<i class='fa fa-trash-alt'></i>", array('onclick' => "return confirm('Do you really want to delete this signature, it will no longer appear on the results of the set term for this signature?')", 'class' => '')) : '' ?></td>
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
                Choose Signature image file - <span class="text-danger">PNG</span> preferred
            </div>
            <div class="card-body">
                <?=form_open_multipart('school/uploadSignature')?>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="full_name" placeholder="Full Name">
                </div>
                <div class="input-group mb-3">
                <select class="form-control" name="position" required>
                    <option value="">Choose position...</option>
                    <option value="Principal">Principal</option>
                    <option value="Vice Principal">Vice Principal</option>
                    <option value="Head Teacher">Head Teacher</option>
                    <option value="Asst. Head Teacher">Asst. Head Teacher</option>
                </select>
                </div>
                <div class="input-group mb-3">
                    <select class="form-control" name="term">
                        <option value="">Choose Term...</option>
                        <?php foreach ($allTerms as $terms) :?>
                            <option value="<?=$terms->terms?>"><?=$terms->terms?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <select class="form-control" name="session">
                        <option value="">Choose Session...</option>
                        <?php foreach ($allSessions as $sessions) :?>
                            <option value="<?=$sessions->sessions?>"><?=$sessions->sessions?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <input type="file" name="userfile" class="form-control">
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <button class="btn btn-warning">Upload Signature</button>
            </div>
                </form>
        </div>

        </div>
    </div>
</div>
</div>
</div>
