<div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>
                            <?php if($this->session->userdata('Elevated') == True): ?>
                            <li>
                                <a href="<?= site_url('dashboard') ?>" class="waves-effect">
                                    <i class="ri-dashboard-line"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                      
                            <!-- <li>
                                <a href="calendar" class=" waves-effect">
                                    <i class="ri-calendar-2-line"></i>
                                    <span>Calendar</span>
                                </a>
                            </li> -->
                         
                            <li>
                                <a href="<?=base_url('comments')?>" class=" waves-effect <?=($this->uri->segment(1) === 'comments') ? 'active': ''; ?>">
                                    <i class="ri-chat-1-line"></i>
                                    <span>Comment Bank</span>
                                </a>
                            </li>
                        
                            
                                
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-mail-send-line"></i>
                                    <span>School Options</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                <li><a class="<?=($this->uri->segment(1) === 'school') ? 'active': ''; ?>" href="<?=base_url('school')?>"> School Info</a></li>
                                <li><a class="<?=($this->uri->segment(2) === 'terms_sessions') ? 'active': ''; ?>" href="<?=base_url('school/terms_sessions')?>"> Terms & Sessions</a></li>
                                <li><a class="<?=($this->uri->segment(2) === 'subjects') ? 'active': ''; ?>" href="<?=base_url('school/subjects')?>">Subjects</a></li>
                                <li><a class="<?=($this->uri->segment(2) === 'classes') ? 'active': ''; ?>" href="<?=base_url('school/classes')?>"> Classes</a></li>
                                <li><a class="<?=($this->uri->segment(2) === 'signatures') ? 'active': ''; ?>" href="<?=base_url('school/signatures')?>"> Upload Signatures</a></li>
                                </ul>
                            </li>
                        
                            <li
                            <?=($this->uri->segment(1) === 'staff') ? 'active': ''; ?>><a href="<?=base_url('staff')?>" class="waves-effect">
                                    <i class="ri-group-line"></i>
                                    <span>Staffs</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if($this->session->userdata('Elevated') == True || $this->session->userdata('role') == 'Tutor' ): ?>
                            <li>
                                <a href="students" class=" waves-effect">
                                    <i class="ri-team-line"></i>
                                    <span>Students</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if($this->session->userdata('Elevated') == True): ?>
                            <li>
                                <a href="<?= site_url('students/old') ?>" class=" waves-effect">
                                    <i class="mdi mdi-microsoft-teams"></i>
                                    <span>Old Students</span>
                                </a>
                            </li>
                            <?php endif; ?>
                         
                                <?php if($this->session->userdata('role') == 'Account' || $this->session->userdata('Elevated')): ?>
                            <li class="menu-title">Finance</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-store-2-line"></i>
                                    <span>Store</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?= site_url('store/') ?>">Products</a></li>
                                    <li><a href="<?= site_url('store/orders') ?>">Orders</a></li>
                                    <!-- <li><a href="javascript: void(0);">Customers</a></li> -->
                                    <li><a href="cart">Cart</a></li>
                                    <li><a href="<?= site_url('store/checkout') ?>">Checkout</a></li>
                                    <li><a href="add=product">Add Product</a></li>
                                </ul>
                            </li>
                           
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-account-circle-line"></i>
                                    <span>Fees</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?= site_url('fees') ?>">School Fees</a></li>
                                    <li><a href="<?= site_url('fees/expenditure') ?>">Expenditure</a></li>
                                    <!-- <li><a href="javascript: void(0);">Recover Password</a></li>
                                    <li><a href="javascript: void(0);">Lock Screen</a></li> -->
                                </ul>
                            </li>
                            <?php endif; ?>
                            <?php if($this->session->userdata('role') == 'Tutor' || $this->session->userdata('Elevated')): ?>
                            <li class="menu-title">School</li>


                            <li>
                                <a href="<?= base_url('notes') ?>" class=" waves-effect">
                                    <i class="ri-book-3-line"></i>
                                    <span>Notes</span>
                                </a>
                            </li>

                            <li>
                                <a href="assignments" class=" waves-effect">
                                    <i class="ri-todo-line"></i>
                                    <span>Assignments</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-article-line"></i>
                                    <span>Term Scores</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?= site_url('/termscores/midterm') ?>">Mid Term</a></li>
                                    <li><a href="<?= site_url('/termscores/endofterm') ?>">End of Term</a></li>
                                    
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-article-line"></i>
                                    <span>Reports</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?= site_url('/midterm') ?>">Mid Term</a></li>
                                    <li><a href="<?= site_url('/endofterm') ?>">End of  Term</a></li>
                                    <li><a href="<?= site_url('/endofyear') ?>">Year Report</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="headtutor" class=" waves-effect">
                                    <i class="ri-message-3-line"></i>
                                    <span>HT/VP Comments</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <i class="ri-map-pin-line"></i>
                                    <span>Branches</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>