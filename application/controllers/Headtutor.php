<?php defined('BASEPATH') OR die('No direct script access allowed!');

class Headtutor extends TL_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        if ($this->session->userdata('Elevated')) {
            $this->data['pageTitle'] = 'Head Teacher/Principal Comments';
            $this->data['subTitle'] = 'Select class to view students';

            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/admin_comments/index', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);
        } else {
            redirect('start');
        }
    }

    function stu_comment($prefix, $digit, $groups)
    {
        if ($this->session->userdata('Elevated')) {
            $this->data['pageTitle'] = 'Head Teacher/Principal Comments';
            $this->data['subTitle'] = 'Enter comments for students';
            $this->data['prefix'] = $prefix;
            $this->data['digit'] = $digit;
            $this->data['groups'] = $groups;

            $this->load->view('templates/header', $this->data);
            $this->load->view('admin_comments/students', $this->data);
            $this->load->view('templates/footer', $this->data);
        } else {
            redirect('start');
        }
    }

    function htComment($student_id)
    {
        if ($this->session->userdata('Elevated')) {
            $comment = $_POST['htComment'];

            $this->db->where('student_id', $student_id);
            $this->db->where('exam_name', $this->data['currentTerm'] . ' - ' . $this->data['currentSession']);
            $check = $this->db->get('head_tutor_comments_ratings');

            $data = array(
                'student_id' => $student_id,
                'head_tutor_comment' => $comment,
                'exam_name' => $this->data['currentTerm'] . ' - ' . $this->data['currentSession'],
            );

            if ($check->num_rows() < 1) {
                $this->db->insert('head_tutor_comments_ratings', $data);

                echo json_encode($data);
            } else {
                $this->db->where('student_id', $student_id);
                $this->db->where('exam_name', $this->data['currentTerm'] . ' - ' . $this->data['currentSession']);

                $this->db->update('head_tutor_comments_ratings', $data);

                echo json_encode($data);
            }
        } else {
            redirect('start');
        }
    }

    function deleteHtComment($student_id, $prefix, $digit, $groups)
    {
        if ($this->session->userdata('Elevated')) {
            $this->db->where('student_id', $student_id);
            $this->db->where('exam_name', $this->data['currentTerm'] . ' - ' . $this->data['currentSession']);
            $this->db->delete('head_tutor_comments_ratings');

            redirect('headtutor/stu_comment/'.$prefix.'/'.$digit.'/'.$groups);
        } else {
            redirect('start');
        }
    }
}