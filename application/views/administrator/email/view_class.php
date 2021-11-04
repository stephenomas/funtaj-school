<div class="row mb-4">
    <div class="col-md">
        <h2 class="mb-4" id="hiderow">
            <?=$pageTitle?>
        </h2>
        <h2 class="text-primary"><?=$this->uri->segment(3).' '.$this->uri->segment(4).$this->uri->segment(5)?></h2>
        <div class="float-left" id="hiderow"><a id="hiderow" class="btn btn-link" href="<?=base_url('email')?>">Back</a></div>
        <div class="float-right" id="hiderow">
            <button class="btn btn-primary" onclick="printList()"><i class="fas fa-print"></i> Print</button>

            <script>
                function setDefaultPassword(password){
                    window.location(base_url + 'email/' +'defaultPassword/' +  password );
                }

                function printList() {
                    window.print();
                }
            </script>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md">
        <div class="card">

            <div class="card-header bg-white font-weight-bold">
                Students Email List - <span class="text-success"><?=$this->uri->segment(3).' '.$this->uri->segment(4).$this->uri->segment(5)?></span>
            </div>
            <div class="card-body">
                <table class="table" id="studentsTable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Adm.No</th>
                        <th scope="col">Class</th>
                        <th scope="col">Email</th>
                        <th id="hiderow" scope="col">Password</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(empty($this->uri->segment(3))){
                        $count = 0;
                    }else{
                        $count = (int)$this->uri->segment(3);
                    } foreach ($students_pagination->result() as $student) : $count++ ?>
                    <div>
                        <tr>
                            <td data-label="#"><?=$count?></td>
                            <td data-label="First Name"><?=$student->fname?></td>
                            <td data-label="Middle Name"><?=$student->mname?></td>
                            <td data-label="Last Name"><?=$student->lname?><?=(empty($student->email))? ' <span class="text-danger">No email!</span>' : ' '?></td>
                            <td data-label="Reg No."><?=$student->admno?></td>
                            <td data-label="Class"><?=$student->class_prefix.' '.$student->curr_year.$student->branch?></td>
                            <td data-label="Email"><?=$student->email?></td>

                            <!-- Edit Password Modal -->
                            <div class="modal fade" id="passwordEdit<?=$student->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Change Password for: <span class="text-primary"><?=$student->fname?>&nbsp;<?=$student->lname?></span></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body mx-3">
                                            <?=form_open('students/editPassword')?>
                                            <input type="hidden" name="url" value="<?=current_url()?>">
                                            <input type="hidden" name="id" value="<?=$student->id?>">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="">Password</i></span>
                                                </div>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button class="btn btn-default">Change Password</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!--  Edit password Modal Ends  -->

                            <td id="hiderow" data-label="Password"><a href="" class="" data-toggle="modal" data-target="#passwordEdit<?=$student->id?>"><i class="fa fa-key"></i></a></td>
                        </tr>
                        <?php endforeach;?>
                    </div>
                    </tbody>
                </table>

            </div>
        </div>
        <br>
<!--        <button class="btn btn-outline-info" id="to-top"><i class="fa fa-arrow-alt-circle-up"> </i>To top</button>-->
    </div>
</div>

<!--<div class="pagination">-->
<!--    --><?php //foreach ($pagLinks as $links){
//        echo '<li>'.$links.'</li>';
//    }; ?>
<!--</div>-->
<!--<script>-->
<!--    //Scroll to top-->
<!--    document.querySelector("#to-top").addEventListener("click", function(){-->
<!---->
<!--        var toTopInterval = setInterval(function(){-->
<!---->
<!--            var supportedScrollTop = document.body.scrollTop > 0 ? document.body : document.documentElement;-->
<!---->
<!--            if (supportedScrollTop.scrollTop > 0) {-->
<!--                supportedScrollTop.scrollTop = supportedScrollTop.scrollTop - 50;-->
<!--            }-->
<!---->
<!--            if (supportedScrollTop.scrollTop < 1) {-->
<!--                clearInterval(toTopInterval);-->
<!--            }-->
<!---->
<!--        }, 10);-->
<!---->
<!--    },false);-->
<!--</script>-->