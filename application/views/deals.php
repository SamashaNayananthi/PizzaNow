<html lang="en">

<head>
	<title>PizzaNow!</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link href="/PizzaNow/css/menu.css" rel="stylesheet">

</head>

<body>
<?php
include_once("header.php");
?>

<div id="links-to-sections">
	<a href="/PizzaNow/index.php/Menu/index">Pizza</a>
	<a href="/PizzaNow/index.php/Menu/appetizers">Appetizers & Drinks</a>
	<a href="/PizzaNow/index.php/Menu/deals">Special Deals</a>
</div>

<div id="grid-container">

	<h2><span class="title" id="deals">Special Deals</span></h2>

		<?php

		foreach ($dealsList as $deal) {

			echo "<div id='grid-item'>";
			echo "<img src=$deal->img_url height='200px' width='250px'>";
			echo "<hr>";

			echo "<div class='details'>";
			echo "<div class='name' data-toggle='tooltip' data-placement='top' title='$deal->display_name'>$deal->display_name</div>";
			echo "<div class='desc' data-toggle='tooltip' data-placement='top' title='$deal->description'>$deal->description</div>";
			echo "<div class='price'>Price <b>Rs. $deal->price</b></div>";
			echo "<button class='button' onclick=\"addToCart($deal->id, 'DEAL', $deal->price, '$deal->display_name')\">
                  <i class='fa fa-cart-plus'></i>Add to Cart</button>";
			echo "</div>";
			echo "</div>";
		}
		?>

	<div id="bottom-line"></div>

</div>

<?php
include_once("footer.php");
?>

<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});

	function addToCart(id, type, price, name) {

		$.ajax({
			url:"/PizzaNow/index.php/MyCart/addToCart",
			method: "POST",
			data: {
				type: type,
				id: id,
				selectedPrice: price,
				quantity: 1,
				displayName: name
			},
			success: function() {
				window.location = "/PizzaNow/index.php/MyCart/index";
			}
		});
	}
</script>

</body>
</html>
