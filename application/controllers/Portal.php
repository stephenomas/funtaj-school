<?php defined('BASEPATH') OR die('No direct script access allowed!');



class Portal extends TL_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
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
        'Role' => '',
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
   
}