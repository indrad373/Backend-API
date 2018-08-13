<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//prepare API for third-party app
class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('mobile/m_user');
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

    public function test(){
        $this->print_register_response(true,'Just Test !');
        exit;
    }

    public function login(){
        $data = (array)json_decode(file_get_contents('php://input'));
        $email = $data['email'];
        $password = $data['password'];
        $where = array('email' => $email);
        $check_login = $this->m_user->checkLogin($where, $password);

        if($check_login == true){
            $getuserinfo = $this->m_user->getUserInfo($where)->result();
            
            foreach($getuserinfo as $u){
                $id_user=$u->id_user;
            }
            $this->print_login_response($id_user,true,'Logged in !');
        }else{
            $this->print_login_response('',false,'Wrong Username or Password!');
        }

        exit;
    }

    public function print_login_response($id_user,$status,$info){
        $response = array(
            'id_user' => $id_user,
            'Success' => $status,
            'Info' => $info);
        $this->print_json($response);
    }

    public function register(){
        $data = (array)json_decode(file_get_contents('php://input'));
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $email = $data['email'];
        $username = $data['username'];
        $random_salt = hash('sha256', uniqid(openssl_random_pseudo_bytes(16), TRUE));
        $password = $data['password'];
        $password_salt = hash('sha256', $password . $random_salt);
        $role = $data['role'];

        $data = [
            'first_name' => $first_name, 
            'last_name' => $last_name,
            'email' => $email,
            'username' => $username, 
            'password' => $password_salt, 
            'salt' => $random_salt, 
            'role' => $role,
            'date_register' => date('Y-m-d H:i:s')
        ];

        $register_user = $this->m_user->addUser($data);

        if($register_user){
            $this->print_response(true,'Success Register Data');
        }else{
            $this->print_response(false,'Failed Register Data');
        }

        exit;       
    }

    public function details(){
        $data = (array)json_decode(file_get_contents('php://input'));
        $id_user = $data['id_user'];
        $where = array('id_user' => $id_user);
		$response = $this->m_user->getUserInfo($where)->result();
        
        foreach($response as $r){
            $email=$r->email;
            $username=$r->username;
            $first_name=$r->first_name;
            $last_name=$r->last_name;
            $address=$r->address;
            $city=$r->city;
            $province=$r->province;
            $country=$r->country;
            $postcode=$r->postcode;
            $phone=$r->phone;
        }

        $this->print_user_response($email,$username,$first_name,$last_name,$address,$city,$province,$country,$postcode,$phone);
        exit;  
    }

    public function print_user_response($email,$username,$first_name,$last_name,$address,$city,$province,$country,$postcode,$phone){
        $response = array(
            'email' => $email,
            'username' => $username,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'address' => $address,
            'city' => $city,
            'province' => $province,
            'country' => $country,
            'postcode' => $postcode,
            'phone' => $phone
        );
        $this->print_json($response);
    }

    function updateProfile(){
        $data = (array)json_decode(file_get_contents('php://input'));
        $id_user = $data['id_user'];
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $username = $data['username'];
        $email = $data['email'];
        $address = $data['address'];
        $city = $data['city'];
        $province = $data['province'];
        $country = $data['country'];
        $postal_code = $data['postal_code'];
        $phone = $data['phone'];
    
        $data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'username' => $username,
            'email' => $email,
            'address' => $address,
            'city' => $city,
            'province' => $province,
            'country' => $country,
            'postal_code' => $postal_code,
            'phone' => $phone
        );
        
        $where = array(
            'id_user' => $id_user
        );
        
        $update_profile_user = $this->m_user->updateInfoUser($where,$data);

        if($update_profile_user){
            $this->print_response(true,'Success Update User Data');
        }else{
            $this->print_response(false,'Failed Update User Data');
        }

        exit;
    }

    function updatePassword(){
        $data = (array)json_decode(file_get_contents('php://input'));
        $id_user = $data['id_user'];
        $password = $data['password'];
        $random_salt = hash('sha256', uniqid(openssl_random_pseudo_bytes(16), TRUE));
        $password_salt = hash('sha256', $password . $random_salt);

        $data = array(
            'password' => $password_salt,
            'salt' => $random_salt
        );
        
        $where = array(
            'id_user' => $id_user
        );

        $update_password_user = $this->m_user->updatePasswordUser($where,$data);

        if($update_password_user){
            $this->print_response(true,'Success Update User Password');
        }else{
            $this->print_response(false,'Failed Update User Password');
        }

        exit;
    }

    function delete(){
        $data = (array)json_decode(file_get_contents('php://input'));
        $id_user = $data['id_user'];
		$where = array('id_user' => $id_user);

        $delete_user = $this->m_user->deleteUsersData($where);

        if($delete_user){
            $this->print_response(true,'Success Delete User Data');
        }else{
            $this->print_response(false,'Failed Delete User Data');
        }

        exit;
    }
}