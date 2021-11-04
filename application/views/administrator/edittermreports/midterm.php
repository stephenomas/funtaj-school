    <h2 class="mb-4"><?=$pageTitle?></h2>

    <div class="row mb-4">
        <div class="col-md">
            <div class="d-flex border">
            <table>
                <thead>
                <tr>
                    <th scope="col">Classes</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($classList as $class) :
                    ?>
                    <tr>
<!--                        Junior Class-->
                            <?php
                            $juniorNeedle = array(
                                'one' => 1,
                                'two' => 2,
                                'three' => 3,
                                'four' => 4,
                                'five' => 5,
                                'six' => 6,
                                'seven' => 7,
                                'eight' => 8,
                                'nine' => 9
                            );
                          foreach ($juniorNeedle as $juniorClass) :
                              if(strpos($class->class_details, (string)$juniorClass )) :
                                  ?>
                                <td data-label="Class"><?=substr($class->class_details, (string)$juniorClass) ?></td>
                            <?php endif;?>
                          <?php endforeach;?>
<!--                        Senior Class-->

                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

            </div>
        </div>
    </div>
