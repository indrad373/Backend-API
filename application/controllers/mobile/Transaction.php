<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//prepare API for third-party app
class Transaction extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('mobile/m_transaction');
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
        $total_transaction = $data['total_transaction'];
        $status = $data['status'];

        $details = json_decode(json_encode($data['details']), true);

        $data_transaction = [
            'id_user' => $id_user, 
            'total_transaction' => $total_transaction,
            'status' => $status, 
            'date_transaction' => date('Y-m-d H:i:s')
        ];

        $insert_transaction = $this->m_transaction->addTransaction($data_transaction);

        if($insert_transaction != null){
            $id_transaction = $insert_transaction;

            foreach ($details as $row){ 
                $id_product = $row['id_product'];
                $price = $row['price'];
                $quantity = $row['quantity'];
                $total = $row['total'];

                $data_detail_transaction = [
                    'id_transaction' => $id_transaction, 
                    'id_product' => $id_product,
                    'price' => $price,
                    'quantity' => $quantity, 
                    'total' => $total
                ];

                $this->m_transaction->addTransactionDetails($data_detail_transaction);
            }

            $this->print_response(true,'Success Insert Transaction');
        }else{
            $this->print_response(false,'Failed Insert Transaction');
        }

    }

    public function statusUpdate(){
        $data = (array)json_decode(file_get_contents('php://input'));
        $id_transaction = $data['id_transaction'];
        $status = $data['status'];
    
        $data = array(
            'status' => $status
        );
        
        $where = array(
            'id_transaction' => $id_transaction
        );
        
        $update_status_transaction = $this->m_transaction->updateTransactionStatus($where,$data);

        if($update_status_transaction){
            $this->print_response(true,'Success Update Status Transaction');
        }else{
            $this->print_response(false,'Success Update Status Transaction');
        }

        exit;
    }
}