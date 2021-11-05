<?php defined('BASEPATH') OR exit('Direct script access not allowed!');
class School extends TL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

        $this->data['sessionClasses'] = $this->getSessionClasses();
    }

    function index()
    {
        if ($this->session->userdata('Elevated')) {
            $this->data['pageTitle'] = 'School Info';

            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/elevated/school', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);
        } else {
            redirect('welcome');
        }
    }

    function terms_sessions()
    {
        if ($this->session->userdata('Elevated')) {
            $this->data['pageTitle'] = 'Terms & Sessions';

             $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/elevated/term_session', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);
        } else {
            redirect('welcome');
        }
    }

    function subjects()
    {
        if ($this->session->userdata('Elevated')) {
            $this->data['pageTitle'] = 'Subjects';

            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/elevated/subjects', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);
        } else {
            redirect('welcome');
        }
    }

    function classes()
    {
        if ($this->session->userdata('Elevated')) {
            $this->data['pageTitle'] = 'Classes';

            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/elevated/classes', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);
        } else {
            redirect('welcome');
        }
    }

    function signatures(){
        if ($this->session->userdata('Elevated')) {
            $this->data['pageTitle'] = 'Upload Authorised Signatures';

            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/elevated/signatures', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);
        } else {
            redirect('welcome');
        }
    }

    function updateSchoolDetails()
    {
        if ($this->session->userdata('Elevated')) {
         

           
                $id = $_POST['id'];
                $name = $_POST['name'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $principal = $_POST['principal'];
                $vp = $_POST['vp'];
                $website = $_POST['website'];
                $emailext = $_POST['emailext'];
                $appslog = $_POST['appslog'];
                $defaultpw = $_POST['defaultpw'];
                $campus = $_POST['campus'];

                $data = array(
                    'schoolName' => $name,
                    'address' => $address,
                    'email' => $email,
                    'phone' => $phone,
                    'principal' => $principal,
                    'vp' => $vp,
                    'website' => $website,
                    'emailext' => $emailext,
                    'appslog' => $appslog,
                    'default_password' => $defaultpw,
                    'campus' => $campus,
                );

                $update = $this->school_model->updateSchoolDetails($id, $email, $name, $address, $phone, $principal, $vp, $website, $appslog, $emailext, $defaultpw, $campus);
                if($update){
                    redirect('school');
                }
                echo json_encode($data);

//                if ($update) {
//                    redirect('school');
//                }
//                redirect('school');
            
        }
    }

    function uploadSignature(){
        if ($this->session->userdata('Elevated')) {
            $config['upload_path'] = './assets/images/signatures/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 250;
            $config['max_width'] = 1024;
            $config['max_height'] = 1024;
            $config['remove_spaces'] = TRUE;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('userfile')) {
                redirect('school');
            } else {
                $fdata = $this->upload->data();

                $signature = 'assets/images/signatures/' . $fdata['file_name'];

                $full_name = $this->input->post('full_name');
                $position = $this->input->post('position');
                $term = $this->input->post('term');
                $session = $this->input->post('session');

                $process = $this->school_model->uploadSignature($full_name, $position, $signature, $term, $session);
                if ($process) {
                    $this->session->set_flashdata('success', 'You successfully added a new Signature.');
                    redirect('school/signatures');
                }
            }
        } else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }

    function deleteSignature($id){
        if ($this->session->userdata('Elevated')) {
            $this->db->where('id', $id);
            $get = $this->db->get('signatures');
            $pathFind = $get->first_row();

            unlink( './'. $pathFind->signature);

            $this->db->where('id', $id);
            $this->db->delete('signatures');

            $this->session->set_flashdata('success', 'Signature successfully deleted!');
            redirect('school/signatures');

        } else {
            $this->session->set_flashdata('warning', 'You are not authorised to perform elevated functions!');
            redirect('start');
        }
    }

    function setSchoolLogo()
    {
        if ($this->session->userdata('Elevated')) {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 250;
            $config['max_width'] = 1024;
            $config['max_height'] = 1024;
            $config['remove_spaces'] = TRUE;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('userfile')) {
                redirect('school');
            } else {
                $fdata = $this->upload->data();

                $logo = 'assets/images/' . $fdata['file_name'];
                $id = $this->input->post('id');

                $process = $this->school_model->setSchoolLogo($id, $logo);
                if ($process) {
                    redirect('school');
                }
            }
        } else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }

    function createTerm()
    {
        if ($this->session->userdata('Elevated')) {
            $this->form_validation->set_rules('term', 'Term', 'required');

            if ($this->form_validation->run()) {
                $term = $this->input->post('term');
                $createTerm = $this->school_model->createTerm($term);
                if ($createTerm) {
                    redirect('school/terms_sessions');
                }
            }
        } else {
            redirect('start');
        }
    }

    function createSession()
    {
        if ($this->session->userdata('Elevated')) {
            $this->form_validation->set_rules('session', 'Session', 'required');

            if ($this->form_validation->run()) {
                $session = $this->input->post('session');
                $createSession = $this->school_model->createSession($session);
                if ($createSession) {
                    redirect('school/terms_sessions');
                }
            }
        } else {
            redirect('start');
        }
    }

    function setNumberOfDays(){
        if ($this->session->userdata('Elevated')) {
            $numberOfDays = $this->input->post('numberOfDays');
            $setDays = $this->school_model->setNumberOfDays($numberOfDays, $this->data['currentTerm'], $this->data['currentSession']);
            if ($setDays) {
                redirect('school/terms_sessions');
            }
        } else {
            redirect('start');
        }
    }

    function setCurrentTerm()
    {
        if ($this->session->userdata('Elevated')) {
            $term = $this->input->post('term');
            $setTerm = $this->school_model->setTerm($term);

            $this->db->where('session', $this->data['currentSession']);
            $this->db->where('term', $this->data['currentTerm']);
            $get_approved = $this->db->get('approved_result');
            if($get_approved->num_rows() < 1){
                $data = array(
                    'session'=> $this->data['currentSession'],
                    'term' => $this->data['currentTerm'],
                );
                $this->db->insert('approved_result', $data);
            }


            if ($setTerm) {
                redirect('school/terms_sessions');
            }
        } else {
            redirect('start');
        }
    }

    function setCurrentSession()
    {
        if ($this->session->userdata('Elevated')) {
            $session = $this->input->post('session');

//          For promoting students
            $data = array(
                'session' => $session,
            );
            $this->db->where('session', $session);
            $getPromoteSession = $this->db->get('students_promotions');

            if($getPromoteSession->num_rows() > 0){
//            $this->db->update('students_promotions', $data);
            }else{
                $this->db->insert('students_promotions', $data);
            }

            $setSession = $this->school_model->setSession($session);
            if ($setSession) {
                redirect('school/terms_sessions');
            }
        } else {
            redirect('start');
        }
    }

    function setTermDates()
    {
        if ($this->session->userdata('Elevated')) {
            $currentTerm = $this->input->post('current_term');
            $currentSession = $this->input->post('current_session');
            $startDate = $this->input->post('start_date');
            $endDate = $this->input->post('end_date');
            $setDates = $this->school_model->setTermDates($currentTerm, $currentSession, $startDate, $endDate);
            if ($setDates) {
                redirect('school/terms_sessions');
            }
        } else {
            redirect('start');
        }
    }

    function deleteSubject($id)
    {
        if ($this->session->userdata('Elevated')) {
            $delete = $this->school_model->deleteSubject($id);
            if ($delete) {
                redirect('school/subjects');
            }
            redirect('school/subjects');
        } else {
            redirect('start');
        }
    }

    function editSubject()
    {
        if ($this->session->userdata('Elevated')) {
            $subject = $this->input->post('subject');
            $code = $this->input->post('code');
            $id = $this->input->post('id');
            $edit = $this->school_model->editSubject($id, $subject, $code);
            if ($edit) {
                redirect('school/subjects');
            }
            redirect('school/subjects');
        } else {
            redirect('start');
        }
    }

    function addSubject()
    {
        if ($this->session->userdata('Elevated')) {
            $subject = $this->input->post('subject');
            $code = $this->input->post('code');
            $add = $this->school_model->addSubject($subject, $code);
            if ($add) {
                $this->session->set_flashdata('success', 'You successfully added a new subject.');
                redirect('school/subjects');
            }
            redirect('school/subjects');
        } else {
            redirect('start');
        }
    }

    function setClassPrefix()
    {
        if ($this->session->userdata('Elevated')) {
            $prefix = $this->input->post('prefix');

            $get = $this->db->get('class_prefix_style');
            $data = array(
                'style' => $prefix,
            );
            if ($get->num_rows() < 1) {
                $this->db->insert('class_prefix_style', $data);
                redirect('school/classes');
            } else {
                foreach ($get->result() as $g) {
                    $id = $g->id;
                }
                $data = array(
                    'style' => $prefix,
                    'id' => $id,
                );
                $this->db->where('id', $id);
                $this->db->update('class_prefix_style', $data);
                redirect('school/classes');
            }
        } else {
            redirect('start');
        }
    }

    function addClass()
    {
        if ($this->session->userdata('Elevated')) {
            $prefix = $this->input->post('prefix');
            $digit = $this->input->post('digit');
            $group = ucfirst(strtolower($this->input->post('group')));
            $currentSession = $this->input->post('current_session');

            $create = $this->school_model->addClass($prefix, $digit, $group, $currentSession);
            if ($create) {
                $this->session->set_flashdata('success', 'You successfully added a new Class.');
                redirect('school/classes');
            }
            redirect('school/classes');
        } else {
            redirect('start');
        }
    }

    function deleteClass($id)
    {
        if ($this->session->userdata('Elevated')) {
            $delete = $this->school_model->deleteClass($id);
            if ($delete) {
                redirect('school/classes');
            }
            redirect('school/classes');
        } else {
            redirect('start');
        }
    }

    function editClass()
    {
        if ($this->session->userdata('Elevated')) {
            $prefix = $this->input->post('prefix');
            $digit = $this->input->post('digit');
            $group = ucfirst(strtolower($this->input->post('group')));
            $currentSession = $this->input->post('current_session');
            $id = $this->input->post('id');
            $edit = $this->school_model->editClass($id, $prefix, $digit, $group, $currentSession);
            if ($edit) {
                redirect('school/classes');
            }
            redirect('school/classes');
        } else {
            redirect('start');
        }
    }

    function setClassTutor()
    {
        if ($this->session->userdata('Elevated')) {
            $id = $this->input->post('id');
            $prefix = $this->input->post('prefix');
            $digit = $this->input->post('digit');
            $group = ucfirst(strtolower($this->input->post('group')));
            $currentSession = $this->input->post('current_session');
            $currentTerm = $this->input->post('current_term');
            $tutor_id = $this->input->post('tutor_id');
            $edit = $this->school_model->setClassTutor($id, $prefix, $digit, $group, $currentSession, $currentTerm, $tutor_id);
            if ($edit) {
                redirect('school/classes');
            }
            redirect('school/classes');
        } else {
            redirect('start');
        }
    }

    //This copies classes from last session to the current
    function copyClasses(){
        if($this->session->userdata('Elevated')){
        $lastSession = $this->input->post('last_session');
        $currSession = $this->input->post('curr_session');
        $this->db->where('session', $lastSession);
        $getClasses = $this->db->get('classes');
        foreach ($getClasses->result() as $class) {
            $prefix = $class->prefix;
            $digit = $class->digit;
            $group = $class->groups;

            $data = array(
                'prefix' => $prefix,
                'digit' => $digit,
                'groups' => $group,
                'session' => $currSession,
            );

            $this->db->insert('classes', $data);
            }
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }

    function getSessionClasses(){
        if($this->session->userdata('Elevated')){
        $this->db->order_by('prefix', 'asc');
        $this->db->order_by('digit', 'asc');
        $this->db->order_by('groups', 'asc');
        $query = $this->db->get('classes');
        return $query->result();
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }

    function students($prefix, $digit, $group)
    {
        if($this->session->userdata('Elevated')){
        $this->data['pageTitle'] = 'Students in ' . $prefix . ' ' . $digit . $group;

        //Get students in class
        $this->db->where('class_prefix', $prefix);
        $this->db->where('curr_year', $digit);
        $this->db->where('branch', $group);
            $this->db->where('left_school', 0);
            $this->db->where('has_graduated', 0);
        $this->db->order_by('fname', 'asc');
        $stu = $this->db->get('students');
        //Add returned result array to variable $students for use in view
        $this->data['studentsInClass'] = $stu->result();
        $this->data['studentsCount'] = $stu->num_rows();

        $this->data['prefix'] = $prefix;
        $this->data['digit'] = $digit;
        $this->data['group'] = $group;

        $sess = $this->db->get('current_term_session');
        foreach ($sess->result() as $se) {
            $session = $se->session;
        }

        //Get female students count
        $this->db->where('class_prefix', $prefix);
        $this->db->where('curr_year', $digit);
        $this->db->where('branch', $group);
        $this->db->where('gender', 'Female');
            $this->db->where('left_school', 0);
            $this->db->where('has_graduated', 0);
        $fe = $this->db->get('students');
        //Add returned result array to variable $students for use in view
        $this->data['femaleCount'] = $fe->num_rows();

        //Get male students count
        $this->db->where('class_prefix', $prefix);
        $this->db->where('curr_year', $digit);
        $this->db->where('branch', $group);
        $this->db->where('gender', 'Male');
            $this->db->where('left_school', 0);
            $this->db->where('has_graduated', 0);
        $ma = $this->db->get('students');
        //Add returned result array to variable $students for use in view
        $this->data['maleCount'] = $ma->num_rows();

        //Get form tutor for class
        $this->db->where('session', $session);
        $this->db->where('prefix', $prefix);
        $this->db->where('digit', $digit);
        $this->db->where('groups', $group);
        $tut = $this->db->get('class_tutor');
        if ($tut->num_rows() > 0) {
            foreach ($tut->result() as $tt) {
                $tutId = $tt->tutor_id;

                $this->db->where('id', $tutId);
                $tutGet = $this->db->get('staff');
                //Add returned result array to variable $tutorDetails for use in view
                $tutorDetails = $tutGet->result();

                foreach ($tutorDetails as $tu) {
                    $this->data['tutorName'] = $tu->fname . ' ' . $tu->lname;
                }
            }
        } else {
            $this->data['tutorName'] = 'No tutor assigned!';
        }

        $this->load->view('templates/header', $this->data);
        $this->load->view('elevated/students', $this->data);
        $this->load->view('templates/footer', $this->data);
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }

    //    This is to edit active students in classes
    function editStudentInClass()
    {
        if ($this->session->userdata('LoggedIn')) {
            $school_info = $this->school_model->getSchoolInfo();
            foreach ($school_info as $info) {
                $emailextget = $info->email_ext;
            }
            $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
            $this->form_validation->set_rules('mname', 'Middle Name', 'trim');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('admno', 'Admission No', 'trim|required');

            $admno = strtoupper($this->input->post('admno'));
            $fname = strtoupper($this->input->post('fname'));
            $mname = strtoupper($this->input->post('mname'));
            $lname = strtoupper($this->input->post('lname'));
            $dob = $this->input->post('dob');
            $gender = $this->input->post('gender');
            $emailext = $emailextget;
            if (empty($this->input->post('email'))) {
                $email = strtolower(strip_quotes($fname . $mname . $lname) . "@" . $emailext);
            } else {
                $email = $this->input->post('email');
            }
            $class = $this->input->post('curr_year');
            $prefix = $this->input->post('class_prefix');
            $group = $this->input->post('branch');
            $update = $this->students_model->editStudentClass($admno, $fname, $mname, $lname, $dob, $email, $gender, $class, $prefix, $group);
            if ($update) {
                $this->session->set_flashdata('success', 'You successfully edited the student\'s details.');
                redirect('school/students/' . $prefix . '/' . $class . '/' . $group);
            }
            $this->session->set_flashdata('error', 'There is an error, try again!');
            redirect('school/students/' . $prefix . '/' . $class . '/' . $group);
        } else {
            redirect('start');
        }
    }

    //Edits password for active students
    function editPassword()
    {
        if ($this->session->userdata('Elevated')) {
            $pass = $this->input->post('password');
            $password = hash('sha256', $pass);
            $id = $this->input->post('id');
            $class_prefix = $this->input->post('class_prefix');
            $curr_year = $this->input->post('curr_year');
            $branch = $this->input->post('branch');

            $update = $this->students_model->editPassword($id, $password);
            if ($update) {
                $this->session->set_flashdata('success', 'Password changed successfully for student.');
                redirect('school/students/' . $class_prefix . '/' . $curr_year . '/' . $branch);
            }
            $this->session->set_flashdata('error', 'There is an error, try again!');
            redirect('school/students/' . $class_prefix . '/' . $curr_year . '/' . $branch);
        } else {
            redirect('start');
        }
    }

    //    Adds new student
    function addStudent()
    {
        if ($this->session->userdata('Elevated')) {
            $school_info = $this->school_model->getSchoolInfo();
            foreach ($school_info as $info) {
                $emailextget = $info->email_ext;
            }
            $this->form_validation->set_rules('fname', 'Fast Name', 'trim|required');
            $this->form_validation->set_rules('mname', 'Middle Name', 'trim');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('admno', 'Admission No', 'trim|required');

            $admno = strtoupper($this->input->post('admno'));
            $fname = strtoupper($this->input->post('fname'));
            $mname = strtoupper($this->input->post('mname'));
            $lname = strtoupper($this->input->post('lname'));
            $dob = $this->input->post('dob');
            $gender = $this->input->post('gender');
            $class_prefix = $this->input->post('class_prefix');
            $curr_year = $this->input->post('curr_year');
            $branch = strtoupper($this->input->post('branch'));
            $emailext = $emailextget;
            $email = strtolower(strip_quotes($fname . $mname . $lname) . "@" . $emailext);
            if (empty($this->input->post('password'))) {
                $password = hash('sha256', 'password');
            } else {
                $password = hash('sha256', $this->input->post('password'));
            }

            $this->db->where('admno', $admno);
            $admnocheck = $this->db->get('students');
            if ($admnocheck->num_rows() === 0) {
                $create = $this->students_model->addStudent($admno, $fname, $mname, $lname, $dob, $email, $password, $gender, $class_prefix, $curr_year, $branch);
                if ($create) {
                    $this->session->set_flashdata('success', 'You successfully added a new student.');
                    redirect('school/students/' . $class_prefix . '/' . $curr_year . '/' . $branch);
                }
                redirect('school/students/' . $class_prefix . '/' . $curr_year . '/' . $branch);
            } else {
                foreach ($admnocheck->result() as $existing) {
                    $name = $existing->fname . ' ' . $existing->mname . ' ' . $existing->lname;
                    $current_class = $existing->class_prefix . ' ' . $existing->curr_year . $existing->branch;
                }
                $this->session->set_flashdata('warning', 'Cannot Add Student! This admision number: ' . $admno . ' is already assigned to ' . $name . ' in ' . $current_class);
                redirect('school/students/' . $class_prefix . '/' . $curr_year . '/' . $branch);
            }
        } else {
            redirect('start');
        }
    }

    //This changes or uploads a user picture
    public function addStudentImage()
    {
        if ($this->session->userdata('Elevated')) {
            $config['upload_path'] = 'assets/stuimg/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 100;
            $config['remove_spaces'] = TRUE;

            $this->upload->initialize($config);

            $class_prefix = $this->input->post('class_prefix');
            $curr_year = $this->input->post('curr_year');
            $branch = $this->input->post('branch');
            $id = $this->input->post('id');


            if (!$this->upload->do_upload('userfile')) {
                $this->session->set_flashdata('error', 'Image has not beeen uploaded. Make sure you selected a valid image and your image is less than 100kb and try again');
                redirect('school/students/' . $class_prefix . '/' . $curr_year . '/' . $branch);
            } else {
                $fdata = $this->upload->data();

                $stu_img = 'assets/stuimg/' . $fdata['file_name'];

                $process = $this->school_model->addStudentImage($id, $stu_img);
                if ($process) {
                    $this->session->set_flashdata('success', 'Student\'s image has been set successfully');
                    redirect('school/students/' . $class_prefix . '/' . $curr_year . '/' . $branch);
                }
            }
        } else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
    function deleteStudent($id, $prefix, $digit, $group){
        if ($this->session->userdata('Elevated')) {
//            Get Student info
            $this->db->where('id', $id);
            $stu = $this->db->get('students');
                foreach ($stu->result() as $st) {
                    $data = array(
                        'id' => $id,
                        'fname' => $st->fname,
                        'mname' => $st->mname,
                        'lname' => $st->lname,
                        'dob' => $st->dob,
                        'admno' => $st->admno,
                        'stu_img' => $st->stu_img,
                        'curr_year' => $st->curr_year,
                        'class_prefix' => $st->class_prefix,
                        'branch' => $st->branch,
                        'has_graduated' => $st->has_graduated,
                        'left_school' => $st->left_school,
                        'email' => $st->email,
                        'religion' => $st->religion,
                        'student_type' => $st->student_type,
                        'left_school_session' => $st->left_school_session,
                        'left_school_reason' => $st->left_school_reason,
                        'left_school_term' => $st->left_school_term,
                        'gender' => $st->gender,
                        'year_joined' => $st->year_joined,
                        'parent' => $st->parent,
                        'password' => $st->password,
                        'class_of' => $st->class_of,
                        'date_graduated' => $st->date_graduated,
                    );
//                Insert info into table 'deleted_students'
                    $this->db->insert('deleted_students', $data);
                }
//Remove from table students
            $this->db->where('id', $id);
            $this->db->delete('students');
            $this->session->set_flashdata('success', 'Student deleted successfully.');
            redirect('school/students/'.$prefix.'/'.$digit.'/'.$group);
        }else{
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }

    function addParentsInfo(){
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $idcardnum = $this->input->post('id_number');
        $relationship = $this->input->post('relationship');
        $student_id = $this->input->post('student_id');
        $homeaddress = $this->input->post('address');

        $data = array(
            'fname' => $fname,
            'lname' => $lname,
            'student_id' => $student_id,
            'phone1' => $phone,
            'relationship' => $relationship,
            'email' => $email,
            'idcardnum' => $idcardnum,$homeaddress
        );

        $this->db->insert('parents', $data);
    }
}