<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_item extends CI_Model {

    public function addItem($data){
        $table = 'item';
        return $this->db->insert($table, $data);
    }

    function deleteItem($where){
        $table = 'item';
		$this->db->where($where);
		return $query = $this->db->delete($table);
	}

	function updateItem($where,$data){
        $table = 'item';
		$this->db->where($where);
		return $query = $this->db->update($table,$data);
	}


    public function viewItem($where){
        $table = 'item';
        return $query =$this->db->get_where($table,$where);
    }
}