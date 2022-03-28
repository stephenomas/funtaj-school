<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

    <?php 
$this->load->view('administrator/inc/topbar')
//include 'inc/topbar.php'; ?>

<!-- ========== Left Sidebar Start ========== -->
<?php 
 $this->load->view('administrator/inc/sidebar')
//include 'inc/sidebar.php'; ?>


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Comments Bank</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Comments Bank</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <!-- <div class="col-12"> -->
                        <!-- Left sidebar -->
                        <div class="email-leftbar card col-md-3">
                            <?php if($this->session->flashdata('success')){ ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('success') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            
                            <?php } ?>

                            <?php if($this->session->flashdata('error')){ ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('error') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            
                            <?php } ?>
                            <div class="d-grid">
                                <div class="row">
                                    <a href="" class="btn btn-primary col-md-5 me-2 mb-3" data-bs-toggle="modal" data-bs-target="#commentmodal">
                                        Add Comment
                                    </a>
                                    <a href="" class="btn btn-secondary col-md-5 me-2 mb-3" data-bs-toggle="modal" data-bs-target="#categorymodal">
                                        Add Category
                                    </a>
                                </div>
                            </div>
                            <div class="mail-list mt-4">
                               
                            <h6 class="mt-4">Categories</h6>
                            <?php 
                                foreach ($categories as $category) :
                                ?>
                                <div><i class="mdi mdi-circle-outline me-2"></i> <?= $category->categories ?> <span class="ms-1 float-end"><a href="<?= site_url('/comments/deletecategory/'.$category->id) ?>"><i class="mdi mdi-trash-can-outline me-2 text-danger"></i></a></span></div><br>
                                <?php endforeach ?>
                             </div>

                        </div>
                        <!-- End Left sidebar -->


                        <!-- Right Sidebar -->
                        <div class="email-rightb mb-3 col-md-8">

                            <div class="card">
                                <div class="btn-toolbar p-3" role="toolbar">
                                    

                                </div>
                                
                                <ul class="message-list">
                                <?php foreach($comments as $comment) : ?>
                                    <li>
                                        <div class="col-mail col-mail-1">
                                            <div class="checkbox-wrapper-mail">
                                                <input type="checkbox" id="chk19">
                                                <label class="form-label" for="chk19" class="toggle"></label>
                                            </div>
                                            <a href="#" class="title"><?php if($comment->categories != ""){ echo $comment->categories; }else{ echo "No category"; } ?></a>
                                        </div>
                                        <div class="col-mail col-mail-2">
                                            <a href="#" class="subject"><?= $comment->comments ?></span>
                                            </a>
                                            <div class="date"> | <a href="<?= site_url('/comments/deletecomment/'.$comment->id) ?>">Delete</a></div>
                                        </div>
                                    </li>
                                <?php endforeach ?>

                                </ul>

                            </div> <!-- card -->

                            <div class="row">
                                <div class="col-7">
                                    Showing 1 - 20 of 1,524
                                </div>
                                <div class="col-5">
                                    <div class="btn-group float-end">
                                        <button type="button" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-left"></i></button>
                                        <button type="button" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-right"></i></button>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end Col-9 -->

                        <!-- </div> -->

                    </div><!-- End row -->
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <!-- Modal -->
            
            <?php //include 'inc/comment-modal.php'; 
            $this->load->view('administrator/inc/comment-modal')
            ?>
            <?php //include 'inc/category-modal.php';
            $this->load->view('administrator/inc/category-modal')
            ?>
            <?php //include 'inc/footer.php';
            $this->load->view('administrator/inc/footer')
            ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <?php   // include 'inc/right-bar.php';
       $this->load->view('administrator/inc/right-bar')
    ?>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>