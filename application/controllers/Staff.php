<?php defined('BASEPATH') OR die('No direct script access allowed');

class Staff extends TL_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

        $this->data['staffGroups'] = $this->getStaffGroups();
        $this->data['allStaff'] = $this->getAllStaff();
        $this->data['oldStaff'] = $this->getOldStaff();
        $this->data['oldStaffCount'] = $this->getOldStaffCount();
    }
    function index(){
        if($this->session->userdata('Elevated')){
            $this->data['houses'] =  $this->house_model->getHouse();
            $this->data['pageTitle'] = 'Manage Staff';
           
            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/staff/index', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);
        }else{
            redirect('start');
        }
    }
    function old(){
        if($this->session->userdata('Elevated')){
            $this->data['pageTitle'] = 'Inactive/Old Staff';
          
            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/staff/old', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);
        }else{
            redirect('start');
        }
    }
    function getAllStaff(){
        $this->db->where('is_active', '1');
        $this->db->where('groups !=', 'SuperAdmin');
        $this->db->order_by('fname', 'asc');
        $query = $this->db->get('staff');
        return $query->result();
    }
    function getOldStaff(){
        $this->db->where('is_active', '0');
        $this->db->order_by('fname', 'asc');
        $query = $this->db->get('staff');
        return $query->result();
    }
    function getOldStaffCount(){
        $this->db->where('is_active', '0');
        $query = $this->db->get('staff');
        return $query->num_rows();
    }
    function editPassword(){
        $pass = $this->input->post('password');
        $password = hash('sha256', $pass);
        $id = $this->input->post('id');
        $update = $this->staff_model->editPassword($id, $password);
        if ($update){
            redirect('staff', 'refresh');
        } redirect('staff', 'refresh');
    }
    function addStaff(){
        if ($this->session->userdata('Elevated')){
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
            $this->form_validation->set_rules('mname', 'Middle Name', 'trim');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');

            if($this->form_validation->run()){
                $title = $this->input->post('title');
                $email = $this->input->post('email');
                $fname = $this->input->post('fname');
                $mname = $this->input->post('mname');
                $lname = $this->input->post('lname');
                $gender = $this->input->post('gender');
                $groups = $this->input->post('groups');
                $house = $this->input->post('house');
                $phone = $this->input->post('phone');
                $pass = $this->input->post('password');
                $password = hash('sha256', $pass);

                $insert = $this->staff_model->addStaff($title, $email, $fname, $mname, $lname, $gender, $groups, $password, $phone, $house);
                if ($insert){
                    $this->session->set_flashdata('success', 'Action successful');
                    redirect('staff', 'refresh');
                } redirect('staff', 'refresh');
            } else{
                echo validation_errors();
            }
        }else{
            redirect('start');
        }
    }
    function editStaff(){
        if ($this->session->userdata('Elevated')){
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
            $this->form_validation->set_rules('mname', 'Middle Name', 'trim');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
            $pass = $this->input->post('password');

            if($this->form_validation->run()){
                $id = $this->input->post('id');
                $title = $this->input->post('title');
                $email = $this->input->post('email');
                $fname = $this->input->post('fname');
                $mname = $this->input->post('mname');
                $lname = $this->input->post('lname');
                $gender = $this->input->post('gender');
                $groups = $this->input->post('groups');
                $phone = $this->input->post('phone');
                $house = $this->input->post('house');



                $update = $this->staff_model->editStaff($id, $title, $email, $fname, $mname, $lname, $gender, $groups, $phone, $house);
                if(!empty($this->input->post('password'))){
					$password = hash('sha256', $pass);
					$update1 = $this->staff_model->editPassword($id, $password);
				}
                if ($update){
                    $this->session->set_flashdata('success', 'Action successful');
                    redirect('staff', 'refresh');
                } redirect('staff', 'refresh');
            } else{
                echo validation_errors();
            }
        }else{
            redirect('start');
        }
    }
    function getStaffGroups(){
        $query = $this->db->get('staff_groups');
        return $query->result();
    }
    function deactivateStaff($id){
        if ($this->session->userdata('Elevated')){
            $deact = $this->staff_model->deactivateStaff($id);
            if ($deact){
                redirect('staff', 'refresh');
            } redirect('staff', 'refresh');
        }else{
            redirect('start');
        }
    }
    function activateStaff($id){
        if ($this->session->userdata('Elevated')){
            $deact = $this->staff_model->activateStaff($id);
            if ($deact){
                redirect('staff/old', 'refresh');
            } redirect('staff/old', 'refresh');
        }else{
            redirect('start');
        }
    }
    function deleteStaff($id){
        if ($this->session->userdata('Elevated')){
            $del = $this->staff_model->deleteStaff($id);
            if ($del){
                redirect('staff', 'refresh');
            } redirect('staff', 'refresh');
        }else{
            redirect('start');
        }
    }
    function deleteOldStaff($id){
        if ($this->session->userdata('Elevated')){
            $del = $this->staff_model->deleteStaff($id);
            if ($del){
                redirect('staff/old', 'refresh');
            } redirect('staff/old', 'refresh');
        }
    }
    function setTutorSubjects($tutor_id){
        if($this->session->userdata('Elevated')){
            $subject_title = $this->input->post('subject_title');
            $this->db->where('tutor_id', $tutor_id);
            $this->db->where('subject_title', $subject_title);

            $query = $this->db->get('tutor_subjects');

            $this->db->where('id', $tutor_id);
            $nameGet = $this->db->get('staff');
            foreach ($nameGet->result() as $ng){
                $name = $ng->fname.' '.$ng->lname;
            }
            if($query->num_rows() < 1){
                $data = array(
                    'tutor_id' => $tutor_id,
                    'subject_title' => $subject_title,
                );
                $insert = $this->db->insert('tutor_subjects', $data);

                if ($insert){
                    $this->session->set_flashdata('success', 'You have successfully set '.$subject_title.' as subject for <span class="text-danger">'.$name.'</span>');
                    redirect('staff', 'refresh');
                } else{
                    $this->session->set_flashdata('error', 'Error! Cannot set '.$subject_title.' for '.$name);
                    redirect('staff', 'refresh');
                }
            }else{
                $this->session->set_flashdata('warning', 'Wait! '.$subject_title.' already exists as subject for '.$name);
                redirect('staff', 'refresh');
            }
        }else{
            redirect('start', 'refresh');
        }
    }
    function deleteTutorSubject($staff_id, $id){
        if($this->session->userdata('Elevated')) {
            $this->db->where('tutor_id', $staff_id);
            $this->db->where('id', $id);
            $this->db->delete('tutor_subjects');
            $this->session->set_flashdata('success', 'Subject deleted successfully!');
            redirect('staff', 'refresh');
        }else{
            redirect('start');
        }
    }
    function alsoTeachesOn($staff_id){
        if($this->session->userdata('Elevated')){
            $this->db->where('id', $staff_id);
            $data = array(
                'also_teaches' => 1
            );
            $this->db->update('staff', $data);

            echo json_encode($data);
        }
    }
    function alsoTeachesOff($staff_id){
        if($this->session->userdata('Elevated')){
            $this->db->where('id', $staff_id);
            $data = array(
                'also_teaches' => 0
            );
            $this->db->update('staff', $data);

            echo json_encode($data);
        }
    }
}