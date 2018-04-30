<!DOCTYPE html>
<html>
<head>
	<title>Home - Welcome!</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
	<?php include './back/authcheck.php'; include 'navbar.php';?>
	<br>
	<div class="d-flex justify-content-center">
		<a href="./products.php?item=shirt1"><img src="./resources/products/shirt1.jpg" alt="World's #0 Programmer" style="width:400px;height:400px;border-left:3px solid black;border-right:3px solid black;"></a>
		<a href="./products.php?item=shirt0"><img src="./resources/products/shirt0.jpg" alt="Zero Shirts Original" style="width:400px;height:400px;border-right:3px solid black;"></a>
	</div>
	<br>
	<div class="d-flex justify-content-center"> 
		<h2>Featured Products</h2>
	</div>
	<?php include 'footer.php';?>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>