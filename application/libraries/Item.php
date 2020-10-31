<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item {

	public $type;
	public $id;
	public $quantity;
	public $displayName;
	public $selectedToppings;
	public $selectedPrice;
	public $subTotal;


	public function __construct() {}

	public function getType() {
		return $this->type;
	}

	public function setType($type) {
		$this->type = $type;
	}

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getQuantity() {
		return $this->quantity;
	}

	public function setQuantity($quantity) {
		$this->quantity = $quantity;
	}

	public function getDisplayName() {
		return $this->displayName;
	}

	public function setDisplayName($displayName) {
		$this->displayName = $displayName;
	}

	public function getSelectedToppings() {
		return $this->selectedToppings;
	}

	public function setSelectedToppings($selectedToppings) {
		$this->selectedToppings = $selectedToppings;
	}

	public function getSelectedPrice() {
		return $this->selectedPrice;
	}

	public function setSelectedPrice($selectedPrice) {
		$this->selectedPrice = $selectedPrice;
	}

	public function getSubTotal() {
		return $this->subTotal;
	}

	public function setSubTotal($subTotal) {
		$this->subTotal = $subTotal;
	}

}
