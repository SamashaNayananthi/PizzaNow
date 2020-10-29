<html lang="en">
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
		body {
			font-family: sans-serif;
		}

		.header {
			background-color: #000000;
			margin-bottom: 3%;
			position: sticky;
			top: 0;
		}

		ul{
			list-style-type: none;
			overflow: hidden;
			height: 15%;
			width: 65%;
		}

		li{
			float: right;
			margin: 1%;
			font-size: larger;
			width: 20%;
		}

		li a {
			display: block; /* display the navigation bar list in block */
			color: white !important;
			text-align: center;
			padding: 25px 20px;
			text-decoration: none !important;
			width: 100%;
		}

		/* adding the hover effect to the navigation bar */
		li a:hover:not(.active) {
			background-color: #373635;
		}

		img.logo {
			display: inline-block;
			float:left;
			width: 25%;
			height: 15%;
			margin-left: 5%;
		}

		i {
			margin-right: 10%;
		}

	</style>
</head>

<body>

<header class="header">
	<img src="/PizzaNow/images/logo.png" class="logo">
	<nav>
		<ul>
			<li><a href="<?php echo base_url()."HomePage/aboutUs" ?>"><i class="fa fa-users"></i>About us</a> </li>
			<li><a href="<?php echo base_url()."MyCart/index" ?>"><i class="fa fa-shopping-cart"></i>My Cart</a> </li>
			<li><a href="<?php echo base_url()."Menu/index" ?>"><i class="fa fa-book"></i>Menu</a> </li>
			<li><a href="<?php echo base_url()."HomePage/index" ?>"><i class="fa fa-home"></i>Home</a> </li>
		</ul>
	</nav>
</header>

</body>
</html>
