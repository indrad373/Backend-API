<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//prepare API for third-party app
class Store extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('mobile/m_store');
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
        $id_user = $data['id_user'];
        $store_name = $data['store_name'];
        $address = $data['address'];
        $city = $data['city'];
        $province = $data['province'];
        $country = $data['country'];
        $postal_code = $data['postal_code'];
        $phone = $data['phone'];

        $data = [
            'id_user' => $id_user, 
            'store_name' => $store_name,
            'address' => $address,
            'city' => $city, 
            'province' => $province, 
            'country' => $country,
            'postal_code' => $postal_code,
            'phone' => $phone,
            'date_register' => date('Y-m-d H:i:s')
        ];

        $insert_store = $this->m_store->addStore($data);

        if($insert_store){
            $this->print_response(true,'Success Insert Store');
        }else{
            $this->print_response(false,'Failed Insert Store');
        }

        exit;       
    }

    function update(){
        $data = (array)json_decode(file_get_contents('php://input'));
        $id_store = $data['id_store'];
        $store_name = $data['store_name'];
        $address = $data['address'];
        $city = $data['city'];
        $province = $data['province'];
        $country = $data['country'];
        $postal_code = $data['postal_code'];
        $phone = $data['phone'];
    
        $data = array(
            'store_name' => $store_name,
            'address' => $address,
            'city' => $city,
            'province' => $province,
            'country' => $country,
            'postal_code' => $postal_code,
            'phone' => $phone
        );
        
        $where = array(
            'id_store' => $id_store
        );
        
        $update_store = $this->m_store->updateStore($where,$data);

        if($update_store){
            $this->print_response(true,'Success Update Store Data');
        }else{
            $this->print_response(false,'Failed Update Store Data');
        }

        exit;
    }

    function delete(){
        $data = (array)json_decode(file_get_contents('php://input'));
        $id_store = $data['id_store'];
		$where = array('id_store' => $id_store);

        $delete_store = $this->m_store->deleteStore($where);

        if($delete_store){
            $this->print_response(true,'Success Delete Store Data');
        }else{
            $this->print_response(false,'Failed Delete Store Data');
        }

        exit;
    }

    public function details(){
        $data = (array)json_decode(file_get_contents('php://input'));
        $id_store = $data['id_store'];
        $where = array('id_store' => $id_store);
        $response = $this->m_store->viewStore($where)->result();
        
        foreach($response as $r){
            $store_name=$r->store_name;
            $address=$r->address;
            $city=$r->city;
            $province=$r->province;
            $country=$r->country;
            $postal_code=$r->postal_code;
            $phone=$r->phone;
        }

        $this->print_store_response($store_name,$address,$city,$province,$country,$postal_code,$phone);
        
        exit;  
    }

    public function print_store_response($store_name,$address,$city,$province,$country,$postal_code,$phone){
        $response = array(
            'store_name' => $store_name,
            'address' => $address,
            'city' => $city,
            'province' => $province,
            'country' => $country,
            'postal_code' => $postal_code,
            'phone' => $phone
        );
        $this->print_json($response);
    }

    public function storeAll(){
        $response = $this->m_store->viewAllStore()->result();
        
        foreach($response as $r){
            $id_store=$r->id_store;
            $id_user=$r->id_user;
            $store_name=$r->store_name;
            $address=$r->address;
            $city=$r->city;
            $province=$r->province;
            $country=$r->country;
            $postal_code=$r->postal_code;
            $phone=$r->phone;

            $this->print_store_details($id_store,$id_user,$store_name,$address,$city,$province,$country,$postal_code,$phone);
        }
        
        exit;  
    }

    public function print_store_details($id_store,$id_user,$store_name,$address,$city,$province,$country,$postal_code,$phone){
        $response = array(
            'id_store' => $id_store,
            'id_user' => $id_user,
            'store_name' => $store_name,
            'address' => $address,
            'city' => $city,
            'province' => $province,
            'country' => $country,
            'postal_code' => $postal_code,
            'phone' => $phone
        );
        $this->print_json($response);
    }
}