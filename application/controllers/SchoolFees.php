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



}