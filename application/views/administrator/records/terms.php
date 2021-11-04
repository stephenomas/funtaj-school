<h2 class="mb-4"><?=$pageTitle.' - '.ucfirst($period).', '.str_replace('_', '/', $chosenSession).' Session'?></h2>
<?=anchor('reports/'.$period, '<i class="fas fa-arrow-left"></i> Back', 'class="btn btn-primary"')?>


<div class="row mb-4">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <div class="d-flex border">
            <table>
                <thead>
                <tr>
                    <th class="text-center">Terms</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($allTerms as $terms) : ?>
                    <tr>
                        <td class="text-center"><?=($period === 'midterm') ? anchor(base_url('reports/classes/'.str_replace(' ', '_', $terms->terms).'/'.$chosenSession.'/'.$period), $terms->terms, 'class="btn btn-warning"') : anchor(base_url('reports/classes/'.str_replace(' ', '_', $terms->terms).'/'.$chosenSession.'/'.$period), $terms->terms, 'class="btn btn-primary"');?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-3">
    </div>

</div>