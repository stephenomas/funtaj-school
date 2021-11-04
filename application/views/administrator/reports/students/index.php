<div class="text-center"><h2 class="mb-4"><?=$pageTitle?></h2></div>
<!--Elevated Start-->
<?php if ($this->session->userdata('Elevated')) : ?>
    <div class="row mb-4">
        <div class="col-md">
            <div class="">
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
                echo '<table class=""><thead><tr><th scope="col">Class</th><th scope="col" class="text-danger"># Students</th><th scope="col">Choose</th></tr></thead><tbody>';
                foreach ($classes as $class){ ;
                    $this->db->where('class_prefix', $class->prefix);
                    $this->db->where('curr_year', $class->digit);
                    $this->db->where('branch', $class->groups);
                    $this->db->where('left_school', 0);
                    $this->db->where('has_graduated', 0);
                    $students = $this->db->get('students');
                    echo '<tr><td data-label="#" >'.$class->prefix.' '.$class->digit.$class->groups.'</td><td data-label="Subject" class="">'.$students->num_rows().'</td><td><a href="'.base_url('scores/endoftermview/'.$class->id).'" class=""><i class="fa fa-edit"></i></a></td></tr>';
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
<?php endif; ?>
<!--Elevated End-->
<!--Student Start-->
<?php if ($this->session->userdata('role') === 'Student') : ?>
    <div class="row mb-4">
        <div class="col-md">
            <div class="">
                <!--            Empty container-->
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div class="d-flex">

            </div>
        </div>
        <div class="col-md-3">
        </div>
    </div>
    <hr>
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="text-center">
                <?php
                $count = 0;
                $this->db->where('student_id', $this->session->userdata('id'));
                $this->db->group_by('session', 'asc');
                $sessions = $this->db->get('exam');
                foreach ($sessions->result() as $ses) : $count++
                    ?>
                    <p><a href="<?='reports/termly/'.$ses->session?>" class="btn btn-outline-dark"><?=$ses->session?> <i class="fas fa-arrow-right"></i></a></p>
                    <hr>
                <?php endforeach;?>
            </div>
        </div>
    </div>
<?php endif; ?>
<!--Student end-->