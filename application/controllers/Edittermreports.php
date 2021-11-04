<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edittermreports extends TL_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function index(){
        if ($this->session->userdata('Elevated')){
            $this->data['pageTitle'] = 'Edit Term Reports';

            $this->load->view('templates/header', $this->data);
            $this->load->view('edittermreports/index', $this->data);
            $this->load->view('templates/footer', $this->data);
        }
        else{
            redirect('welcome');
        }
    }
    function midterm(){
        if ($this->session->userdata('Elevated')){
            $this->data['pageTitle'] = 'Midterm - Select Class to Begin Editing';

            $this->db->where('term', $this->data['currentTerm']);
            $this->db->where('session', $this->data['currentSession']);
            $this->db->group_by('class_details');
            $this->db->order_by('class_details');
            $getClasses = $this->db->get('midterm');

            $this->data['classList'] = $getClasses->result();

            $this->load->view('templates/header', $this->data);
            $this->load->view('edittermreports/midterm', $this->data);
            $this->load->view('templates/footer', $this->data);
        }
        else{
            redirect('welcome');
        }
    }
    function endofterm(){
        if ($this->session->userdata('Elevated')){
            $this->data['pageTitle'] = 'End Of Term - Select Class to Begin Editing';

            $this->db->where('term', $this->data['currentTerm']);
            $this->db->where('session', $this->data['currentSession']);
            $this->db->group_by('class_details');
            $this->db->order_by('class_details');
            $getClasses = $this->db->get('exam');

            $this->data['classList'] = $getClasses->result();

            $this->load->view('templates/header', $this->data);
            $this->load->view('edittermreports/endofterm', $this->data);
            $this->load->view('templates/footer', $this->data);
        }
        else{
            redirect('welcome');
        }
    }
}