<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">

    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/datatables.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/fullcalendar.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootadmin.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/custom.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/table.css">
    <link rel="icon" href="<?=($schoolLogo == '') ? base_url('assets/img/applogo.png') : base_url($schoolLogo)?>">

    <title><?=$appTitle?> | <?=$pageTitle?></title>


    <script type="text/javascript">

        let base_url = "<?=base_url();?>";

        function setup() {
            this.addEventListener("mousemove", resetTimer, false);
            this.addEventListener("mousedown", resetTimer, false);
            this.addEventListener("keypress", resetTimer, false);
            this.addEventListener("DOMMouseScroll", resetTimer, false);
            this.addEventListener("mousewheel", resetTimer, false);
            this.addEventListener("touchmove", resetTimer, false);
            this.addEventListener("MSPointerMove", resetTimer, false);

            startTimer();
        }
        setup();

        function startTimer() {
            // wait period seconds before calling goInactive
            timeoutID = window.setTimeout(goInactive, 300000);
        }

        function resetTimer(e) {
            window.clearTimeout(timeoutID);

            goActive();
        }

        function goInactive() {
            window.location.href = base_url + 'logout/end/' + <?=$this->session->userdata('id')?>;
        }

        function goActive() {
            startTimer();
        }


    </script>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand navbar-dark bg-info">
    <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
    <a class="navbar-brand" href="<?=base_url('start')?>"><img src="<?=($schoolLogo == '') ? base_url('assets/img/applogo.png') : base_url($schoolLogo)?>" class="rounded-circle" style="width: 25px; height: 25px;"><?='  '.$appTitle?></a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-envelope"></i> 5</a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-bell"></i> 3</a></li>
            <li class="nav-item dropdown">
                <a href="#" id="dd_user" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="<?=(!empty($this->session->userdata('img'))) ? base_url($this->session->userdata('img')) : base_url('assets/uimg/profile/default.png')?>" class="rounded-circle" style="width: 25px; height: 25px;"> <?='Hi, '.$this->session->userdata('fname')//.' '.$this->session->userdata('lname')?></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">
                    <a href="<?=base_url('profile')?>" class="dropdown-item">Profile</a>
                    <a href="<?=base_url('logout/go/'.$this->session->userdata('id'))?>" class="dropdown-item">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="d-flex">
    <div class="sidebar sidebar-dark bg-dark">
        <ul class="list-unstyled">
            <li class="<?=(current_url() === base_url('start')) ? 'active': ''; ?>"><a href="<?=base_url('start')?>"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</a></li>
                <?php if($this->session->userdata('role') === 'SuperAdmin' || $this->session->userdata('role') === 'Admin'): ?>
            <li class="<?=(current_url() === base_url('school')) ? 'active': ''; ?>">
                <a href="#tl_school" data-toggle="collapse" <?=($this->uri->segment(1) === 'school') ? 'aria-expanded="true"': ''; ?>>
                    <i class="fa fa-fw fa-wrench"></i> School Options
                </a>
                <ul id="tl_school" class="list-unstyled collapse <?=($this->uri->segment(1) === 'school') ? 'show"': ''; ?>">
                    <li><a class="<?=($this->uri->segment(1) === 'school') ? 'active': ''; ?>" href="<?=base_url('school')?>"><i class="fa fa-fw fa-info"></i> School Info</a></li>
                    <li><a class="<?=($this->uri->segment(2) === 'terms_sessions') ? 'active': ''; ?>" href="<?=base_url('school/terms_sessions')?>"><i class="fa fa-fw fa-desktop"></i> Terms & Sessions</a></li>
                    <li><a class="<?=($this->uri->segment(2) === 'subjects') ? 'active': ''; ?>" href="<?=base_url('school/subjects')?>"><i class="fa fa-fw fa-language"></i> Subjects</a></li>
                    <li><a class="<?=($this->uri->segment(2) === 'classes') ? 'active': ''; ?>" href="<?=base_url('school/classes')?>"><i class="fa fa-fw fa-home"></i> Classes</a></li>
                </ul>
            </li>
                    <li class="<?=($this->uri->segment(1) === 'staff') ? 'active': ''; ?>"><a href="<?=base_url('staff')?>"><i class="fa fa-fw fa-users"></i> Staff</a></li>
                    <?php endif;?>
            <?php if($this->session->userdata('Elevated') == True): ?>

            <li class="<?=($this->uri->segment(1) === 'students') ? 'active': ''; ?>"><a href="<?=base_url('students')?>"><i class="fa fa-fw fa-graduation-cap"></i> Students</a></li>
            <?php endif; ?>
            <?php if($this->session->userdata('role') == 'Tutor' || $this->session->userdata('Elevated') == True): ?>
            <li class="<?=($this->uri->segment(1) === 'notes') ? 'active': ''; ?>"><a href="<?=base_url('notes')?>"><i class="fa fa-fw fa-book"></i> Notes</a></li>
            <li class="<?=(current_url() === base_url('scores')) ? 'active': ''; ?>">
                <a href="#tl_scores" data-toggle="collapse" <?=($this->uri->segment(1) === 'scores') ? 'aria-expanded="true"': ''; ?>>
                    <i class="fa fa-fw fa-clone"></i> Term Scores
                </a>
                <ul id="tl_scores" class="list-unstyled collapse <?=($this->uri->segment(1) === 'scores') ? 'show"': ''; ?>">
                    <li class="<?=($this->uri->segment(1) === 'scores') ? 'active': ''; ?>"><a href="<?=base_url('scores/midterm')?>"><i class="fa fa-fw fa-ellipsis-h"></i> Mid-Term</a></li>
                    <li class="<?=($this->uri->segment(1) === 'scores') ? 'active': ''; ?>"><a href="<?=base_url('scores/endofterm')?>"><i class="fa fa-fw fa-edit"></i> End Of Term</a></li>
                </ul>
            </li>
            <li class="<?=(current_url() === base_url('reports')) ? 'active': ''; ?>">
                <a href="#tl_reports" data-toggle="collapse" <?=($this->uri->segment(1) === 'reports') ? 'aria-expanded="true"': ''; ?>>
                   <i class="fa fa-fw fa-certificate"></i> Reports
                </a>
                <ul id="tl_reports" class="list-unstyled collapse <?=($this->uri->segment(1) === 'reports') ? 'show"': ''; ?>">
                    <li class="<?=($this->uri->segment(1) === 'reports') ? 'active': ''; ?>"><a href="<?=base_url('reports/midterm')?>"><i class="fa fa-fw fa-print"></i> Mid-Term</a></li>
                    <li class="<?=($this->uri->segment(1) === 'reports') ? 'active': ''; ?>"><a href="<?=base_url('reports/endofterm')?>"><i class="fa fa-fw fa-print"></i> End Of Term</a></li>
                </ul>
            </li>
<!--            <li class="--><?//=($this->uri->segment(1) === 'records') ? 'active': ''; ?><!--"><a href="--><?//=base_url('records')?><!--"><i class="fa fa-fw fa-file-archive"></i> Past Records</a></li>-->
            <li class="<?=($this->uri->segment(1) === 'store') ? 'active': ''; ?>"><a href="<?=base_url('store')?>"><i class="fa fa-fw fa-cart-plus"></i> Store</a></li>
        <?php endif; ?>
<!--     Students Menu Start       -->
        <?php if($this->session->userdata('role') == 'Student'): ?>
            <li class="<?=($this->uri->segment(1) === 'notes') ? 'active': ''; ?>"><a href="<?=base_url('notes')?>"><i class="fa fa-fw fa-book"></i> Subject Notes</a></li>
            <li class="<?=($this->uri->segment(1) === 'assignments') ? 'active': ''; ?>"><a href="<?=base_url('assignments')?>"><i class="fa fa-fw fa-file-word"></i> Assignments</a></li>
            <li class="<?=($this->uri->segment(1) === 'reports') ? 'active': ''; ?>"><a href="<?=base_url('reports')?>"><i class="fa fa-fw fa-print"></i> My Reports</a></li>
            <li class="<?=($this->uri->segment(1) === 'store') ? 'active': ''; ?>"><a href="<?=base_url('store')?>"><i class="fa fa-fw fa-cart-plus"></i> Store</a></li>
        <?php endif; ?>
 <!--     Students Menu End       -->
        </ul>
    </div>
    <div class="content p-4">
        <div class="text-center mb-4">
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div>
            <?php } ?>
            <?php if ($this->session->flashdata('warning')) { ?>
                <div class="alert alert-warning"> <?= $this->session->flashdata('warning') ?> </div>
            <?php } ?>
            <?php if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-error"> <?= $this->session->flashdata('error') ?> </div>
            <?php } ?>
            <?php if ($this->session->flashdata('info')) { ?>
                <div class="alert alert-info"> <?= $this->session->flashdata('info') ?> </div>
            <?php } ?>
        </div>