<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editreports extends TL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        if ($this->session->userdata('Elevated')) {
            $this->data['pageTitle'] = 'Edit Scores';

            $this->load->view('templates/header', $this->data);
            $this->load->view('scores/api/index', $this->data);
//            $this->load->view('scores/elevated/editscoresindex', $this->data);
            $this->load->view('templates/footer', $this->data);
        } else {
            $this->session->set_flashdata('warning', 'You cannot access this page, please login with the right account.');
            redirect('start');
        }
    }

    function students($prefix, $digit, $groups)
    {
        if ($this->session->userdata('Elevated')) {
            $this->data['pageTitle'] = 'Students in ' . $prefix . ' ' . $digit . $groups;

            $this->db->where('class_prefix', $prefix);
            $this->db->where('curr_year', $digit);
            $this->db->where('branch', $groups);
            $this->db->where('left_school', 0);
            $this->db->where('has_graduated', 0);
            $this->db->order_by('fname', 'asc');
            $stuget = $this->db->get('students');

            $this->data['studentsInClass'] = $stuget->result();

            $this->load->view('templates/header', $this->data);
            $this->load->view('scores/elevated/students', $this->data);
            $this->load->view('templates/footer', $this->data);
        } else {
            $this->session->set_flashdata('warning', 'You cannot access this page, please login with the right account.');
            redirect('start');
        }
    }

    function period($student_id)
    {
        if ($this->session->userdata('Elevated')) {
            $this->data['pageTitle'] = 'Choose Period';
            $this->data['student_id'] = $student_id;

            $this->load->view('templates/header', $this->data);
            $this->load->view('scores/elevated/period', $this->data);
            $this->load->view('templates/footer', $this->data);
        } else {
            $this->session->set_flashdata('warning', 'You cannot access this page, please login with the right account.');
            redirect('start');
        }
    }

    function view($student_id, $period)
    {
        if ($this->session->userdata('Elevated')) {
            $this->data['pageTitle'] = 'Edit Report View';

            $this->data['student_id'] = $student_id;

            $this->db->where('id', $student_id);
            $studentGet = $this->db->get('students');
            $stu = $studentGet->first_row();
            $this->data['studentName'] = $stu->fname . ' ' . $stu->mname . ' ' . $stu->lname;
            $this->data['studentDOB'] = $stu->dob;
            $this->data['studentAdmno'] = $stu->admno;
            $this->data['studentImage'] = $stu->stu_img;
            $this->data['studentsClass'] = $stu->class_prefix . ' ' . $stu->curr_year . $stu->branch;
            $this->data['period'] = $period;

            $this->db->where('prefix', $stu->class_prefix);
            $this->db->where('digit', $stu->curr_year);
            $this->db->where('groups', $stu->branch);
            $this->db->where('session', $this->data['currentSession']);
            $this->db->where('term', $this->data['currentTerm']);
            $tut = $this->db->get('class_tutor');
            $this->data['classTutor'] = $tut->result();

            $this->load->view('templates/header', $this->data);
            if ($period == 'midterm') {
                $this->load->view('scores/elevated/view_midterm', $this->data);
            }
            if ($period == 'endofterm') {
                $this->load->view('scores/elevated/view_exam', $this->data);
            }
            $this->load->view('templates/footer', $this->data);
        } else {
            $this->session->set_flashdata('warning', 'You cannot access this page, please login with the right account.');
            redirect('start');
        }
    }

    function editSubjectScoreExam($student_id, $subj)
    {
        if ($this->session->userdata('role') != 'Student') {
            $subject = str_replace('%20', ' ', $subj);
            $ca = (double)$_POST['caPost'];
            $exam = (double)$_POST['examPost'];
            $comment = $_POST['commentPost'];

            $average = ($ca + $exam) / 2;

            if ($average >= 90 && $average <= 100) {
                $grade = 'A+';
                $gp = 4.0;
            } elseif ($average >= 75 && $average < 90) {
                $grade = 'A';
                $gp = 4.0;
            } elseif ($average >= 65 && $average < 75) {
                $grade = 'B';
                $gp = 3.0;
            } elseif ($average >= 50 && $average < 65) {
                $grade = 'C';
                $gp = 2.0;
            } elseif ($average >= 45 && $average < 50) {
                $grade = 'D';
                $gp = 1.0;
            } elseif ($average >= 40 && $average < 45) {
                $grade = 'E';
                $gp = 0.7;
            } else {
                $grade = 'F';
                $gp = 0.0;
            }

            $data = array(
                'ca' => (double)$ca,
                'exam' => (double)$exam,
                'average' => $average,
                'comment' => $comment,
                'grade' => $grade,
                'gp' => $gp,
            );

            $this->db->where('student_id', $student_id);
            $this->db->where('subject_title', $subject);
            $this->db->where('session', $this->data['currentSession']);
            $this->db->where('term', $this->data['currentTerm']);

            $this->db->update('exam', $data);

            echo json_encode($data);
        }
    }

    function editSubjectScoreMidterm($student_id, $subj, $achievement, $effort, $homework, $behaviour)
    {
        if ($this->session->userdata('role') != 'Student') {
            $subject = str_replace('%20', ' ', $subj);
            $data = array(
                'achievement' => $achievement,
                'effort' => (int)$effort,
                'homework' => $homework,
                'behaviour' => (int)$behaviour,
            );

            $this->db->where('student_id', $student_id);
            $this->db->where('subject', $subject);
            $this->db->where('session', $this->data['currentSession']);
            $this->db->where('term', $this->data['currentTerm']);

            $this->db->update('midterm', $data);

            echo json_encode($data);
        }
    }

    function api_getStudentScores($student_id)
    {
        if ($this->session->userdata('role') != 'Student') {
            $session = $this->data['currentSession'];
            $term = $this->data['currentTerm'];

// Student's data
            $this->db->where('id', $student_id);
            $student_data = $this->db->get('students')->first_row();

// Get GPA for Student
            $this->db->where('student_id', $student_id);
            $this->db->where('session', $session);
            $this->db->where('term', $term);
            $this->db->select_avg('gp');
            $gpa = $this->db->get('exam')->first_row();

// Get Student's Average Score
            $this->db->where('student_id', $student_id);
            $this->db->where('session', $session);
            $this->db->where('term', $term);
            $this->db->select_avg('average');
            $stAverage = $this->db->get('exam')->first_row();

// Get Class Average
            $class_details = $student_data->class_prefix . ' ' . $student_data->curr_year . $student_data->branch;
            $this->db->where('session', $session);
            $this->db->where('term', $term);
            $this->db->where('class_details', $class_details);
            $this->db->select_avg('average');
            $clAverage = $this->db->get('exam')->first_row();

// Get student's exam result
            $this->db->where('term', $term);
            $this->db->where('session', $session);
            $this->db->where('student_id', $student_id);
            $this->db->order_by('subject_title');
            $exam = $this->db->get('exam')->result();

// Get student's class tutor comment and tutor class ratings
            $this->db->where('exam_name', $term . '-' . $session);
            $this->db->where('student_id', $student_id);
            $comment_ratings = $this->db->get('class_tutor_comments_ratings')->result();

// Get class tutor
            $this->db->where('session', $session);
            $this->db->where('term', $term);
            $this->db->where('prefix', $student_data->class_prefix);
            $this->db->where('digit', $student_data->curr_year);
            $this->db->where('groups', $student_data->branch);
            $class_tutor_id = $this->db->get('class_tutor')->first_row();

            $this->db->where('id', $class_tutor_id->tutor_id);
            $class_tutor = $this->db->get('staff')->first_row();

            echo json_encode(array(
                'exam_scores' => $exam,
                'exam_ratings_comment' => $comment_ratings,
                'gpa' => $gpa,
                'student_average' => $stAverage,
                'class_average' => $clAverage,
                'student_data' => $student_data,
                'class_tutor' => $class_tutor,
            ));
        }
    }

    function api_getStudentsInClass()
    {
        if ($this->session->userdata('role') != 'Student') {
            $period = $_POST['period'];
            $prefix = $_POST['prefix'];
            $digit = $_POST['digit'];
            $groups = $_POST['groups'];

            if ($period == 'midterm') {
                $this->db->where('class_prefix', $prefix);
                $this->db->where('curr_year', $digit);
                $this->db->where('branch', $groups);
                $this->db->order_by('fname');

                $students = $this->db->get('students')->result();

                echo json_encode($students);
            } elseif ($period == 'endofterm') {
                $this->db->where('class_prefix', $prefix);
                $this->db->where('curr_year', $digit);
                $this->db->where('branch', $groups);
                $this->db->order_by('fname');

                $students = $this->db->get('students')->result();

                echo json_encode($students);
            }
        }
    }

    function apiEditSubjectScoreExam($student_id, $score_id)
    {
        if ($this->session->userdata('role') != 'Student') {
            $subject = $_POST['subject'];
            $ca = (double)$_POST['caPost'];
            $exam = (double)$_POST['examPost'];
            $average = (double)$_POST['averagePost'];
            $grade = $_POST['gradePost'];
            $comment = $_POST['commentPost'];

            if ($average >= 90 && $average <= 100) {
                $gp = 4.0;
            } elseif ($average >= 75 && $average < 90) {
                $gp = 4.0;
            } elseif ($average >= 65 && $average < 75) {
                $gp = 3.0;
            } elseif ($average >= 50 && $average < 65) {
                $gp = 2.0;
            } elseif ($average >= 45 && $average < 50) {
                $gp = 1.0;
            } elseif ($average >= 40 && $average < 45) {
                $gp = 0.7;
            } else {
                $gp = 0.0;
            }

            $data = array(
                'ca' => (double)$ca,
                'exam' => (double)$exam,
                'average' => (double)$average,
                'comment' => $comment,
                'grade' => $grade,
                'gp' => (double)$gp,
            );

            $this->db->where('id', $score_id);
            $this->db->update('exam', $data);

            echo json_encode($data);
        }
    }

//    For midterm

    function api_getStudentScoresMidterm($student_id)
    {
        if ($this->session->userdata('role') != 'Student') {
            $session = $this->data['currentSession'];
            $term = $this->data['currentTerm'];

// Student's data
            $this->db->where('id', $student_id);
            $student_data = $this->db->get('students')->first_row();


// Get student's exam result
            $this->db->where('term', $term);
            $this->db->where('session', $session);
            $this->db->where('student_id', $student_id);
            $this->db->order_by('subject');
            $midterm = $this->db->get('midterm')->result();

// Get student's class tutor comment and tutor class ratings
            $this->db->where('session', $session);
            $this->db->where('term', $term);
            $this->db->where('student_id', $student_id);
            $comment_ratings = $this->db->get('midterm_class_tutor_comments')->result();

// Get class tutor
            $this->db->where('session', $session);
            $this->db->where('term', $term);
            $this->db->where('prefix', $student_data->class_prefix);
            $this->db->where('digit', $student_data->curr_year);
            $this->db->where('groups', $student_data->branch);
            $class_tutor_id = $this->db->get('class_tutor')->first_row();

            $this->db->where('id', $class_tutor_id->tutor_id);
            $class_tutor = $this->db->get('staff')->first_row();

            echo json_encode(array(
                'midterm_scores' => $midterm,
                'midterm_comment' => (count($comment_ratings) > 0) ? $comment_ratings : array(['comment' => 'None']),
                'student_data' => $student_data,
                'class_tutor' => $class_tutor,
            ));
        }
    }

    function apiEditSubjectScoreMidterm($student_id, $score_id)
    {
        if ($this->session->userdata('role') != 'Student') {
            $subject = $_POST['subjectPost'];
            $achievement = $_POST['achievementPost'];
            $homework = $_POST['homeworkPost'];
            $behaviour = $_POST['behaviourPost'];
            $effort = $_POST['effortPost'];

            $data = array(
                'achievement' => $achievement,
                'homework' => $homework,
                'behaviour' => $behaviour,
                'effort' => $effort,
            );

            $this->db->where('id', $score_id);
            $this->db->update('midterm', $data);

            echo json_encode($data);
        }
    }


}