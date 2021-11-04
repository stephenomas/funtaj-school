<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TL_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

        $check = $this->db->get('school_details');
        if($check->num_rows() < 1){
            $data = array(
                'school_name' => 'Top Level School'
            );
            $this->db->insert('school_details', $data);
        }
        $get = $this->db->get('current_term_session');
        if ($get->num_rows() < 1){
            $data = array(
                'term' => 'Term 1',
                'session' => '2018/2019'
            );
            $this->db->insert('current_term_session', $data);
        }
        $terms_dates = $this->db->get('terms_dates');
        if ($terms_dates->num_rows() < 1){
            $data = array(
                'terms' => 'Term 1',
            );
            $this->db->insert('terms_dates', $data);
        }
        $prefix_style = $this->db->get('class_prefix_style');
        if ($prefix_style->num_rows() < 1){
            $data = array(
                'style' => 'Year',
            );
            $this->db->insert('class_prefix_style', $data);
        }
    }
}