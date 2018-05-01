<?php include './back/authcheck.php'; include './navbar.php'; 
	if(isset($_POST["number"])) {
		if ($loggedin) {
			if ((int)$_POST["number"] > (int)$_GET["stock"]){
				echo '<div class="alert alert-danger"><i class="fa fa-check"></i>We do not have the stock available to fulfill your order</div>';
			} else {
				$num = (int)$_POST["number"];
				$sql = "SELECT * FROM carts WHERE user='{$username}' AND item='{$_GET["item"]}'";
				if($result = $connection->query($sql)) {
					if ($result->num_rows > 0) {
						echo '<div class="alert alert-danger"><i class="fa fa-check"></i>This item is already in your cart</div>';
					} else {
						$sql2 = $sql;
						$sql = "INSERT INTO carts VALUES ('{$username}', '{$_GET["item"]}', '{$num}');";
						if($result = $connection->query($sql)){
							header('Location: ./products.php?added');
						} else {
							
							header('Location: ./products.php?failed');
						}
					}
				} else {
					echo '<div class="alert alert-danger"><i class="fa fa-check"></i>An unexpected error has occured. Sorry!</div>';					
				}
			}
		} else {
			echo '<div class="alert alert-danger"><i class="fa fa-check"></i>Please login or <a href="createacc.php">sign up</a> to use cart</div>';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php $item = $_GET["item"]; echo $item; ?></title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-5">
				<?php 
					include "./back/database.php";
					$price = "not available";
					$details = "not available";
					$stock = "0";
					$sql = "SELECT * FROM products WHERE name='{$item}'";
					if ($result = $connection->query($sql)) {
						if ($result->num_rows > 0) {
							$row = $result->fetch_assoc();
							$price = $row['price'];
							$details = $row['details'];
							$stock = $row['stock'];
							echo "<h1>{$row['title']}</h1>";
						} else {
							echo "not available";
						}
					} else {
						echo 'An error has occured. Sorry!';
					}
					
					echo "<img src='./resources/products/".$item.".jpg' height='300' width='300'>"
				?>
			</div>
			<div class="col-5">
				<br>
				<?php echo $details ?>
				<br>
				Price: <?php echo "$".$price;?>
				<form action='./item.php?item=<?php echo $item; ?>&stock=<?php echo $stock; ?>' method="POST">
					<input name="number" id="number" type="number" value="1">
					<input type="submit" value="Add to cart">
				</form>

				Items Left: <?php echo $stock ?>
			</div>
		</div>
	</div>
<?php include './footer.php'; ?>
</body>
</html>