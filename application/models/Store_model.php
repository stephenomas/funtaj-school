<?php defined('BASEPATH') OR exit('No direct script access allowed');

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
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->join('products_categories', 'products_categories.id=tbl_product.product_category');
        $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');
        $this->db->where('tbl_product.product_id', $id);
        $info = $this->db->get();
        return $info->row();
    }

}