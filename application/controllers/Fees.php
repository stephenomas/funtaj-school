<?php defined('BASEPATH') OR die('No direct script access allowed!');

class Fees extends TL_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }



    public function index(){
        if ($this->session->userdata('Elevated')) {
            $this->data['fees_paid'] = $this->db->get('fees_payment')->result(); 
            $this->data['fees'] = $this->db->get('school_fees')->result(); 
            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/fees/index', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
        }else{

            redirect('start');
        }

         
    }

    public function full(){
        if ($this->session->userdata('Elevated')) {
            $this->db->where('status', 'Full Payment');
            $this->data['fees_paid'] = $this->db->get('fees_history')->result(); 
      
            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/fees/full-paid', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
        }else{

            redirect('start');
        }

         
    }

    public function part(){
        if ($this->session->userdata('Elevated')) {
            $this->db->where('status', 'Part Payment');
            $this->data['fees_paid'] = $this->db->get('fees_history')->result(); 
      
            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/fees/part-paid', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
        }else{

            redirect('start');
        }

         
    }

    public function awaiting(){
        if ($this->session->userdata('Elevated')) {
            $this->db->where('status', 'Pending Approval');
            $this->data['fees_paid'] = $this->db->get('fees_history')->result(); 
      
            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/fees/awaiting', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
        }else{

            redirect('start');
        }

         
    }

    public function addFees(){
        $fterm = $this->input->post('fterm');
        $sterm = $this->input->post('sterm');
        $tterm = $this->input->post('tterm');
        $year = $this->input->post('fee_year');
        $min = $this->input->post('min');
        $sess = $this->input->post('sess');


      

        $insert = $this->fees_model->addFee($year, $min, $sess, $fterm, $sterm, $tterm);
        if ($insert){
            $this->session->set_flashdata('success', 'Fees add successful');
            redirect('fees');
        };
    }   
    
    public function editFee(){
        $id = $this->input->post('id');
        $status = $this->input->post('status');

        $edit = $this->fees_model->editFee($id, $status);

        if($edit){
            $this->session->set_flashdata('success', 'Action successful');
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('error', 'Action Failed');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    
    
    public function outstanding(){
        if ($this->session->userdata('Elevated')) {
            $this->db->where('has_paid_school_fees', 0);
            $this->data['fees_paid'] = $this->db->get('students')->result(); 
            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/fees/not-paid', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
        }else{

            redirect('start');
        }
    }

}