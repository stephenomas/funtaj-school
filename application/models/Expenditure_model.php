<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Expenditure_model extends CI_Model {

    function add($purpose, $amount_paid, $description, $user, $receiver, $curr_term, $curr_session){
        $data = [
            'purpose' => $purpose,
            'amount_paid' => $amount_paid,
            'description' => $description,
            'receiver' => $receiver,
            'user_id' => $user,
            'curr_term' => $curr_term,
            'curr_session' => $curr_session
        ];

        $insert = $this->db->insert('expenditure', $data);

        if($insert){
            return true;
        }else{
            return false;
        }
    }

}