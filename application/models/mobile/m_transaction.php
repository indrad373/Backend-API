<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaction extends CI_Model {
    
    public function addTransaction($data){
        $table = 'transaction';
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function selectTransaction($data){
        $table = 'transaction';
        return $this->db->insert($table, $data);
    }

    public function addTransactionDetails($data){
        $table = 'transaction_detail';
        $this->db->insert($table, $data);
    }

    public function updateTransactionStatus($where,$data){
        $table = 'transaction';
		$this->db->where($where);
		return $query = $this->db->update($table,$data);
    }
}