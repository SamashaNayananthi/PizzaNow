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

	public function customizePizza(){
		$id = $this->uri->segment(3);
		$this->load->model('MenuModel');
		$details = $this->MenuModel->getPizzaById($id);
		$details = array('details' => $details, 'toppingsList' => $this ->MenuModel->getAllToppings());
		$this->load->view('customize_pizza',  $details);
	}

}

?>
