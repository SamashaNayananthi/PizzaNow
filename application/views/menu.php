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
	<a href="#appetizer">Appetizers</a>
	<a href="#drinks">Drinks</a>
	<a href="#deals">Special Deals</a>
</div>

<div id="grid-container">

	<h2><span class="title">Pizza Menu</span></h2>

		<?php

		foreach ($pizzaList as $pizza) {

			echo "<div id='grid-item'>";
			echo "<img src=$pizza->img_url height='200px' width='250px'>";
			echo "<hr>";

			echo "<div class='details'>";
			echo "<div class='name' data-toggle='tooltip' data-placement='top' title='$pizza->display_name'>$pizza->display_name</div>";
			echo "<div class='desc' data-toggle='tooltip' data-placement='top' title='$pizza->description'>$pizza->description</div>";
			echo "<div class='price'>Starting from <b>Rs. $pizza->p_price</b></div>";
			echo "<button class='button'><i class='fa fa-shopping-cart'></i>Add to Cart</button>";
			echo "</div>";
			echo "</div>";
		}
		?>

	<br>
	<h2><span class="title" id="appetizer">Appetizers</span></h2>

	<br>
	<h2><span class="title" id="drinks">Drinks</span></h2>

	<br>
	<h2><span class="title" id="deals">Special Deals</span></h2>
</div>

<?php
include_once("footer.php");
?>

<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>

</body>
</html>
