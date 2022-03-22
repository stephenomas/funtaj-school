<?php defined('BASEPATH') OR die('No direct script access allowed!');

class Scores extends TL_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function index(){
        if ($this->session->userdata('LoggedIn')){
            redirect('/termscores/midterm');
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
    function midTerm(){
        if ($this->session->userdata('LoggedIn')){
            $this->data['pageTitle'] = 'Mid-Term';

          //  $this->load->view('templates/header', $this->data);
            $this->load->view('scores/midterm', $this->data);
            //$this->load->view('templates/footer', $this->data);
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to see this page.');
            redirect('start');
        }
    }
    
    //Enter midterm scores for students
    function enterMTScores(){
        if($this->session->userdata('Elevated') || $this->session->userdata('role') == 'Tutor'){
//        Get constant data from form
        $term = $this->input->post('term');
        $session = $this->input->post('session');
        $tutor_id = $this->input->post('tutor_id');
        $subject = $this->input->post('subject');
        $class_details = $this->input->post('class_details');

        //Get posted students data from 'form' into array variables
        $student_ids = $_POST['student_id'];
        $achievements = $_POST['achievement'];
        $efforts = $_POST['effort'];
        $homeworks = $_POST['homework'];
        $behaviours = $_POST['behaviour'];

        //Count the total posted data in to variable length
        $length = count($student_ids);
        //Create empty score array to hold the array
        $score_array = array();
//Using for loop, combine all posted data into multidimensional array thus
        for ($i = 0; $i < $length; $i++){
            //The score array index student id is passed into var $student id for use in where clause
            $score_array[$i]['student_id'] = $student_ids[$i];
            $score_array[$i]['achievement'] = $achievements[$i];
            $score_array[$i]['effort'] = $efforts[$i];
            $score_array[$i]['homework'] = $homeworks[$i];
            $score_array[$i]['behaviour'] = $behaviours[$i];
        }

        foreach ($score_array as $scores){
//            Add constant data to array
            $scores['term'] = $term;
            $scores['session'] = $session;
            $scores['tutor_id'] = $tutor_id;
            $scores['subject'] = $subject;
            $scores['class_details'] = $class_details;
            $this->scores_model->enterMTScores($scores, $term, $session, $tutor_id, $subject);
            }

        redirect($this->input->post('scoreUrl'), 'refresh');
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to perform selected action.');
            redirect('start');
        }
    }

    function endOfTerm(){
        if ($this->session->userdata('LoggedIn')){
            $this->data['pageTitle'] = 'End Of Term';

         //   $this->load->view('templates/header', $this->data);
            $this->load->view('scores/endofterm', $this->data);
         //   $this->load->view('templates/footer', $this->data);
        }else{
            redirect('start');
        }
    }
    //Enter term scores for students
    function enterEOTScores(){
        if($this->session->userdata('Elevated') || $this->session->userdata('role') == 'Tutor'){
//        Get constant data from form
        $term = $this->input->post('term');
        $session = $this->input->post('session');
        $tutor_id = $this->input->post('tutor_id');
        $subject = $this->input->post('subject_title');
        $class_details = $this->input->post('class_details');

        //Get posted students data from 'form' into array variables
        $student_ids = $_POST['student_id'];
        $cas = $_POST['ca'];
        $exams = $_POST['exam'];
        $comments = $_POST['comment'];

        //Count the total posted data in to variable length
        $length = count($student_ids);
        //Create empty score array to hold the array
        $score_array = array();
//Using for loop, combine all posted data into multidimensional array thus
        for ($i = 0; $i < $length; $i++){
            //The score array index student id is passed into var $student id for use in where clause
            $score_array[$i]['student_id'] = $student_ids[$i];
            $score_array[$i]['ca'] = $cas[$i];
            $score_array[$i]['exam'] = $exams[$i];
            $score_array[$i]['comment'] = $comments[$i];
        }

        foreach ($score_array as $scores){
//            Add constant and calculated data to array
            $scores['term'] = $term;
            $scores['session'] = $session;
            $scores['tutor_id'] = $tutor_id;
            $scores['subject_title'] = $subject;
            $scores['exam_name'] = $term.'-'.$session;
            $scores['average'] = ($scores['ca'] + $scores['exam'])/2;
            $average = ($scores['ca'] + $scores['exam'])/2;
//            Determine grade A, B, C, D, E
            if($average >= 90 && $average <= 100){$grade = 'A+'; $gp = 4.0;
            }elseif ($average >= 75 && $average <= 89){$grade = 'A'; $gp = 4.0;
            }elseif ($average >= 65 && $average <= 74){$grade = 'B'; $gp = 3.0;
            }elseif ($average >= 50 && $average <= 64){$grade = 'C'; $gp = 2.0;
            }elseif ($average >= 45 && $average <= 49){$grade = 'D'; $gp = 1.0;
            }elseif ($average >= 40 && $average <= 44){$grade = 'E'; $gp = 0.7;
            }else{$grade = 'F'; $gp = 0.0;}
            $scores['grade'] = $grade;
            $scores['gp'] = $gp;
            $scores['tutor_id'] = $tutor_id;
            $scores['class_details'] = $class_details;

            $enterScore = $this->scores_model->enterEOTScores($scores, $term, $session, $tutor_id, $subject);
            if ($enterScore){
                //redirect($this->input->post('scoreUrl'), 'refresh');
                    }
                }redirect($this->input->post('scoreUrl'), 'refresh');
            }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to perform selected action.');
            redirect('start');
        }
    }
//Enter scores view for midterm
    function midtermScores($subjectId){
        if ($this->session->userdata('LoggedIn')){
            $this->data['pageTitle'] = 'Choose Class for Subject Scores';
            $this->data['subjectId'] = $subjectId;

          //  $this->load->view('templates/header', $this->data);
            if($this->session->userdata('Elevated')){
                $this->load->view('scores/ajax_midterm_elevated', $this->data);
            }else{
                $this->load->view('scores/ajax_midterm', $this->data);
            }
         //   $this->load->view('templates/footer', $this->data);
        }else{
            redirect('start');
        }
    }
//Enter scores view for exam
    function endoftermScores($subjectId){
        if ($this->session->userdata('LoggedIn')){
            $this->data['pageTitle'] = 'Choose Class for Subject Scores';
            $this->data['subjectId'] = $subjectId;

            $this->load->view('templates/header', $this->data);
            if($this->session->userdata('Elevated')){
                $this->load->view('scores/ajax_endofterm_elevated', $this->data);
            }else{
                $this->load->view('scores/ajax_endofterm', $this->data);
            }
            $this->load->view('templates/footer', $this->data);
        }else{
            redirect('start');
        }
    }
//    Get exam results
    function ajaxGetSubjectExamScores($subject, $classDetails, $student_id){
        if($this->session->userdata('LoggedIn')){
        $this->db->where('term', $this->data['currentTerm']);
        $this->db->where('session', $this->data['currentSession']);
        $this->db->where('student_id', $student_id);
        $this->db->where('class_details', str_replace('_', ' ', $classDetails));
        $this->db->where('subject_title', str_replace('%20', ' ', $subject));

        $exam = $this->db->get('exam');
        echo json_encode($exam->result());
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to perform selected action.');
            redirect('start');
        }
    }
//  Get midterm results
    function ajaxGetSubjectMidtermScores($subject, $classDetails){
        if($this->session->userdata('LoggedIn')){
        $this->db->where('term', $this->data['currentTerm']);
        $this->db->where('session', $this->data['currentSession']);
        $this->db->where('class_details', str_replace('_', ' ', $classDetails));
        $this->db->where('subject',  str_replace('%20', ' ', $subject));

        $exam = $this->db->get('midterm');
        echo json_encode($exam->result());
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to perform selected action.');
            redirect('start');
        }
    }

    function setEndOfTermAjax($student_id){
        $comment = $_POST['commentPost'];
        $ca = (double)$_POST['caPost'];
        $exam = (double)$_POST['examPost'];
        $subject = $_POST['subject'];
        $class_details = $_POST['class_details'];

        if($this->session->userdata('LoggedIn') && $this->session->userdata('role') != 'Student'){
        $tutor_id = $this->session->userdata('fname').' '.$this->session->userdata('lname');
        $average = (double)($ca + $exam)/2;
//            Determine grade A, B, C, D, E
        if($average >= 90 && $average <= 100){$grade = 'A+'; $gp = 4.0;
        }elseif ($average >= 75 && $average < 90){$grade = 'A'; $gp = 4.0;
        }elseif ($average >= 65 && $average < 75){$grade = 'B'; $gp = 3.0;
        }elseif ($average >= 50 && $average < 65){$grade = 'C'; $gp = 2.0;
        }elseif ($average >= 45 && $average < 50){$grade = 'D'; $gp = 1.0;
        }elseif ($average >= 40 && $average < 45){$grade = 'E'; $gp = 0.7;
        }else{$grade = 'F'; $gp = 0.0;}

        $term = $this->data['currentTerm'];
        $session = $this->data['currentSession'];
        $data = array(
            'term' => $term,
            'session' => $session,
            'student_id' => $student_id,
            'ca' => (double)$ca,
            'exam' => (double)$exam,
            'comment' => $comment,
            'tutor_id' => $tutor_id,
            'subject_title' => $subject,
            'exam_name' => $term.'-'.$session,
            'average' => (double)$average,
            'grade' => $grade,
            'gp' => (double)$gp,
            'class_details' => $class_details,
        );

        $setExam = $this->scores_model->enterEOTScoresAjax($data, $term, $session, $subject);
        if($setExam){
            echo json_encode($data);
            }
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to perform selected action.');
            redirect('start');
        }
    }
    function setMidtermAjax($subject, $student_id, $class_details, $achievement, $effort, $homework, $behaviour){
        if($this->session->userdata('Elevated') || $this->session->userdata('role') == 'Tutor'){
        $tutor_id = $this->session->userdata('id');
        $term = $this->data['currentTerm'];
        $session = $this->data['currentSession'];

        $realClass = str_replace("%20"," ",$class_details);
        $realSubject = str_replace("%20"," ",$subject);

        $data = array(
            'term' => $term,
            'session' => $session,
            'student_id' => $student_id,
            'achievement' => $achievement,
            'effort' => $effort,
            'homework' => $homework,
            'behaviour' => $behaviour,
            'tutor_id' => $tutor_id,
            'subject' => $realSubject,
            'class_details' => $realClass,
        );

        $setMidterm = $this->scores_model->enterMTScoresAjax($data, $term, $session, $realSubject);
        if($setMidterm){
            echo json_encode($data);
            }
        }else {
            $this->session->set_flashdata('warning', 'Please login with the right account to perform selected action.');
            redirect('start');
        }
    }
    function clearStudentMidterm($student_id, $subj){
        if($this->session->userdata('LoggedIn') && $this->session->userdata('role') != 'Student'){
            $subject = str_replace('%20', ' ', $subj);
            $this->db->where('student_id', $student_id);
            $this->db->where('session', $this->data['currentSession']);
            $this->db->where('term', $this->data['currentTerm']);
            $this->db->where('subject', $subject);

            $this->db->delete('midterm');

            $data = array($student_id, $subject);

            echo json_encode($data);
        }else{
            $this->session->set_flashdata('error', 'You are not allowed to see that page.');
            redirect('start');
        }
    }
    function clearStudentExam($student_id, $subj){
            if($this->session->userdata('LoggedIn') && $this->session->userdata('role') != 'Student'){
            $subject = str_replace('%20', ' ', $subj);
            $this->db->where('student_id', $student_id);
            $this->db->where('session', $this->data['currentSession']);
            $this->db->where('term', $this->data['currentTerm']);
            $this->db->where('subject_title', $subject);

            $this->db->delete('exam');

            $data = array($student_id, $subject);

            echo json_encode($data);
            }else{
                $this->session->set_flashdata('error', 'You are not allowed to see that page.');
                redirect('start');
            }
    }
    function enterEditScores($subjectId, $subject, $yearGroup, $classID){
        if($this->session->userdata('LoggedIn') && $this->session->userdata('role') != 'Student'){
            $this->data['pageTitle'] = 'Enter Scores for '.str_replace('_', ' ', $subject);
            $this->data['classDetails'] = str_replace('_', ' ', $yearGroup);
            $this->db->where('id', $classID);
            $classGet = $this->db->get('classes');
            $cl = $classGet->first_row();
            $this->data['prefix'] = $cl->prefix;
            $this->data['digit'] = $cl->digit;
            $this->data['groups'] = $cl->groups;
            $this->data['scoreSubject'] = str_replace('_', ' ', $subject);
            $this->data['subjectId'] = $subjectId;

            $this->load->view('templates/header', $this->data);
            $this->load->view('scores/editscoreview', $this->data);
            $this->load->view('templates/footer', $this->data);

        }else{
            $this->session->set_flashdata('error', 'You are not allowed to see that page.');
            redirect('start');
        }
    }
    function enterEditMidtermScores($subjectId, $subject, $yearGroup, $classID){
        if($this->session->userdata('LoggedIn') && $this->session->userdata('role') != 'Student'){
            $this->data['pageTitle'] = 'Enter Midterm Scores for '.str_replace('_', ' ', $subject);
            $this->data['classDetails'] = str_replace('_', ' ', $yearGroup);
            $this->db->where('id', $classID);
            $classGet = $this->db->get('classes');
            $cl = $classGet->first_row();
            $this->data['prefix'] = $cl->prefix;
            $this->data['digit'] = $cl->digit;
            $this->data['groups'] = $cl->groups;
            $this->data['scoreSubject'] = str_replace('_', ' ', $subject);
            $this->data['subjectId'] = $subjectId;

            $this->load->view('templates/header', $this->data);
            $this->load->view('scores/editscoremidtermview', $this->data);
            $this->load->view('templates/footer', $this->data);

        }else{
            $this->session->set_flashdata('error', 'You are not allowed to see that page.');
            redirect('start');
        }
    }
}