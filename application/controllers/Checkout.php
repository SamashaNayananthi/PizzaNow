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
		$submittedDateTime = date("Y-m-d h:ia");
		$deliveryTime = date("h:ia",strtotime("+30 minutes"));

		$orderItems = $this->session->added_items;
		$orderTotal = $this->session->total;

		$this->load->model('PlaceOrder');

		$orderDetailId = $this ->PlaceOrder->insertOrderDetails($title, $firstname, $lastname, $address,
			$phonenumber, $orderTotal, $submittedDateTime);

		$otherOrderedItems = array();

		foreach ($orderItems as $orderItem) {

			if ($orderItem->type == "PIZZA") {

				$pizzaOrderId = $this ->PlaceOrder->insertOrderedPizza($orderDetailId, $orderItem->quantity,
					$orderItem->subTotal);

				if (isset($orderItem->selectedToppings) && !empty($orderItem->selectedToppings)) {
					$this ->PlaceOrder->insertOrderedPizzaToppings($pizzaOrderId, $orderItem->id,
						$orderItem->selectedToppings);
				}

			} else {
				array_push($otherOrderedItems, $orderItem);
			}
		}

		if (isset($otherOrderedItems) && !empty($otherOrderedItems)) {
			$this ->PlaceOrder->insertOrderedOtherItems($orderDetailId, $otherOrderedItems);
		}


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
