<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends TL_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	public function index()
	{
	    if (!$this->session->userdata('LoggedIn')){
            $this->data['pageTitle'] = 'Login';
            $this->load->view('administrator/login', $this->data);
        }elseif($this->session->userdata('role') == "Student"){
	        redirect('student-portal');
        }elseif($this->session->userdata('role') == "Tutor"){
	        redirect('tutor');
        }else{
            redirect('start');
        }
	}

    public function dashboard(){
        $this->data['students'] = $this->db->count_all('students');
        $this->db->where('groups', 'Tutor');
        $this->data['teachers'] = $this->db->get('staff')->num_rows();
        $this->db->where('groups', 'Admin');
        $this->data['admins'] = $this->db->get('staff')->num_rows();
        $this->db->where('groups !=', 'Tutor');
        $this->data['noteach'] = $this->db->get('staff')->num_rows();
        $total = 0;
        $fees = $this->db->get('fees_history')->result();
        foreach($fees as $fee){
            $total = $total + $fee->amount_paid;
        }
        $this->data['total'] = $total;


        $this->load->view('administrator/templates/header', $this->data);
        $this->load->view('administrator/index', $this->data);
        $this->load->view('administrator/templates/footer', $this->data);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  

    }

}
