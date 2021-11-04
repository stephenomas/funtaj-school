<div class="text-center"><h2 class="mb-4"><?=$pageTitle?></h2></div>
<?php if ($this->session->userdata('Elevated')) : ?>

    <div class="row mb-4">
        <div class="col-md">
            <div class="d-flex">
                <!--            Empty container-->
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <div class="d-flex border">
                <?php
                echo '<table class=""><thead><tr><th scope="col">#</th><th scope="col" class="text-danger">ALL SUBJECTS</th><th scope="col">Choose subject</th></tr></thead><tbody>';
                $count = 0;
                foreach ($subjects as $asubs){ $count++;
                    echo '<tr><td data-label="#" >'.$count.'</td><td data-label="Subject" class="">'.$asubs->subjects.'</td><td><a href="'.base_url('scores/endoftermscores/'.$asubs->id).'" class=""><i class="fa fa-edit"></i></a></td></tr>';
                }
                echo '</tbody></table>';
                ?>
            </div>
        </div>
        <div class="col-md-3">

        </div>
    </div>
    <hr>
    <div class="row mb-4">
        <div class="col-md">

        </div>
    </div>
<?php endif;?>
<?php if ($this->session->userdata('role') == 'Tutor') : ?>

    <div class="row mb-4">
        <div class="col-md">
            <div class="d-flex">
                <!--            Empty container-->
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <div class="d-flex border">
                <?php
                $this->db->where('tutor_id', $this->session->userdata('id'));
                $tsub = $this->db->get('tutor_subjects');
                echo '<table class=""><thead><tr><th scope="col">#</th><th scope="col" class="text-danger">YOUR SUBJECTS</th><th scope="col">Choose subject</th></tr></thead><tbody>';
                $count = 0;
                foreach ($tsub->result() as $tsubs){ $count++;
                    echo '<tr><td data-label="#" >'.$count.'</td><td data-label="Subject" class="">'.$tsubs->subject_title.'</td><td><a href="'.base_url('scores/endoftermscores/'.$tsubs->id).'" class=""><i class="fa fa-edit"></i></a></td></tr>';
                }
                echo '</tbody></table>';
                ?>
            </div>
        </div>
        <div class="col-md-3">

        </div>

    </div>

<?php endif;?>