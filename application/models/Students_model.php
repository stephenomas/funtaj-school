<?php defined('BASEPATH') OR die('No direct script access allowed');

class Students_model extends TL_Model{
    function addStudent($admno, $fname, $mname, $lname, $dob, $email, $password, $gender, $class_prefix, $curr_year, $branch, $house, $file){
        $data = array(
            'admno' => $admno,
            'fname' => $fname,
            'mname' => $mname,
            'lname' => $lname,
            'dob' => $dob,
            'email' => $email,
            'password' => $password,
            'gender' => $gender,
            'class_prefix' => $class_prefix,
            'curr_year' => $curr_year,
            'branch' => $branch,
            'house' => $house,
            'stu_img' => $file
        );

        $insert = $this->db->insert('students', $data);
        if($insert){
            return true;
        }return false;
    }

    function add_old($admno, $fname, $mname, $lname, $dob, $email, $password, $gender, $class_prefix, $curr_year, $branch, $house, $file, $file2){
        $data = array(
            'admno' => $admno,
            'fname' => $fname,
            'mname' => $mname,
            'lname' => $lname,
            'dob' => $dob,
            'email' => $email,
            'password' => $password,
            'gender' => $gender,
            'class_prefix' => $class_prefix,
            'curr_year' => $curr_year,
            'branch' => $branch,
            'house' => $house,
            'stu_img' => $file,
            'left_school' => 1,
            'result_img' => $file2
        );

        $insert = $this->db->insert('students', $data);
        if($insert){
            return true;
        }return false;
    }

    function editStudent($admno, $fname, $mname, $lname, $dob, $email, $gender, $house){
        $data = array(
            'admno' => $admno,
            'fname' => $fname,
            'mname' => $mname,
            'lname' => $lname,
            'dob' => $dob,
            'email' => $email,
            'gender' => $gender,
            'house' => $house,
   
        );
        $this->db->where('admno', $admno);
        $update = $this->db->update('students', $data);
        if($update){
            return true;
        }return false;
    }

    function editResult($file, $admno){
        $data = array(
            'result_img' => $file
        );

        $this->db->where('admno', $admno);
        $update = $this->db->update('result_img', $data);
        if($update){
            return true;
        }else{
            return false;
        }
    }

    function editStudentClass($admno, $fname, $mname, $lname, $dob, $email, $gender, $class, $prefix, $group, $house){
        $data = array(
            'admno' => $admno,
            'fname' => $fname,
            'mname' => $mname,
            'lname' => $lname,
            'dob' => $dob,
            'email' => $email,
            'gender' => $gender,
            'curr_year' => $class,
            'class_prefix' => $prefix,
            'branch' => $group,
            'house' => $house
        );
        $this->db->where('admno', $admno);
        $update = $this->db->update('students', $data);
        if($update){
            return true;
        }return false;
    }

    function editPassword($id, $password){
        $data = array(
            'password' => $password,
        );
        $this->db->where('id', $id);
        $update = $this->db->update('students', $data);
        if($update){return true;}return false;
    }
    function admno_check($admno){
        $this->db->where('admno', $admno);
        $query = $this->db->get('students');
        if($query->num_rows() > 0){
            return true;
        } return false;
    }
}