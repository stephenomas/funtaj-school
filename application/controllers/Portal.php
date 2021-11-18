<?php defined('BASEPATH') OR die('No direct script access allowed!');

class Portal extends TL_Controller{

function index(){
    $this->load->view('student/inc/header');
    $this->load->view('student/index');
    $this->load->view('student/inc/main-footer');
}

public function logout(){
    $user_data = array(
        'LoggedIn' => FALSE,
        'Elevated' => FALSE,
        'StoreElevated' => FALSE,
        'Role' => '',
    );

    $this->session->set_userdata($user_data);
    $this->session->unset_userdata($user_data);

    $this->session->set_flashdata('success', 'You have successfully logged out.');

    redirect('welcome');
}

}