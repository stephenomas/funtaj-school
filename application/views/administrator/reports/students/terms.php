<div class="text-center"><h2 class="mb-4"><?=$pageTitle?></h2></div>
<?=anchor('reports', '<i class="fas fa-arrow-left"></i> Back', 'class="btn btn-primary"')?>
<span class="text-center text-info"><h4 class="mb-4"><?=$this->uri->segment(3).'/'.$this->uri->segment(4)?></h4></span>

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
            <div class="">

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
                $session = $this->uri->segment(3).'_'.$this->uri->segment(4);
                $sessionCheck = $this->uri->segment(3).'/'.$this->uri->segment(4);
                $count = 0;
                $this->db->where('student_id', $this->session->userdata('id'));
                $this->db->where('session', $sessionCheck);
                $this->db->group_by('term', 'asc');
                $terms = $this->db->get('exam');
                    foreach ($terms->result() as $trm) : $count++
                    ?>
                    <p><a href="<?=base_url('reports/period/'.$session.'/'.str_replace(' ', '_', $trm->term))?>" class="btn btn-outline-dark"><?=$trm->term?> <i class="fas fa-certificate"></i></a></p>
                    <hr>
                   <?php endforeach;?>
                <?php if($terms->num_rows() === 1 && $currentTerm === 'Term 2') : ?>
                    <p><a href="<?=base_url('reports/period/'.$session.'/'.str_replace(' ', '_', 'Term 2'))?>" class="btn btn-outline-dark"><?='Term 2'?> <i class="fas fa-certificate"></i></a></p>
                    <hr>
                <?php endif; ?>
                <?php if($terms->num_rows() === 1 && $currentTerm === 'Term 3') : ?>
                    <p><a href="<?=base_url('reports/period/'.$session.'/'.str_replace(' ', '_', 'Term 3'))?>" class="btn btn-outline-dark"><?='Term 3'?> <i class="fas fa-certificate"></i></a></p>
                    <hr>
                <?php endif; ?>
                <?php if($terms->num_rows() === 2 && $currentTerm === 'Term 3') : ?>
                    <p><a href="<?=base_url('reports/period/'.$session.'/'.str_replace(' ', '_', 'Term 3'))?>" class="btn btn-outline-dark"><?='Term 3'?> <i class="fas fa-certificate"></i></a></p>
                    <hr>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<!--Student end-->