<?php defined('BASEPATH') OR die('No direct script access allowed');

class SchoolFees extends TL_Controller{
private $myfee;

public function index(){
    if($this->session->userdata('role') == "Student"){
        $this->load->view('student/inc/header');
        $this->load->view('student/school-fees');
        $this->load->view('student/inc/main-footer');
    }else{
        redirect('start');
    }
}

public function pay(){
    if($this->session->userdata('role') == "Student"){

        $this->db->where('id', 1);
        $currentSession= $this->db->get('current_term_session')->row();
        $this->db->where('curr_session', $currentSession->session);
        $this->db->where('fee_year', $this->session->userdata('digit') );
        $this->data['fee'] = $this->db->get('school_fees')->row();

        

        $this->db->where('curr_session', $currentSession->session);
        $this->db->where('student_id', $this->session->userdata('id'));
        $this->data['paid'] = $this->db->get('fees_history')->row();
       

        $this->load->view('student/inc/header');
        $this->load->view('student/pay', $this->data);
        $this->load->view('student/inc/main-footer');
    }else{
        redirect('start');
    }


}

public function confirm(){

    if( $_POST['reference'] !== '' )
    {
        $ref = $_POST['reference'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transaction/verify/{$ref}",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer sk_test_c5bf0023b14b1a1ca0b56678c05534b14a311740",
            "Cache-Control: no-cache",
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
    
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $decoded = json_decode($response);
            
            $this->db->where('email', $decoded->data->customer->email);
            $stud = $this->db->get('students')->row();
            $amount = $decoded->data->amount / 100;
            $fname = $stud->fname." ".$stud->lname;
            $this->db->where('id', 1);
            $currentSession= $this->db->get('current_term_session')->row();
            $this->db->where('curr_session', $currentSession->session);
            $this->db->where('fee_year', $this->session->userdata('digit') );
            $yourfee = $this->db->get('school_fees')->row();
            $total = $yourfee->second_term + $yourfee->first_term + $yourfee->third_term;
            $outstand = $total - $amount;
            $mode = "Online";
            $status = "Verified";
            $status2 = $outstand > 0 ? "Part Payment" : "Full Payment";

           $insert = $this->fees_model->addPayment($stud->id, $fname, $stud->curr_year, $amount, $outstand, $mode, $ref, $status);
           $ins =   $this->fees_model->addHistory($fname, $stud->id,  $currentSession->session, $amount, $status2);
            


          // print_r($decoded);

        }

    }
    else
    {
        return 'Validation Failed';
    }

}



}