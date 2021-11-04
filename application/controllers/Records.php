<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Records extends TL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

        $this->data['sessionStudentsId'] = $this->getSessionStudents();
        $this->data['pastSessions'] = $this->getSessions();
    }
    function index()
    {
        if ($this->session->userdata('LoggedIn')) {
            $this->data['pageTitle'] = 'Records';

            $this->load->view('templates/header', $this->data);
            $this->load->view('records/index', $this->data);
            $this->load->view('templates/footer', $this->data);
        } else {
            redirect('welcome');
        }
    }
    function getSessionStudents(){
        if($this->session->userdata('LoggedIn')){
            $this->db->get('students_classes');
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
    function getSessions(){
        if($this->session->userdata('LoggedIn')){
            $getCurrSess = $this->db->get('current_term_session');
            foreach ($getCurrSess->result() as $cts){
                $current_session = $cts->session;
            }
            $this->db->where('sessions !=', $current_session);
            $getOldSess = $this->db->get('school_sessions');
            return $getOldSess->result();
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
    function getSessionClasses(){
        if($this->session->userdata('LoggedIn')){
        $this->db->group_by('prefix');
        $this->db->group_by('digit');
        $this->db->group_by('groups');
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
}