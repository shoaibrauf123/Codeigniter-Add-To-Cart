<?php
    defined("BASEPATH") OR exit ('No Direct script access Allowed');
    class Checkout extends CI_Controller{
        public function __construct(){
            parent::__construct();
        }
        public function index(){
            if($this->cart->total_items() <= 0){
                redirect("/product");
            }
            $customerData = $data = [];
            $submit = $this->input->post("placeOrder");
            if(isset($submit)){
                $this->form_validation->set_rules("name","Name","required");
                $this->form_validation->set_rules("email","Email","required");
                $this->form_validation->set_rules("phone","Phone","required");
                $this->form_validation->set_rules("address","Address","required");
                    $customerData = [
                        "customer_name" => strip_tags($this->input->post("name")),
                        "customer_email" =>strip_tags( $this->input->post("email")),
                        "customer_phone" =>strip_tags( $this->input->post("phone")),
                        "customer_address" =>strip_tags( $this->input->post("address")),
                    ];
                    // echo "<pre>";print_r($customerData);die;
                if($this->form_validation->run() == true){
                    $insert = $this->Product_model->insertCustomer($customerData);
                    if($insert) {
                        $order = $this->placeOrder($insert);
                        if($order){
                            $this->session->set_userdata("success","Order Place Successfully");
                            redirect(base_url()."orderSuccess/".$order);
                        }
                    }
                }
            }
            $data["cartItems"] = $this->cart->contents();
            // echo "<pre>";print_r($data);die;
            $this->load->view("checkout/checkout",$data);
            
        }
        public function placeOrder($cusId){
            $orderData = [
                "customer_id_fk" => $cusId,
                "grand_total" => $this->cart->total(),
            ];
            $insertOrder = $this->Product_model->orderInsert($orderData);

            if($insertOrder){
                $cartItems = $this->cart->contents();
                
                $orderItems = [];
                $i = 0;
                foreach($cartItems as $items){
                    $orderItems[$i]["order_id_fk"] = $insertOrder;
                    $orderItems[$i]["product_id_fk"] = $items['id'];
                    $orderItems[$i]["quantity"] = $items["qty"];
                    $orderItems[$i]["sub_total"] = $items["subtotal"];
                    $i++;
                }
               // echo "<pre>";print_r($orderItems);die;

                if(!empty($orderItems)){
                    $order_items = $this->Product_model->orderItemsInsert($orderItems);
                    if($order_items){
                        $this->cart->destroy();
                        return $insertOrder;
                    }else{
                       return  false;
                    }
                }
            }
        }
        public function orderSuccess($orderid){
            //echo $orderid; die;
            $order_resp = $this->Product_model->getOrderData($orderid);
           // echo "<pre>"; print_r($order_resp);die;
            $this->load->view("checkout/orderSuccess",["order_resp"=>$order_resp]);
        }
    }
?>        