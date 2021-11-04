<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TL_Controller extends CI_Controller
{
    public $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

        $get = $this->db->get('signature_for_secondary');
        if($get->num_rows() === 0){
            $data = array(
                'principals' => 1,
            );
            $this->db->insert('signature_for_secondary', $data);
        }

        $getPri = $this->db->get('signature_for_reports');
        if($getPri->num_rows() === 0){
            $data = array(
                'name' => 1,
            );
            $this->db->insert('signature_for_reports', $data);
        }

        $page = current_url();
        $lastpage = array(
           'last_page_visited' => $page,
        );
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('staff', $lastpage);

        $termsdates = $this->getTermsDates();
        foreach ($termsdates as $dt){
            $this->data['termstart'] = $dt->startdate;
            $this->data['termend'] = $dt->enddate;
        }

        $this->data['tutorSubjects'] = $this->tutorSubjects();
        $this->data['graduatedStudents'] = $this->allGraduatedStudents();
        $this->data['deactivatedStudents'] = $this->allDeactivatedStudents();

        $this->data['userGroups'] = $this->getUserGroups();

        $this->data['tutors'] = $this->getAllTutors();

        $prefix = $this->getClassPrefix();
        foreach ($prefix as $pf){
            $this->data['classPrefix'] = $pf->style;
        }

        $this->data['subjects'] = $this->getAllSubjects();
        $this->data['classes'] = $this->getAllClasses();

        $this->data['classesPrefix'] = $this->getClassesPrefix();
        $this->data['classesDigit'] = $this->getClassesDigit();
        $this->data['classesGroup'] = $this->getClassesGroup();

        $this->data['allTerms'] = $this->getAllTerms();
        $this->data['allSessions'] = $this->getAllSessions();

        $termSession = $this->getCurrentTermSession();
        foreach ($termSession as $ts){
            $this->data['currentTerm'] = $ts->term;
            $this->data['currentSession'] = $ts->session;

            $this->db->where('term', $ts->term);
            $this->db->where('session', $ts->session);
            $payment_dates = $this->db->get('fees_payment_dates')->first_row();

            $this->data['payment_dates'] =  $this->db->get('fees_payment_dates')->first_row();

           // $this->data['payment_date'] = $payment_dates->payment_date;
           // $this->data['concession_date'] = $payment_dates->concession_date;
        }

        $school_info = $this->school_model->getSchoolInfo();
        foreach ($school_info as $info){
            $this->data['schoolName'] = $info->school_name;
            $this->data['schoolEmail'] = $info->email;
            $this->data['schoolAddress'] = $info->address;
            $this->data['schoolPhone'] = $info->phone;
            $this->data['schoolPrincipal'] = $info->principal;
            $this->data['schoolVP'] = $info->vice_principal;
            $this->data['schoolLogo'] = $info->logo;
            $this->data['schoolWebsite'] = $info->website;
            $this->data['principalSign'] = $info->principal_sign;
            $this->data['vpSign'] = $info->vp_sign;
            $this->data['appSlog'] = $info->app_slog;
            $this->data['schoolDetailsId'] = $info->id;
            $this->data['schoolEmailExt'] = $info->email_ext;
            $this->data['defaultPassword'] = $info->default_password;
            $this->data['campus'] = $info->campus;
        }
        $this->data['appTitle'] = (empty($this->data['appSlog']) || $this->data['appSlog'] == null || $this->data['appSlog'] == '') ? 'TL Edu 2.0' : $this->data['appSlog'];
        $this->data['studentsNum'] = $this->totalStudentsNum();
        $this->data['allStudents'] = $this->allStudents();
        $this->data['staffNum'] = $this->totalStaffNum();
        $this->data['tutorsNum'] = $this->totalTutorsNum();

        $this->db->where('term', $this->data['currentTerm']);
        $this->db->where('session', $this->data['currentSession']);
        $q_approved = $this->db->get('approved_result');
        if($q_approved->num_rows() > 0) {
            $this->data['is_approved'] = $q_approved->first_row();
        }else{
            $this->data['is_approved'] = array(
                'midterm' => 0,
                'endofterm' => 0,
            );
        }
//        Get Signature
        $this->data['authorisedSignatures'] = $this->getAuthorisedSignatures();
    }

    function getAuthorisedSignatures(){
        $query = $this->db->get('signatures');
        return $query->result();
    }

    function totalStudentsNum(){
        $this->db->where('has_graduated', '0');
        $this->db->where('left_school', '0');
        $students_num = $this->db->get('students');
        return $students_num->num_rows();
    }

    function allStudents(){
        $this->db->where('has_graduated', '0');
        $this->db->where('left_school', '0');
        $this->db->order_by('curr_year');
        $this->db->order_by('branch');
        $this->db->order_by('fname');
        $query = $this->db->get('students');
        return $query->result();
    }

    function allDeactivatedStudents(){
//        $this->db->where('has_graduated', '0');
        $this->db->where('left_school', '1');
        $this->db->order_by('curr_year');
        $this->db->order_by('branch');
        $this->db->order_by('fname');
        $students = $this->db->get('students');
        return $students->result();
    }

    function allGraduatedStudents(){
        $this->db->where('has_graduated', '1');
        $this->db->where('left_school', '0');
        $this->db->order_by('class_of');
        $this->db->order_by('fname');
        $students = $this->db->get('students');
        return $students->result();
    }

    function totalTutorsNum(){
        $this->db->where('is_active', '1');
        $this->db->where('groups', 'Tutor');
        $tutors_num = $this->db->get('staff');
        return $tutors_num->num_rows();
    }

    function totalStaffNum(){
        $this->db->where('is_active', '1');
        $this->db->where('groups !=', 'Owner');
        $this->db->where('groups !=', 'Tutor');
        $tutors_num = $this->db->get('staff');
        return $tutors_num->num_rows();
    }
    function getCurrentTermSession(){
        $get = $this->db->get('current_term_session');
        return $get->result();
    }
    function getAllTerms(){
        $this->db->order_by('terms', 'asc');
        $get = $this->db->get('school_terms');
        return $get->result();
    }
    function getAllSessions(){
        $this->db->order_by('sessions', 'desc');
        $get = $this->db->get('school_sessions');
        return $get->result();
    }
    function getTermsDates(){
        $termSession = $this->getCurrentTermSession();
        foreach ($termSession as $ts){
            $currentTerm = $ts->term;
            $currentSession = $ts->session;
            }
        $this->db->where('terms', $currentTerm);
        $this->db->where('sessions', $currentSession);
        $query = $this->db->get('terms_dates');
        return $query->result();
    }
    function getAllSubjects(){
        $subq = $this->db->get('subjects');
        if($subq->num_rows() < 1){
            $data = array(
                'subjects' => 'Mathematics',
                'code' => 'Maths'
            );
            $this->db->insert('subjects', $data);
        }
        $this->db->order_by('subjects', 'asc');
        $query = $this->db->get('subjects');
        return $query->result();
    }
    function getClassPrefix(){
        $query = $this->db->get('class_prefix_style');
        return $query->result();
    }
    function getAllClasses(){
        $claq = $this->db->get('classes');
        if($claq->num_rows() < 1){
            $data = array(
                'prefix' => 'Grade',
                'digit' => '1',
                'groups' => 'EDU',
                'session' => 'Session',
            );
            $this->db->insert('classes', $data);
        }
        $this->db->order_by('prefix', 'asc');
        $this->db->order_by('digit', 'asc');
        $this->db->order_by('groups', 'asc');
        $query = $this->db->get('classes');
        return $query->result();
    }
    function getClassesPrefix(){
        $this->db->group_by('prefix');
        $this->db->order_by('prefix', 'asc');
        $query = $this->db->get('classes');
        return $query->result();
    }
    function getClassesDigit(){
        $this->db->group_by('digit');
        $this->db->order_by('digit', 'asc');
        $query = $this->db->get('classes');
        return $query->result();
    }
    function getClassesGroup(){
        $this->db->group_by('groups');
        $this->db->order_by('groups', 'asc');
        $query = $this->db->get('classes');
        return $query->result();
    }
    function getAllTutors(){
        $this->db->where('groups', 'Tutor');
        $this->db->where('is_active', '1');
        $this->db->or_where('also_teaches', '1');
        $this->db->order_by('fname', 'asc');
        $tutors = $this->db->get('staff');
        return $tutors->result();
    }
    function getUserGroups(){
        $query = $this->db->get('staff_groups');
        return $query->result();
    }

    function tutorSubjects(){
        $this->db->where('tutor_id', $this->session->userdata('id'));
        $query = $this->db->get('tutor_subjects');
        return $query->result();
    }
}