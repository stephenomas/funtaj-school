<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends TL_Model
{
    public function process_login($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->where('is_active', 1);

        $query = $this->db->get('staff');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $rows) {
                //add all data to session

                $user_data = array(
                    'id' => $rows->id,
                    'title' => $rows->title,
                    'fname' => $rows->fname,
                    'mname' => $rows->mname,
                    'lname' => $rows->lname,
                    'email' => $rows->email,
                    'role' => $rows->groups,
                    'lastpage' => $rows->last_page_visited,
                    'img' => $rows->profile_img,
                    'LoggedIn' => TRUE,
                );
            }

            $this->session->set_userdata($user_data);

            $this->db->where('email', $email);
            $this->db->where('is_active', 1);

            $data = array('online' => 1, 'lastlogin' => date('Y-m-d H:i:s'));
            $this->db->update('staff', $data);

            if ($this->session->userdata('role') === 'Admin' || $this->session->userdata('role') === 'SuperAdmin' || $this->session->userdata('role') === 'Information' || $this->session->userdata('role') === 'Secretary' || $this->session->userdata('role') === 'Executive' || $this->session->userdata('role') === 'VicePrincipal' || $this->session->userdata('role') === 'Principal') {
                $this->session->set_userdata('Elevated', TRUE);
            }
            if ($this->session->userdata('role') === 'Admin' || $this->session->userdata('role') === 'SuperAdmin' || $this->session->userdata('role') === 'Store' || $this->session->userdata('role') === 'Executive' || $this->session->userdata('role') === 'Account' || $this->session->userdata('role') === 'Principal') {
                $this->session->set_userdata('StoreElevated', TRUE);
            }
            return true;
        } elseif ($query->num_rows() < 1) {
            $this->db->where('email', $email);
            $this->db->where('password', $password);
            $this->db->where('has_graduated', 0);
            $this->db->where('left_school', 0);
            $this->db->where('has_paid_school_fees', 1);

            $stuquery = $this->db->get('students');

            if ($stuquery->num_rows() > 0) {
                foreach ($stuquery->result() as $rows) {
                    //add all data to session
                    $user_data = array(
                        'id' => $rows->id,
                        'fname' => $rows->fname,
                        'mname' => $rows->mname,
                        'lname' => $rows->lname,
                        'email' => $rows->email,
                        'img' => $rows->stu_img,
                        'dob' => $rows->dob,
                        'admno' => $rows->admno,
                        'religion' => $rows->religion,
                        'prefix' => $rows->class_prefix,
                        'digit' => $rows->curr_year,
                        'groups' => $rows->branch,
                        'student_type' => $rows->student_type,
                        'role' => 'Student',
                        'LoggedIn' => TRUE,
                    );
                }
                $this->session->set_userdata($user_data);

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function api_login($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->where('is_active', 1);

        $query = $this->db->get('staff');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $rows) {
                //add all data to session
                $user_data = array(
                    'id' => $rows->id,
                    'title' => $rows->title,
                    'fname' => $rows->fname,
                    'mname' => $rows->mname,
                    'lname' => $rows->lname,
                    'email' => $rows->email,
                    'role' => $rows->groups,
                    'lastpage' => $rows->last_page_visited,
                    'img' => $rows->profile_img,
                    'gender' => $rows->gender,
                    'LoggedIn' => TRUE,
                );
            }
            $this->session->set_userdata($user_data);
            $this->session->set_flashdata('success', 'Welcome back.');

            if ($this->session->userdata('role') === 'Admin' || $this->session->userdata('role') === 'SuperAdmin' || $this->session->userdata('role') === 'Information' || $this->session->userdata('role') === 'Secretary' || $this->session->userdata('role') === 'Executive' || $this->session->userdata('role') === 'VicePrincipal' || $this->session->userdata('role') === 'Principal') {
                $this->session->set_userdata('Elevated', TRUE);
            }
            if ($this->session->userdata('role') === 'Admin' || $this->session->userdata('role') === 'SuperAdmin' || $this->session->userdata('role') === 'Store' || $this->session->userdata('role') === 'Executive' || $this->session->userdata('role') === 'Account' || $this->session->userdata('role') === 'Principal') {
                $this->session->set_userdata('StoreElevated', TRUE);
            }

            $this->db->where('email', $email);
            $this->db->where('is_active', 1);

            $data = array('online' => 1, 'lastlogin' => date('Y-m-d H:i:s'));
            $this->db->update('staff', $data);

            return $user_data;
        } elseif ($query->num_rows() === 0) {
            $this->db->where('email', $email);
            $this->db->where('password', $password);
            $this->db->where('has_graduated', 0);
            $this->db->where('left_school', 0);
            $this->db->where('has_paid_school_fees', 1);

            $stuquery = $this->db->get('students');

            if ($stuquery->num_rows() > 0) {

                foreach ($stuquery->result() as $rows) {
                    //add all data to session
                    $user_data = array(
                        'id' => $rows->id,
                        'fname' => $rows->fname,
                        'mname' => $rows->mname,
                        'lname' => $rows->lname,
                        'email' => $rows->email,
                        'img' => $rows->stu_img,
                        'dob' => $rows->dob,
                        'admno' => $rows->admno,
                        'religion' => $rows->religion,
                        'prefix' => $rows->class_prefix,
                        'digit' => $rows->curr_year,
                        'groups' => $rows->branch,
                        'student_type' => $rows->student_type,
                        'role' => 'Student',
                        'gender' => $rows->gender,
                        'LoggedIn' => TRUE,
                    );
                }
            } else {
                $user_data = array(
                    'LoggedIn' => FALSE,
                );
            }

            $this->session->set_userdata($user_data);
            $this->session->set_flashdata('success', 'Welcome back.');


            return $user_data;
        } else {
            $this->session->set_flashdata('warning', 'We are not able to log you in. Please ensure you are currently a student of the school and have settled every outstanding bill with the accounts department.');
            return false;
        }
    }
}