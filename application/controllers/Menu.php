<?php

class Menu extends CI_Controller {

	public function index(){
		$this->load->model('MenuModel');
		$pizza = array('pizzaList' => $this ->MenuModel->getAllPizza());
		$this->load->view('menu', $pizza);
	}

	public function appetizers(){
		$this->load->model('MenuModel');
		$appetizers =  array('appetizersList' => $this ->MenuModel->getOtherItems('APPETIZER'),
			'drinksList' => $this ->MenuModel->getOtherItems('DRINK'));
		$this->load->view('appetizers', $appetizers);
	}

	public function deals(){
		$this->load->model('MenuModel');
		$deals = array('dealsList' => $this->MenuModel->getOtherItems('DEAL'));
		$this->load->view('deals', $deals);
	}

	public function customize(){
		$this->load->model('MenuModel');
		$details = array('toppingsList' => $this ->MenuModel->getAllToppings());
		$this->load->view('customize',  $details);
	}

}

?>
