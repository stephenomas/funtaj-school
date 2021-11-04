<?php defined('BASEPATH') OR die('No direct script acces allowed');

class Profile extends TL_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function index(){
        if($this->session->userdata('LoggedIn')){
            if($this->session->userdata('role') != 'Student'){
                $this->data['pageTitle'] = 'Edit Profile';
            }else{
                $this->data['pageTitle'] = 'View Profile - Change Password';
            }
            $this->data['userData'] = $this->getUserData();

            $this->load->view('templates/header', $this->data);
            $this->load->view('profile/index', $this->data);
            $this->load->view('templates/footer', $this->data);
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
    //This gets the logged in userdata for use in the profile page
    function getUserData(){
        if($this->session->userdata('LoggedIn')){
        if($this->session->userdata('role') != 'Student'){
            $this->db->where('id', $this->session->userdata('id'));
            $query = $this->db->get('staff');
            return $query->result();
        }else{
            $this->db->where('id', $this->session->userdata('id'));
            $query = $this->db->get('students');
            return $query->result();
            }
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
    //This updates the user info
    function updateUserProfile(){
        if($this->session->userdata('LoggedIn')){
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('mname', 'Middle Name', 'trim');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');

        if($this->form_validation->run()){
            $email = $this->input->post('email');
            $fname = $this->input->post('fname');
            $mname = $this->input->post('mname');
            $lname = $this->input->post('lname');
            $gender = $this->input->post('gender');
            $groups = $this->input->post('groups');

            $update = $this->profile_model->updateUserProfile($email, $fname, $mname, $lname, $gender, $groups);
            if ($update){
                $this->session->set_flashdata('success', 'Your profile info has been successfully updated!');
                redirect('profile');
                }
            $this->session->set_flashdata('error', 'There is an error! Try again!');
                redirect('profile');
            }
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
    //This changes or uploads a user picture
    public function addUserImage()
    {
        if ($this->session->userdata('LoggedIn')) {
            $config['upload_path'] = './assets/uimg/profile/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 200;
            $config['remove_spaces'] = TRUE;


            $this->upload->initialize($config);

            if (!$this->upload->do_upload('userfile')) {
                $this->session->set_flashdata('warning', 'Your profile image has not been set. Make sure you select a valid image and your image is 200kb or less then try again');
                redirect('profile');
            } else {
                $fdata = $this->upload->data();

                $profile_img = 'assets/uimg/profile/' . $fdata['file_name'];
                $id = $this->session->userdata('id');

                $this->session->set_userdata('img', $profile_img);

                $process = $this->profile_model->addUserImage($id, $profile_img);
                if ($process) {
                    $this->session->set_flashdata('success', 'Your profile image has been successfully uploaded!');
                    redirect('profile', 'refresh');
                }
            }
        } else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
    //This changes the password
    function changePassword(){
        if($this->session->userdata('LoggedIn')){
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');

        if($this->form_validation->run()){
            $pass = $this->input->post('password');
            $password = hash('sha256', $pass);
            $id = $this->input->post('id');


            $update = $this->profile_model->changePassword($password, $id);
            if ($update){
                $this->session->set_flashdata('success', 'Your password has been successfully changed!');
                redirect('profile');
            } else{
                $this->session->set_flashdata('error', 'Cannot change password, try again!');
                redirect('profile');
                }
            }
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
}