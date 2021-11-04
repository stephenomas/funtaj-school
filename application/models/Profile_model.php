<?php defined('BASEPATH') OR die('No direct script access allowed!');

class Profile_model extends  TL_Model{
    public function updateUserProfile($email, $fname, $mname, $lname, $gender, $groups){
        $this->db->where('id', $this->session->userdata('id'));
        $data = array(
            'email' => $email,
            'fname' => $fname,
            'mname' => $mname,
            'lname' => $lname,
            'gender' => $gender,
            'groups' => $groups
        );

        $update = $this->db->update('staff', $data);
        if($update){
            return true;
        } return false;
    }
    public function addUserImage($id, $profile_img)
    {
        $this->db->where('id', $id);

        $data = array('profile_img' => $profile_img);
        $do_update = $this->db->update('staff', $data);
        if ($do_update) {
            return true;
        } else {
            return false;
        }
    }
    public function changePassword($password, $id){
        $this->db->where('id', $id);

        $data = array(
            'password' => $password,
            'id' => $id,
        );
        $changePassword = $this->db->update('staff', $data);
        if ($changePassword) {
            return true;
        } else {
            return false;
        }
    }
}