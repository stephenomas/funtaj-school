<?php defined('BASEPATH') OR die('No direct script access allowed');

class Shop extends TL_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index(){
        if($this->session->userdata('Elevated')){
            

            
            $this->load->view('administrator/templates/header');
            $this->load->view('administrator/store/index');
            $this->load->view('administrator/templates/footer');
        }else{
            redirect('welcome');
        }
       
    }



}