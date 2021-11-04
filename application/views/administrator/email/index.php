<h2 class="mb-4"><?=$pageTitle?></h2>

<div class="text-center">
    <?=($this->session->userdata('role') === 'Admin' || $this->session->userdata('role') === 'SuperAdmin') ? anchor(base_url('email/defaultPassword/'.$defaultPassword), "<i class='fa fa-key'> Default Password</i>", array('onclick' => "return confirm('This will set default password for all students, do you wish to continue?')", 'class' => 'btn btn-warning')) : '' ?>
<!--    <a href="--><?//=base_url('email/defaultPassword/'.$defaultPassword)?><!--" class="btn btn-warning"><i class="fas fa-key"></i> Default Password</a>-->
    <script>
        function setDefaultPassword(password){

        }
    </script>
</div>
<hr>

<div class="row mb-4">
    <div class="col-md"></div>
    <div class="col-md">
        <div class="d-flex">
            <table>
                <thead>
                <tr>
                    <th scope="col">Classes</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($classes as $class): ?>
                <tr>
                    <td data-label="Class"><?=anchor('email/view/'.$class->prefix.'/'.$class->digit.'/'.$class->groups, $class->prefix.' '.$class->digit.$class->groups)?></td>
                    <td data-label=""><?=anchor('email/view/'.$class->prefix.'/'.$class->digit.'/'.$class->groups, '<i class="fas fa-arrow-right"></i>')?></td>
                </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md"></div>
</div>
