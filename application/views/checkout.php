<html lang="en">

<head>
	<title>PizzaNow!</title>

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="/PizzaNow/css/checkout.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
<?php
include_once("header.php");
?>

<div class="row">
	<div class="col-75">
		<div class="container">
			<form action="">

				<div class="row">
					<div class="col-50">
						<div class="page-title">Delivery Details</div>
						<br>

						<div class="first-row">
							<label for="title">Title</label>
							<select name="title" id="title" class="row-item">
								<option value="Mr">Mr</option>
								<option value="Mrs">Mrs</option>
								<option value="Miss">Miss</option>
							</select>

							<label for="fname">First Name</label>
							<input type="text" id="fname" name="firstname" class="row-item">

							<label for="lname">Last Name</label>
							<input type="text" id="lname" name="lastname" class="row-item">
						</div>

						<label for="adr">Address</label>
						<input type="text" id="adr" name="address">

						<label for="tel">Phone Number</label>
						<input type="tel" id="tel" name="phonenumber" maxlength="10" min="10">

					</div>
				</div>

				<input type="submit" value="Place Order" class="btn">
			</form>
		</div>
	</div>
</div>

<?php
include_once("footer.php");
?>

<script>
</script>


</body>
</html>

