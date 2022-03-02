<!-- sample modal content -->
<div id="viewDetails" class="modal fade" tabindex="-1" aria-labelledby="#viewDetailsLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewDetailsLabel">Head Teacher/Principal Comments</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Students</th>
                            <th>Average Score/Grade</th>
                            <th>Subject Count</th>
                            <th>Comment</th>
                            <th>Delete</th>
                        </tr>
                    </thead>


                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Mike Stew</td>
                            <td class="text-danger">68.9 - B</td>
                            <td>17</td>
                            <td><textarea name="" id="" cols="30" rows="3" placeholder="Type your comment here"></textarea></td>
                            <td><a href="">Delete</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->