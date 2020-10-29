<html lang="en">

<head>
	<title>PizzaNow!</title>

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="/PizzaNow/css/my-cart.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
<?php
include_once("header.php");
?>

<h2><span class="title">My Cart</span></h2>

<div class="table-container w3-container">

	<table class="w3-table w3-bordered">
		<?php

		if ($isSet && $total != 0) {

			echo "<tr>";
			echo "<th>Item</th>";
			echo "<th>Price (Rs.)</th>";
			echo "<th>Quantity</th>";
			echo "<th>Sub Total (Rs.)</th>";
			echo "<th></th>";
			echo "</tr>";

			$index = 0;
			foreach ($data as $row) {
				echo "<tr>";
				echo "<td class='left-align'>$row->displayName";
				if ($row->type == "PIZZA" && isset($row->selectedToppings)) {
					echo "<br><span class='toppings'>Toppings - ";
					$i = 1;
					$numItems = count($row->selectedToppings);
					foreach ($row->selectedToppings as $topping) {
						if ($i < $numItems) {
							echo "$topping->display_name, ";
						} else {
							echo "$topping->display_name";
						}
						$i++;
					}
					echo "</span>";
				}
				echo "</td>";

				echo "<td>$row->selectedPrice</td>";

				echo "<td><button class='button' onclick=\"changeQuantity('minus', $index, $row->quantity)\">
                      <i class='fa fa-minus-circle'></i></button>";
				echo "$row->quantity";
				echo "<button class='button' onclick=\"changeQuantity('plus', $index, $row->quantity)\">
                      <i class='fa fa-plus-circle'></i></button></td>";

				echo "<td>$row->subTotal</td>";

				echo "<td><button class='del-button' onclick=\"deleteItem($index)\">
                      <i class='fa fa-trash'></i></button></td>";
				echo "</tr>";

				$index++;
			}

			echo "<tr class='last-row'>";
			echo "<td class='total' colspan='3'>Sub Total</td>";
			echo "<td class='tot-price'>$total</td>";
			echo "<td></td>";
			echo "</tr>";

		} else {
			echo "<h3 class='empty-msg'>--  <i class='fa fa-frown-o'></i>Cart is empty  --</h3>";
			echo "<h4 class='empty-msg'>Looks like you have no items in your cart</h4>";
		}

		?>

	</table>

</div>

<div class="bottom">
	<a class="continue-shopping" href="/PizzaNow/index.php/Menu/index"><i class='fa fa-mail-reply'></i>Continue Shopping</a>

	<?php
	if ($isSet && $total != 0) {
		echo "<button  class='checkout'><i class='fa fa-check-square-o'></i>Checkout</button>";
	}
	?>
</div>


<?php
include_once("footer.php");
?>

<script>

	function changeQuantity(type,index, quantity) {
		if ((type == "minus" && quantity != 1) || type == "plus") {
			$.ajax({
				url:"/PizzaNow/index.php/MyCart/changeQuantity",
				method: "POST",
				data: {
					index: index,
					type: type
				},
				success: function() {
					window.location = "/PizzaNow/index.php/MyCart/index";
				}
			});
		}
	}

	function deleteItem(index) {
		$.ajax({
			url: "/PizzaNow/index.php/MyCart/deleteItem",
			method: "POST",
			data: {
				index: index
			},
			success: function () {
				window.location = "/PizzaNow/index.php/MyCart/index";
			}
		});
	}

</script>


</body>
</html>
