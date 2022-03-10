<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Termscores extends TL_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function midterm(){
        $this->data['subjects'] = $this->db->get('subjects')->result();
        

        $this->load->view('administrator/templates/header', $this->data);
        $this->load->view('administrator/scores/midterm-index', $this->data);
        $this->load->view('administrator/templates/footer', $this->data);
    }

    public function midterm_single(){
        $this->data['subjects'] = $this->db->get('subjects')->result();

        $this->load->view('administrator/templates/header', $this->data);
        $this->load->view('administrator/scores/midterm-single', $this->data);
        $this->load->view('administrator/templates/footer', $this->data);
    }


}