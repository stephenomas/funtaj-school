<?php defined('BASEPATH') OR exit('No direct script access allowed');

class House_model extends TL_Model{

    public function __construct(){
        $this->load->database();
    }

	public function getHouse(){
        $schoolget = $this->db->get('houses');
        return $schoolget->result();
    }

}
