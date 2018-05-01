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
				echo "item deleted.<br>";
			} else {
				echo $sql."<br>";
			}
		}
		$total = 0;
		$sql = "SELECT item, quantity FROM carts WHERE user='{$username}'";
		if ($result = $connection->query($sql)) {
			if ($result->num_rows > 0) {
				$row = $result->fetch_all();
				for($i = 0; $i < $result->num_rows; $i++) {
					$item = $row[$i][0];
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
								$".number_format((float)$row2["price"] * (float)$row[$i][1], 2, '.', '')."

							</div>
						</div>
					</div>			
					";
					$total += (double)$row2["price"] * (double)$row[0][1];

				}
				echo 
				"<div class='container'>
					<div class='row'>
						<div class='col-8'>
						</div>
						<div class='col-2'>
							Total: $".$total. "
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