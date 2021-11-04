<h2 class="mb-4"><?= $pageTitle ?></h2>

<div class="row mb-4">
    <div class="col-md-2" style="margin-bottom: 5px">
        <div class="">
            <select id="session" class="form-control" onchange="getClassScores()">
                <?php foreach ($allSessions as $ss) : ?>
                    <option value="<?= $ss->sessions ?>"><?= $ss->sessions ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-md-2" style="margin-bottom: 5px">
        <div class="">
            <select id="term" class="form-control" onchange="getClassScores()">
                <?php foreach ($allTerms as $tt) : ?>
                    <option value="<?= $tt->terms ?>"><?= $tt->terms ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-md-2" style="margin-bottom: 5px">
        <div class="">
            <?php if ($classPrefix === 'Year' || $classPrefix === 'Grade') : ?>
                <input type="text" class="form-control" value="<?= $classPrefix ?>" id="prefix" readonly
                       onchange="getClassScores()">
            <?php endif; ?>
            <?php if ($classPrefix == 'Junior_Senior') : ?>
                <select id="prefix" class="form-control" onchange="getStudentsInClass()">
                    <?php foreach ($classes as $cl) : ?>
                        <option value="<?= $cl->prefix ?>"><?= $cl->prefix ?></option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-2" style="margin-bottom: 5px">
        <div class="">
            <select id="digit" class="form-control" onchange="getClassScores()">
                <option value="">Choose year group</option>
                <?php foreach ($classesDigit as $cl) : ?>
                    <option value="<?= $cl->digit ?>"><?= $cl->digit ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-md-2" style="margin-bottom: 5px">
        <div class="">
            <select id="groups" class="form-control" onchange="getClassScores()">
                <option value="">Choose form group</option>
                <?php foreach ($classesGroup as $cl) : ?>
                    <option value="<?= $cl->groups ?>"><?= $cl->groups ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-md-2" style="margin-bottom: 5px">
        <div class="">

        </div>
    </div>
</div>

<div id="broadsheet_header"></div>

<div id="class_scores"></div>