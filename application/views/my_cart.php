<html lang="en">

<head>
	<title>PizzaNow!</title>

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="/PizzaNow/css/my-cart.css" rel="stylesheet">

</head>

<body>
<?php
include_once("header.php");
?>

<h2><span class="title">Pizza Menu</span></h2>

<div class="table-container w3-container">
	<?php
	echo "$isSet";
	if ($isSet) {
		echo serialize($data);
	}
	?>
	<table class="w3-table w3-bordered">
		<tr>
			<th>Item</th>
			<th>Price (Rs.)</th>
			<th>Quantity</th>
			<th>Sub Total (Rs.)</th>
			<th></th>
		</tr>

		<tr>
			<td class="left-align">
				Chicken Bacon<br>
				(Cheese,Chicken,Tomato,Cheese,Chicken,Tomato,Cheese,Chicken,Tomato)
			</td>
			<td id="row1Price">510</td>
			<td>
				<button class='button' onclick="">
					<i class='fa fa-minus-circle'></i>
				</button>
				1
				<button class='button' onclick="">
					<i class='fa fa-plus-circle'></i>
				</button>
			</td>
			<td>510</td>
			<td>
				<button class='del-button' onclick="">
					<i class='fa fa-trash'></i>
				</button>
			</td>
		</tr>

		<tr class="last-row">
			<td class="total" colspan="3">Sub Total</td>
			<td class="tot-price">1000</td>
			<td></td>
		</tr>

	</table>

</div>

<a class="continue-shopping" href="/PizzaNow/index.php/Menu/index"><i class='fa fa-mail-reply'></i>Continue Shopping</a>

<button  class="checkout" onclick="window.location.href=''"><i class='fa fa-check-square-o'></i>Checkout</button>


<?php
include_once("footer.php");
?>

<script>

	$("input[type=number]").click(function() {
		calculateSubTotal();
		calculateTotal();
	});

	$("input[type=number]").keyup(function() {
		calculateSubTotal();
		calculateTotal();
	});

	function calculateSubTotal() {

	}

	function calculateTotal() {

	}

</script>


</body>
</html>
