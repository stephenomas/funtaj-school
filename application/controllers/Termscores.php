<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Termscores extends TL_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function midterm(){
        if ($this->session->userdata('Elevated')){
            $this->data['subjects'] = $this->db->get('subjects')->result();
            

            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/scores/midterm-index', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);
        }
        else{
            redirect('welcome');
        }
    }

    public function midterm_single(){
        if ($this->session->userdata('Elevated')){
            $class = $this->input->get('class');
            $year = $this->input->get('year');
            
            $this->db->where('curr_year', $class);
            $this->db->where('branch', $year);
            $this->data['students'] = $this->db->get('students');

            if(empty($this->data['students']->result())){
                redirect($_SERVER['HTTP_REFERER']);
            }

           
            
            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/scores/midterm-single', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);

        }
        else{
            redirect('welcome');
        }
    }

    public function midterm_save(){
        
    }
}