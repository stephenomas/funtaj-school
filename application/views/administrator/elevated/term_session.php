    <h2 class="mb-4"><?=$pageTitle?></h2>

    <div class="row mb-4">
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-primary text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-bookmark"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Current Term</p>
                    <h4 class="font-weight-bold mb-0"><?=$currentTerm?></h4>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-success text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-calendar-alt"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Current Session</p>
                    <h4 class="font-weight-bold mb-0"><?=$currentSession?></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white font-weight-bold">
                    Set Current Term & Session
                </div>
                    <div class="card-body">
                        <div style="width: 100%;">
                            <h6 class="text-danger">Set Term</h6>
                            <?=form_open('school/setCurrentTerm')?>
                            <div class="form-group">
                                <select class="form-control" name="term" required>
                                    <option value="">Choose term...</option>
                                    <?php foreach ($allTerms as $terms) : ?>
                                        <option value="<?=$terms->terms?>"><?=$terms->terms?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control btn btn-danger" type="submit" value="Set Term">
                            </div>
                            </form>
                            <hr>
                            <h6 class="text-secondary">Set Session</h6>
                            <?=form_open('school/setCurrentSession')?>
                            <div class="form-group">
                                <select class="form-control" name="session" required>
                                    <option value="">Choose session...</option>
                                    <?php foreach ($allSessions as $sessions) : ?>
                                        <option value="<?=$sessions->sessions?>"><?=$sessions->sessions?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control btn btn-secondary" type="submit" value="Set Session">
                            </div>
                            </form>
                            <hr>
                            <h6 class="text-primary">Set Number of Days Open - Current Term</h6>
                            <?=form_open('school/setNumberOfDays')?>
                            <div class="form-group">
                                    <input type="number" value="<?php
                                        $this->db->where('term', $currentTerm);
                                        $this->db->where('session', $currentSession);
                                        $getDays = $this->db->get('class_tutor');
                                        $numDays = $getDays->first_row();
                                        echo (!empty($numDays->possible_att)) ? $numDays->possible_att : 'Number of days opened not set for this term.' ;
                                    ?>" name="numberOfDays" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control btn btn-primary" type="submit" value="Set Days Opened">
                            </div>
                            </form>
                        </div>
                    </div>

            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white font-weight-bold">
                    Create Terms & Sessions
                </div>
                <div class="card-body">
                    <h6 class="text-danger">Create Terms</h6>
                    <?=form_open('school/createTerm')?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-bookmark"></i></span>
                        </div>
                        <input class="form-control" type="text" name="term" placeholder="Format: 'Term 1'">
                    </div>
                    <div class="input-group mb-3">
                        <input class="form-control btn btn-danger" type="submit" value="Create Term">
                    </div>
                    </form>
                    <hr>
                    <h6 class="text-secondary">Create Sessions</h6>
                    <?=form_open('school/createSession')?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                        <input class="form-control" type="text" name="session" placeholder="Format: '2017/2018'">
                    </div>
                    <div class="input-group mb-3">
                        <input class="form-control btn btn-secondary" type="submit" value="Create Session">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white font-weight-bold">
                    Current Term's Start and End Dates
                </div>
                <div class="card-body">
                    <div id="chart_div_4" style="width: 100%;">
                        <?=form_open('school/setTermDates')?>
                        <input type="hidden" name="current_term" value="<?=$currentTerm?>">
                        <input type="hidden" name="current_session" value="<?=$currentSession?>">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"> Start Date</i></span>
                            </div>
                            <input class="form-control" type="date" name="start_date" placeholder="Term Start Date'" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"> End Date</i></span>
                            </div>
                            <input class="form-control" type="date" name="end_date" placeholder="Term End Date'" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control btn btn-outline-info" type="submit" value="Set Term Dates">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="card bg-success text-light text-uppercase">
                <div class="card-body py-5">
                    <i class="fa fa-3x fa-chart-pie"></i>
                    <h5 class="mt-2 mb-0"><?=$currentTerm?> - <?=$currentSession?> Session</h5>
                    <p class="mb-4"><?=(!empty($termstart)) ? 'Start('.$termstart.') - End('.$termend.')' : '' ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
