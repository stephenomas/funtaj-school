<?php defined('BASEPATH') OR die('No direct script access allowed!');

class Broadsheet extends TL_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        $this->data['pageTitle'] = 'Broadsheet';

        $this->load->view('templates/header', $this->data);
        $this->load->view('broadsheet/api/index', $this->data);
        $this->load->view('templates/footer', $this->data);
    }

    function api_getAllExamScores()
    {
        $session = $_POST['session'];
        $term = $_POST['term'];
        $prefix = $_POST['prefix'];
        $digit = $_POST['digit'];
        $groups = $_POST['groups'];
        $class_details = $prefix . ' ' . $digit . $groups;


        $this->db->select('*');
        $this->db->where('session', $session);
        $this->db->where('term', $term);
        $this->db->where('class_details', $class_details);
        $this->db->from('exam');
        $this->db->join('students', 'students.id = exam.student_id');
        $exam = $this->db->get()->result();

        $exam_subjects = $this->api_getExamSubjects($session, $class_details);

        $exam_students = $this->api_getStudentsInClass($session, $term, $class_details);

        echo json_encode(array('subjects' => $exam_subjects, 'scores' => $exam, 'students' => $exam_students));
    }

    function api_getStudentsInClass($session, $term, $class_details)
    {
        $this->db->where('session', $session);
        $this->db->where('term', $term);
        $this->db->where('class_details', $class_details);
        $this->db->order_by('subject_title');
        $this->db->group_by('student_id');
        $this->db->select('*');
        $this->db->from('exam');
        $this->db->join('students', 'students.id = exam.student_id');
        $exam = $this->db->get()->result();

        return $exam;
    }

    function api_getExamSubjects($session, $class_details)
    {
        $this->db->where('session', $session);
        $this->db->where('class_details', $class_details);
        $this->db->select('subject_title');
        $this->db->select('id');
        $this->db->order_by('subject_title');
        $this->db->group_by('subject_title');
        $exam_res = $this->db->get('exam')->result();

        return $exam_res;
    }

    function api_getStudentScore($student_id){
        echo json_encode(array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10));
    }
}