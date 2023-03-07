<?php
    defined("BASEPATH") OR exit ('No Direct script access Allowed');

    class Product extends CI_Controller{
       public function __construct(){
            parent::__construct();        
            $this->load->library("cart");
       }
        public function index(){
           
            $data = [];
            $data["product"] = $this->Product_model->getRows();
            $this->load->view("product/product",$data);
            
        }
        public function addToCart($proid){
            
           $product =  $this->Product_model->getRows($proid);
        //    echo "<pre>";print_r($product);die;

           $data = [
            "id" => $product["product_id"],
            "qty" => 1,
            "price" => $product["product_price"],
            "name" => $product["product_name"],
            "image" => $product["product_image"],
           ];
           $this->cart->insert($data);
           redirect("cart/");
        }
    }

?>