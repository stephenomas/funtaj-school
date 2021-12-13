<?php defined('BASEPATH') OR die('No direct script access allowed!');

class Portal extends TL_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

function index(){
    if($this->session->userdata('role') == "Student"){
      
        $this->db->where('id', 1);
        $currentSession= $this->db->get('current_term_session')->row();
     
        $this->db->where('curr_session', $currentSession->session);
        $this->db->where('fee_year', $this->session->userdata('digit') );
        $this->data['fee'] = $this->db->get('school_fees')->row();

        

        $this->load->view('student/inc/header', $this->data);
        $this->load->view('student/index', $this->data);
        $this->load->view('student/inc/main-footer', $this->data);

        


    }else{
        redirect("start");
    }
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

public function store(){    
    $this->data['products'] = $this->db->get('products')->result();

    $this->load->view('student/inc/header', $this->data);
    $this->load->view('student/store', $this->data);
    $this->load->view('student/inc/main-footer', $this->data);
    }

    public function single($id)
    {
        $data                       = array();
        $data['get_single_product'] = $this->web_model->get_single_product($id);
        $data['get_all_category']   = $this->web_model->get_all_category();
        $this->load->view('web/inc/header');
        $this->load->view('web/pages/single', $data);
        $this->load->view('web/inc/footer');
    }
}