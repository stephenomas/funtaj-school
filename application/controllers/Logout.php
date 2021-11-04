<?php defined('BASEPATH') OR die('No direct script access allowed');

class Logout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function go($id)
    {
        $this->db->where('id', $id);

        $data = array(
            'online' => 0,
            'lastseen' => date('Y-m-d H:i:s'),
            'last_page_visited' => ' ',
        );

        $this->db->update('staff', $data);

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

    public function end($id)
    {
        $this->db->where('id', $id);

        $data = array(
            'online' => 0,
            'lastseen' => date('Y-m-d H:i:s'),
        );

        $this->db->update('staff', $data);


        $user_data = array(
            'LoggedIn' => FALSE,
            'Elevated' => FALSE,
            'StoreElevated' => FALSE,
            'Role' => '',
        );

        $this->session->set_userdata($user_data);
        $this->session->unset_userdata($user_data);

        $this->session->set_flashdata('success', 'You have been logged out due to inactivity.');

        redirect('welcome');
    }
}