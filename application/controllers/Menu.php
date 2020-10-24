<?php

class Menu extends CI_Controller {

	public function index(){
		$this->load->model('MenuModel');
		$this->load->view('menu', $this ->MenuModel->getMenu());
	}

}

?>
