<html lang="en">

<head>
	<title>PizzaNow!</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="/PizzaNow/css/checkout.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
<?php
include_once("header.php");
?>

<?php

if ($isSet && $total != 0) {

	echo "<div class='row'>";
	echo "<div class='col-75'>";
	echo "<div class='container'>";

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
	echo "</div>";
	echo "</div>";
	echo "</div>";

} else {

	echo "<div class='modal-content'>";
	echo "<div class='modal-header'>";
	echo "<button type='button' class='close' data-dismiss='modal' onclick='closePopUp()'>&times;</button>";
	echo "<h4 class='modal-title'>Order placed successfully !</h4>";
	echo "</div>";
	echo "<div class='modal-body'>";
	echo "<p>$firstname, your order will be delivered at $deliveryTime.</p>";
	echo "</div>";
	echo "<div class='modal-footer'>";
	echo "<button type='button' class='close-btn btn-secondary' data-dismiss='modal' onclick='closePopUp()'>Close</button>";
	echo " </div>";
	echo "</div>";

}

?>


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

	function closePopUp() {
		window.location = "<?php echo base_url()."HomePage/index" ?>";
	}
</script>


</body>
</html>

