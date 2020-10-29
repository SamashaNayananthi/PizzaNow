<?php

class Checkout extends CI_Controller {

	public function index() {
		if ($this->session->has_userdata('added_items')) {
			$data = array("isSet" => TRUE, "total" => $this->session->total);
		} else {
			$data = array("isSet" => FALSE);
		}

		$this->load->view('checkout', $data);
	}

	public function placeOrder() {
		$title = $this->input->post('title');
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$address = $this->input->post('address');
		$phonenumber = $this->input->post('phonenumber');

		$this->index();
	}

}
