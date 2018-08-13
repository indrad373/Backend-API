<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//prepare API for third-party app
class Item extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('mobile/m_item');
    }

     /**
        Administrative Method
    **/

    public function print_json($response){
        $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT))
        ->_display();
    }

    public function print_response($status,$info){
        $response = array(
            'Success' => $status,
            'Info' => $info);
        $this->print_json($response);
    }

    /**
        Router Method
    **/

    public function insert(){
        $data = (array)json_decode(file_get_contents('php://input'));
        $id_store = $data['id_store'];
        $item_name = $data['item_name'];
        $description = $data['description'];
        $price = $data['price'];
        $stock = $data['stock'];
        $sold = $data['sold'];
        $discount = $data['discount'];

        $data = [
            'id_store' => $id_store, 
            'item_name' => $item_name,
            'description' => $description, 
            'price' => $price, 
            'stock' => $stock, 
            'sold' => $sold,
            'discount' => $discount,
            'date_insert' => date('Y-m-d H:i:s')
        ];

        $insert_item = $this->m_item->addItem($data);

        if($insert_item){
            $this->print_response(true,'Success Insert Item');
        }else{
            $this->print_response(false,'Failed Insert Item');
        }

        exit;       
    }

    function update(){
        $data = (array)json_decode(file_get_contents('php://input'));
        $id_item = $data['id_item'];
        $item_name = $data['item_name'];
        $description = $data['description'];
        $price = $data['price'];
        $stock = $data['stock'];
        $discount = $data['discount'];
    
        $data = array(
            'item_name' => $item_name,
            'description' => $description,
            'price' => $price,
            'stock' => $stock,
            'discount' => $discount
        );
        
        $where = array(
            'id_item' => $id_item
        );
        
        $update_item = $this->m_item->updateItem($where,$data);

        if($update_item){
            $this->print_response(true,'Success Update Item Data');
        }else{
            $this->print_response(false,'Failed Update Item Data');
        }

        exit;
    }

    function delete(){
        $data = (array)json_decode(file_get_contents('php://input'));
        $id_item = $data['id_item'];
		$where = array('id_item' => $id_item);

        $delete_item = $this->m_item->deleteItem($where);

        if($delete_item){
            $this->print_response(true,'Success Delete Item Data');
        }else{
            $this->print_response(false,'Failed Delete Item Data');
        }

        exit;
    }

    public function details(){
        $data = (array)json_decode(file_get_contents('php://input'));
        $id_item = $data['id_item'];
        $where = array('id_item' => $id_item);
        $response = $this->m_item->viewItem($where)->result();
        
        foreach($response as $r){
            $item_name=$r->item_name;
            $description=$r->description;
            $price=$r->price;
            $stock=$r->stock;
        }

        $this->print_item_response($item_name,$description,$price,$stock);
        
        exit;  
    }

    public function viewPopular(){
        $where = array('sold >' => '0');
        $response = $this->m_item->viewItem($where)->result();
        
        foreach($response as $r){
            $item_name=$r->item_name;
            $description=$r->description;
            $price=$r->price;
            $stock=$r->stock;

            $this->print_item_response($item_name,$description,$price,$stock);
        }
        
        exit;  
    }

    public function viewPromo(){
        $where = array('discount >' => '0');
        $response = $this->m_item->viewItem($where)->result();
        
        foreach($response as $r){
            $item_name=$r->item_name;
            $description=$r->description;
            $price=$r->price;
            $stock=$r->stock;

            $this->print_item_response($item_name,$description,$price,$stock);
        }
        
        exit;  
    }

    public function storeItem(){
        $data = (array)json_decode(file_get_contents('php://input'));
        $id_store = $data['id_store'];
        $where = array('id_store' => $id_store);
        $response = $this->m_item->viewItem($where)->result();
        
        foreach($response as $r){
            $item_name=$r->item_name;
            $description=$r->description;
            $price=$r->price;
            $stock=$r->stock;

            $this->print_item_response($item_name,$description,$price,$stock);
        }
        
        exit;  
    }

    public function print_item_response($item_name,$description,$price,$stock){
        $response = array(
            'item_name' => $item_name,
            'description' => $description,
            'price' => $price,
            'stock' => $stock
        );
        $this->print_json($response);
    }

}