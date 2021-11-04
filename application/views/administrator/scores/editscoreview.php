<script>
    document.onload = getComments();

    function copyComment(i) {
        /* Get the text field */
        let copyText = document.getElementById("comment_copy_output" + i);

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        /*For mobile devices*/

        /* Copy the text inside the text field */
        document.execCommand("copy");
    }

    function getComments() {
        let commentsGet = new XMLHttpRequest();
        commentsGet.open('GET', base_url + 'comments/getAllComments', true);

        commentsGet.onreadystatechange = function () {
            if (commentsGet.readyState === 4 && commentsGet.status === 200) {
                commentsGet.onload = function () {
                    let data = JSON.parse(commentsGet.responseText);
                    let out = '<table class="table-active">';
                    let j = 1;
                    for (let i = 0; i < data.comments.length; i++) {
                        out += '<tr>';
                        out += '<td data-label="#"><strong class="text-primary">'+ j +'</strong></td>';
                        out += '<td data-label="Comment"><textarea readonly class="form-control" id="comment_copy_output' + i + '">' + data.comments[i].comments + '</textarea></td>';
                        out += '<td data-label="Comment"><button class="btn btn-primary form-control" type="button" onclick="copyComment('+ i +')">Copy</button></td>';
                        out += '</tr>';
                        j++;
                    }
                    out += '</table>';
                    document.getElementById('tutorCommentsList').innerHTML = out;
                }
            }
        };

        commentsGet.send();
    }
</script>
<div><?= anchor('scores/endoftermscores/' . $subjectId, '<i class="fa fa-arrow-alt-circle-left btn"></i><span class="btn">Back to class</span>') ?></div>
<div class="row mb-4">
    <div class="">
        <div class="d-flex">


        </div>
    </div>

    <?php $formIndex = 0; ?>

    <div class="col-md-12">
        <div class="d-flex">
            <!-- Enter Scores -->
            <h4 class="modal-title w-100 font-weight-bold text-center">Enter <span
                        class="text-danger"><?= $scoreSubject ?></span> Scores For: <span
                        class="text-primary"><?= $classDetails ?></span></h4>
            <button data-toggle="modal" data-target="#comment_modal" type="button" class="btn btn-primary">Comment Bank
                <i class="fas fa-comment"></i></button>

            <!-- Comment Bank Modal -->


            <div class="modal fade" id="comment_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Subject Tutor Comments</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body mx-3">
                            <div id="tutorCommentsList"></div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">

                        </div>
                    </div>
                </div>
            </div>

            <!-- Comment Bank Modal Ends  -->

        </div>
        <?php
        $this->db->where('class_prefix', $prefix);
        $this->db->where('curr_year', $digit);
        $this->db->where('branch', $groups);
        $this->db->where('left_school', 0);
        $this->db->where('has_graduated', 0);
        $stunum = $this->db->get('students');
        if ($stunum->num_rows() > 12) : ?>
            <h5 class="text-center"><small>Scroll for more students...</small></h5>
        <?php endif; ?>
        <div class=""  style="margin-top: 5px">
            <table>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">CA%</th>
                    <th scope="col">Exam%</th>
                    <th scope="col">Avg%</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Save</th>
                    <th scope="col">Clear</th>
                </tr>
                </thead>
                <?php
                $this->db->where('class_prefix', $prefix);
                $this->db->where('curr_year', $digit);
                $this->db->where('branch', $groups);
                $this->db->where('left_school', 0);
                $this->db->where('has_graduated', 0);
                $this->db->order_by('fname', 'asc');
                $stuget = $this->db->get('students');

                $stuCount = 0;
                $recordArrayIndex = 0;

                foreach ($stuget->result() as $stu) :
                $stuCount++; ?>
                <tbody>

                <form id="examform<?= $formIndex ?>">
                    <input type="hidden" id="subject_title<?= $recordArrayIndex ?>" name="subject_title"
                           value="<?= $scoreSubject ?>">
                    <input type="hidden" id="term" name="term" value="<?= $currentTerm ?>">
                    <input type="hidden" id="session" name="session" value="<?= $currentSession ?>">
                    <input type="hidden" id="tutor_id" name="tutor_id"
                           value="<?= $this->session->userdata('fname') . ' ' . $this->session->userdata('lname') ?>">
                    <input type="hidden" id="scoreUrl" name="scoreUrl"
                           value="<?= 'scores/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) ?>">


                    <input type="hidden" id="class_details<?= $recordArrayIndex ?>" name="class_details"
                           value="<?= $stu->class_prefix . ' ' . $stu->curr_year . $stu->branch ?>">
                    <input type="hidden" id="student_id<?= $recordArrayIndex ?>" name="student_id[]"
                           value="<?= (int)$stu->id ?>">
                    <tr>
                        <?php
                        $this->db->where('student_id', (int)$stu->id);
                        $this->db->where('subject_title', $scoreSubject);
                        $this->db->where('session', $currentSession);
                        $this->db->where('term', $currentTerm);
                        $examGet = $this->db->get('exam');
                        $examData = $examGet->first_row();
                        ?>
                        <td data-label="#">
                            <?= $stuCount ?>
                        </td>
                        <td data-label="Name">&nbsp;
                            <?= $stu->fname . ' ' . $stu->mname . ' ' . $stu->lname ?><span
                                    class="text-danger"><?= ' - ' . $stu->admno ?></span>
                        </td>
                        <td data-label="CA%">&nbsp;
                            <input type="text" id="ca<?= $recordArrayIndex ?>"
                                   onkeyup="viewExamSaveButton('<?= $recordArrayIndex ?>', '<?= $formIndex ?>')"
                                   name="ca[]" value="<?= (!empty($examData->ca)) ? $examData->ca : ' ' ?>"
                                   class="col-sm form-control" maxlength="5" style="width: 50px" required>
                        </td>
                        <td data-label="Exam%">&nbsp;
                            <input type="text" id="exam<?= $recordArrayIndex ?>"
                                   onkeyup="viewExamSaveButton('<?= $recordArrayIndex ?>', '<?= $formIndex ?>')"
                                   name="exam[]" value="<?= (!empty($examData->exam)) ? $examData->exam : ' ' ?>"
                                   class="col-sm form-control" maxlength="5" style="width: 50px" required>
                        </td>
                        <td data-label="Avg%">&nbsp;
                            <input type="text" id="avg<?= $recordArrayIndex ?>"
                                   onkeyup="viewExamSaveButton('<?= $recordArrayIndex ?>', '<?= $formIndex ?>')"
                                   name="avg[]" value="<?= (!empty($examData->average)) ? $examData->average : ' ' ?>"
                                   readonly class="col-sm form-control" maxlength="5" style="width: 50px" required>
                        </td>
                        <td data-label="Grade">&nbsp;
                            <input type="text" id="grade<?= $recordArrayIndex ?>"
                                   onkeyup="viewExamSaveButton('<?= $recordArrayIndex ?>', '<?= $formIndex ?>')"
                                   name="grade[]" value="<?= (!empty($examData->grade)) ? $examData->grade : ' ' ?>"
                                   readonly class="col-sm form-control" maxlength="5" style="width: 50px" required>
                        </td>
                        <td data-label="Comment">&nbsp;
                            <textarea style="min-width: 400px" id="comment<?= $recordArrayIndex ?>"
                                      onkeyup="viewExamSaveButton('<?= $recordArrayIndex ?>', '<?= $formIndex ?>')"
                                      name="comment[]" class="form-control"
                                      required><?= (!empty($examData->comment)) ? trim($examData->comment) : '' ?></textarea>
                        </td>
                        <td data-label="Save">&nbsp;
                            <button id="save<?= $recordArrayIndex ?>"
                                    onclick="getSetExam('<?= $recordArrayIndex ?>', '<?= $formIndex ?>'); return false"
                                    class="btn btn-warning" style="visibility: hidden"><i class="fas fa-save"></i>
                            </button>
                        </td>
                        <td data-label="Clear">
                            <button type="reset"
                                    onclick="clearExamScore('<?= (int)$stu->id ?>', '<?= $scoreSubject ?>', '<?= $recordArrayIndex ?>', '<?= $formIndex ?>')"
                                    class=" btn btn-outline-dark" value="Reset">Reset
                            </button>
                        </td>
                    <tr>

                        <?php $recordArrayIndex++; ?>

                        <?php endforeach;
                        $formIndex++; ?>

                </tbody>
            </table>
            <hr>

            </form>
        </div>
    </div>

    <!--  Enter Scores Ends  -->
    <div class="">
        <div class="d-flex">


        </div>
    </div>
</div>
