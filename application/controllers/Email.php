<?php defined('BASEPATH') OR die('No direct script access allowed!');

class Email extends TL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index(){
        if ($this->session->userdata('Elevated') || $this->session->userdata('role') == 'Tutor') {
        $this->data['pageTitle'] = 'Choose Class';

        $this->load->view('templates/header', $this->data);
        $this->load->view('email/index', $this->data);
        $this->load->view('templates/footer', $this->data);
        }else {
            redirect('start');
        }
    }

    public function view($prefix, $digit, $groups)
    {
        if ($this->session->userdata('Elevated') || $this->session->userdata('role') == 'Tutor') {
            $this->data['pageTitle'] = 'Manage Students Email';
//        //For pagination start
            $config['base_url'] = base_url('email/view/');
            $config['per_page'] = 50;
            $config['num_links'] = 2;
            $config['total_rows'] = $this->getAllStudentsCount();

            //pagination link style
            //config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="tsc_pagination">';
            $config['full_tag_close'] = '</ul>';
//        $config['first_link'] = false;
//        $config['last_link'] = false;
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="prev page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item"><a class="active page-link">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';

            $this->pagination->initialize($config);

            $this->db->where('class_prefix', $prefix);
            $this->db->where('curr_year', $digit);
            $this->db->where('branch', $groups);
            $this->db->where('has_graduated', '0');
            $this->db->where('left_school', '0');
            $this->db->order_by('curr_year');
            $this->db->order_by('branch');
            $this->db->order_by('fname');
            $this->data['students_pagination'] = $this->db->get('students', $config['per_page'], $this->uri->segment(3));

//        $this->data['pagination'] = $this->pagination->create_links();

            $str_links = $this->pagination->create_links();
            $this->data["pagLinks"] = explode('&nbsp;', $str_links);

            //For pagination end

            $this->load->view('templates/header', $this->data);
            $this->load->view('email/view_class', $this->data);
            $this->load->view('templates/footer', $this->data);
        } else {
            redirect('start');
        }
    }

    function getAllStudentsCount()
    {
        $this->db->where('left_school', '0');
        $this->db->where('has_graduated', '0');
        $query = $this->db->get('students');
        return $query->num_rows();
    }

    //Edits password for active students
    function editPassword()
    {
        if ($this->session->userdata('Elevated') || $this->session->userdata('role') == 'Tutor') {
            $pass = $this->input->post('password');
            $password = hash('sha256', $pass);
            $id = $this->input->post('id');
            $url = $this->input->post('url');
            $update = $this->students_model->editPassword($id, $password);
            if ($update) {
                $this->session->set_flashdata('success', 'Password changed successfully.');
                redirect($url);
            }
            $this->session->set_flashdata('warning', 'There is an error, try again!');
            redirect($url);
        } else {
            redirect('start');
        }
    }

    function defaultPassword($pass){
        if ($this->session->userdata('Elevated') || $this->session->userdata('role') == 'Tutor') {
            $password = hash('sha256', $pass);
            $data = array(
                'password' => $password,
            );
            $this->db->update('students', $data);

            $this->session->set_flashdata('success', 'You have successfully set the default password for all students.');
            redirect('email');
        } else {
            redirect('start');
        }
    }
}