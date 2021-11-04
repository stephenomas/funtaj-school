<h2 class=" text-center"><?=$pageTitle?></h2>

<?=anchor('reports/termly/'.$session, '<i class="fas fa-arrow-left"></i> Back', 'class="btn btn-primary"')?>
<?php $student_id = $this->session->userdata('id');?>
<h4 class="text-info text-center"><?=$session.' - <span class="text-danger">'.$term.'</span>'?></h4>
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
        <div class="text-center">
            <?php
            $this->db->where('student_id', $student_id);
            $this->db->where('session', $session);
            $this->db->where('term', $term);

            $midtermget = $this->db->get('midterm');
            ?>
            <?php  if($midtermget->num_rows() != 0) : ?>
            <div class="form-group">
                <a href="<?=base_url('reports/view/midterm/'.$student_id.'/'.str_replace(' ', '_', $term).'/'.$session)?>" class="btn btn-primary form-control">Mid Term</a>
            </div>&nbsp;
            <?php endif;?>
            <div class="form-group">
                <a href="<?=base_url('reports/view/endofterm/'.$student_id.'/'.str_replace(' ', '_', $term).'/'.$session)?>" class="btn btn-primary form-control">End Of Term</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
    </div>
</div>