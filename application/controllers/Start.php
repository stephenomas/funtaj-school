<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends TL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        if ($this->session->userdata('Elevated')) {
            $this->data['pageTitle'] = 'Dashboard';

            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/elevated/start', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);

        } elseif ($this->session->userdata('LoggedIn')) {
            $this->data['pageTitle'] = 'Dashboard';

            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/elevated/index', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);
        } else {
            $user_data = array(
                'warning' => 'Please login to continue',
            );

            $this->session->set_flashdata($user_data);
            redirect('welcome');
        }
    }

    function getEvents()
    {
        $data = $this->db->get("events")->result();
        echo json_encode($data);
    }
}