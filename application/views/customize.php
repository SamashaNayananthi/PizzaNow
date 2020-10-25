<html lang="en">

<head>
	<title>PizzaNow!</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link href="/PizzaNow/css/customize.css" rel="stylesheet">

</head>

<body>
<?php
include_once("header.php");
?>

<div id="main-container">
	<div id="left-pane">
		<img src="/PizzaNow/images/pizza/devilledChicken.jpg" height='200px' width='250px'>

		<div class='details'>
			<div class='name' data-toggle='tooltip' data-placement='top' title='Devilled Chicken'>Devilled Chicken</div>
			<div class='desc' data-toggle='tooltip' data-placement='top' title='Devilled chicken in spicy sauce with a
			double layer of mozzarella cheese.'>Devilled chicken in spicy sauce with a double layer of mozzarella cheese.</div>
		</div>
	</div>

	<div id="right-pane">
		<label class="radio-inline">
			<input type="radio" name="optradio" checked><b>Personal</b> (Rs. 510)
		</label>

		<label class="radio-inline">
			<input type="radio" name="optradio"><b>Medium</b> (Rs. 790)
		</label>

		<label class="radio-inline">
			<input type="radio" name="optradio"><b>Large</b> (Rs. 1300)
		</label>

		<div class="toppings">
			<h2>Toppings</h2>
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
