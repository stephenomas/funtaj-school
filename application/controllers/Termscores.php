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
        $this->db->order_by('id', 'DESC');
        $current = $this->db->get('current_term_session')->row();
        $scores = array();
        $term = $current->term;
        $session = $current->session;
        
        $this->db->where('id', $this->input->post('student_id'));
        $student = $this->db->get('students')->row();
        
        $this->db->where('groups', $student->branch);
        $this->db->where('digit', $student->curr_year);
        $this->db->where('term', $term);
        $this->db->where('session', $session);
        $class = $this->db->get('class_tutor')->row();
        
        
        $scores['student_id'] = $this->input->post('student_id');
        $scores['class_details'] = $this->input->post('class_details');
        $scores['subject'] = $this->input->post('subject');
        $scores['tutor_id'] = $class->tutor_id;
        $scores['achievement'] = $this->input->post('achievement');
        $scores['effort'] = $this->input->post('effort');
        $scores['homework'] = $this->input->post('homework');
        $scores['behaviour'] = $this->input->post('behaviour');
        $scores['term'] = $term;
        $scores['session'] = $session;
        
        $enter = $this->scores_model->enterMTScores($scores);
        if($enter){

                $this->session->set_flashdata('success', 'You successfully added a midterm record.');
                redirect($_SERVER['HTTP_REFERER']);
            
        }
        
    }

    public function endofterm(){
        if ($this->session->userdata('Elevated')){
            $this->data['subjects'] = $this->db->get('subjects')->result();
            

            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/scores/endofterm-index', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);
        }
        else{
            redirect('welcome');
        }
    }

    public function endofterm_single(){
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
            $this->load->view('administrator/scores/endofterm-single', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);

        }
        else{
            redirect('welcome');
        }
    }

}