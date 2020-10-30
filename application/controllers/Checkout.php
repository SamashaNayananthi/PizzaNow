<?php

class Checkout extends CI_Controller {

	public function index() {
		if ($this->session->has_userdata('added_items')) {
			$data = array("isSet" => TRUE, "total" => $this->session->total);
		} else {
			$data = array("isSet" => FALSE, "deliveryTime" => 0);
		}

		$this->load->view('checkout', $data);
	}

	public function placeOrder() {
		$title = $this->input->post('title');
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$address = $this->input->post('address');
		$phonenumber = $this->input->post('phonenumber');
		date_default_timezone_set("Asia/Colombo");
		$submittedTime = date("Y-m-d h:ia");
		$deliveryTime = date("h:ia",strtotime("+30 minutes"));




		$this->session->unset_userdata('added_items');
		$this->session->unset_userdata('total');

		$this->submit($deliveryTime, $firstname);
	}

	public function submit($deliveryTime, $firstname) {
		if ($this->session->has_userdata('added_items')) {
			$data = array("isSet" => TRUE, "total" => $this->session->total);
		} else {
			$data = array("isSet" => FALSE, "deliveryTime" => $deliveryTime, "firstname" => $firstname);
		}

		$this->load->view('checkout', $data);
	}

}
