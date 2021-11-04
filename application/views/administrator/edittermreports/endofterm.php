    <h2 class="mb-4"><?=$pageTitle?></h2>

    <div class="row mb-4">
        <div class="col-md">
            <div class="d-flex border">

            <?php
                foreach ($classList as $class) :
            ?>
                    <p><?=$class->class_details ?></p>
                <?php endforeach;?>

            </div>
        </div>
    </div>
