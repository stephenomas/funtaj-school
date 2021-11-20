<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Fees_model extends TL_Model{



	public function addFee($year, $min, $sess, $fterm, $sterm, $tterm ){

       $data =  array(
        'first_term' => $fterm,
        'second_term' => $sterm,
        'third_term' => $tterm,
        'curr_year' => $year,
        'minimum' => $min,
        'curr_session' => $sess,
       );

       $in = $this->db->insert('school_fees', $data);

       if($in){
           return true;
       }else{
           return false;
       }

    }

}
