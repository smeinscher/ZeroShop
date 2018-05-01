<!DOCTYPE html>
<html>
<head>
	<title>Your Cart</title>
</head>
<body>
	<?php
		include "./back/authcheck.php"; 
		include "./navbar.php";
		if (isset($_GET["item"])){
			$sql = 'DELETE FROM carts WHERE user="'.$username.'" AND item="'.$_GET['item'].'";';
			if ($result = $connection->query($sql)) {
				echo '<div class="alert alert-info"><i class="fa fa-check"></i>Item deleted</div>';
			} else {
				echo '<div class="alert alert-danger"><i class="fa fa-check"></i>Unexpected error</div>';
			}
		}
		$total = 0;
		$sql = "SELECT item, quantity FROM carts WHERE user='{$username}'";
		if ($result = $connection->query($sql)) {
			if ($result->num_rows > 0) {
				$row = $result->fetch_all();
				for($i = 0; $i < $result->num_rows; $i++) {
					$item = $row[$i][0];
					if (isset($_POST['number'])) {
						$sql = "UPDATE carts SET quantity='{$_POST['number']}' WHERE user='{$username}' AND item='{$item}'";
						if ($result = $connection->query($sql)) {
							echo '<div class="alert alert-info"><i class="fa fa-check"></i>Quantity updated</div>';	
						} else {
							echo '<div class="alert alert-danger"><i class="fa fa-check"></i>Error updating quantity</div>';
						}
					}
					$sql = "SELECT * FROM products WHERE name='{$item}'";
					if ($result2 = $connection->query($sql)) {
						if ($result2->num_rows > 0) {
							$row2 = $result2->fetch_assoc();
							echo $row2["title"]; 
						} else {
							echo $item;
						}
					} else {
						echo $item;
					}
					echo '<br>';
					echo 
					"<div class='container'>
						<div class='row'>
							<div class='col-4'>
								<img src='./resources/products/".$item.".jpg' width='200' height='200'>
							</div>
							<div class='col-4'>
								".$row2["details"]."
								<br><br><br><br><br><br><br><br>
								<a href='./cart.php?item=".$item ."'>Remove from cart</a>
							</div>
							<div class='col-2'>
								$".number_format((float)$row2["price"] * (float)$row[$i][1], 2, '.', '')." x ".$row[$i][1]."
								<!--<form action='' method='POST'>
									<input type='number' name='number' value='".$row[$i][1]."'>
									<input type='submit' value='change'>
								</form> -->


										

							</div>
						</div>
					</div>			
					";
					$total += (double)$row2["price"] * (double)$row[$i][1];

				}
				echo 
				"<div class='container'>
					<div class='row'>
						<div class='col-8'>
						</div>
						<div class='col-2'>
							Total: $".$total. "<br>
							<form action='./info.php' method='post'>
								<input type='submit' value='checkout'>
							</form>
						</div>
					</div>
				</div>
					";

			} else {
				echo "<h1>Cart is Empty</h1>";
			}
		} else {
			echo "<h1>Connection error</h1>";
		}
		include './footer.php';
	?>
</body>
</html>