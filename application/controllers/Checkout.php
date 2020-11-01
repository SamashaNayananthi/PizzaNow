<?php

class Checkout extends CI_Controller {

	public function index() {

		//If session has data pass the total to view
		if ($this->session->has_userdata('added_items')) {
			$data = array("sessionIsSet" => TRUE, "total" => $this->session->total);

		} else {
			$data = array("sessionIsSet" => FALSE, "deliveryTime" => 0, "firstname" => '');

			log_message('debug', 'No Session data available');
		}

		$this->load->view('checkout', $data);
	}

	public function placeOrder() {

		$deliveryTime = 0;
		$firstname = "";

		if ($this->session->has_userdata('added_items')) {
			//Catch post request data
			$title = $this->input->post('title');
			$firstname = $this->input->post('firstname');
			$lastname = $this->input->post('lastname');
			$address = $this->input->post('address');
			$phonenumber = $this->input->post('phonenumber');

			//Set the submitted date time and calculate delivery time
			date_default_timezone_set("Asia/Colombo");
			$submittedDateTime = date("Y-m-d h:ia");
			$deliveryTime = date("h:ia",strtotime("+30 minutes"));

			//Get current session details in order to insert into database
			$orderItems = $this->session->added_items;
			$orderTotal = $this->session->total;

			//Load the PlaceOrderModel model
			$this->load->model('PlaceOrderModel');

			//Insert basic data of the order
			$orderDetailId = $this ->PlaceOrderModel->insertOrderDetails($title, $firstname, $lastname, $address,
				$phonenumber, $orderTotal, $submittedDateTime);

			$otherOrderedItems = array();

			//Insert ordered items
			foreach ($orderItems as $orderItem) {

				if ($orderItem->type == "PIZZA") {

					$pizzaOrderId = $this ->PlaceOrderModel->insertOrderedPizza($orderDetailId, $orderItem->quantity,
						$orderItem->subTotal);

					if (isset($orderItem->selectedToppings) && !empty($orderItem->selectedToppings)) {
						$this ->PlaceOrderModel->insertOrderedPizzaToppings($pizzaOrderId, $orderItem->id,
							$orderItem->selectedToppings);
					}

				} else {
					array_push($otherOrderedItems, $orderItem);
				}
			}

			if (isset($otherOrderedItems) && !empty($otherOrderedItems)) {
				$this ->PlaceOrderModel->insertOrderedOtherItems($orderDetailId, $otherOrderedItems);
			}


			//After inserting all the details to db unset and destroy the current session
			$this->session->unset_userdata('added_items');
			$this->session->unset_userdata('total');

			$this->session->sess_destroy();
			log_message('debug', 'Session destroyed');
		}

		$this->submit($deliveryTime, $firstname);
	}

	public function submit($deliveryTime, $firstname) {

		if ($this->session->has_userdata('added_items')) {
			$data = array("sessionIsSet" => TRUE, "total" => $this->session->total);

		} else {
			$data = array("sessionIsSet" => FALSE, "deliveryTime" => $deliveryTime, "firstname" => $firstname);
		}

		$this->load->view('checkout', $data);
	}

}
