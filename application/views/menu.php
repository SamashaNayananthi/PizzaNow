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
	<a href="<?php echo base_url()."Menu/index" ?>">Pizza</a>
	<a href="<?php echo base_url()."Menu/appetizers" ?>">Appetizers & Drinks</a>
	<a href="<?php echo base_url()."Menu/deals" ?>">Special Deals</a>
</div>

<div id="grid-container">

	<h2><span class="title">Pizza Menu</span></h2>

	<?php

	foreach ($pizzaList as $pizza) {

		echo "<div id='grid-item'>";
		echo "<img src=$pizza->img_url height='200px' width='250px'>";
		echo "<hr>";

		echo "<div class='details'>";
		echo "<div class='name' data-toggle='tooltip' data-placement='top' title='$pizza->display_name'>
              $pizza->display_name</div>";
		echo "<div class='desc' data-toggle='tooltip' data-placement='top' title='$pizza->description'>
              $pizza->description</div>";
		echo "<div class='price'>Starting from <b>Rs. $pizza->s_price</b></div>";
		echo "<button class='button' 
              onclick=\"window.location.href='/PizzaNow/index.php/Menu/customizePizza/$pizza->id'\">
              <i class='fa fa-cutlery'></i>Customize Pizza</button>";
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
	$(document).ready(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>

</body>
</html>
