<div class="topbar-nav header navbar fixed-top" role="banner">
            <div id="dismiss" class="d-lg-none text-right"><i class="flaticon-cancel-12 mr-3"></i></div>
            <nav id="topbar">
                <ul class="list-unstyled menu-categories d-lg-flex justify-content-lg-around mb-0" id="topAccordion">
                    <li class="menu">
                        <a href="./">
                            <div class="">
                                <i class="flaticon-computer-6"></i>
                                <span>Dashboard</span>
                            </div>

                            <div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="#uiAndComponents" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <i class="flaticon-3d-cube"></i>
                                <span>School Store</span>
                            </div>
                            <div>
                                <i class="flaticon-down-arrow"></i>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="uiAndComponents" data-parent="#topAccordion">
                            <li>
                                <a href="#dashboards" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"> Store <i class="flaticon-dot-three"></i> </a>
                                <ul class="collapse list-unstyled sub-submenu show" id="dashboards">
                                    <li class="active">
                                        <a href="<?= site_url('student-portal/store') ?>"> Buy Uniforms </a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('student-portal/orders') ?>"> Order History </a>
                                    </li>
                                    <li>
                                        <a href="cart"> Cart </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="<?= site_url('student-portal/results') ?>"  aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <i class="flaticon-copy"></i>
                                <span>Results</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <i class="flaticon-money"></i>
                                <span>Payments</span>
                            </div>
                            <div>
                                <i class="flaticon-down-arrow"></i>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="pages" data-parent="#topAccordion">
                            <li>
                                <a href="#dashboards" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"> Payment of Fees <i class="flaticon-dot-three"></i> </a>
                                <ul class="collapse list-unstyled sub-submenu show" id="dashboards">
                                    <li >
                                        <a href="<?= site_url('student-portal/school-fees/pay') ?>"> Pay School Fees</a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('student-portal/school-fees') ?>"> School Fees History </a>
                                    </li>
                                    <!-- <li>
                                        <a href=""> Fees History </a>
                                    </li> -->
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="#others" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <i class="flaticon-plus-2"></i>
                                <span>Others</span>
                            </div>
                            <div>
                                <i class="flaticon-down-arrow"></i>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="others" data-parent="#topAccordion">
                            <li>
                                <a href="#dashboards" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"> Other Options <i class="flaticon-dot-three"></i> </a>
                                <ul class="collapse list-unstyled sub-submenu show" id="dashboards">
                                    <li >
                                        <a href=""> Assignments</a>
                                    </li>
                                    <li>
                                        <a href=""> Notes </a>
                                    </li>
                                    <li>
                                        <a href=""> Announcement </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>


                </ul>
            </nav>
        </div>