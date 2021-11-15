<?php
defined('BASEPATH') OR exit('No direct script access allowed!');

class Authme extends TL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function process()
    {
        $email = $this->input->post('email');
        $pass = $this->input->post('password');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        $password = hash('sha256', $pass);

        if ($this->form_validation->run()) {
            $process = $this->auth_model->process_login($email, $password);
            if ($process) {
            if($this->session->userdata('role') === "Student"){
                redirect('student-portal');
            }else{
                $this->session->set_flashdata('success', 'Welcome back.');
                if (empty($this->session->userdata('lastpage'))) {
                    redirect('start');
                } else {
                    if (strpos($this->session->userdata('lastpage'), 'scores') !== false) {
                        redirect('scores');
                    } elseif (strpos($this->session->userdata('lastpage'), 'store') !== false) {
                        redirect('store');
                    } elseif (strpos($this->session->userdata('lastpage'), 'inventory') !== false) {
                        redirect('inventory');
                    } elseif (strpos($this->session->userdata('lastpage'), 'editreports') !== false) {
                        redirect('editreports');
                    } elseif (strpos($this->session->userdata('lastpage'), 'students') !== false) {
                        redirect('students');
                    } elseif (strpos($this->session->userdata('lastpage'), 'account') !== false) {
                        redirect('account');
                    } elseif (strpos($this->session->userdata('lastpage'), 'email') !== false) {
                        redirect('email');
                    } elseif (strpos($this->session->userdata('lastpage'), 'calendar') !== false) {
                        redirect('calendar');
                    } elseif (strpos($this->session->userdata('lastpage'), 'headtutor') !== false) {
                        redirect('headtutor');
                    } elseif (strpos($this->session->userdata('lastpage'), 'records') !== false) {
                        redirect('records');
                    } elseif (strpos($this->session->userdata('lastpage'), 'staff') !== false) {
                        redirect('staff');
                    } elseif (strpos($this->session->userdata('lastpage'), 'school') !== false) {
                        redirect('school');
                    } elseif (strpos($this->session->userdata('lastpage'), 'assignments') !== false) {
                        redirect('assignments');
                    } elseif (strpos($this->session->userdata('lastpage'), 'notes') !== false) {
                        redirect('notes');
                    } elseif (strpos($this->session->userdata('lastpage'), 'broadsheet') !== false) {
                        redirect('broadsheet');
                    } elseif (strpos($this->session->userdata('lastpage'), 'classtutor') !== false) {
                        redirect('editreports');
                    } elseif (strpos($this->session->userdata('lastpage'), 'comments') !== false) {
                        redirect('comments');
                    } elseif (strpos($this->session->userdata('lastpage'), 'reports') !== false) {
                        redirect('reports');
                    } else {
                        $this->session->set_flashdata('success', 'Welcome back.');
                        redirect('start');
                    }
                }
            }
            } else {
                $this->session->set_flashdata('warning', 'We are not able to log you in. Please ensure you are currently a staff or student of the school and have settled every outstanding bill with the accounts department.');
                redirect('welcome');
            }
     
        } else {
            $this->session->set_flashdata('warning', 'Please enter email and password in the correct format');
            redirect('start');
        }
    }

    public function api_login()
    {
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $password = hash('sha256', $pass);

        $response = array();

        $userdata = $this->auth_model->api_login($email, $password);
        if ($userdata['LoggedIn'] == true) {
            $response['error'] = false;
            $response['message'] = 'Login is successful';
            $response['user'] = $userdata;
        } else {
            $response['error'] = true;
            $response['message'] = 'Unable to log you in at this time!';
        }

        echo json_encode($response);
    }
}