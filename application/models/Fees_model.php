<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Fees_model extends TL_Model{

    private $status;

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

    public function addPayment($payee, $fname, $curr_year, $sess, $amount, $outstand, $mode, $ref, $status){
        $data =  array(
            'payee_id' => $payee,
            'fname' => $fname,
            'curr_year' => $curr_year,
            'curr_session' => $sess,
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

    public function addHistory($fname, $stid, $sess, $year, $amount, $status, $total){

        $data =  array(
            'fname' => $fname,
            'student_id' => $stid,
            'amount_paid' => $amount,
            'curr_session' => $sess,
            'curr_year' => $year,
            'status' => $status,
           );

           if($amount >= $total){
            $d = [
                'has_paid_school_fees' => 1
            ];

            $this->db->where('id', $stid);
            $student =  $this->db->update('students', $d);

            
            }

           $this->db->where('student_id', $stid);
           $this->db->where('curr_session', $sess);
           $check = $this->db->get('fees_history');
           if($check->num_rows() > 0){

            $new = $check->row()->amount_paid + $amount;
            if($new >= $total){
                $d = [
                    'has_paid_school_fees' => 1
                ];

                $this->status = "Full Payment";
                $this->db->where('id', $stid);
                $student =  $this->db->update('students', $d);

                
            }
            $data =  array(
                'fname' => $fname,
                'student_id' => $stid,
                'amount_paid' => $new,
                'curr_session' => $sess,
                'status' => $this->status,
               );
               
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

        public function editFee($id, $status){
               $data = [
                    'status' => $status
               ];

               $this->db->where('id', $id);
               $update = $this->db->update('fees_history', $data);

               if($update){
                   return true;
               }else{
                   return false;
               }
        }

        public function approval($id, $status, $amount, $uid, $sess, $schoolfees, $fname, $year){
                $data = [
                    'status' => $status
                ];

                if($status == "Verified"){
                    $this->db->where('student_id', $uid);
                    $this->db->where('curr_session', $sess);
                    $fee = $this->db->get('fees_history')->row();
                    if($fee != null){
                        $new = $fee->amount_paid + $amount;
                        if($new >= $schoolfees){
                            $check = "Full Payment";

                        }else{
                            $check = "Part Payment";
                        }

                        $dat = [
                            "amount_paid" => $new,
                            "status" => $check
                        ];
                        $this->db->where('student_id', $uid);
                        $this->db->where('curr_session', $sess);
                        $update = $this->db->update('fees_history', $dat);

                        
                        
                    }else{
                        if($amount >= $schoolfees){
                            $status = "Full Payment";
                        }else{
                            $status = "Part Payment";
                        }
                        $insert = $this->addHistory($fname, $uid, $sess, $year, $amount, $status, $schoolfees);

                       
                        }
                }

                $this->db->where('id', $id);
                $pay = $this->db->update('fees_payment', $data);
                if($pay){
                    return true;
                }else{
                    return false;
                }
        }

        public function bankdeposit($payee, $fname, $curr_year, $sess, $amount, $outstand, $mode, $image, $status){
            $data =  array(
                'payee_id' => $payee,
                'fname' => $fname,
                'curr_year' => $curr_year,
                'curr_session' => $sess,
                'amount_paid' => $amount,
                'outstanding' => $outstand,
                'paymentmode' => $mode,
                'image' => $image,
                'status' => $status,
               );

               $ins = $this->db->insert('fees_payment', $data);
               if($ins){
                   return true;
               }else{
                   return false;
               }
        }

}
