<?php defined('BASEPATH') OR die('No direct script access allowed!');

class Reports extends TL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        if ($this->session->userdata('LoggedIn')) {
            $this->data['pageTitle'] = 'Reports';

            $this->load->view('templates/header', $this->data);
            if($this->session->userdata('role') === 'Student'){
                $this->load->view('reports/students/index', $this->data);
            }else {
                $this->load->view('reports/index', $this->data);
            }
            $this->load->view('templates/footer', $this->data);
        } else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }

    function midterm()
    {
        if ($this->session->userdata('LoggedIn')) {
            $this->data['pageTitle'] = 'MidTerm Reports';

            $this->load->view('templates/header', $this->data);
            if($this->session->userdata('role') === 'Student'){
                $this->load->view('reports/students/midterm', $this->data);
            }else{
                $this->load->view('reports/midterm', $this->data);
            }
            $this->load->view('templates/footer', $this->data);
        } else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }

    function endofterm()
    {
        if ($this->session->userdata('LoggedIn')) {
            $this->data['pageTitle'] = 'End Of Term Reports';

            $this->load->view('templates/header', $this->data);
            if($this->session->userdata('role') === 'Student'){
                $this->load->view('reports/students/endofterm', $this->data);
            }else{
                $this->load->view('reports/endofterm', $this->data);
            }
            $this->load->view('templates/footer', $this->data);
        } else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }

    function yearreport()
    {
        if ($this->session->userdata('LoggedIn')) {
            $this->data['pageTitle'] = 'Year Reports';

            $this->load->view('templates/header', $this->data);
            if($this->session->userdata('role') === 'Student'){
                $this->load->view('reports/students/yearreport', $this->data);
            }else{
                $this->load->view('reports/yearreport', $this->data);
            }
            $this->load->view('templates/footer', $this->data);
        } else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }

    function session($session)
    {
        if ($this->session->userdata('LoggedIn')) {
            $this->data['pageTitle'] = 'Select Class';
            $this->data['chosenSession'] = str_replace('_', '/', $session);

            $this->load->view('templates/header', $this->data);
            if($this->session->userdata('role') === 'Student'){
                $this->load->view('reports/students/sessions', $this->data);
            }else{
                $this->load->view('reports/sessions', $this->data);
            }
            $this->load->view('templates/footer', $this->data);
        } else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }

    function termly($session)
    {
        if ($this->session->userdata('LoggedIn')) {
            $this->data['pageTitle'] = 'Choose Term';
            $this->data['session'] = $session;

            $this->load->view('templates/header', $this->data);
            if($this->session->userdata('role') === 'Student'){
                $this->load->view('reports/students/terms', $this->data);
            }else{
                $this->load->view('reports/terms', $this->data);
            }
            $this->load->view('templates/footer', $this->data);
        } else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }

    function period($session, $term)
    {
        if ($this->session->userdata('LoggedIn')) {
            $this->data['pageTitle'] = 'Choose Report to View/Print';
            $this->data['term'] = str_replace('_', ' ', $term);
            $this->data['session'] = str_replace('_', '/', $session);

            $this->load->view('templates/header', $this->data);
            if($this->session->userdata('role') === 'Student'){
                $this->load->view('reports/students/period', $this->data);
            }else{
                $this->load->view('reports/period', $this->data);
            }
            $this->load->view('templates/footer', $this->data);
        } else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }

    function view($period, $student_id, $term, $session)
    {
        if ($this->session->userdata('LoggedIn')) {
            $this->data['pageTitle'] = 'View/Print '.ucfirst($period);
            $this->data['term'] = str_replace('_', ' ', $term);
            $this->data['session'] = str_replace('_', '/', $session);
            $this->data['student_id'] = $student_id;
            $this->data['period'] = $period;

            $this->db->where('term', str_replace('_', ' ', $term));
            $this->db->where('session', str_replace('_', '/', $session));
            $class_tutor_get = $this->db->get('class_tutor');
            $this->data['classTutor'] = $class_tutor_get;

            $this->load->view('templates/header', $this->data);
            if($this->session->userdata('role') === 'Student'){
                $this->load->view('reports/students/view', $this->data);
            }else{
                $this->load->view('reports/view', $this->data);
            }
            $this->load->view('templates/footer', $this->data);
        } else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }

    function viewThirdTerm($period, $student_id, $term, $session)
    {
        if ($this->session->userdata('LoggedIn')) {
            $this->data['pageTitle'] = 'View/Print '.ucfirst($period);
            $this->data['term'] = str_replace('_', ' ', $term);
            $this->data['session'] = str_replace('_', '/', $session);
            $this->data['student_id'] = $student_id;
            $this->data['period'] = $period;

            $this->db->where('term', str_replace('_', ' ', $term));
            $this->db->where('session', str_replace('_', '/', $session));
            $class_tutor_get = $this->db->get('class_tutor');
            $this->data['classTutor'] = $class_tutor_get;

            $this->load->view('templates/header', $this->data);
            if($this->session->userdata('role') === 'Student'){
                $this->load->view('reports/students/view_third_term', $this->data);
            }else{
                $this->load->view('reports/view_third_term', $this->data);
            }
            $this->load->view('templates/footer', $this->data);
        } else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }

    function viewReport($period, $student_id, $ter, $sess, $year)
    {
        if ($this->session->userdata('LoggedIn')) {
            $this->db->where('id', $student_id);
            $getStudent = $this->db->get('students');
            $studentGet = $getStudent->first_row();
            $studentName = $studentGet->fname.' '.$studentGet->mname.' '.$studentGet->lname;

            $term = str_replace('_', ' ', $ter);
            $session = str_replace('_', '/', $sess);

            $this->db->where('term', $term);
            $this->db->where('session', $session);
            $class_tutor_get = $this->db->get('class_tutor');
            $this->data['classTutor'] = $class_tutor_get->result();

            $this->data['pageTitle'] = 'View/Print Report for '.$studentName;
            $this->data['term'] = $term;
            $this->data['session'] = $session;
            $this->data['student_id'] = $student_id;
            $this->data['period'] = $period;
            $this->data['studentName'] = $studentName;
            $this->data['studentImage'] = $studentGet->stu_img;
            $this->data['studentDOB'] = $studentGet->dob;
            $this->data['studentAdmno'] = $studentGet->admno;
            $this->data['student_id'] = $student_id;
            $this->data['year'] = $year;

            $this->load->view('templates/header', $this->data);
            $this->load->view('reports/view', $this->data);
            $this->load->view('templates/footer', $this->data);
        } else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }

    function viewYearReport($student_id, $sess)
    {
        if ($this->session->userdata('LoggedIn')) {
            $this->db->where('id', $student_id);
            $getStudent = $this->db->get('students');
            $studentGet = $getStudent->first_row();
            $studentName = $studentGet->fname.' '.$studentGet->mname.' '.$studentGet->lname;

            $session = str_replace('_', '/', $sess);

            $this->db->where('session', $session);
            $class_tutor_get = $this->db->get('class_tutor');
            $this->data['classTutor'] = $class_tutor_get->result();

            $this->db->where('session', $session);
            $this->db->where('student_id', $student_id);
            $class_get = $this->db->get('students_classes')->first_row();

            $this->data['pageTitle'] = 'View/Print Report for '.$studentName;
            $this->data['session'] = $session;
            $this->data['student_id'] = $student_id;
            $this->data['studentName'] = $studentName;
            $this->data['studentImage'] = $studentGet->stu_img;
            $this->data['studentDOB'] = $studentGet->dob;
            $this->data['studentAdmno'] = $studentGet->admno;
            $this->data['student_id'] = $student_id;
            $this->data['class_group'] = $class_get->prefix.' '.$class_get->digit.$class_get->groups;

            $this->load->view('templates/header', $this->data);
            $this->load->view('reports/view_third_term', $this->data);
            $this->load->view('templates/footer', $this->data);
        } else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }

    function approveMidterm(){
        $user = $this->session->userdata('title').' '.$this->session->userdata('fname').' '.$this->session->userdata('lname');
        $session = $this->data['currentSession'];
        $term = $this->data['currentTerm'];
        $approved = 1;

        $data = array(
            'session' => $session,
            'term' => $term,
            'midterm' => $approved,
            'midterm_approved_by' => $user,
        );

        $this->db->where('term', $term);
        $this->db->where('session', $session);
        $apprvd = $this->db->get('approved_result');
        if($apprvd->num_rows() < 1){
            $this->db->insert('approved_result', $data);

            $this->session->set_flashdata('success', 'You have approved scores entered for midterm');
            redirect('start');
        }else{
            $this->db->where('term', $term);
            $this->db->where('session', $session);
            $this->db->update('approved_result', $data);

            $this->session->set_flashdata('success', 'You have approved scores entered for midterm');
            redirect('start');
        }
    }

    function disapproveMidterm(){
        $user = $this->session->userdata('title').' '.$this->session->userdata('fname').' '.$this->session->userdata('lname');
        $session = $this->data['currentSession'];
        $term = $this->data['currentTerm'];
        $disapproved = 0;

        $data = array(
            'session' => $session,
            'term' => $term,
            'midterm' => $disapproved,
            'midterm_approved_by' => $user,
        );

        $this->db->where('term', $term);
        $this->db->where('session', $session);
        $apprvd = $this->db->get('approved_result');
        if($apprvd->num_rows() < 1){
            $this->db->insert('approved_result', $data);

            $this->session->set_flashdata('success', 'You have disapproved scores entered for midterm');
            redirect('start');
        }else{
            $this->db->where('term', $term);
            $this->db->where('session', $session);
            $this->db->update('approved_result', $data);

            $this->session->set_flashdata('success', 'You have disapproved scores entered for midterm');
            redirect('start');
        }
    }

    function approveTerm(){
        $user = $this->session->userdata('title').' '.$this->session->userdata('fname').' '.$this->session->userdata('lname');
        $session = $this->data['currentSession'];
        $term = $this->data['currentTerm'];
        $approved = 1;

        $data = array(
            'session' => $session,
            'term' => $term,
            'endofterm' => $approved,
            'endofterm_approved_by' => $user,
        );

        $this->db->where('term', $term);
        $this->db->where('session', $session);
        $apprvd = $this->db->get('approved_result');
        if($apprvd->num_rows() < 1){
            $this->db->insert('approved_result', $data);

            $this->session->set_flashdata('success', 'You have approved scores entered for end of term exam!');
            redirect('start');
        }else{
            $this->db->where('term', $term);
            $this->db->where('session', $session);
            $this->db->update('approved_result', $data);

            $this->session->set_flashdata('success', 'You have approved scores entered for end of term exam!');
            redirect('start');
        }
    }

    function disapproveTerm(){
        $user = $this->session->userdata('title').' '.$this->session->userdata('fname').' '.$this->session->userdata('lname');
        $session = $this->data['currentSession'];
        $term = $this->data['currentTerm'];
        $disapproved = 0;

        $data = array(
            'session' => $session,
            'term' => $term,
            'endofterm' => $disapproved,
            'endofterm_approved_by' => $user,
        );

        $this->db->where('term', $term);
        $this->db->where('session', $session);
        $apprvd = $this->db->get('approved_result');
        if($apprvd->num_rows() < 1){
            $this->db->insert('approved_result', $data);

            $this->session->set_flashdata('success', 'You have disapproved scores entered for end of term exam!');
            redirect('start');
        }else{
            $this->db->where('term', $term);
            $this->db->where('session', $session);
            $this->db->update('approved_result', $data);

            $this->session->set_flashdata('success', 'You have disapproved scores entered for end of term exam!');
            redirect('start');
        }
    }

    function terms($period, $session){
        if ($this->session->userdata('LoggedIn')) {
            $this->data['pageTitle'] = 'Choose Term';
            $this->data['chosenSession'] = $session;
            $this->data['period'] = $period;

            $this->load->view('templates/header', $this->data);
            $this->load->view('reports/terms', $this->data);
            $this->load->view('templates/footer', $this->data);
        } else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
    function classes($term, $session, $period){
        if ($this->session->userdata('LoggedIn')) {
            $this->data['pageTitle'] = 'Choose Class';
            $this->data['chosenSession'] = str_replace('_', '/', $session);
            $this->data['chosenTerm'] = str_replace('_', ' ', $term);
            $this->data['period'] = $period;

            $this->load->view('templates/header', $this->data);
            $this->load->view('reports/classes', $this->data);
            $this->load->view('templates/footer', $this->data);
        } else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }

    function students($class, $te, $sess, $period){
        if ($this->session->userdata('LoggedIn')) {
            $term = str_replace('_', ' ', $te);
            $class_details = str_replace('_', ' ', $class);
            $session = str_replace('_', '/', $sess);

            $this->data['pageTitle'] = 'Select Student';
            $this->data['chosenSession'] = $session;
            $this->data['chosenTerm'] = $term;
            $this->data['period'] = $period;
            $this->data['classDetails'] = $class_details;

            if($period === 'endofterm'){
                $this->db->where('term', $term);
                $this->db->where('session', $session);
                $this->db->where('class_details', $class_details);
                $this->db->group_by('student_id');
                $stuget = $this->db->get('exam');

                $this->data['studentsInClass'] = $stuget;
            }elseif($period === 'midterm'){
                $this->db->where('term', $term);
                $this->db->where('session', $session);
                $this->db->where('class_details', $class_details);
                $this->db->group_by('student_id');
                $stuget = $this->db->get('midterm');

                $this->data['studentsInClass'] = $stuget;
            }

            $this->load->view('templates/header', $this->data);
            $this->load->view('reports/students', $this->data);
            $this->load->view('templates/footer', $this->data);
        } else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }

    function student($class, $sess){
        if ($this->session->userdata('LoggedIn')) {
            $class_details = str_replace('_', ' ', $class);
            $session = str_replace('_', '/', $sess);

            $this->data['pageTitle'] = 'Select Student';
            $this->data['chosenSession'] = $session;
            $this->data['classDetails'] = $class_details;

                $this->db->where('session', $session);
                $this->db->where('class_details', $class_details);
                $this->db->group_by('student_id');
                $stuget = $this->db->get('exam');

                $this->data['studentsInClass'] = $stuget->result();

            $this->load->view('templates/header', $this->data);
            $this->load->view('reports/student', $this->data);
            $this->load->view('templates/footer', $this->data);
        } else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }

    function isPrincipalSign($statusVal){
        $get = $this->db->get('signature_for_secondary');
        if($get->num_rows() === 0){
            $data = array(
                'principals' => 1,
            );
            $this->db->insert('signature_for_secondary', $data);
        }else{
            $data = array(
                'principals' => $statusVal,
            );
            $this->db->where('id', 1);
            $this->db->update('signature_for_secondary', $data);

            echo json_encode($data);
        }
    }
    function isHeadteacherSign($statusVal){
        $get = $this->db->get('signature_for_reports');
        if($get->num_rows() === 0){
            $data = array(
                'name' => '1',
            );
            $this->db->insert('signature_for_reports', $data);
        }else{
            $data = array(
                'name' => $statusVal,
            );
            $this->db->where('id', '1');
            $this->db->update('signature_for_reports', $data);

            echo json_encode($data);
        }
    }
}