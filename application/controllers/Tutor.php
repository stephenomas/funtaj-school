<?php defined('BASEPATH') OR die('No direct script access allowed');

class Tutor extends TL_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index(){
        if($this->session->userdata('role') === "Tutor"){
            $this->db->where('id', $this->session->userdata('id'));
            $this->data["tutor"] = $this->db->get('staff')->row();
            $this->db->where('tutor_id', $this->session->userdata('id'));
            $this->data['class'] = $this->db->get('class_tutor')->row();
            $this->db->where('curr_year', $this->data['class']->digit);
            $this->db->where('branch', $this->data['class']->groups);
            $stud = $this->db->get('students');
            $this->data["studs"] = $stud->num_rows();
            $this->db->where('tutor_id', $this->session->userdata('id'));
            $su = $this->db->get('tutor_subjects');
            $this->data['subs'] = $su->num_rows();

            

            
            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/tutor/index', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);
        }else{
            redirect('welcome');
        }
       
    }



}