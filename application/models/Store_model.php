<?php defined('BASEPATH') OR exit('No direct script access allowed');
<<<<<<< HEAD

=======
require 'vendor/autoload.php';
>>>>>>> c8701c2 (fresh)
class Store_model extends TL_Model{
    public function get_all_products(){
        $result = $this->db->get('products')->result();
        return $result;
    }

    public function saveproduct(array $data){
        $save = [
            'product_name' =>        $data['product_title'],
            'product_price' =>       $data['product_price'],
            'product_image' =>       $data['product_image'],
            'product_category'=>     $data['product_category'],
            'description' =>         $data['product_long_description'],
            'gender' =>              $data['gender']
        ];

        $product = $this->db->insert('products', $save);
        $product_id =  $this->db->insert_id();


         $addsize = $this->addsize($product_id, $data);

         if($product){
             return true;
         }else{
             return false;
         }
        
    }

    public function addsize($id, array $data){
        $sizes1 = [
            'product_id' => $id,
            'product_size' => $data['size1'],
            'size_quantity' => $data['quantity1']
        ];
        
        $sizes2 = [
            'product_id' => $id,
            'product_size' => $data['size2'],
            'size_quantity' => $data['quantity2']
        ];

        $sizes3 = [
            'product_id' => $id,
            'product_size' => $data['size3'],
            'size_quantity' => $data['quantity3']
        ];

        $this->db->insert('products_sizes', $sizes1);
        $this->db->insert('products_sizes', $sizes2);
        $this->db->insert('products_sizes', $sizes3);



    }

    public function get_single_product($id)
<<<<<<< HEAD
    {
=======
    {   

>>>>>>> c8701c2 (fresh)
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('products_categories', 'products_categories.id=products.product_category');
        $this->db->join('products_sizes', 'products_sizes.product_id=products.id');
        $this->db->where('products.id', $id);
        $info = $this->db->get();
        return $info->row();
    }

<<<<<<< HEAD
=======
    public function add_order($response){
        $data = [
            'purpose' => 'shop',
            'ref' => $response->data->id,
            'amount'=> $response->data->amount / 100
        ];

        $this->db->insert('online_transactions', $data);
        $transaction_id =  $this->db->insert_id();

        $order = [
            'user_id' => $this->session->userdata('email'),
            'price'=> $response->data->amount / 100,
            'date' => Carbon\Carbon::now(),
            'status' => 'pending',
            'trans_id' => $transaction_id
        ];

        $this->db->insert('orders', $order);
        $orderid = $this->db->insert_id();

        $item = $this->cart->contents();

        foreach ($item as $cart){
            $this->db->where('id', $cart['id']);
            $size = $this->db->get('products_sizes')->row();
            $data = [
                'item_id' => $size->product_id,
                'price' => $cart['qty'] * $cart['price'],
                'quantity' => $cart['qty'],
                'size' => $size->product_size,
                'order_id' => $orderid

            ];

          
            $quantity = $size->size_quantity - $cart['qty'];

            $this->db->set('size_quantity', $quantity);
            $this->db->where('id', $size->id);
            $this->db->update('products_sizes');
            

            $this->db->insert('orderitems', $data);
        }

        $this->cart->destroy();
        
        return true;

    }
    

    public function getOrders(){
    $items = $this->db->get('orders')->result();

    return $items;
    }

>>>>>>> c8701c2 (fresh)
}