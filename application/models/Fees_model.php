<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Fees_model extends TL_Model{



	public function addFee($year, $min, $sess, $fterm, $sterm, $tterm ){

       $data =  array(
        'first_term' => $fterm,
        'second_term' => $sterm,
        'third_term' => $tterm,
        'fee_year' => $year,
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

    public function addPayment($payee, $fname, $curr_year, $amount, $outstand, $mode, $ref, $status){
        $data =  array(
            'payee_id' => $payee,
            'fname' => $fname,
            'curr_year' => $curr_year,
            'amount_paid' => $amount,
            'outstanding' => $outstand,
            'paymentmode' => $mode,
            'ref' => $ref,
            'status' => $status,
           );

           $in = $this->db->insert('fees_payment', $data);

           if($in){
               return true;
           }else{
               return false;
           }
    }

    public function addHistory($fname, $stid, $sess, $amount, $status){
        $data =  array(
            'fname' => $fname,
            'student_id' => $stid,
            'amount_paid' => $amount,
            'curr_session' => $sess,
            'status' => $status,
           );

           $this->db->where('student_id', $stid);
           $this->db->where('curr_session', $sess);
           $check = $this->db->get('fees_history');
           if($check->num_row() > 0){
            $this->db->where('student_id', $stid);
            $this->db->where('curr_session', $sess);
            $update = $this->db->update('fees_history', $data);
                if($update){
                    return true;
                }else{
                    return false;
                }
           }else{
                $in = $this->db->insert('fees_history', $data);

                if($in){
                    return true;
                }else{
                    return false;
                }
           }
          
    
        }

}
