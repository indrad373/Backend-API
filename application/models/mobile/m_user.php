<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
    
    public function checkLogin($where, $password) {
        $table = 'user';
        $query =$this->db->get_where($table,$where);
        
        foreach($query->result() as $u){
            $email=$u->email;
            $password_db=$u->password;
            $salt=$u->salt;
        }

        $password = hash('sha256', $password . $salt);

        if ($password_db == $password) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserInfo($where) {
        $table = 'user';
        return $query = $this->db->get_where($table,$where);
    }

    public function addUser($data){
        $table = 'user';
        return $this->db->insert($table, $data);
    }

	function deleteUsersData($where){
        $table = 'user';
		$this->db->where($where);
		return $query = $this->db->delete($table);
	}

	function updateInfoUser($where,$data){
        $table = 'user';
		$this->db->where($where);
		return $query = $this->db->update($table,$data);
	}

	function updatePasswordUser($where,$data){
        $table = 'user';
		$this->db->where($where);
		return $query = $this->db->update($table,$data);
	}
}