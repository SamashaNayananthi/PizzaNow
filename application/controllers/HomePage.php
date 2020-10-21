<?php


class HomePage extends CI_Controller {

	public function index(){
		$this->load->view('home_page');
	}

	public function homePage(){
		$this->load->view('home_page');
	}

	public function myCV(){
		$this->load->view('samashaCV');
	}

}

?>
