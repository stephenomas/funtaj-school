<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classtutor extends TL_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function go($prefix, $digit, $groups){
        if($this->session->userdata('LoggedIn')){
            $this->data['pageTitle'] = $prefix.' '.$digit.$groups;
            $this->data['prefix'] = $prefix;
            $this->data['digit'] = $digit;
            $this->data['groups'] = $groups;

            $this->load->view('templates/header', $this->data);
            $this->load->view('classes/index', $this->data);
            $this->load->view('templates/footer', $this->data);
        }else{
            redirect('start');
        }
    }
    //    This is to edit active students in classes
    function editStudentInClass()
    {
        if ($this->session->userdata('LoggedIn')) {
            $school_info = $this->school_model->getSchoolInfo();
            foreach ($school_info as $info) {
                $emailextget = $info->email_ext;
            }
            $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
            $this->form_validation->set_rules('mname', 'Middle Name', 'trim');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('admno', 'Admission No', 'trim|required');

            $admno = strtoupper($this->input->post('admno'));
            $fname = strtoupper($this->input->post('fname'));
            $mname = strtoupper($this->input->post('mname'));
            $lname = strtoupper($this->input->post('lname'));
            $dob = $this->input->post('dob');
            $gender = $this->input->post('gender');
            $emailext = $emailextget;
            if (empty($this->input->post('email'))) {
                $email = strtolower(strip_quotes($fname . $mname . $lname) . "@" . $emailext);
            } else {
                $email = $this->input->post('email');
            }
            $class = $this->input->post('curr_year');
            $prefix = $this->input->post('class_prefix');
            $group = $this->input->post('branch');
            $update = $this->students_model->editStudentClass($admno, $fname, $mname, $lname, $dob, $email, $gender, $class, $prefix, $group);
            if ($update) {
                $this->session->set_flashdata('success', 'You successfully edited the student\'s details.');
                redirect('classtutor/go/' . $prefix . '/' . $class . '/' . $group);
            }
            $this->session->set_flashdata('error', 'There is an error, try again!');
            redirect('classtutor/go/' . $prefix . '/' . $class . '/' . $group);
        } else {
            redirect('start');
        }
    }

    //Edits password for active students
    function editPassword()
    {
        if ($this->session->userdata('LoggedIn')) {
            $pass = $this->input->post('password');
            $password = hash('sha256', $pass);
            $id = $this->input->post('id');
            $class_prefix = $this->input->post('class_prefix');
            $curr_year = $this->input->post('curr_year');
            $branch = $this->input->post('branch');

            $update = $this->students_model->editPassword($id, $password);
            if ($update) {
                $this->session->set_flashdata('success', 'Password changed successfully for student.');
                redirect('classtutor/go/' . $class_prefix . '/' . $curr_year . '/' . $branch);
            }
            $this->session->set_flashdata('error', 'There is an error, try again!');
            redirect('classtutor/go/' . $class_prefix . '/' . $curr_year . '/' . $branch);
        } else {
            redirect('start');
        }
    }

    //    Adds new student
    function addStudent()
    {
        if ($this->session->userdata('LoggedIn')) {
            $school_info = $this->school_model->getSchoolInfo();
            foreach ($school_info as $info) {
                $emailextget = $info->email_ext;
            }
            $this->form_validation->set_rules('fname', 'Fast Name', 'trim|required');
            $this->form_validation->set_rules('mname', 'Middle Name', 'trim');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('admno', 'Admission No', 'trim|required');

            $admno = strtoupper($this->input->post('admno'));
            $fname = strtoupper($this->input->post('fname'));
            $mname = strtoupper($this->input->post('mname'));
            $lname = strtoupper($this->input->post('lname'));
            $dob = $this->input->post('dob');
            $gender = $this->input->post('gender');
            $class_prefix = $this->input->post('class_prefix');
            $curr_year = $this->input->post('curr_year');
            $branch = strtoupper($this->input->post('branch'));
            $emailext = $emailextget;
            $email = strtolower(strip_quotes($fname . $mname . $lname) . "@" . $emailext);
            if (empty($this->input->post('password'))) {
                $password = hash('sha256', 'password');
            } else {
                $password = hash('sha256', $this->input->post('password'));
            }

            $this->db->where('admno', $admno);
            $admnocheck = $this->db->get('students');
            if ($admnocheck->num_rows() === 0) {
                $create = $this->students_model->addStudent($admno, $fname, $mname, $lname, $dob, $email, $password, $gender, $class_prefix, $curr_year, $branch);
                if ($create) {
                    $this->session->set_flashdata('success', 'You successfully added a new student.');
                    redirect('classtutor/go/' . $class_prefix . '/' . $curr_year . '/' . $branch);
                }
                redirect('classtutor/go/' . $class_prefix . '/' . $curr_year . '/' . $branch);
            } else {
                foreach ($admnocheck->result() as $existing) {
                    $name = $existing->fname . ' ' . $existing->mname . ' ' . $existing->lname;
                    $current_class = $existing->class_prefix . ' ' . $existing->curr_year . $existing->branch;
                }
                $this->session->set_flashdata('warning', 'Cannot Add Student! This admision number: ' . $admno . ' is already assigned to ' . $name . ' in ' . $current_class);
                redirect('classtutor/go/' . $class_prefix . '/' . $curr_year . '/' . $branch);
            }
        } else {
            redirect('start');
        }
    }

    //This changes or uploads a user picture
    public function addStudentImage()
    {
        if ($this->session->userdata('LoggedIn')) {
            $config['upload_path'] = 'assets/stuimg/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 100;
            $config['remove_spaces'] = TRUE;

            $this->upload->initialize($config);

            $class_prefix = $this->input->post('class_prefix');
            $curr_year = $this->input->post('curr_year');
            $branch = $this->input->post('branch');
            $id = $this->input->post('id');


            if (!$this->upload->do_upload('userfile')) {
                $this->session->set_flashdata('error', 'Image has not beeen uploaded. Make sure you selected a valid image and your image is less than 100kb and try again');
                redirect('classtutor/go/' . $class_prefix . '/' . $curr_year . '/' . $branch);
            } else {
                $fdata = $this->upload->data();

                $stu_img = 'assets/stuimg/' . $fdata['file_name'];

                $process = $this->school_model->addStudentImage($id, $stu_img);
                if ($process) {
                    $this->session->set_flashdata('success', 'Student\'s image has been set successfully');
                    redirect('classtutor/go/' . $class_prefix . '/' . $curr_year . '/' . $branch);
                }
            }
        } else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
    function deactivateStudent($prefix, $digit, $groups){
        if($this->session->userdata('Elevated') || $this->session->userdata('role') == 'Tutor'){
            $admno = $this->input->post('admno');
            $id = $this->input->post('id');
            $session = $this->input->post('session');
            $term = $this->input->post('term');
            $reason = $this->input->post('reason');
            $this->db->where('admno', $admno);

            $data = array(
                'left_school' => 1,
                'left_school_reason' => $reason,
                'left_school_term' => $term,
                'left_school_session' => $session,
            );
            $this->db->update('students', $data);

            $data = array(
                'student_id' => $id,
                'left_reason' => $reason,
                'left_term' => $term,
                'left_session' => $session,
            );
            $this->db->insert('left_returned_students', $data);

            $this->session->set_flashdata('success', 'Student deactivated successfully. See ICT Admin to reactivate!');
            redirect('classtutor/go/'.$prefix.'/'.$digit.'/'.$groups);
        }else{
            redirect('start');
        }
    }
    function midtermComment($student_id){
        if($this->session->userdata('Elevated') || $this->session->userdata('role') == 'Tutor') {

            $this->form_validation->set_rules('comment', 'Comment', 'trim|required');
            $comment = $this->input->post('comment');
            $prefix = $this->input->post('prefix');
            $digit = $this->input->post('digit');
            $groups = $this->input->post('groups');

            $term = $this->data['currentTerm'];
            $session = $this->data['currentSession'];

            if($this->form_validation->run()){
                $data = array(
                    'comment' => $comment,
                    'student_id' => $student_id,
                    'tutor_id' => $this->session->userdata('id'),
                    'term' => $term,
                    'session' => $session,
                );
                $this->db->where('student_id', $student_id);
                $this->db->where('term', $term);
                $this->db->where('session', $session);
                $getComment = $this->db->get('midterm_class_tutor_comments');
                if($getComment->num_rows() < 1){
                    $this->db->insert('midterm_class_tutor_comments', $data);
                    redirect('classtutor/go/'.$prefix.'/'.$digit.'/'.$groups);
                }else{
                    $this->db->where('student_id', $student_id);
                    $this->db->where('term', $this->data['currentTerm']);
                    $this->db->where('session', $this->data['currentSession']);

                    $this->db->update('midterm_class_tutor_comments', $data);
                    redirect('classtutor/go/'.$prefix.'/'.$digit.'/'.$groups);
                }
            }

        }else{
            redirect('start');
        }
    }
    function examComment($prefix, $digit, $groups, $student_id){
        if($this->session->userdata('LoggedIn')){
            $this->data['pageTitle'] = $prefix.' '.$digit.$groups;
            $this->data['prefix'] = $prefix;
            $this->data['digit'] = $digit;
            $this->data['groups'] = $groups;
            $this->data['student_id'] = $student_id;

            $this->load->view('templates/header', $this->data);
            $this->load->view('classes/tutor_comment', $this->data);
            $this->load->view('templates/footer', $this->data);
        }else{
            redirect('start');
        }
    }
    function examCommentRating($student_id){

        $generosity = $_POST['generosity'];
        $punctuality = $_POST['punctuality'];
        $class_attendance = $_POST['class_attendance'];
        $responsibility = $_POST['responsibility'];
        $attentiveness = $_POST['attentiveness'];
        $initiative = $_POST['initiative'];
        $neatness = $_POST['neatness'];
        $self_control = $_POST['self_control'];
        $staff_relations = $_POST['staff_relations'];
        $students_relations = $_POST['students_relations'];
        $merits = $_POST['merits'];
        $demerits = $_POST['demerits'];
        $attendance = $_POST['attendance'];
        $comment = $_POST['comment'];

        $data = array(
            'student_id' => $student_id,
            'generosity' => $generosity,
            'punctuality' => $punctuality,
            'class_attendance' => $class_attendance,
            'responsibility' => $responsibility,
            'attentiveness' => $attentiveness,
            'initiative' => $initiative,
            'neatness' => $neatness,
            'self_control' => $self_control,
            'staff_relations' => $staff_relations,
            'students_relations' => $students_relations,
            'merits' => $merits,
            'demerits' => $demerits,
            'actual_att' => $attendance,
            'class_tutor_comment' => $comment,
            'exam_name' => $this->data['currentTerm'].'-'.$this->data['currentSession']
        );

        $this->db->where('student_id', $student_id);
        $this->db->where('exam_name', $this->data['currentTerm'].'-'.$this->data['currentSession']);
        $check = $this->db->get('class_tutor_comments_ratings');

        if($check->num_rows() > 0){
            $this->db->where('student_id', $student_id);
            $this->db->where('exam_name', $this->data['currentTerm'].'-'.$this->data['currentSession']);
            $this->db->update('class_tutor_comments_ratings', $data);

            echo json_encode($data);
        }else{
            $this->db->where('student_id', $student_id);
            $this->db->where('exam_name', $this->data['currentTerm'].'-'.$this->data['currentSession']);
            $this->db->insert('class_tutor_comments_ratings', $data);

            echo json_encode($data);
        }
    }
}