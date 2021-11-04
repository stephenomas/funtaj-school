<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends TL_Model{
    public function addCategory($category, $sku){
        $data = array(
            'categories' => $category,
            'sku' => $sku,
        );
        $this->db->insert('products_categories', $data);

        return true;
    }
    public function addProduct($title, $category, $size, $section, $colour, $sku, $price, $quantity){
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
        $this->db->insert('products', $data);

        return true;
    }
}