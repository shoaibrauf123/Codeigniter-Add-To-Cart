<?php   
    defined("BASEPATH") OR exit ('No Direct script access Allowed');
    class Product_model extends CI_Model{
        public function getRows($id=''){
            $this->db->select("*");
            $this->db->from("products");
            $this->db->where("status",'1');
            if($id){
                $this->db->where("product_id",$id);
                $query = $this->db->get();
                if($query){
                    return $query->row_array();
                }else{
                    return false;
                }
            }else{
                $this->db->order_by("product_name","asc");
                $query = $this->db->get();
                if($query){
                    return $query->result_array();
                }else{
                    return false;
                }
            }
        }
        public function insertCustomer($data){
           $data =  $this->db->insert("customers",$data);
            return !empty($data) ? $this->db->insert_id() : false ; 
        }
        public function orderInsert($data){
            $data =  $this->db->insert("orders",$data);
            return !empty($data) ? $this->db->insert_id() : false ; 
         }
        public function orderItemsInsert($data){
            $data =  $this->db->insert_batch("order_items",$data);
            return !empty($data) ?true: false;
        }
        public function getOrderData($order_id){
            $this->db->select("*");
            $this->db->from("order_items as or_i");
            $this->db->join("products as pr", "or_i.product_id_fk = pr.product_id");
            $this->db->join("orders as or", "or_i.order_id_fk = or.order_id");
            $this->db->join("customers as cu", "or.customer_id_fk = cu.customers_id");
            $this->db->where("order_id",$order_id);
            $query = $this->db->get();
            if($query){
                return $query->result_array();
            }else{
                return false;
            }
        }
    }

?>