<h2 class="mb-4"><?=$pageTitle.' - Choose Session'?></h2>


<div class="row mb-4">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <div class="d-flex border">
            <table>
                <thead>
                <tr>
                    <th class="text-center">Sessions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($allSessions as $sess) : ?>
                    <tr>
                        <td class="text-center"><?=anchor(base_url('reports/terms/endofterm/'.str_replace('/', '_', $sess->sessions)), $sess->sessions, 'class="btn btn-success"');?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-3">
    </div>

</div>
