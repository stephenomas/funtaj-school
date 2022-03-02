
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">

    <link rel="stylesheet" href="https://guduhigh.funtajschoolltd.com/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://guduhigh.funtajschoolltd.com/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://guduhigh.funtajschoolltd.com/assets/css/datatables.min.css">
    <link rel="stylesheet" href="https://guduhigh.funtajschoolltd.com/assets/css/calendar.min.css">
    <link rel="stylesheet" href="https://guduhigh.funtajschoolltd.com/assets/css/bootadmin.min.css">
    <link rel="stylesheet" href="https://guduhigh.funtajschoolltd.com/assets/css/custom.css">
    <link rel="stylesheet" href="https://guduhigh.funtajschoolltd.com/assets/css/table.css">
    <link rel="stylesheet" href="https://guduhigh.funtajschoolltd.com/assets/print/footer.css">
    <link rel="stylesheet" type="text/css" media="print" href="https://guduhigh.funtajschoolltd.com/assets/print/print.css">
    <link rel="stylesheet" type="text/css" media="print" href="https://guduhigh.funtajschoolltd.com/assets/print/style.css">
    <link rel="icon" href="https://guduhigh.funtajschoolltd.com/assets/images/New_funtaj_logo.png">

    <!-- Full Calendar -->
    <link rel="stylesheet" href="https://guduhigh.funtajschoolltd.com/assets/plugins/fullcalendar/main.min.css">
    <link rel="stylesheet" href="https://guduhigh.funtajschoolltd.com/assets/plugins/fullcalendar-daygrid/main.min.css">
    <link rel="stylesheet" href="https://guduhigh.funtajschoolltd.com/assets/plugins/fullcalendar-timegrid/main.min.css">

    <!-- Full Calendar JS -->
    <script src="https://guduhigh.funtajschoolltd.com/assets/plugins/fullcalendar/main.min.js"></script>
    <script src="https://guduhigh.funtajschoolltd.com/assets/plugins/fullcalendar-daygrid/main.min.js"></script>
    <script src="https://guduhigh.funtajschoolltd.com/assets/plugins/fullcalendar-interaction/main.min.js"></script>
    <script src="https://guduhigh.funtajschoolltd.com/assets/plugins/fullcalendar-timegrid/main.min.js"></script>
    <script src="https://guduhigh.funtajschoolltd.com/assets/plugins/moment/moment.min.js"></script>


    <title>MyFuntaj | View/Print Report for AHMAD RUQAYYAH ABUBAKAR</title>


    <script type="text/javascript">

        let base_url = "https://guduhigh.funtajschoolltd.com/";
        let user_id = "109";
        let user_role = "SuperAdmin";
        let currentTerm = "Term 3";
        let currentSession = "2020/2021";

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
            // wait period milliseconds before calling goInactive
            timeoutID = window.setTimeout(goInactive, 300000);
        }

        function resetTimer(e) {
            window.clearTimeout(timeoutID);

            goActive();
        }

        function goInactive() {
            window.location.href = base_url + 'logout/end/' + 109;
        }

        function goActive() {
            startTimer();
        }


    </script>

    <script>
        function startTime() {
            let today = new Date();

            let day, month, dayCount, monthDay;

            let dayGet = today.getDay();
            let monthGet = today.getMonth();
            dayCount = today.getDate();
            if(dayCount < 10){
                monthDay = "0" + today.getDate();
            }else {
                monthDay = today.getDate();
            }
            let year = today.getFullYear();

//          Create day names
            if(dayGet === 0){
                day = 'Sunday'
            } else if (dayGet === 1){
                day = 'Monday'
            } else if (dayGet === 2){
                day = 'Tuesday'
            } else if (dayGet === 3){
                day = 'Wednesday'
            } else if (dayGet === 4){
                day = 'Thursday'
            } else if (dayGet === 5){
                day = 'Friday'
            } else if (dayGet === 6){
                day = 'Saturday'
            }

//          Create month names
            if(monthGet === 0){
                month = 'January'
            } else if (monthGet === 1){
                month = 'February'
            } else if (monthGet === 2){
                month = 'March'
            } else if (monthGet === 3){
                month = 'April'
            } else if (monthGet === 4){
                month = 'May'
            } else if (monthGet === 5){
                month = 'June'
            } else if (monthGet === 6){
                month = 'July'
            } else if (monthGet === 7){
                month = 'August'
            } else if (monthGet === 8){
                month = 'September'
            } else if (monthGet === 9){
                month = 'October'
            } else if (monthGet === 10){
                month = 'November'
            } else if (monthGet === 11){
                month = 'December'
            }

            let h = today.getHours();
            let m = today.getMinutes();
            let s = today.getSeconds();

            let p;

            if(h < 12){
               h = today.getHours();
               p = 'AM';
            }else if(h === 12){
                h = 12;
                p = 'PM';
            }else if(h > 12){
                h = h - 12;
                p = 'PM';
            }

            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('digital_clock').innerHTML =
                day + ", " + month + " " + monthDay + ", " + year + "." + h + ":" + m + ":" + s + " " + p;
            let t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
            if (i < 10) {i = "0" + i}  // add zero in front of numbers < 10
            return i;
        }
    </script>

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-7441693958754187",
            enable_page_level_ads: true
        });
    </script>

</head>
<body class="bg-light" onload="startTime();">

<!-- -->

<nav id="hiderow" class="navbar navbar-expand navbar-dark bg-info">
    <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
    <a class="navbar-brand" href="https://guduhigh.funtajschoolltd.com/start"><img src="https://guduhigh.funtajschoolltd.com/assets/images/New_funtaj_logo.png" class="rounded-circle" style="width: 25px; height: 25px;">  MyFuntaj</a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="#" class="nav-link" id="digital_clock"></a></li>
<!--            <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-envelope"></i> 5</a></li>-->
<!--            <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-bell"></i> 3</a></li>-->
            <li class="nav-item dropdown">
                <a href="#" id="dd_user" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="https://guduhigh.funtajschoolltd.com/assets/uimg/profile/default.png" class="rounded-circle" style="width: 25px; height: 25px;"> Hi, Farouk</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">
                    <a href="https://guduhigh.funtajschoolltd.com/profile" class="dropdown-item">Profile</a>
                    <a href="https://guduhigh.funtajschoolltd.com/logout/go/109" class="dropdown-item">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="d-flex">
    <div class="sidebar sidebar-dark bg-dark" id="hiderow">
        <ul class="list-unstyled">
            <li class=""><a href="https://guduhigh.funtajschoolltd.com/start"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</a></li>
                            <li class="">
                <a href="#tl_school" data-toggle="collapse" >
                    <i class="fa fa-fw fa-wrench"></i> School Options
                </a>
                <ul id="tl_school" class="list-unstyled collapse ">
                    <li><a class="" href="https://guduhigh.funtajschoolltd.com/school"><i class="fa fa-fw fa-info"></i> School Info</a></li>
                    <li><a class="" href="https://guduhigh.funtajschoolltd.com/school/terms_sessions"><i class="fa fa-fw fa-desktop"></i> Terms & Sessions</a></li>
                    <li><a class="" href="https://guduhigh.funtajschoolltd.com/school/subjects"><i class="fa fa-fw fa-language"></i> Subjects</a></li>
                    <li><a class="" href="https://guduhigh.funtajschoolltd.com/school/classes"><i class="fa fa-fw fa-home"></i> Classes</a></li>
                    <li><a class="" href="https://guduhigh.funtajschoolltd.com/school/signatures"><i class="fa fa-fw fa-plus"></i> Upload Signatures</a></li>
                </ul>
            </li>
                    <li class=""><a href="https://guduhigh.funtajschoolltd.com/calendar"><i class="fa fa-fw fa-calendar"></i> Calendar</a></li>
                    <li class=""><a href="https://guduhigh.funtajschoolltd.com/staff"><i class="fa fa-fw fa-users"></i> Staff</a></li>
                    <li class=""><a href="https://guduhigh.funtajschoolltd.com/email"><i class="fa fa-fw fa-envelope"></i> Students' Mail</a></li>
                                        <li class=""><a href="https://guduhigh.funtajschoolltd.com/students"><i class="fa fa-fw fa-graduation-cap"></i> Students</a></li>
                <li class=""><a href="https://guduhigh.funtajschoolltd.com/comments"><i class="fa fa-fw fa-comment"></i> Comment Bank</a></li>
                                    <li class=""><a href="https://guduhigh.funtajschoolltd.com/notes"><i class="fa fa-fw fa-book"></i> Notes</a></li>
                <li class=""><a href="https://guduhigh.funtajschoolltd.com/assignments"><i class="fa fa-fw fa-file-word"></i> Assignments</a></li>
            <li class="">
                <a href="#tl_scores" data-toggle="collapse" >
                    <i class="fa fa-fw fa-clone"></i> Term Scores
                </a>
                <ul id="tl_scores" class="list-unstyled collapse ">
                    <li class=""><a href="https://guduhigh.funtajschoolltd.com/scores/midterm"><i class="fa fa-fw fa-ellipsis-h"></i> Mid-Term</a></li>
                    <li class=""><a href="https://guduhigh.funtajschoolltd.com/scores/endofterm"><i class="fa fa-fw fa-edit"></i> End Of Term</a></li>
                </ul>
            </li>
                <li class=""><a href="https://guduhigh.funtajschoolltd.com/broadsheet"><i class="fa fa-fw fa-file-excel"></i> BroadSheet</a></li>

<!--                Class Tutor   -->
                                                                        <li class=""><a href="https://guduhigh.funtajschoolltd.com/headtutor"><i class="fa fa-fw fa-comment"></i> HT/VP Comments</a></li>
                                <li class=""><a href="https://guduhigh.funtajschoolltd.com/editreports"><i class="fa fa-fw fa-edit"></i> Edit Term Reports</a></li>
                <li class="">
                    <a href="#tl_reports" data-toggle="collapse" aria-expanded="true">
                        <i class="fa fa-fw fa-certificate"></i> Reports
                    </a>
                    <ul id="tl_reports" class="list-unstyled collapse show"">
                        <li class="active"><a href="https://guduhigh.funtajschoolltd.com/reports/midterm"><i class="fa fa-fw fa-print"></i> Mid-Term</a></li>
                        <li class="active"><a href="https://guduhigh.funtajschoolltd.com/reports/endofterm"><i class="fa fa-fw fa-print"></i> End Of Term</a></li>
                        <li class="active"><a href="https://guduhigh.funtajschoolltd.com/reports/yearreport"><i class="fa fa-fw fa-print"></i> Year Report</a></li>
                    </ul>
                </li>
            <li class=""><a href="https://guduhigh.funtajschoolltd.com/store"><i class="fa fa-fw fa-cart-plus"></i> Store</a></li>
            <!--     Account menu       -->
                                        <li class=""><a href="https://guduhigh.funtajschoolltd.com/inventory"><i class="fa fa-fw fa-shopping-cart"></i> Manage Inventory</a></li>
                        <!--     Account menu end       -->
<!--     Students Menu Start       -->
         <!--     Students Menu End       -->
        </ul>
    </div>
    <div class="content p-4">
        <div class="text-center mb-4">
                                                            <div id="alertJavascript"> </div>
        </div><div class="text-center" id="hiderow"><h2 class="mb-4">View/Print Report for AHMAD RUQAYYAH ABUBAKAR</h2></div>
<div class="float-left"
     id="hiderow"><a href="https://guduhigh.funtajschoolltd.com/reports/students/Year_9C/Term_2/2020_2021/midterm" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a></div>
<div class="float-right" id="hiderow">
    <button class="btn btn-primary" onclick="printReport()"><i class="fas fa-print"></i> Print</button>
    </p>

    <script>
        function printReport() {
            window.print();
        }
    </script>
</div>


<div class="row mb-4">
    <div class="col-md-12">
        <div class="">
            <!-- Mid Term -->
                            <div class="text-center"><img src="https://guduhigh.funtajschoolltd.com/assets/images/New_funtaj_logo.png" class="rounded-circle" height="50px"
                                              width="50px">

                    <p class="">
                    <h3 class="">Funtaj International School, LTD</h3>
                    Plot 584, David Jemibewon Crescent, Off Oladipo Diya Road, Gudu, Apo                    <h5 class="">info@funtajschoolltd.com, enquiries@funtajschoolltd.com</h5>
                    <h6 class=""> 2347057928544,  2347057928066</h6>
                    </p>

                    <p class=""><h4>MidTerm Report</h4></p>
                </div>
                                <div class="">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <div class="">
                                                                <h4>Name: AHMAD RUQAYYAH ABUBAKAR</h4>
                                <h5 class="text-danger">Class: Year 9C</h5>
                                <h5 class="text-primary">Reg No: 1281 | DoB: 2007-01-25                                    | Term 2 | 2020/2021 Session</h5>
                                <!--                            <h6>Possible Attendance: | Actual Attendance:</h6>-->
                                <h5 class="text-secondary">Form Tutor:                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     Abu Chris                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="https://guduhigh.funtajschoolltd.com/assets/stuimg/IMG_7511.jpg" style="height: 125px; width: 125px"
                                 class="rounded float-right">
                        </div>
                    </div>
                    <table class="table-striped">
                        <thead style="font-size: medium">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Achievement</th>
                            <th scope="col">Effort</th>
                            <th scope="col">Homework</th>
                            <th scope="col">Behaviour</th>
                        </tr>
                        </thead>
                        <tbody style="font-size: medium">
                                                                                    <tr>
                                    <td data-label="#">1</td>
                                    <td data-label="Subject">Agric. Science</td>
                                    <td data-label="Achievement">B</td>
                                    <td data-label="Effort">2</td>
                                    <td data-label="Homework">B</td>
                                    <td data-label="Behaviour">2</td>
                                </tr>
                                                                                                                <tr>
                                    <td data-label="#">2</td>
                                    <td data-label="Subject">Basic Science</td>
                                    <td data-label="Achievement">A</td>
                                    <td data-label="Effort">1</td>
                                    <td data-label="Homework">A</td>
                                    <td data-label="Behaviour">1</td>
                                </tr>
                                                                                                                <tr>
                                    <td data-label="#">3</td>
                                    <td data-label="Subject">Basic Tech</td>
                                    <td data-label="Achievement">A</td>
                                    <td data-label="Effort">1</td>
                                    <td data-label="Homework">A</td>
                                    <td data-label="Behaviour">1</td>
                                </tr>
                                                                                                                <tr>
                                    <td data-label="#">4</td>
                                    <td data-label="Subject">Business Studies</td>
                                    <td data-label="Achievement">A</td>
                                    <td data-label="Effort">1</td>
                                    <td data-label="Homework">B</td>
                                    <td data-label="Behaviour">2</td>
                                </tr>
                                                                                                                <tr>
                                    <td data-label="#">5</td>
                                    <td data-label="Subject">Civic Edu.</td>
                                    <td data-label="Achievement">A</td>
                                    <td data-label="Effort">1</td>
                                    <td data-label="Homework">B</td>
                                    <td data-label="Behaviour">1</td>
                                </tr>
                                                                                                                <tr>
                                    <td data-label="#">6</td>
                                    <td data-label="Subject">Computer</td>
                                    <td data-label="Achievement">A</td>
                                    <td data-label="Effort">3</td>
                                    <td data-label="Homework">C</td>
                                    <td data-label="Behaviour">2</td>
                                </tr>
                                                                                                                <tr>
                                    <td data-label="#">7</td>
                                    <td data-label="Subject">French</td>
                                    <td data-label="Achievement">A</td>
                                    <td data-label="Effort">1</td>
                                    <td data-label="Homework">A</td>
                                    <td data-label="Behaviour">1</td>
                                </tr>
                                                                                                                <tr>
                                    <td data-label="#">8</td>
                                    <td data-label="Subject">Hausa</td>
                                    <td data-label="Achievement">A</td>
                                    <td data-label="Effort">1</td>
                                    <td data-label="Homework">A</td>
                                    <td data-label="Behaviour">1</td>
                                </tr>
                                                                                                                <tr>
                                    <td data-label="#">9</td>
                                    <td data-label="Subject">Home Eco.</td>
                                    <td data-label="Achievement">A</td>
                                    <td data-label="Effort">1</td>
                                    <td data-label="Homework">A</td>
                                    <td data-label="Behaviour">1</td>
                                </tr>
                                                                                                                <tr>
                                    <td data-label="#">10</td>
                                    <td data-label="Subject">IRS</td>
                                    <td data-label="Achievement">A</td>
                                    <td data-label="Effort">1</td>
                                    <td data-label="Homework">A</td>
                                    <td data-label="Behaviour">1</td>
                                </tr>
                                                                                                                <tr>
                                    <td data-label="#">11</td>
                                    <td data-label="Subject">Mathematics</td>
                                    <td data-label="Achievement">C</td>
                                    <td data-label="Effort">2</td>
                                    <td data-label="Homework">C</td>
                                    <td data-label="Behaviour">2</td>
                                </tr>
                                                                                                                <tr>
                                    <td data-label="#">12</td>
                                    <td data-label="Subject">Music</td>
                                    <td data-label="Achievement">A</td>
                                    <td data-label="Effort">1</td>
                                    <td data-label="Homework">A</td>
                                    <td data-label="Behaviour">1</td>
                                </tr>
                                                                                                                <tr>
                                    <td data-label="#">13</td>
                                    <td data-label="Subject">Social Studies</td>
                                    <td data-label="Achievement">B</td>
                                    <td data-label="Effort">2</td>
                                    <td data-label="Homework">B</td>
                                    <td data-label="Behaviour">1</td>
                                </tr>
                                                                            </tbody>
                    </table>
                    <p class="card text-danger" style="font-size: small">Key: (A: Excellent | 1: Highest) | (E: Poor -
                        5: Lowest) </p>
                                    </div>
                        <!--  Mid Term Ends  -->

            <!-- End Of Term -->
                        <!--  End Of Term Ends  -->

        </div>
    </div>
</div>
<div>

    
    <div class="container text-center exec">
        <!--        Grade or Year style-->
                    <!--Check if class is secondary-->
                                            <!--            Check if it's vp (Principal not selected)-->
                                    <!--Get the signature-->
                    
                    <img src="https://guduhigh.funtajschoolltd.com/assets/images/signatures/Ohai2.png" width="100em" height="100em" alt="Signed"><br>
                    <h5>Dr Tina Ohai</h5>
                    <p>Vice Principal</p>
                    <!--End if it's principals signature-->
                                <!--                End if student's class is greater than Year 6-->
                        <!--Check if class is primary-->
                        <!--        End of if Grade or Year style    -->
        

<!--      If class style  Junior/Senior-->
            </div>
</div>
</div>


<script src="https://guduhigh.funtajschoolltd.com/assets/js/jquery.min.js"></script>
<script src="https://guduhigh.funtajschoolltd.com/assets/js/underscore-min.js"></script>
<script src="https://guduhigh.funtajschoolltd.com/assets/js/calendar.min.js"></script>
<script src="https://guduhigh.funtajschoolltd.com/assets/js/bootstrap.bundle.min.js"></script>
<script src="https://guduhigh.funtajschoolltd.com/assets/js/bootadmin.min.js"></script>
<script src="https://guduhigh.funtajschoolltd.com/assets/js/tlcustom.js"></script>
<script src="https://guduhigh.funtajschoolltd.com/assets/js/tlbroadsheet.js"></script>
<script src="https://guduhigh.funtajschoolltd.com/assets/js/tlstore.js"></script>


</body>
</html>