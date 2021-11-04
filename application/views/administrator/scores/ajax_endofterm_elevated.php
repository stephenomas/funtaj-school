<style>
    .visible {
        visibility: visible;
    }
    .invisible{
        visibility: hidden;
    }
</style>
<div><?=anchor('scores/endofterm', '<i class="fa fa-arrow-alt-circle-left btn"></i><span class="btn">Back to subject selection</span>')?></div>
<div class="row mb-4">
    <div class="col-md-3">

    </div>
    <div class="col-md-6">
        <div class="d-flex">
            <?php if(!empty($this->uri->segment(3))) : ?>
            <?php
            $this->db->where('id', $this->uri->segment(3));
            $sub = $this->db->get('subjects');
            foreach ($sub->result() as $subs) :
            $scoreSubject = $subs->subjects;
            $scoreSubjectId = $subs->id;
            echo '<div><h4 class="choose" id="subject">Choose class to enter scores for '.'<span class="text-danger" id="subject_name">'.strtoupper($subs->subjects).'</span>'.'</h4></div>';
            ?>
        </div>

        <div class="row mb-4">
            <div class="col-md">
                <div class="d-flex">
                    <div class="table">
                        <table>
                            <thead>
                            <tr>
                                <th scope="col">Class</th>
                                <th scope="col">Go</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $formIndex1 = 0; foreach($classes as $cl) : ?>
                                <tr>
                                    <?php
                                        $yearGroup = $cl->prefix.'_'.$cl->digit.$cl->groups;
                                        $subject = str_replace(' ', '_', $scoreSubject);
                                    ?>
                                    <td data-label="Class" class="text-info"><?=$cl->prefix.' '.$cl->digit.$cl->groups?></td>
                                    <td data-label=""><a href="<?=base_url('scores/enterEditScores/'.$scoreSubjectId.'/'.$subject.'/'.$yearGroup.'/'.$cl->id)?>" class="btn btn-primary" >Enter Scores</a> </td>
                                </tr>

                            <?php $formIndex1++; endforeach; ?>

                            </tbody>
                        </table>
                    </div>

            <?php endforeach ?>
            <?php endif;?>
        </div>
    </div>
    <div class="col-md-3">
    </div>
</div>