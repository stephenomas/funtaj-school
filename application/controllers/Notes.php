<?php defined('BASEPATH') OR die('No direct script access allowed!');

class Notes extends TL_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

        if($this->session->userdata('role') == 'Student'){
            $this->data['studentsNotes'] = $this->getStudentsNotes();
        }
        $this->data['tutorNotes'] = $this->getTutorNotes();
        $this->data['allNotes'] = $this->getAllNotes();
    }
    function index(){
        if($this->session->userdata('LoggedIn')){
            if ($this->session->userdata('Elevated')) {
                $this->data['pageTitle'] = 'Notes';

                // $this->load->view('templates/header', $this->data);
                $this->load->view('notes/index', $this->data);
                //   $this->load->view('templates/footer', $this->data);
            }else{
                redirect('start');
            }
        }else{
            redirect('start');
        }
    }
    function uploadNote(){
        if ($this->session->userdata('LoggedIn')) {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');

            if($this->form_validation->run()){
                $note_title = ucwords(strtolower($this->input->post('title')));
            }
            $config['file_name'] = strtolower($note_title);
            $config['upload_path'] = './assets/notes/';
            $config['allowed_types'] = 'pdf|txt|gif|jpg|png|jpeg'; //Other types not included for now! |docx|doc
            $config['max_size'] = 1024;
            $config['remove_spaces'] = TRUE;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('userfile')) {
                $this->session->set_flashdata('error', 'File upload error! Make sure your file is less than 1mb and is an allowed type!');
                redirect('notes');
            } else {
                $fdata = $this->upload->data();

                $note_link = 'assets/notes/' . $fdata['file_name'];
                $staff_id = $this->session->userdata('id');
                $subject = $this->input->post('subject');
                $prefix = $this->input->post('prefix');
                $digit = $this->input->post('digit');
                $term = $this->input->post('term');
                $session = $this->input->post('session');

                $process = $this->notes_model->uploadNote($staff_id, $note_title, $note_link, $subject, $prefix, $digit, $term, $session);
                if ($process) {
                    $this->session->set_flashdata('success', 'Your note or image has been successfully uploaded!');
                    redirect('notes', 'refresh');
                }
            }
        } else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
    function getStudentsNotes(){
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
        $this->db->order_by('note_title', 'asc');
        $notes = $this->db->get('subject_notes');

        return $notes->result();
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
    function getTutorNotes(){
        if($this->session->userdata('LoggedIn')) {
            $tutor_id = $this->session->userdata('id');
            $this->db->order_by('digit', 'asc');
            $this->db->order_by('note_title', 'asc');
            $this->db->order_by('subject', 'asc');
            $this->db->order_by('prefix', 'asc');
            $this->db->where('staff_id', $tutor_id);
            $notes = $this->db->get('subject_notes');

            return $notes->result();
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
    function getAllNotes(){
        if($this->session->userdata('LoggedIn')){
        $this->db->order_by('staff_id');
        $this->db->order_by('digit');
        $notes = $this->db->get('subject_notes');

        return $notes->result();
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
    function viewNote($id){
        if($this->session->userdata('LoggedIn')) {
            $this->db->where('id', $id);
            $view = $this->db->get('subject_notes');
            foreach ($view->result() as $note) {
                $noteTitle = $note->note_title;
                $noteLink = base_url($note->note_link);
            }
            $this->data['pageTitle'] = $noteTitle;
            $this->data['noteLink'] = $noteLink;

            $this->load->view('templates/header', $this->data);
            $this->load->view('notes/view', $this->data);
            $this->load->view('templates/footer', $this->data);
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
    function deleteNote($id){
        if($this->session->userdata('LoggedIn')){
        $this->db->where('id', $id);
        $getFile = $this->db->get('subject_notes');
        foreach ($getFile->result() as $file){
            $fileLink = $file->note_link;
        }
        $this->db->where('id', $id);
        $del = $this->db->delete('subject_notes');
        unlink('./'.$fileLink);
        if ($del){
            $this->session->set_flashdata('success', 'Note deleted!');
            redirect('notes');
        }else{
            $this->session->set_flashdata('error', 'Could not delete note!');
            redirect('notes');
            }
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
}