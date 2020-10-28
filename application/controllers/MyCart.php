<?php

class MyCart extends CI_Controller {

	public function index() {
		if ($this->session->has_userdata('added_items')) {
			$data = array("isSet" => TRUE, "data" => $this->session->added_items);
		} else {
			$data = array("isSet" => FALSE, "data" => $this->session->added_items);
		}
		$this->load->view('my_cart', $data);
	}

	public function addToCart() {
		$type = $this->input->post('type');
		$id = (int)$this->input->post('id');
		$selectedPrice = (double)$this->input->post('selectedPrice');
		$quantity = (int)$this->input->post('quantity');

		$newItem = array('type' => $type, 'id' => $id, 'selectedPrice' => $selectedPrice, 'quantity' => $quantity);

		if ($type == "pizza") {
			$selectedToppings = $this->input->post('selectedToppings');

			if (isset($selectedToppings)) {
				$this->load->model('MenuModel');
				$toppings = $this ->MenuModel->getAllToppings();
				$toppingDetails = array();

				for ($i = 0; $i < sizeof($selectedToppings); $i++) {
					$toppingIndex = $selectedToppings[$i];
					array_push($toppingDetails, $toppings[$toppingIndex]);
				}

				$newItem['selectedToppings'] = $toppingDetails;

			}
		}

		if ($this->session->has_userdata('added_items')) {
			$currentSession = $this->session->added_items;
			array_push($currentSession, $newItem);

			$this->session->set_userdata('added_items', $currentSession);

		} else {
			$items = array($newItem);
			$this->session->set_userdata('added_items', $items);
		}

	}

}

?>
