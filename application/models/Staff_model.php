<?php defined('BASEPATH') OR die('No direct script access allowed');

class Staff_model extends TL_Model{
    function editStaff($id, $title, $email, $fname, $mname, $lname, $gender, $groups, $phone, $house){
        $data = array(
            'title' => $title,
            'email' => $email,
            'fname' => $fname,
            'mname' => $mname,
            'lname' => $lname,
            'gender' => $gender,
            'groups' => $groups,
            'phone' => $phone,
            'house' => $house,
           
        );
        $this->db->where('id', $id);
        $update = $this->db->update('staff', $data);
        if($update){
            return true;
        } return false;
    }

    function editPassword($id, $password){
        $data = array(
            'password' => $password,
        );
        $this->db->where('id', $id);
        $update = $this->db->update('staff', $data);
        if($update){return true;}return false;
    }
    function addStaff($title, $email, $fname, $mname, $lname, $gender, $groups, $password, $phone, $house){
        $data = array(
            'title' => $title,
            'email' => $email,
            'fname' => $fname,
            'mname' => $mname,
            'lname' => $lname,
            'gender' => $gender,
            'groups' => $groups,
            'password' => $password,
            'house' => $house,
            'phone' => $phone
        );
        $insert = $this->db->insert('staff', $data);
        if($insert){
            return true;
        } return false;
    }
    function deactivateStaff($id){
        $data = array(
            'is_active' => '0'
        );
        $this->db->where('id',$id);
        $da = $this->db->update('staff', $data);
        if($da){
            return true;
        } return false;
    }
    function activateStaff($id){
        $data = array(
            'is_active' => '1'
        );
        $this->db->where('id',$id);
        $da = $this->db->update('staff', $data);
        if($da){
            return true;
        } return false;
    }
    function deleteStaff($id){
        $this->db->where('id',$id);
        $ds = $this->db->delete('staff');
        if($ds){
            return true;
        } return false;
    }
}