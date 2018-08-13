<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_store extends CI_Model {

    public function addStore($data){
        $table = 'store';
        return $this->db->insert($table, $data);
    }

    function deleteStore($where){
        $table = 'store';
		$this->db->where($where);
		return $query = $this->db->delete($table);
	}

	function updateStore($where,$data){
        $table = 'store';
		$this->db->where($where);
		return $query = $this->db->update($table,$data);
	}


    public function viewStore($where){
        $table = 'store';
        return $query =$this->db->get_where($table,$where);
    }

    public function viewAllStore(){
        $table = 'store';
        $this->db->order_by('date_register','ASC');
        return $query = $this->db->get($table);
    }
}