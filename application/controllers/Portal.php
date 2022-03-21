<?php defined('BASEPATH') OR die('No direct script access allowed!');



class Portal extends TL_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        if ($this->session->userdata('LoggedIn')) {
        
        }else{
            redirect('start');
        } 
    }

function index(){
    if($this->session->userdata('role') == "Student"){
      
        $this->db->where('id', 1);
        $currentSession= $this->db->get('current_term_session')->row();
     
        $this->db->where('curr_session', $currentSession->session);
        $this->db->where('fee_year', $this->session->userdata('digit') );
        $this->data['fee'] = $this->db->get('school_fees')->row();

        

        $this->load->view('student/inc/header', $this->data);
        $this->load->view('student/index', $this->data);
        $this->load->view('student/inc/main-footer', $this->data);

        


    }else{
        redirect("start");
    }
}
public function logout(){
    $user_data = array(
        'LoggedIn' => FALSE,
        'Elevated' => FALSE,
        'StoreElevated' => FALSE,
        'Role' => null,
    );

    $this->session->set_userdata($user_data);
    $this->session->unset_userdata($user_data);

    $this->session->set_flashdata('success', 'You have successfully logged out.');

    redirect('welcome');
}

public function store(){ 
    if($this->session->userdata('role') == "Student"){   
        $this->data['products'] = $this->db->get('products')->result();

        $this->load->view('student/inc/header', $this->data);
        $this->load->view('student/store', $this->data);
        $this->load->view('student/inc/main-footer', $this->data);
    }else{
        redirect("start");
        }
    
    }
  
    public function single($id)
    {
        if($this->session->userdata('role') == "Student"){
            $data                       = array();
            $data['product'] = $this->store_model->get_single_product($id);
            $this->db->where('product_id', $id);
            $data['sizes'] = $this->db->get('products_sizes')->result();
        // $data['get_all_category']   = $this->web_model->get_all_category();
            $this->load->view('student/inc/header');
            $this->load->view('student/product-detail', $data);
            $this->load->view('student/inc/main-footer');
        }else{
            redirect("start");
            }
        
    }

    public function save_cart()
    {
        $data       = array();
        $product_id = $this->input->post('product_id');
        $results    = $this->store_model->get_single_product($product_id);

        $data['id']      = $this->input->post('size');
        $data['name']    = $results->product_name;
        $data['price']   = $results->product_price;
        $data['qty']     = $this->input->post('qty');
        $data['options'] = array('product_image' => $results->product_image);
      //  $data['options'] = array('product_image' => $results->product_image);
        $this->db->where('id', $this->input->post('size'));
        $size = $this->db->get('products_sizes')->row();
        //var_dump($size);

        if($size->size_quantity >= $data['qty']){
            $this->cart->insert($data);
            $this->session->set_flashdata('success', 'Product added to cart successfully');
            redirect($_SERVER['HTTP_REFERER']);     
        }else{
            $this->session->set_flashdata('error', 'There are only '.$size->size_quantity.' left');
            redirect($_SERVER['HTTP_REFERER']);
        };
       
        
    }

    public function cart()
    {
        if($this->session->userdata('role') == "Student"){
            $data                  = array();
            $data['cart_contents'] = $this->cart->contents();
            $this->load->view('student/inc/header');
            $this->load->view('student/cart', $data);
            $this->load->view('student/inc/main-footer');
        }else{
            redirect("start");
            }
        
       
    }

    public function remove_cart()
    {
        
        $data = $this->input->post('rowid');
        $this->cart->remove($data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function update_cart()
    {
        $data          = array();
        $data['qty']   = $this->input->post('qty');
        $data['rowid'] = $this->input->post('rowid');

        $this->cart->update($data);
        redirect($_SERVER['HTTP_REFERER']);
    
    }

    public function checkout(){
        if($this->session->userdata('role') == "Student"){
            if($this->cart->total_items()){

        
                $data  = array();
                $data['cart_contents'] = $this->cart->contents();
                $this->load->view('student/inc/header');
                $this->load->view('student/checkout', $data);
                $this->load->view('student/inc/main-footer');
            }else{
                redirect('cart');
            }
        }else{
            redirect("start");
            }        
}

    public function confirm_checkout(){

      
       $this->load->library('paystack');
        $ref = $_POST['reference'];
        //$ref = $this->input->post('reference');
        $response = $this->paystack->verify($ref);

      
        $decoded = json_decode($response);
        

         $save = $this->store_model->add_order($decoded);

        if($save){
            return true;
        }
    }

    public function orders(){

        if($this->session->userdata('role') == "Student"){
        $this->db->where('user_id', $this->session->userdata('email'));
        $this->data['orders'] = $this->db->get('orders');

            $this->load->view('student/inc/header');
            $this->load->view('student/orders', $this->data);
            $this->load->view('student/inc/main-footer');
        }else{
            redirect("start");
        }     
    }

    public function results(){
     //   if($this->session->userdata('role') == "Student"){
        $this->load->view('student/inc/header');
        $this->load->view('student/results', $this->data);
        $this->load->view('student/inc/main-footer');
    }

    public function midterm_result(){
        $term = $this->input->get('term');
        $user = $this->session->userdata('id');
        if(isset($term)){
            $this->db->where('student_id', $user);
            $this->db->where('term', $term);
            $this->db->order_by('class_details', 'DESC');
            $this->data['year'] = $this->db->get('midterm');

            if(empty($this->data['year']->result())){
                redirect($_SERVER['HTTP_REFERER']);
            }
            
            $this->load->view('student/inc/header');
            $this->load->view('student/midterm', $this->data);
            $this->load->view('student/inc/main-footer');
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
        
    }
    
    public function midterm_report(){
        $user = $this->session->userdata('id');
        $term = $this->input->get('term');
        $year = $this->input->get('year');
        $session = $this->input->get('session');
        $this->db->where('id', $user);
        $this->data['detail'] = $this->db->get('students')->row();
        if(isset($term) && isset($year) && isset($session)){
            $this->db->where('student_id', $user);
            $this->db->where('term', $term);
            $this->db->where('class_details', $year);
            $this->db->where('session', $session);
            $this->data['results'] = $this->db->get('midterm');

            

            if(empty($this->data['results']->result())){
                redirect($_SERVER['HTTP_REFERER']);
            }

        $this->load->view('student/inc/header');
        $this->load->view('student/midterm-report', $this->data);
        $this->load->view('student/inc/main-footer');
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function endofterm_result(){
        $user = $this->session->userdata('id');
        $term = $this->input->get('term');

        if(isset($term)){
            
            $this->db->where('student_id', $user);
            $this->db->order_by('session', 'DESC');
            $this->data['year'] = $this->db->get('exam');

            if(empty($this->data['year']->result())){
                redirect($_SERVER['HTTP_REFERER']);
            }
            
            $this->load->view('student/inc/header');
            $this->load->view('student/endofterm', $this->data);
            $this->load->view('student/inc/main-footer');
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
        
    }

    public function endofterm_report(){
        $user = $this->session->userdata('id');
        $term = $this->input->get('term');
        $year = $this->input->get('year');
        $session = $this->input->get('session');
        $this->db->where('id', $user);
        $this->data['detail'] = $this->db->get('students')->row();
        if(isset($term) && isset($year) && isset($session)){
            $this->db->where('student_id', $user);
            $this->db->where('term', $term);
            $this->db->where('class_details', $year);
            $this->db->where('session', $session);
            $this->data['results'] = $this->db->get('exam');

            $this->db->where('term', $term);  
            $this->db->where('class_details', $year);
            $this->db->where('student_id', $user);
            $this->db->where('session', $session);
            $this->db->select_avg('gp');
            $this->data['gpa'] = $this->db->get('exam')->row();

            $this->db->where('term', $term);  
            $this->db->where('class_details', $year);
            $this->db->where('student_id', $user);
            $this->db->where('session', $session);
            $this->db->select_avg('average');
            $this->data['average'] = $this->db->get('exam')->row();
            
            $this->db->where('term', $term);  
            $this->db->where('class_details', $year);
            $this->db->where('session', $session);
            $this->db->select_avg('average');
            $this->data['classaverage'] = $this->db->get('exam')->row();
            

            if(empty($this->data['results']->result())){
                redirect($_SERVER['HTTP_REFERER']);
            }

        $this->load->view('student/inc/header');
        $this->load->view('student/endofterm-report', $this->data);
        $this->load->view('student/inc/main-footer');
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function endofyear(){
        $user = $this->session->userdata('id');
    
            
            $this->db->where('student_id', $user);
            $this->data['year'] = $this->db->get('endofyear');

            if(empty($this->data['year']->result())){
                redirect($_SERVER['HTTP_REFERER']);
            }
            
            $this->load->view('student/inc/header');
            $this->load->view('student/endofyear', $this->data);
            $this->load->view('student/inc/main-footer');
        
    }

    public function endofyear_report(){
        $user = $this->session->userdata('id');
        $session = $this->input->get('session');

        
        $this->db->where('student_id', $user);
        $this->db->where('session', $session);
        $this->data['results'] = $this->db->get('endofyear');
        
        if(empty($this->data['results']->result())){
            redirect($_SERVER['HTTP_REFERER']);
        }
        $this->db->where('id', $user);
        $this->data['detail'] = $this->db->get('students')->row();
        
        $this->db->where('student_id', $user);
        $this->db->where('session', $session);
        $this->db->select_avg('gp');
        $this->data['average'] = $this->db->get('endofyear')->row();
        
        
        $this->db->where('session', $session);
        $this->data['classaverage'] = $this->db->get('endofyear');
        

    $this->load->view('student/inc/header');
    $this->load->view('student/endofyear-report', $this->data);
    $this->load->view('student/inc/main-footer');

    }
    
}  