<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docs extends CI_Controller {
	public function index(){
		$this->load->view('docs/list-api.php');
	}

	public function userRegister(){
		$this->load->view('docs/user-register.php');
	}

	public function userLogin(){
		$this->load->view('docs/user-login.php');
	}

	public function userDetails(){
		$this->load->view('docs/user-details.php');
	}

	public function userUpdateProfile(){
		$this->load->view('docs/user-update-profile.php');
	}

	public function userUpdatePassword(){
		$this->load->view('docs/user-update-password.php');
	}

	public function userDelete(){
		$this->load->view('docs/user-delete.php');
	}

	public function itemInsert(){
		$this->load->view('docs/item-insert.php');
	}

	public function itemUpdate(){
		$this->load->view('docs/item-update.php');
	}

	public function itemDelete(){
		$this->load->view('docs/item-delete.php');
	}

	public function itemDetails(){
		$this->load->view('docs/item-details.php');
	}

	public function itemViewPopular(){
		$this->load->view('docs/item-view-popular.php');
	}

	public function itemViewPromo(){
		$this->load->view('docs/item-view-promo.php');
	}

	public function storeInsert(){
		$this->load->view('docs/store-insert.php');
	}

	public function storeUpdate(){
		$this->load->view('docs/store-update.php');
	}

	public function storeDelete(){
		$this->load->view('docs/store-delete.php');
	}

	public function storeDetails(){
		$this->load->view('docs/store-details.php');
	}

	public function storeAllItem(){
		$this->load->view('docs/store-all-item.php');
	}

	public function storeAll(){
		$this->load->view('docs/store-all.php');
	}
}
