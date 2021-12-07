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

//    View store for purchase

    function getProducts()
    {
        $products = $this->db->get('products')->result();
        echo json_encode($products);
    }

    function add_to_cart($student_id)
    {
        $id = $this->input->post('product_id');
        $product_name = $this->input->post('product_name');
        $product_price = $this->input->post('product_price');
        $product_quantity = $this->input->post('quantity');
        $product_image = $this->input->post('product_image');

        $this->db->where('id', $id);
        $this->db->where('student_id', $student_id);
        $cart_get = $this->db->get('products_cart');

        if ($cart_get->num_rows() > 0) {
            $bq = $cart_get->first_row();
            $before_quantity = $bq->product_quantity;
            $update_data = array(
                'product_price' => $product_price,
                'product_quantity' => $product_quantity + $before_quantity,
            );
            $this->db->where('id', $id);
            $this->db->where('student_id', $student_id);
            $this->db->update('products_cart', $update_data);

//            Change Product quantity in products table

            $this->db->where('product_id', $id);
            $pro_get = $this->db->get('products')->first_row();
            $qua = $pro_get->quantity;
            $c_d = array(
                'quantity' => $qua - $product_quantity
            );

            $this->db->where('product_id', $id);
            $this->db->update('products', $c_d);

            echo json_encode(array('message' => 'Cart has been successfully updated.'));
        } else {
            $insert_data = array(
                'id' => $id,
                'student_id' => $student_id,
                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_quantity' => $product_quantity,
                'product_image' => $product_image,
            );
            $this->db->insert('products_cart', $insert_data);

            //            Change Product quantity in products table

            $this->db->where('product_id', $id);
            $pro_get = $this->db->get('products')->first_row();
            $qua = $pro_get->quantity;
            $c_d = array(
                'quantity' => $qua - $product_quantity
            );

            $this->db->where('product_id', $id);
            $this->db->update('products', $c_d);

            echo json_encode(array('message' => 'Product has been added to cart.'));
        }
    }

    function getCartItemsCount($student_id)
    {
        $this->db->where('student_id', $student_id);
        $count = $this->db->get('products_cart')->num_rows();
        echo json_encode($count);
    }

    function getCartItems($student_id)
    {
        $this->db->where('student_id', $student_id);
        $cart = $this->db->get('products_cart')->result();
        echo json_encode($cart);
    }

    function deleteCartItem($item_id)
    {
//      Check for and return cart product quantity to product in products table
        $this->db->where('id', $item_id);
        $this->db->where('student_id', $this->session->userdata('id'));
        $getQ = $this->db->get('products_cart')->first_row();
        $qua = $getQ->product_quantity;

        $this->db->where('product_id', $item_id);
        $getPQ = $this->db->get('products')->first_row();
        $quap = $getPQ->quantity;

        $return_data = array(
            'quantity' => $qua + $quap
        );
        $this->db->where('product_id', $item_id);
        $this->db->update('products', $return_data);

//      Remove product from cart
        $data = array(
            'id' => $item_id,
        );

        $this->db->where('id', $item_id);
        $this->db->where('student_id', $this->session->userdata('id'));
        $this->db->delete('products_cart', $data);

        echo json_encode(array('message' => 'Product has been deleted from your cart.'));
    }

    function increaseCartProductQuantity($item_id)
    {
//      Check if product is available
        $this->db->where('product_id', $item_id);
        $pro_get = $this->db->get('products')->first_row();
        $qua = $pro_get->quantity;
//      If available
        if ($qua > 0) {
//      Increase by 1 in cart
            $this->db->where('id', $item_id);
            $getQuantity = $this->db->get('products_cart')->first_row();
            $quantity = $getQuantity->product_quantity;

            $data = array(
                'id' => $item_id,
                'product_quantity' => $quantity + 1
            );
            $this->db->where('id', $item_id);
            $this->db->update('products_cart', $data);

//      Remove 1 from the products table to reconcile
            $this->db->where('product_id', $item_id);
            $pro_get = $this->db->get('products')->first_row();
            $qua = $pro_get->quantity;
            $c_d = array(
                'quantity' => $qua - 1
            );

            $this->db->where('product_id', $item_id);
            $this->db->update('products', $c_d);

            echo json_encode(array('message' => 'Quantity increased.'));
        }
    }

    function reduceCartProductQuantity($item_id)
    {
//      Check for the item quantity in products cart table
        $this->db->where('id', $item_id);
        $getQuantity = $this->db->get('products_cart')->first_row();
        $quantity = $getQuantity->product_quantity;

        if ($quantity > 0) {
            $data = array(
                'id' => $item_id,
                'product_quantity' => $quantity - 1
            );
            $this->db->where('id', $item_id);
            $this->db->update('products_cart', $data);

//          Replenish the item in products table after reducing from the cart
            $this->db->where('product_id', $item_id);
            $pro_get = $this->db->get('products')->first_row();
            $qua = $pro_get->quantity;
            $c_d = array(
                'quantity' => $qua + 1
            );

            $this->db->where('product_id', $item_id);
            $this->db->update('products', $c_d);


            echo json_encode(array('message' => 'Quantity reduced.'));
        }
    }

}