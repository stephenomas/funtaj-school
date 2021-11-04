<h2 class="mb-4"><?=$pageTitle.' - '.$chosenSession.' Session'?></h2>
<?=anchor('reports/yearreport/', '<i class="fas fa-arrow-left"></i> Back', 'class="btn btn-primary"')?>
<!--Year Report-->

    <div class="row mb-4">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div class="d-flex border">
                <table>
                    <thead>
                    <tr>
                        <th class="text-center">Classes</th>
                    </tr>
                    </thead>
                    <?php
//                    $this->db->where('term', $chosenTerm);
                    $this->db->where('session', $chosenSession);
                    $this->db->group_by('class_details');
                    $this->db->order_by('class_details', 'asc');

                    $getClasses = $this->db->get('exam');?>
                    <tbody>
                    <?php if($getClasses->num_rows() === 0) :       ?>
                        <tr>
                            <td class="text-center text-danger">No "Exam" record(s) for chosen Session.</td>
                        </tr>
                    <?php endif?>
                    <?php foreach ($getClasses->result() as $class) : ?>
                        <tr>
                            <td class="text-center"><?=anchor(base_url('reports/student/'.str_replace(' ', '_', $class->class_details).'/'.str_replace('/', '_', $chosenSession)), $class->class_details, 'class="btn btn-primary"');?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-3">
        </div>
    </div>
<!--Year Report End-->