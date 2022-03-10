<div class="modal fade" id="addInfo" tabindex="-1" role="dialog" aria-labelledby="addInfoTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInfoTitle">End of Term</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                <div class="mb-0 row">
                    <?php 
                        $classes = $this->db->get('classes')->result();
                        foreach($classes as $class){
                        ?>
                        
                        
                        <div class="card col-md-4">
                            <a href="mid-term-subj-scores" class="card-body">
                                <h4 class="card-title"><?= $class->prefix." ".$class->digit.$class->groups ?></h4>
                                <h6 class="card-subtitle font-14 text-muted">Enter Midterm Scores</h6>
                            </a>
                        </div>
                    <?php
                        }
                        ?>
                   

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->