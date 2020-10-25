<html lang="en">

<head>
	<title>PizzaNow!</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link href="/PizzaNow/css/menu.css" rel="stylesheet">

	<style>
		#grid-container {
			grid-row-gap: 1%;
		}
	</style>
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

	<?php

	foreach ($appetizersList as $appetizer) {

		echo "<div id='grid-item'>";
		echo "<img src=$appetizer->img_url height='200px' width='250px'>";
		echo "<hr>";

		echo "<div class='details'>";
		echo "<div class='name' data-toggle='tooltip' data-placement='top' title='$appetizer->display_name'>$appetizer->display_name</div>";
		echo "<div class='desc' data-toggle='tooltip' data-placement='top' title='$appetizer->description'>$appetizer->description</div>";
		echo "<div class='price'>Price <b>Rs. $appetizer->price</b></div>";
		echo "<button class='button'><i class='fa fa-shopping-cart'></i>Add to Cart</button>";
		echo "</div>";
		echo "</div>";
	}
	?>

	<br>
	<h2><span class="title" id="drinks">Drinks</span></h2>

	<?php

	foreach ($drinksList as $drink) {

		echo "<div id='grid-item'>";
		echo "<img src=$drink->img_url height='200px' width='250px'>";
		echo "<hr>";

		echo "<div class='details'>";
		echo "<div class='name' data-toggle='tooltip' data-placement='top' title='$drink->display_name'>$drink->display_name</div>";
		echo "<div class='desc' data-toggle='tooltip' data-placement='top' title='$drink->description'>$drink->description</div>";
		echo "<div class='price'>Price <b>Rs. $drink->price</b></div>";
		echo "<button class='button'><i class='fa fa-shopping-cart'></i>Add to Cart</button>";
		echo "</div>";
		echo "</div>";
	}
	?>

	<br>
	<h2><span class="title" id="deals">Special Deals</span></h2>

<!--	--><?php
//
//	foreach ($dealsList as $deal) {
//
//		echo "<div id='grid-item'>";
//		echo "<img src=$deal->img_url height='200px' width='250px'>";
//		echo "<hr>";
//
//		echo "<div class='details'>";
//		echo "<div class='name' data-toggle='tooltip' data-placement='top' title='$deal->display_name'>$deal->display_name</div>";
//		echo "<div class='desc' data-toggle='tooltip' data-placement='top' title='$deal->description'>$deal->description</div>";
//		echo "<div class='price'>Price <b>Rs. $deal->price</b></div>";
//		echo "<button class='button'><i class='fa fa-shopping-cart'></i>Add to Cart</button>";
//		echo "</div>";
//		echo "</div>";
//	}
//	?>

	<div id='grid-item'>
		<img src='/PizzaNow/images/deals/myTreat.jpg' height='200px' width='250px'>
		<hr>
		<div class='details'>
			<div class='name' data-toggle='tooltip' data-placement='top' title='My Treat'>
				My Treat
			</div>
			<div class='desc' data-toggle='tooltip' data-placement='top' title='1 Deviled Chicken Personal Pan Pizza +
1/2 portion of Garlic Bread + 1 pet Coke (200ml)'>1 Deviled Chicken Personal Pan Pizza +
				1/2 portion of Garlic Bread + 1 pet Coke (200ml)
			</div>
			<div class='price'>Price <b>Rs. 600</b></div>
			<button class='button'><i class='fa fa-shopping-cart'></i>Add to Cart</button>
		</div>
	</div>

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
