<header class="desktop-nav header navbar fixed-top">
        <div class="nav-logo mr-5 ml-4 d-lg-inline-block d-none">
            <a href="./" class=""> <img src="<?=base_url()?>assets/student/assets/img/logo-3.png" class="img-fluid" alt="logo"></a>
        </div>
        <ul class="navbar-nav flex-row mr-auto">

            <li class="nav-item dropdown app-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="app-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="flaticon-star-circle-line"></span>
                </a>
                <div class="dropdown-menu  position-absolute" aria-labelledby="app-dropdown">
                    <a class="dropdown-item d-flex" href="#">
                        <i class="mr-3 flaticon-calendar-1"></i><span>Calendar</span>
                    </a>
                    <!-- <a class="dropdown-item d-flex" href="dragndrop_scrumboard.html">
                        <i class="mr-3 flaticon-edit-3"></i><span>Scrumboard</span>
                    </a> -->
                    <a class="dropdown-item d-flex" href="#">
                        <i class="mr-3 flaticon-copy"></i><span>Helpdesk</span>
                    </a>
                    <a class="dropdown-item d-flex" href="#">
                        <i class="mr-3 flaticon-location-1"></i><span>Contact Us</span>
                    </a>
                </div>
            </li>

            <li class="nav-item ml-4 d-lg-none">
                <form class="form-inline search-full form-inline search animated-search" role="search">
                    <i class="flaticon-search-1 d-lg-none d-block"></i>
                    <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                </form>
            </li>
        </ul>

        <ul class="navbar-nav flex-row ml-lg-auto">
            <li class="nav-item mr-5 d-lg-block d-none">
                <form class="form-inline form-inline search animated-search" role="search">
                    <i class="flaticon-search-1 d-lg-none d-block"></i>
                    <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                </form>
            </li>

            <li class="nav-item dropdown user-profile-dropdown mr-5  d-lg-inline-block d-none">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="user-profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media">
                        <img src="<?=base_url()?>assets/student/assets/img/90x90.jpg" class="img-fluid mr-2" alt="admin-profile">
                        <div class="media-body align-self-center">
                            <h6 class="mb-1"><?= $this->session->userdata('fname') ?></h6>
                            <p class="mb-0"><?= $this->session->userdata('prefix')." ".$this->session->userdata('digit') ?></p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu  position-absolute p-0" aria-labelledby="user-profile-dropdown">
                    <div class="dropdown-item d-flex justify-content-around">
                        <p class="mb-0 align-self-center">Your Account</p>
                        <div class="">
                            <i class="flaticon-star-outline"></i>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item d-flex" href="#">
                        <i class="mr-3 flaticon-user-11"></i> <span class="align-self-center">Profile Setting</span>
                    </a>
                    <a class="dropdown-item d-flex" href="#">
                        <i class="mr-3 flaticon-calendar"></i> <span class="align-self-center">Schedule</span>
                    </a>
                    <a class="dropdown-item d-flex" href="#">
                        <i class="mr-3 flaticon-mail-22"></i> <span class="align-self-center">Inbox</span>
                    </a>
                    <a class="dropdown-item d-flex" href="#">
                        <i class="mr-3 flaticon-lock-1"></i> <span class="align-self-center">Lock Screen</span>
                    </a>

                    <div class="dropdown-item dropdown-item-btn d-flex justify-content-around">
                        <a class="" href="#">
                            <i class="mr-2 flaticon-power-off"></i> <span class="align-self-center">Logout</span>
                        </a>
                    </div>
                </div>
            </li>
           
            

            <li class="nav-item dropdown notification-dropdown ml-3 mr-lg-4">
                <a href="<?= site_url('student-portal/store/cart') ?>" class="nav-link dropdown-toggle" id="notification-dropdown"  aria-haspopup="true" aria-expanded="false">
                    <span class="icon flaticon-cart-bag"></span><span class="badge badge-success"><?= $this->cart->total_items() ?></span>
                </a>
                <div class="dropdown-menu position-absolute p-0" aria-labelledby="notification-dropdown">
                    <div class="dropdown-item dropdown-header d-flex justify-content-between">
                        <p class="mb-0 align-self-center">Cart</p>
                        <div class="">
                            <i class="flaticon-cart-bag"></i>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="notification-scroll">
                        <div class="dropdown-item">
                            <div class="">
                                <div class="d-flex dropdown-action justify-content-between">
                                    <img src="assets/img/60x60.jpg" alt="">
                                    <i class="flaticon-cancel-12"></i>
                                </div>
                                <p class="notification-text"><span class="meta-usrname">3x </span>Short Sleeve Shirt</p>
                                <p class="meta-time">12,000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown cs-toggle ml-3 mr-lg-4"> 
                <a href="<?= site_url('student-portal/logout') ?>" class="nav-link ">
                    <span class="icon flaticon-log-3"></span>
                </a>
            </li>
        </ul>
    </header>