<?php
    defined("BASEPATH") OR exit ('No Direct script access Allowed');
    class Cart extends CI_Controller{
        public function __construct(){
            parent::__construct();
        }
        public function index(){
           $data = [];
           $data["cartItems"] = $this->cart->contents();
          // echo "<pre>";print_r($data);die; 
            $this->load->view("cart/cart",$data);
        }
        public function updateItemQty(){
            $update = 0;
            $rowid = $this->input->get("rowid");
            $qty = $this->input->get("qty");

            if(!empty($rowid) && !empty($qty)){
                $data = [
                    "rowid" => $rowid,
                    "qty"  => $qty,
                ];
                $update = $this->cart->update($data);
                echo $update? "ok":"error";
            }
        }
        public function removeItem($rowid){
          $remove = $this->cart->remove($rowid);
          redirect("cart");
        }
    }
?>