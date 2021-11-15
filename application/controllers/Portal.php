<?php defined('BASEPATH') OR die('No direct script access allowed!');

class Portal extends TL_Controller{

function index(){
    $this->load->view('student/inc/header');
    $this->load->view('student/index');
    $this->load->view('student/inc/main-footer');
}

}