<?php defined('BASEPATH') OR die('No direct script access allowed!');

class Store extends TL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        if ($this->session->userdata('LoggedIn')) {
            $this->data['pageTitle'] = 'Store';
            $this->data['productsData'] = $this->store_model->get_all_products();

            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/store/index', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);
        } else {
            redirect('start');
        }
    }

    function products(){
        if ($this->session->userdata('LoggedIn')){
        $this->load->view('administrator/templates/header', $this->data);
        $this->load->view('administrator/store/products', $this->data);
        $this->load->view('administrator/templates/footer', $this->data);
        }else{
            redirect('start');
        }
    }

//    View store for purchase

    function getProducts()
    {
        $products = $this->db->get('products')->result();
        echo json_encode($products);
    }

   function addproduct(){
    $data                              = array();
    $data['product_title']             = $this->input->post('name');
    $data['product_long_description']  = $this->input->post('description');
    $data['product_price']             = $this->input->post('price');
    $data['product_category']          = $this->input->post('product_category');
    $data['gender']                    = $this->input->post('gender');
    $data['size1']                    = $this->input->post('size1');
    $data['size2']                    = $this->input->post('size2');
    $data['size3']                    = $this->input->post('size3');
    $data['quantity1']                = $this->input->post('quantity1');
    $data['quantity2']                = $this->input->post('quantity2');
    $data['quantity3']                = $this->input->post('quantity3');
  
    $this->form_validation->set_rules('name', 'Name', 'trim|required');
    
    $this->form_validation->set_rules('description', 'Product Description', 'trim|required');
    // $this->form_validation->set_rules('product_image', 'Product Image', 'trim|required');
    $this->form_validation->set_rules('price', 'Product Price', 'trim|required');

    $this->form_validation->set_rules('category', 'Product Category', 'trim|required');
 

        if (!empty($_FILES['product_image']['name'])) {
            $config['upload_path']   = './assets/products/';
            $config['encrypt_name']  = true;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('product_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('add/product');
            } else {
                $post_image            = $this->upload->data();
                $data['product_image'] = $post_image['file_name'];
            }
        }
        if ($this->form_validation->run() == true) {

            $result = $this->product_model->save_product_info($data);

            if ($result) {
                $this->session->set_flashdata('message', 'Product Inserted Sucessfully');
                redirect('manage/product');
            } else {
                $this->session->set_flashdata('message', 'Product Inserted Failed');
                redirect('manage/product');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('add/product');
        }

    }

}