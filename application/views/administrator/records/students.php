<h2 class="mb-4"><?=$pageTitle.' - '.ucfirst($period).', '.$chosenTerm .' - '.str_replace('_', '/', $chosenSession).' Session'?></h2>
<?=anchor('reports/classes/'.str_replace(' ', '_', $chosenTerm).'/'.str_replace('/', '_', $chosenSession).'/'.$period, '<i class="fas fa-arrow-left"></i> Back', 'class="btn btn-primary"')?>
<h3 class="text-info text-center"><?=$classDetails?></h3>


<div class="row mb-4">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <div class="d-flex border">
            <table>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="text-center">Students Names</th>
                    <th scope="col" class="text-center"></th>
                </tr>
                </thead>
                <tbody>
                <?php $count = 0; foreach ($studentsInClass as $student) : $count++?>
                    <tr>
                        <td data-label="#"><?=$count?></td>
                        <td data-label="Student Name" class="text-danger"><?php
                            $this->db->where('id', $student->student_id);
                            $query = $this->db->get('students');
                            foreach ($query->result() as $stu){
                                echo $stu->fname.' '.$stu->mname.' '.$stu->lname;
                            }
                        ?></td>
                        <td data-label="View Report"><?=anchor('reports/viewReport/'.$period.'/'.$student->student_id.'/'.str_replace(' ', '_', $chosenTerm).'/'.str_replace('/', '_', $chosenSession).'/'.$this->uri->segment(3), '<i class="fas fa-file-pdf"></i>', 'class="btn btn-outline-primary"')?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-3">
    </div>

</div>