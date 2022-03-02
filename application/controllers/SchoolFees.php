<?php defined('BASEPATH') OR die('No direct script access allowed');

use Paystack;

class SchoolFees extends TL_Controller{
private $myfee;

public function index(){
    if($this->session->userdata('role') == "Student"){

        $this->db->where('student_id', $this->session->userdata('id'));
        $this->data['fees'] = $this->db->get('fees_history')->result();

      

        $this->load->view('student/inc/header');
        $this->load->view('student/school-fees', $this->data);
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

           $insert = $this->fees_model->addPayment($stud->id, $fname, $stud->curr_year, $currentSession->session, $amount, $outstand, $mode, $ref, $status);
           $ins =   $this->fees_model->addHistory($fname, $stud->id,  $currentSession->session, $stud->curr_year, $amount, $status2, $total);
            
            if($insert && $ins){
                return json_encode("Payment successful");
            }else{
                return json_encode("Payment failed");
            }

          // print_r($decoded);

        }

    }
    else
    {
        return 'Validation Failed';
    }

}

public function addFees(){

    $config['upload_path']          = './assets/receipts/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
    $config['encrypt_name']             = true;
    $config['max_size']             = 2048;
    $config['max_width']            = 5000;
    $config['max_height']           = 5000;

    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if (! $this->upload->do_upload('image')) {
        $error = array('error' => $this->upload->display_errors());

        $this->session->set_flashdata('picerr', $this->upload->display_errors());
        $file = "empty";
        redirect($_SERVER['HTTP_REFERER']);
    } else {
        $data = array('upload_data' => $this->upload->data());
        $image = $this->upload->data();
        $file = 'assets/receipts/'.$image['file_name'];
        $amount =  $this->input->post('amount');
        $status = "Pending Approval";
        $payee = $this->session->userdata('id');
        $this->db->where('id', $this->session->userdata('id'));
        $stud = $this->db->get('students')->row();
        $fname = $stud->fname." ".$stud->lname;
        $curr_year = $stud->curr_year;
        $this->db->where('id', 1);
        $currentSession= $this->db->get('current_term_session')->row();
        $sess = $currentSession->session;
        $outstand = 0;
        $mode = "Bank Transfer";
        

        

       $deposit = $this->fees_model->bankdeposit($payee, $fname, $curr_year, $sess, $amount, $outstand, $mode, $file, $status);

       if($deposit){
        $this->session->set_flashdata('success', 'School Fees Receipt Uploaded');
       
        redirect($_SERVER['HTTP_REFERER']);
       }else{
        $this->session->set_flashdata('error', 'Failed to Upload');
       
        redirect($_SERVER['HTTP_REFERER']);
       }

        
    }
    

}



}