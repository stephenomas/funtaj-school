    <h2 class="mb-4"><?=$pageTitle?></h2>
    <h5 class="mb-4 text-info"><?=$subTitle?></h5>

    <div class="row mb-4">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="d-flex border">

                <table class="text-center">
                    <thead>
                    <tr>
                        <th scope="col">Classes</th>
                        <th scope="col">Select</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $this->db->order_by('digit', 'asc');
                    $query = $this->db->get('classes');
                    foreach ($query->result() as $cl) : ?>
                    <tr>
                        <td data-label="Class"><a href="<?=base_url('headtutor/stu_comment/'.$cl->prefix.'/'.$cl->digit.'/'.$cl->groups)?>" class="btn"><?=$cl->prefix.' '.$cl->digit.$cl->groups?></a></td>
                        <td data-label="Select"><a href="<?=base_url('headtutor/stu_comment/'.$cl->prefix.'/'.$cl->digit.'/'.$cl->groups)?>" class="btn"><i class="fas fa-arrow-alt-circle-right"></i></a></td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
