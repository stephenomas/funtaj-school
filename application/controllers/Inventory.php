<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends TL_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function index(){
        if ($this->session->userdata('StoreElevated')){
            $this->data['pageTitle'] = 'Manage Inventory';

            $this->load->view('templates/header', $this->data);
            $this->load->view('inventory/index', $this->data);
            $this->load->view('templates/footer', $this->data);
        }
        else{
            redirect('welcome');
        }
    }

    function getCategories(){
        $this->db->order_by('categories', 'asc');
        $query = $this->db->get('products_categories');
        echo json_encode($query->result());
    }

    function createCategory(){
        if($this->session->userdata('StoreElevated')){
            $this->form_validation->set_rules('category', 'Category', 'required');

//            if ($this->form_validation->run()) {
                $category = $_POST['category'];
                $sku = $_POST['sku'];

                $this->db->where('categories', $category);
                $this->db->where('sku', $sku);
                $check = $this->db->get('products_categories');

                if($check->num_rows() > 0){
                    $data = array(
                        'error' => 'true',
                        'errorsku' => 'false',
                        'categories' => $category,
                        'sku' => strtoupper($sku),
                    );

                    echo json_encode($data);
                }elseif($check->num_rows() < 1){
                    $this->db->where('sku', $sku);
                    $checkAgain = $this->db->get('products_categories');

                    if($checkAgain->num_rows() > 0){
                        $data = array(
                            'error' => 'true',
                            'errorsku' => 'true',
                            'categories' => $category,
                            'sku' => strtoupper($sku),
                        );

                        echo json_encode($data);
                    }else{
                        $this->inventory_model->addCategory($category, strtoupper($sku));

                        $data = array(
                            'error' => 'false',
                            'errorsku' => 'false',
                            'categories' => $category,
                            'sku' => strtoupper($sku),
                        );

                        echo json_encode($data);
                    }
                }
//            }
        }
    }
    function deleteCategory($id){
        if($this->session->userdata('StoreElevated')) {
            $this->db->where('id', $id);
            $delete = $this->db->delete('products_categories');
            if($delete){
                $data = array(
                    'done' => 'true'
                );
            }else{
                $data = array(
                    'done' => 'false'
                );
            }
            echo json_encode($data);
        }
    }
    function createProduct(){
        if($this->session->userdata('StoreElevated')){
        $this->form_validation->set_rules('title', 'Title', 'required');

        $category = $_POST['category'];
        $sku = $_POST['sku'];
        $title = $_POST['productName'];
        $size = $_POST['size'];
        $section = $_POST['section'];
        $colour = $_POST['colour'];
        $price = $_POST['price'];
//        $image = $_POST['image'];
//        $barcode = $_POST['barcode'];
        $quantity = $_POST['quantity'];

        $this->inventory_model->addProduct($title, $category, $size, $section, $colour, $sku, $price, $quantity);

        $data = array(
            'product_name' => $title,
            'product_category' => $category,
            'size' => $size,
            'section' => $section,
            'colour' => $colour,
            'sku' => $sku,
            'product_price' => $price,
//            'product_image' => $image,
//            'barcode' => $barcode,
            'quantity' => $quantity,
        );

        echo json_encode($data);

        }
    }
    function getProducts(){
        $this->db->order_by('product_name', 'asc');
        $query = $this->db->get('products');
        echo json_encode($query->result());
    }

    function deleteProduct($id){
        if($this->session->userdata('StoreElevated')) {
            $this->db->where('product_id', $id);
            $delete = $this->db->delete('products');
            if($delete){
                $data = array(
                    'done' => 'true'
                );
            }else{
                $data = array(
                    'done' => 'false'
                );
            }
            echo json_encode($data);
        }
    }
}