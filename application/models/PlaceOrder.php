<?php

class PlaceOrder extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function insertOrderDetails($title, $firstname, $lastname, $address,
									   $phonenumber, $orderTotal, $submittedDateTime) {

		$orderData = array('c_title' => $title, 'c_first_name' => $firstname,
			'c_last_name' => $lastname, 'c_address' => $address, 'c_phone_number' => $phonenumber,
			'total_price' => $orderTotal, 'submitted_time' => $submittedDateTime);

		$this->db->insert('order_details', $orderData);

		return $this->db->insert_id();
	}

	public function insertOrderedOtherItems($orderDetailId, $otherOrderedItems) {

		$data = array();

		foreach ($otherOrderedItems as $item) {
			$orderedItem = array('other_item_id' => $item->id, 'order_id' => $orderDetailId,
				'quantity' => $item->quantity, 'sub_total' => $item->subTotal);

			array_push($data, $orderedItem);
		}

		$this->db->insert_batch('order_other_items', $data);
	}

	public function insertOrderedPizza($orderDetailId, $quantity, $subTotal) {

		$pizza = array('order_id' => $orderDetailId, 'quantity' => $quantity,
			'sub_total' => $subTotal);

		$this->db->insert('order_pizza', $pizza);

		return $this->db->insert_id();
	}

	public function insertOrderedPizzaToppings($pizzaOrderId, $pizzaId, $toppings) {

		$data = array();

		foreach ($toppings as $topping) {
			$orderedTopping = array('pizza_id' => $pizzaId, 'topping_id' => $topping->id,
				'order_pizza_id' => $pizzaOrderId);

			array_push($data, $orderedTopping);
		}

		$this->db->insert_batch('pizza_order_topping', $data);
	}

}

?>
