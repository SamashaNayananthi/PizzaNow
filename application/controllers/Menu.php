<?php

class Menu extends CI_Controller {

	public function index(){
		$this->load->model('MenuModel');
		$this->load->view('menu', $this ->MenuModel->getAllPizza());
	}

	public function appetizers(){
		$this->load->model('MenuModel');
		$this->load->view('appetizers', $this ->MenuModel->getAppetizersAndDrinks());
	}

	public function deals(){
		$this->load->model('MenuModel');
		$this->load->view('deals', $this ->MenuModel->getDeals());
	}

	public function customize(){
		$this->load->view('customize');
	}

}

?>
