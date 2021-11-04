    <h2 class="mb-4"><?=$pageTitle?></h2>
    <div><?=anchor('editreports', '<i class="fa fa-arrow-alt-circle-left btn"></i><span class="btn">Back</span>')?></div>
    <div class="row mb-4">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div class="d-flex border">
                <table>
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Class Details</th>
                        <th scope="col">Go</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php $i = 0; foreach ($studentsInClass as $st) : $i++?>
                    <tr>
                        <td data-label><?=$i?></td>
                        <td data-label="Class Detail" class="text-info"><?=$st->fname.' '.$st->mname.' '.$st->lname?></td>
                        <td data-label="Go"><?=anchor('editreports/period/'.$st->id, '<i class="fas fa-arrow-right"></i>')?></td>
                    </tr>
                <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-3">
        </div>
    </div>
