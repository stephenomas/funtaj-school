    <h2 class="mb-4"><?=$pageTitle?></h2>

    <div class="row mb-4">
        <div class="col-md-8">
            <div class="d-flex border">

                <div id="calendar"></div>

            </div>
        </div>
            <!-- /.col -->
            <div class="col-md-4">
                <?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'SuperAdmin') : ?>
                <p class="text-center">
                    <br>
                    <strong>Add Calendar Event</strong>
                </p>
                <div class="text-center">
                    <span id="event_message"></span>
                </div>
                <form id="add_event" role="form">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="input-group text-center ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Event Title</span>
                                </div>
                                <input type="text" class="form-control" id="title"
                                       placeholder="Event Title">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group text-center ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Start Date</span>
                                </div>
                                <input type="date" class="form-control" id="start">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group text-center ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">End Date</span>
                                </div>
                                <input type="date" class="form-control" id="end">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group text-center ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Location</span>
                                </div>
                                <input type="text" class="form-control" id="venue"
                                       placeholder="Location">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-center ">
                                <button type="button" onclick="addEvent()" class="form-control btn btn-primary">Add Event</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php endif ?>

        </div>
    </div>
