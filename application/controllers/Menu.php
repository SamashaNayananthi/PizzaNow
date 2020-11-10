<?php

class Menu extends CI_Controller {

	public function index() {

		//Get pizza list and send to the menu view
		$this->load->model('MenuModel');
		$pizza = array('pizzaList' => $this ->MenuModel->getAllPizza());

		$this->load->view('menu', $pizza);
	}

	public function appetizers() {

		//Get appetizer and drink lists and  pass to the view
		$this->load->model('MenuModel');
		$appetizers =  array('appetizersList' => $this ->MenuModel->getOtherItems('APPETIZER'),
			'drinksList' => $this ->MenuModel->getOtherItems('DRINK'));

		$this->load->view('appetizers', $appetizers);
	}

	public function deals() {

		//Get deals list and pass to the view
		$this->load->model('MenuModel');
		$deals = array('dealsList' => $this->MenuModel->getOtherItems('DEAL'));

		$this->load->view('deals', $deals);
	}

	public function customizePizza() {

		//Ge the selected pizza id in the url
		$id = $this->uri->segment(3);

		//Get required details by pizza id and toppings list and pass to the view
		$this->load->model('MenuModel');

		$details = $this->MenuModel->getPizzaById($id);

		$details = array('details' => $details, 'toppingsList' => $this ->MenuModel->getAllToppings());

		$this->load->view('customizePizza',  $details);
	}

}

?>
