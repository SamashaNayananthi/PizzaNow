<html lang="en">

<head>
	<title>PizzaNow!</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="/PizzaNow/images/favicon.png" />
	<link href="/PizzaNow/css/customize-pizza.css" rel="stylesheet">

</head>

<body>
<?php
include_once("header.php");
?>

<div id="main-container">
	<div id="left-pane">
		<?php

		echo "<img src=$details->img_url height='200px' width='250px'>";

		?>

		<div class='details'>
			<?php

			echo "<div hidden id='itemId'>$details->id</div>";
			echo "<div class='name' data-toggle='tooltip' data-placement='top' title='$details->display_name'>
                  $details->display_name</div>";
			echo "<div class='desc' data-toggle='tooltip' data-placement='top' title='$details->description'>
                  $details->description</div>";

			?>
		</div>
	</div>

	<div id="right-pane">
		<label class="radio-inline">
			<input type="radio" name="optradio" class="small" checked value="<?php echo $details->s_price ?>">
			<b>Small</b> (Rs. <?php echo $details->s_price ?>)
		</label>

		<label class="radio-inline">
			<input type="radio" name="optradio" class="medium" value="<?php echo $details->m_price ?>">
			<b>Medium</b> (Rs. <?php echo $details->m_price ?>)
		</label>

		<label class="radio-inline">
			<input type="radio" name="optradio" class="large" value="<?php echo $details->l_price ?>">
			<b>Large</b> (Rs. <?php echo $details->l_price ?>)
		</label>

		<div class="toppings">
			<h2>Toppings</h2>

			<div id="grid-container">

				<?php

				foreach ($toppingsList as $topping) {

					echo "<div id='grid-item'>";
					echo "<input id=$topping->display_name class=$topping->display_name type='checkbox' 
                          name=$topping->display_name value='$topping->price'/>";
					echo "<label for=$topping->display_name>";
					echo "<img src=$topping->img_url height='50px' width='75px'>";
					echo "<div id='displayName' hidden>$topping->display_name</div>";
					echo "<div class='details'><b>$topping->display_name</b><br>$topping->price</div>";
					echo "</label>";
					echo "</div>";
				}
				?>

			</div>

		<b>Quantity - </b><input type="number" id="quantity" class="quantity" name="quantity"
								 value="1" min="1" max="10" oninput="validity.valid||(value='');">

		<button class='button' name="add_to_cart" onclick="addToCart(<?php echo "'$details->display_name'" ?>)">
			<i class='fa fa-cart-plus'></i>Add to Cart <span id="customizedPrice"></span>
		</button>
	</div>
</div>

<?php
include_once("footer.php");
?>

<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});


	$("input[type=radio]").click(function() {
		calculateCustomizedTotal();
	});

	$("input[type=checkbox]").click(function() {
		calculateCustomizedTotal();
	});

	$("input[type=number]").click(function() {
		calculateCustomizedTotal();
	});

	$("input[type=number]").keyup(function() {
		calculateCustomizedTotal();
	});

	function calculateCustomizedTotal() {
		let price = 0;
		let toppingPrice = 0;
		let quantity = 0;

		$("input[type=radio]:checked").each(function() {
			price = parseFloat($(this).val());
		});

		$(":checkbox:checked").each(function(){
			toppingPrice += parseFloat($(this).val());
		});

		quantity = document.getElementById("quantity").value;

		let customizedTotal = (price + toppingPrice)*quantity;

		document.getElementById("customizedPrice").innerHTML = "(Rs. " + customizedTotal + ")";
	}

	function addToCart(name) {

		let quantity = document.getElementById("quantity").value;
		let selectedPrice;
		let selectedToppings = [];

		if (quantity == "" || quantity == 0) {
			alert("Please select a quantity to proceed you're order");

		} else {
			$("input[type=radio]:checked").each(function() {
				selectedPrice = parseFloat($(this).val());
			});

			$(":checkbox").each(function(i){
				if(this.checked){
					selectedToppings.push(i);
				}
			});

			$.ajax({
				url:"<?php echo base_url()."MyCart/addToCart" ?>",
				method: "POST",
				data: {
					type: "PIZZA",
					id: $("#itemId").text(),
					selectedPrice: selectedPrice,
					selectedToppings: selectedToppings,
					quantity: quantity,
					displayName: name
				},
				success: function() {
					window.location = "<?php echo base_url()."MyCart/index" ?>";
				}
			});
		}
	}

</script>

</body>
</html>
