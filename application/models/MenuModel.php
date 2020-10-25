<?php

class MenuModel extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function getAllPizza(){
		$query = $this->db->get('pizza');
		return array('pizzaList' => $query->result());
	}

	public function getOtherItems($type){
		$query = $this->db->get_where('other_items', array('type' => $type));
		return $query->result();
	}

	public function getAppetizersAndDrinks(){
		return array('appetizersList' => $this->getOtherItems('APPETIZER'),
			'drinksList' => $this->getOtherItems('DRINK'));
	}

	public function getDeals(){
		return array('dealsList' => $this->getOtherItems('DEAL'));
	}
}
?>
