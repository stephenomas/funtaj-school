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

    public function addFees(){
            
    }

}