<?php

class MyCart extends CI_Controller {

	public function index() {

		//If session has data send required data, else send required information to view
		if ($this->session->has_userdata('addedItems')) {
			$data = array("sessionIsSet" => TRUE, "data" => $this->session->addedItems,
				"total" => $this->session->total);

		} else {
			$data = array("sessionIsSet" => FALSE);
		}

		$this->load->view('myCart', $data);
	}

	public function addToCart() {

		//Get the post request data into variables
		$type = $this->input->post('type');
		$id = (int)$this->input->post('id');
		$selectedPrice = (double)$this->input->post('selectedPrice');
		$quantity = (int)$this->input->post('quantity');
		$displayName = $this->input->post('displayName');

		//Creating object to add to the session
		$newItem = new stdClass();
		$newItem->type = $type;
		$newItem->id = $id;
		$newItem->quantity = $quantity;
		$newItem->displayName = $displayName;

		//If the adding item type is pizza add the topping details to the object
		// and adding topping prices to the selected price
		if ($type == "PIZZA") {

			$selectedToppings = $this->input->post('selectedToppings');

			if (isset($selectedToppings)) {
				$this->load->model('MenuModel');
				$toppings = $this ->MenuModel->getAllToppings();
				$toppingDetails = array();

				//Adding toppings prices to selected price
				for ($i = 0; $i < sizeof($selectedToppings); $i++) {
					$toppingIndex = $selectedToppings[$i];
					$topping = $toppings[$toppingIndex];
					array_push($toppingDetails, $topping);

					$selectedPrice += $topping->price;
				}

				$newItem->selectedToppings = $toppingDetails;
			}
		}

		$newItem->selectedPrice = $selectedPrice;

		//Calculating sub total
		$newItem->subTotal = $selectedPrice * $quantity;

		//If the session has data adding the new selected item to the existing list
		//Else create a new session
		if ($this->session->has_userdata('addedItems')) {

			$currentItems = $this->session->addedItems;

			if ($type != "PIZZA") {

				$matchedItem = FALSE;
				foreach ($currentItems as $updatingItem) {
					if ($newItem->id == $updatingItem->id && $newItem->type == $updatingItem->type) {

						$matchedItem = TRUE;
						$updatingItem->quantity = $updatingItem->quantity +1;
						$updatingItem->subTotal = $updatingItem->selectedPrice * $updatingItem->quantity;
					}
				}

				if (!$matchedItem) {
					array_push($currentItems, $newItem);
				}

			} else {
				array_push($currentItems, $newItem);
			}

			$this->session->set_userdata('addedItems', $currentItems);

			//Calculate new total and set the session variable
			$currentTotal = $this->session->total;
			$newTotal = $currentTotal + ($selectedPrice * $quantity);
			$this->session->set_userdata('total', $newTotal);

		} else {

			$items = array($newItem);
			$this->session->set_userdata('addedItems', $items);

			$total = $selectedPrice * $quantity;
			$this->session->set_userdata('total', $total);

			log_message('debug', 'New session created');
		}

	}

	public function changeQuantity() {

		//Get post request data into variables
		$index = (int)$this->input->post('index');
		$type = $this->input->post('type');

		//Get the item need to update
		$allItems = $this->session->addedItems;
		$item = $allItems[$index];

		$oldQuantity = $item->quantity;
		$oldSubTotal = $item->subTotal;
		$price = $item->selectedPrice;
		$oldTotal = $this->session->total;

		//Update quantity as required
		if ($type == "minus") {
			$newQuantity = $oldQuantity - 1;
		} else {
			$newQuantity = $oldQuantity + 1;
		}

		//Calculate the new sub total and total and update session
		$newSubTotal = $newQuantity * $price;
		$newTotal = $oldTotal - $oldSubTotal + $newSubTotal;

		$item->quantity = $newQuantity;
		$item->subTotal = $newSubTotal;

		$allItems[$index] = $item;
		$this->session->set_userdata('addedItems', $allItems);
		$this->session->set_userdata('total', $newTotal);
	}

	public function deleteItem() {

		//Get post request data into variables
		$index = (int)$this->input->post('index');

		$allItems = $this->session->addedItems;
		$item = $allItems[$index];

		//Update the total price
		$oldTotal = $this->session->total;
		$newTotal = $oldTotal - $item->subTotal;

		//Update the session
		array_splice($allItems,$index,1);
		$this->session->set_userdata('addedItems', $allItems);
		$this->session->set_userdata('total', $newTotal);
	}

}

?>
