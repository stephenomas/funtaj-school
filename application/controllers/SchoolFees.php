<?php defined('BASEPATH') OR die('No direct script access allowed');

class SchoolFees extends TL_Controller{

public function index(){
    if($this->session->userdata('role') == "Student"){
        $this->load->view('student/inc/header');
        $this->load->view('student/school-fees');
        $this->load->view('student/inc/main-footer');
    }else{
        redirect('start');
    }
}

public function pay(){
    if($this->session->userdata('role') == "Student"){

        $this->db->where('id', 1);
        $currentSession= $this->db->get('current_term_session')->row();
        $this->db->where('curr_session', $currentSession->session);
        $this->db->where('fee_year', $this->session->userdata('digit') );
        $this->data['fee'] = $this->db->get('school_fees')->row();

        $this->db->where('curr_session', $currentSession->session);
        $this->db->where('student_id', $this->session->userdata('id'));
        $this->data['paid'] = $this->db->get('fees_history')->row();
       

        $this->load->view('student/inc/header');
        $this->load->view('student/pay', $this->data);
        $this->load->view('student/inc/main-footer');
    }else{
        redirect('start');
    }


}



}