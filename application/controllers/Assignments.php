<?php defined('BASEPATH') OR die('No direct script access allowed!');

class Assignments extends TL_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

        if($this->session->userdata('role') == 'Student'){
            $this->data['studentsAssignments'] = $this->getStudentsAssignments();
        }

        $this->data['tutorAssignments'] = $this->getTutorAssignments();
        $this->data['allAssignments'] = $this->getAllAssignments();
    }
    function index(){
        if($this->session->userdata('LoggedIn')){
            $this->data['pageTitle'] = 'Assignments';

            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/assignments/index', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);
        }else{
            redirect('start');
        }
    }
    function uploadAssignment(){
        if ($this->session->userdata('LoggedIn')) {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');

            if($this->form_validation->run()){
                $assignment_title = ucwords(strtolower($this->input->post('title')));
            }
            $config['file_name'] = strtolower($assignment_title);
            $config['upload_path'] = './assets/assignments/';
            $config['allowed_types'] = 'pdf|txt|gif|jpg|png|jpeg'; //Other types not included for now! |docx|doc
            $config['max_size'] = 1024;
            $config['remove_spaces'] = TRUE;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('userfile')) {
                $this->session->set_flashdata('error', 'File upload error! Make sure your file is less than 1mb and is an allowed type!');
                redirect('assignments');
            } else {
                $fdata = $this->upload->data();

                $assignment_link = 'assets/assignments/' . $fdata['file_name'];
                $staff_id = $this->session->userdata('id');
                $subject = $this->input->post('subject');
                $prefix = $this->input->post('prefix');
                $digit = $this->input->post('digit');
                $term = $this->input->post('term');
                $session = $this->input->post('session');
                $start_date = $this->input->post('start_date');
                $end_date = $this->input->post('end_date');

                $process = $this->assignments_model->uploadAssignment($staff_id, $assignment_title, $assignment_link, $subject, $prefix, $digit, $term, $session, $start_date, $end_date);
                if ($process) {
                    $this->session->set_flashdata('success', 'Your assignment file or image has been successfully uploaded!');
                    redirect('assignments', 'refresh');
                } else{
                    $this->session->set_flashdata('error', 'Your assignment file or image has not been uploaded due to an error. Try again!');
                    redirect('assignments', 'refresh');
                }
            }
        } else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
    function getStudentsAssignments(){
        if($this->session->userdata('LoggedIn')){
        $this->db->where('id', $this->session->userdata('id'));
        $stu = $this->db->get('students');
        $student = $stu->first_row();
            $prefix = $student->class_prefix;
            $digit = $student->curr_year;

        $currentSession = $this->data['currentSession'];
        $currentTerm = $this->data['currentTerm'];

        $this->db->where('prefix', $prefix);
        $this->db->where('digit', $digit);
        $this->db->where('session', $currentSession);
        $this->db->where('term', $currentTerm);
        $this->db->order_by('subject', 'asc');
        $this->db->order_by('assignment_title', 'asc');
        $assignments = $this->db->get('subject_assignments');

        return $assignments->result();
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
    function getTutorAssignments(){
        if($this->session->userdata('LoggedIn')) {
            $tutor_id = $this->session->userdata('id');
            $this->db->order_by('digit', 'asc');
            $this->db->order_by('assignment_title', 'asc');
            $this->db->order_by('subject', 'asc');
            $this->db->order_by('prefix', 'asc');
            $this->db->where('staff_id', $tutor_id);
            $assignments = $this->db->get('subject_assignments');

            return $assignments->result();
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
    function getAllAssignments(){
        if($this->session->userdata('LoggedIn')){
        $this->db->order_by('staff_id');
        $this->db->order_by('digit');
        $assignments = $this->db->get('subject_assignments');

        return $assignments->result();
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
    function viewAssignment($id){
        if($this->session->userdata('LoggedIn')) {
            $this->db->where('id', $id);
            $view = $this->db->get('subject_assignments');
            foreach ($view->result() as $assignment) {
                $assignmentTitle = $assignment->assignment_title;
                $assignmentLink = base_url($assignment->assignment_link);
            }
            $this->data['pageTitle'] = $assignmentTitle;
            $this->data['assignmentLink'] = $assignmentLink;

            $this->load->view('templates/header', $this->data);
            $this->load->view('assignments/view', $this->data);
            $this->load->view('templates/footer', $this->data);
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
    function deleteAssignment($id){
        if($this->session->userdata('LoggedIn')){
        $this->db->where('id', $id);
        $getFile = $this->db->get('subject_assignments');
        foreach ($getFile->result() as $file){
            $fileLink = $file->assignment_link;
        }
        $this->db->where('id', $id);
        $del = $this->db->delete('subject_assignments');
        unlink('./'.$fileLink);
        if ($del){
            $this->session->set_flashdata('success', 'Assignment deleted!');
            redirect('assignments');
        }else{
            $this->session->set_flashdata('error', 'Could not delete assignment!');
            redirect('assignments');
            }
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
}