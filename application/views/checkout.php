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
			<?php

			if ($isSet && $total != 0) {

				echo "<form action= '/PizzaNow/index.php/Checkout/placeOrder' method='post' 
				      onSubmit='return checkform()'>";

				echo "<div class='row'>";
				echo "<div class='col-50'>";
				echo "<div class='page-title'>Delivery Details</div><br>";
				echo "<div class='first-row'>";

				echo "<label for='title'>Title</label>
                      <select name='title' id='title' class='row-item' required>
                      <option value='Mr'>Mr</option>
                      <option value='Mrs'>Mrs</option>
					  <option value='Miss'>Miss</option>
					  </select>";

				echo "<label for='fname'>First Name</label>
					  <input type='text' id='fname' name='firstname' class='row-item' required>";

				echo "<label for='lname'>Last Name</label>
					  <input type='text' id='lname' name='lastname' class='row-item' required>";
				echo "</div>";

				echo "<label for='adr'>Address</label>
					  <input type='text' id='adr' name='address' required>";

				echo "<label for='tel'>Phone Number</label>
					  <input type='tel' id='tel' name='phonenumber' maxlength='10' min='10' required
					  placeholder='eg : 0711653043'>";

				echo "</div>
				      </div>";

				echo "<input type='submit' value='Place Order (Total - Rs. $total)' class='btn'>";
				echo "</form>";

			} else {
				echo "<div class='success-msg'>Order placed successfully !</div>";

				if ($deliveryTime != 0 && $firstname != '') {
					echo "<div class='success-msg'>$firstname, your order will be delivered at $deliveryTime.</div>";
				}
			}
			?>

		</div>
	</div>
</div>

<?php
include_once("footer.php");
?>

<script>

	function checkform() {

		let phonenumber = /^\d{10}$/;
		let tel = document.getElementById('tel').value;

		let name = /^[A-Za-z]+$/;
		let fname = document.getElementById('fname').value;
		let lname = document.getElementById('lname').value;

		if (tel != '' && !tel.match(phonenumber)) {
			alert('Phone number is invalid');
			return false;

		} else if (fname != '' && !fname.match(name)) {
			alert('First name is invalid');
			return false;

		} else if (lname != '' && !lname.match(name)) {
			alert('Last name is invalid');
			return false;

		} else {
			return true;
		}
	}
</script>


</body>
</html>

