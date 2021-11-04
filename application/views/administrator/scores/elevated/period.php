    <h2 class="mb-4"><?=$pageTitle?></h2>
    <?php $this->db->where('id', $student_id);
    $dtu = $this->db->get('students');
    $stu = $dtu->first_row();
    $pre = $stu->class_prefix;
    $dig = $stu->curr_year;
    $grp = $stu->branch;?>
    <div><?=anchor('editreports/students/'.$pre.'/'.$dig.'/'.$grp, '<i class="fa fa-arrow-alt-circle-left btn"></i><span class="btn">Back</span>')?></div>
    <div class="row mb-4">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div class="d-flex text-center">
                <a href="<?=base_url('editreports/view/'.$student_id.'/midterm')?>" class="btn btn-primary">Midterm</a>&nbsp;
                <a href="<?=base_url('editreports/view/'.$student_id.'/endofterm')?>" class="btn btn-secondary">End OF Term</a>
            </div>
        </div>
        <div class="col-md-3">
        </div>
    </div>
