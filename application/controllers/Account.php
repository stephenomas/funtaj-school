<?php defined('BASEPATH') OR die('No direct script access allowed');

class Account extends TL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        if ($this->session->userdata('role') === 'Account') {
            $this->data['pageTitle'] = 'Account Dashboard';

            $this->load->view('templates/header', $this->data);
            $this->load->view('account/index', $this->data);
            $this->load->view('templates/footer', $this->data);
        } else {
            $this->session->set_flashdata('warning', 'You are not authorised to see that page!');
            redirect('start');
        }
    }

    public function createFees()
    {
        if ($this->session->userdata('role') === 'Account') {
            $school_level = $_POST['school_level'];
            $student_type = $_POST['student_type'];
            $bills = $_POST['bills'];
            $amounts = $_POST['amounts'];
            $term = $_POST['term'];
            $session = $_POST['session'];
//            $payment_date = $_POST['payment_date'];
//            $concession_date = $_POST['concession_date'];

            $this->db->where('school_level', $school_level);
            $this->db->where('student_type', $student_type);
            $this->db->where('bills', $bills);
            $this->db->where('amounts', $amounts);
            $this->db->where('terms', $term);
            $this->db->where('sessions', $session);
            $query = $this->db->get('accounts_fees');

            $data = array(
                'school_level' => $school_level,
                'student_type' => $student_type,
                'bills' => $bills,
                'amounts' => $amounts,
                'terms' => $term,
                'sessions' => $session,
//                'payment_date' => $payment_date,
//                'concession_date' => $concession_date,
            );

            if ($query->num_rows() > 0) {
                $this->db->where('school_level', $school_level);
                $this->db->where('student_type', $student_type);
                $this->db->where('bills', $bills);
                $this->db->where('amounts', $amounts);
                $this->db->where('terms', $term);
                $this->db->where('sessions', $session);

                $this->db->update('accounts_fees', $data);
            } else {
                $this->db->insert('accounts_fees', $data);
            }

            echo json_encode($data);
        } else {
            $this->session->set_flashdata('warning', 'You are not authorised to see that page!');
            redirect('start');
        }
    }

    public function createStudentFees($student_id)
    {
        if ($this->session->userdata('role') === 'Account') {
            $bills = $_POST['bills'];
            $amounts = $_POST['amounts'];
            $term = $_POST['term'];
            $session = $_POST['session'];
            $admno = $_POST['admno'];
            $student_type = $_POST['student_type'];

            $this->db->where('student_id', $student_id);
            $this->db->where('bills', $bills);
//            $this->db->where('amount', $amounts);
            $this->db->where('term', $term);
            $this->db->where('session', $session);
            $query = $this->db->get('accounts_students');

            $data = array(
                'bills' => $bills,
                'amount' => $amounts,
                'term' => $term,
                'session' => $session,
                'student_id' => $student_id,
                'student_admno' => $admno,
                'student_type' => $student_type,
            );

            if ($query->num_rows() > 0) {
                $this->db->where('student_id', $student_id);
                $this->db->where('bills', $bills);
//                $this->db->where('amount', $amounts);
                $this->db->where('term', $term);
                $this->db->where('session', $session);

                $this->db->update('accounts_students', $data);
            } else {
                $this->db->insert('accounts_students', $data);
            }

            echo json_encode($data);
        } else {
            $this->session->set_flashdata('warning', 'You are not authorised to see that page!');
            redirect('start');
        }
    }

    public function getFees()
    {
        if ($this->session->userdata('role') === 'Account') {
            $this->db->where('terms', $this->data['currentTerm']);
            $this->db->where('sessions', $this->data['currentSession']);

            $query = $this->db->get('accounts_fees');

            echo json_encode($query->result());
        } else {
            $this->session->set_flashdata('warning', 'You are not authorised to see that page!');
            redirect('start');
        }
    }

    public function deleteStudentFee($id, $prefix, $digit, $groups, $student_id)
    {
        if ($this->session->userdata('role') === 'Account') {

            $data = array(
                'id' => $id,
            );

            $this->db->where('id', $id);

            $this->db->delete('accounts_students');
//            echo json_encode($data);
            redirect('account/studentbill/' . $prefix . '/' . $digit . '/' . $groups . '/' . $student_id);
        } else {
            $this->session->set_flashdata('warning', 'You are not authorised to see that page!');
            redirect('start');
        }
    }

    public function deleteFee($id)
    {
        if ($this->session->userdata('role') === 'Account') {

            $data = array(
                'id' => $id,
            );

            $this->db->where('id', $id);

            $this->db->delete('accounts_fees');
            echo json_encode($data);
        } else {
            $this->session->set_flashdata('warning', 'You are not authorised to see that page!');
            redirect('start');
        }
    }

    public function getStudentFees($term, $session, $school_level, $student_id)
    {
        if ($this->session->userdata('role') === 'Account') {
            $this->db->where('school_level', $school_level);
            $this->db->where('terms', $term);
            $this->db->where('sessions', $session);
            $this->db->where('student_id', $student_id);

            $query = $this->db->get('accounts_fees');

            echo json_encode($query->result());
        } else {
            $this->session->set_flashdata('warning', 'You are not authorised to see that page!');
            redirect('start');
        }
    }

    public function students($prefix, $digit, $groups)
    {
        if ($this->session->userdata('role') === 'Account') {

            $this->data['pageTitle'] = 'Students in ' . $prefix . ' ' . $digit . $groups;
            $this->data['subTitle'] = 'Enter Unique fees for students';

            $this->data['prefix'] = $prefix;
            $this->data['digit'] = $digit;
            $this->data['groups'] = $groups;

            $this->db->where('class_prefix', $prefix);
            $this->db->where('curr_year', $digit);
            $this->db->where('branch', $groups);
            $this->db->where('left_school', 0);
            $this->db->where('has_graduated', 0);

            $query = $this->db->get('students');

            $this->data['studentsInClass'] = $query->result();
            $this->data['class'] = $prefix . ' ' . $digit . $groups;

            $this->load->view('templates/header', $this->data);
            $this->load->view('account/students', $this->data);
            $this->load->view('templates/footer', $this->data);

        } else {
            $this->session->set_flashdata('warning', 'You are not authorised to see that page!');
            redirect('start');
        }
    }

    public function setStudentType($admno, $type)
    {
        if ($this->session->userdata('role') === 'Account') {

            $this->db->where('admno', $admno);
            $data = array(
                'student_type' => $type,
            );
            $this->db->update('students', $data);

            echo json_encode($data);

        } else {
            $this->session->set_flashdata('warning', 'You are not authorised to see that page!');
            redirect('start');
        }
    }

    public function hasNotPaidFees($student_id)
    {
        $data = array(
            'has_paid_school_fees' => 0,
        );

        $this->db->where('id', $student_id);
        $this->db->update('students', $data);

        echo json_encode($data);
    }

    public function hasPaidFees($student_id)
    {
        $data = array(
            'has_paid_school_fees' => 1,
        );

        $this->db->where('id', $student_id);
        $this->db->update('students', $data);

        echo json_encode($data);
    }

    function viewBill($student_id)
    {
        if ($this->session->userdata('role') == 'Student' || $this->session->userdata('role') == 'Account') {
            $this->data['pageTitle'] = 'View Current Bill';

            $this->db->where('id', $student_id);
            $stu_get = $this->db->get('students');
            $student = $stu_get->first_row();

            $this->data['student_id'] = $student_id;
            $this->data['prefix'] = $student->class_prefix;
            $this->data['digit'] = $student->curr_year;
            $this->data['groups'] = $student->branch;
            $this->data['subTitle'] = $student->fname . ' ' . $student->mname . ' ' . $student->lname;

            $this->load->view('templates/header', $this->data);
            if ($this->session->userdata('role') == 'Account') {
                $this->load->view('account/account_view_bill', $this->data);
            } else {
//                redirect('start');
                $this->load->view('account/student/index', $this->data);
            }
            $this->load->view('templates/footer', $this->data);
        } else {
            redirect('start');
        }
    }

    function studentbill($prefix, $digit, $groups, $student_id)
    {
        if ($this->session->userdata('role') === 'Account') {

            $this->data['pageTitle'] = 'Student\'s Bills';
            $this->data['subTitle'] = 'Enter Unique fees for student';

            $this->data['prefix'] = $prefix;
            $this->data['digit'] = $digit;
            $this->data['groups'] = $groups;

            $this->db->where('class_prefix', $prefix);
            $this->db->where('curr_year', $digit);
            $this->db->where('branch', $groups);
            $this->db->where('left_school', 0);
            $this->db->where('has_graduated', 0);
            $this->db->where('id', $student_id);

            $query = $this->db->get('students');
            $stuQuery = $query->first_row();

            $this->data['fname'] = $stuQuery->fname;
            $this->data['mname'] = $stuQuery->mname;
            $this->data['lname'] = $stuQuery->lname;
            $this->data['student'] = $stuQuery;

            $this->load->view('templates/header', $this->data);
            $this->load->view('account/studentbill', $this->data);
            $this->load->view('templates/footer', $this->data);

        } else {
            $this->session->set_flashdata('warning', 'You are not authorised to see that page!');
            redirect('start');
        }
    }

    function getAccountStatement($student_id)
    {
        $this->db->where('student_id', $student_id);
    }

    function setPaymentDates()
    {
        if ($this->session->userdata('role') === 'Account') {
            $concession_date = $_POST['concession_date'];
            $payment_date = $_POST['payment_date'];

            $data = array(
                'payment_date' => $payment_date,
                'concession_date' => $concession_date,
                'term' => $this->data['currentTerm'],
                'session' => $this->data['currentSession']
            );

            $this->db->where('term', $this->data['currentTerm']);
            $this->db->where('session', $this->data['currentSession']);
            $try = $this->db->get('fees_payment_dates');
            if ($try->num_rows() > 0) {
                $this->db->where('term', $this->data['currentTerm']);
                $this->db->where('session', $this->data['currentSession']);
                $this->db->update('fees_payment_dates', $data);
                echo json_encode('Dates successfully updated');
            } else {
                $this->db->insert('fees_payment_dates', $data);
                echo json_encode('Dates successfully added');
            }
        } else {
            $this->session->set_flashdata('warning', 'You are not authorised to see that page!');
            redirect('start');
        }
    }

}