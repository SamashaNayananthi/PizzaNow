<?php

class MenuModel extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function getAllPizza(){
		$query = $this->db->get('pizza');
		return $query->result();
	}

	public function getMenu(){
		return array('pizzaList' => $this->getAllPizza());
	}
}
?>
