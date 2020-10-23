<?php


class HomePage extends CI_Controller {

	public function index(){
		$this->load->view('home_page');
	}

	public function myCV(){
		$this->load->view('samashaCV');
	}

	public function aboutUs(){
		$this->load->view('about_us');
	}

}

?>
