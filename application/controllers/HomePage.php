<?php

class HomePage extends CI_Controller {

	public function index(){
		$this->load->view('homePage');
	}

	public function myCV(){
		$this->load->view('samashaCV');
	}

	public function aboutUs(){
		$this->load->view('aboutUs');
	}

}

?>
