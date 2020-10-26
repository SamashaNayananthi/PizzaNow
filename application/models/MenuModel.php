<?php

class MenuModel extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function getAllPizza(){
		$query = $this->db->get('pizza');
		return $query->result();
	}

	public function getOtherItems($type){
		$query = $this->db->get_where('other_items', array('type' => $type));
		return $query->result();
	}

	public function getDeals(){
		$query = $this->getOtherItems('DEAL');
		return $query->result();
	}

	public function getAllToppings(){
		$query = $this->db->get('toppings');
		return $query->result();
	}
}
?>
