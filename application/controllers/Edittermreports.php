<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edittermreports extends TL_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function index(){
        if ($this->session->userdata('Elevated')){
            $this->data['pageTitle'] = 'Edit Term Reports';

            $this->load->view('templates/header', $this->data);
            $this->load->view('edittermreports/index', $this->data);
            $this->load->view('templates/footer', $this->data);
        }
        else{
            redirect('welcome');
        }
    }
    function midterm(){
        if ($this->session->userdata('Elevated')){
            $this->data['pageTitle'] = 'Midterm - Select Class to Begin Editing';
            $sessions = $this->db->order_by('sessions', 'DESC')->get('school_sessions')->result();
            $this->data['sessions'] = $sessions;
            // $this->db->where('term', $this->data['currentTerm']);
            // $this->db->where('session', $this->data['currentSession']);
            // $this->db->group_by('class_details');
            // $this->db->order_by('class_details');
            // $getClasses = $this->db->get('midterm');

            // $this->data['classList'] = $getClasses->result();

            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/reports/midterm', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);
        }
        else{
            redirect('welcome');
        }
    }
    function endofterm(){
        if ($this->session->userdata('Elevated')){
            $this->data['pageTitle'] = 'End Of Term - Select Class to Begin Editing';

            $sessions = $this->db->order_by('sessions', 'DESC')->get('school_sessions')->result();
            $this->data['sessions'] = $sessions;
            // $this->db->where('term', $this->data['currentTerm']);
            // $this->db->where('session', $this->data['currentSession']);
            // $this->db->group_by('class_details');
            // $this->db->order_by('class_details');
            // $getClasses = $this->db->get('exam');

            // $this->data['classList'] = $getClasses->result();

            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/reports/endofterm', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);
        }
        else{
            redirect('welcome');
        }
    }

    function single(){
        if ($this->session->userdata('Elevated')){
        $term = $this->input->get('term');
        $year = $this->input->get('year');
        $session = $this->input->get('session');


        
        $this->db->where('term', $term)->where('session', $session)->where('class_details', $year);
        $student = $this->db->get('midterm')->result();
        if(!$student){
            redirect('midterm');
        }
        $this->data['students'] = $student;
       // var_dump($students);
       $this->load->view('administrator/templates/header', $this->data);
       $this->load->view('administrator/reports/midterm-detail', $this->data);
       $this->load->view('administrator/templates/footer', $this->data);

        }
        else{

            redirect('welcome');
        }

    }

    function midterm_detail(){
        if ($this->session->userdata('Elevated')){
            $term = $this->input->get('term');
            $year = $this->input->get('year');
            $session = $this->input->get('session');
            $student = $this->input->get('student');
            
            $this->db->where('id', $student);
            $this->data['detail'] = $this->db->get('students')->row();

            $this->db->where('term', $term)->where('session', $session)->where('class_details', $year)->where('student_id', $student);
            $this->data['student'] = $this->db->get('midterm')->result();
            if(!$this->data['student']){
                redirect('midterm');
            }
            // var_dump($students);
            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/reports/midterm-single', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);
    
            }
            else{
    
                redirect('welcome');
            }
    }

    function endofterm_single(){
        if ($this->session->userdata('Elevated')){
            $term = $this->input->get('term');
            $year = $this->input->get('year');
            $session = $this->input->get('session');
            $this->db->where('term', $term)->where('session', $session)->where('class_details', $year);
            $student = $this->db->get('exam')->result();
            if(!$student){
                redirect('endofterm');
            }
            $this->data['students'] = $student;
           // var_dump($students);
           $this->load->view('administrator/templates/header', $this->data);
           $this->load->view('administrator/reports/endofterm-detail', $this->data);
           $this->load->view('administrator/templates/footer', $this->data);
        }else{
    
            redirect('welcome');
        }
    }
    function endofterm_detail(){
        if ($this->session->userdata('Elevated')){
            $term = $this->input->get('term');
            $year = $this->input->get('year');
            $session = $this->input->get('session');
            $student = $this->input->get('student');
            
            $this->db->where('id', $student);
            $this->data['detail'] = $this->db->get('students')->row();

            $this->db->where('term', $term);  
            $this->db->where('class_details', $year);
            $this->db->where('student_id', $student);
            $this->db->where('session', $session);
            $this->db->select_avg('gp');
            $this->data['gpa'] = $this->db->get('exam')->row();

            $this->db->where('term', $term);  
            $this->db->where('class_details', $year);
            $this->db->where('student_id', $student);
            $this->db->where('session', $session);
            $this->db->select_avg('average');
            $this->data['average'] = $this->db->get('exam')->row();
            
            $this->db->where('term', $term);  
            $this->db->where('class_details', $year);
            $this->db->where('session', $session);
            $this->db->select_avg('average');
            $this->data['classaverage'] = $this->db->get('exam')->row();

            $this->db->where('term', $term)->where('session', $session)->where('class_details', $year)->where('student_id', $student);
            $this->data['student'] = $this->db->get('exam');
            if(!$this->data['student']){
                redirect('endofterm');
            }
            // var_dump($students);
            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/reports/endofterm-single', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);
    
            }
            else{
    
                redirect('welcome');
            }
    }

    function endofyear(){
        if ($this->session->userdata('Elevated')){
            $this->data['pageTitle'] = 'Midterm - Select Class to Begin Editing';
            $sessions = $this->db->order_by('sessions', 'DESC')->get('school_sessions')->result();
            $this->data['sessions'] = $sessions;
            // $this->db->where('term', $this->data['currentTerm']);
            // $this->db->where('session', $this->data['currentSession']);
            // $this->db->group_by('class_details');
            // $this->db->order_by('class_details');
            // $getClasses = $this->db->get('midterm');

            // $this->data['classList'] = $getClasses->result();

            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/reports/endofyear', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);
        }
        else{
            redirect('welcome');
        }
    }

    function endofyear_single(){
        if ($this->session->userdata('Elevated')){
            $year = $this->input->get('year');
            $session = $this->input->get('session');
            $this->db->where('session', $session)->where('class_details', $year);
            $student = $this->db->get('exam')->result();
            if(!$student){
                redirect('endofterm');
            }
            $this->data['students'] = $student;
           // var_dump($students);
           $this->load->view('administrator/templates/header', $this->data);
           $this->load->view('administrator/reports/endofyear-detail', $this->data);
           $this->load->view('administrator/templates/footer', $this->data);
        } else{
            redirect('welcome');
        }
    }

    function endofyear_detail(){
        $user = $this->input->get('student');
        $session = $this->input->get('session');

        
        $this->db->where('student_id', $user);
        $this->db->where('session', $session);
        $this->data['results'] = $this->db->get('endofyear');
        
        if(empty($this->data['results']->result())){
            redirect($_SERVER['HTTP_REFERER']);
        }
        $this->db->where('id', $user);
        $this->data['detail'] = $this->db->get('students')->row();
        
        $this->db->where('student_id', $user);
        $this->db->where('session', $session);
        $this->db->select_avg('gp');
        $this->data['average'] = $this->db->get('endofyear')->row();
        
        
        $this->db->where('session', $session);
        $this->data['classaverage'] = $this->db->get('endofyear');
        

        $this->load->view('administrator/templates/header', $this->data);
        $this->load->view('administrator/reports/endofyear-single', $this->data);
        $this->load->view('administrator/templates/footer', $this->data);
    }
}