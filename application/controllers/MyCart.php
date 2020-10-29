<?php

class MyCart extends CI_Controller {

	public function index() {
		if ($this->session->has_userdata('added_items')) {
			$data = array("isSet" => TRUE, "data" => $this->session->added_items, "total" => $this->session->total);
		} else {
			$data = array("isSet" => FALSE);
		}
		$this->load->view('my_cart', $data);
	}

	public function addToCart() {
		$type = $this->input->post('type');
		$id = (int)$this->input->post('id');
		$selectedPrice = (double)$this->input->post('selectedPrice');
		$quantity = (int)$this->input->post('quantity');
		$displayName = $this->input->post('displayName');

		$newItem = new stdClass();
		$newItem->type = $type;
		$newItem->id = $id;
		$newItem->quantity = $quantity;
		$newItem->displayName = $displayName;

		if ($type == "PIZZA") {

			$selectedToppings = $this->input->post('selectedToppings');

			if (isset($selectedToppings)) {
				$this->load->model('MenuModel');
				$toppings = $this ->MenuModel->getAllToppings();
				$toppingDetails = array();

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
		$newItem->subTotal = $selectedPrice * $quantity;

		if ($this->session->has_userdata('added_items')) {
			$currentItems = $this->session->added_items;
			array_push($currentItems, $newItem);
			$this->session->set_userdata('added_items', $currentItems);

			$currentTotal = $this->session->total;
			$newTotal = $currentTotal + ($selectedPrice * $quantity);
			$this->session->set_userdata('total', $newTotal);

		} else {
			$items = array($newItem);
			$this->session->set_userdata('added_items', $items);

			$total = $selectedPrice * $quantity;
			$this->session->set_userdata('total', $total);
		}

	}

	public function changeQuantity() {
		$index = (int)$this->input->post('index');
		$type = $this->input->post('type');

		$allItems = $this->session->added_items;
		$item = $allItems[$index];

		$oldQuantity = $item->quantity;
		$oldSubTotal = $item->subTotal;
		$price = $item->selectedPrice;
		$oldTotal = $this->session->total;

		if ($type == "minus") {
			$newQuantity = $oldQuantity - 1;
		} else {
			$newQuantity = $oldQuantity + 1;
		}

		$newSubTotal = $newQuantity * $price;
		$newTotal = $oldTotal - $oldSubTotal + $newSubTotal;

		$item->quantity = $newQuantity;
		$item->subTotal = $newSubTotal;

		$allItems[$index] = $item;
		$this->session->set_userdata('added_items', $allItems);
		$this->session->set_userdata('total', $newTotal);
	}

	public function deleteItem() {
		$index = (int)$this->input->post('index');

		$allItems = $this->session->added_items;
		$item = $allItems[$index];

		$oldTotal = $this->session->total;
		$newTotal = $oldTotal - $item->subTotal;

		array_splice($allItems,$index,1);
		$this->session->set_userdata('added_items', $allItems);
		$this->session->set_userdata('total', $newTotal);
	}

}

?>
