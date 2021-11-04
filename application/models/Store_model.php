<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Store_model extends TL_Model{
    public function get_all_products(){
        $result = $this->db->get('products');
        return $result;
    }
}