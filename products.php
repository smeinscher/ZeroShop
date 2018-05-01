<!DOCTYPE html>
<html>
<head>
	<title>Products Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
	<?php include './back/authcheck.php'; include './navbar.php'; $images = scandir("./resources/products"); ?>
	<?php if(isset($_GET["added"])):?>
		<div class="alert alert-info"><i class="fa fa-check"></i>Item added</div>
	<?php endif ?>
	<?php if(isset($_GET["failed"])):?>
		<div class="alert alert-danger"><i class="fa fa-check"></i>An unexpected error has occured. Please try again.</div>
	<?php endif ?>
	<br>
	
	<div class="container-fluid">
	<div class="row">
	<div class="col-9">
		<?php if(!isset($_GET["cat"])): ?>
	  	<div class="row">
	    	<div class="col-sm-4">
	      		<div class="panel panel-primary">
	        		<div class="panel-heading">SUMMER DEAL</div>
	        		<div class="panel-body"><a href='./item.php?item=<?php echo substr($images[2], 0, strlen($images[2])-4); ?>'><img src=<?php echo '"./resources/products/' . $images[2] . '"'?> class="img-responsive" style="width:100%" alt="Image"></a></div>
	        		<div class="panel-footer"><strike>$19.99</strike> $10.99</div>
	      		</div>
	    	</div>
	    	<div class="col-sm-4"> 
	      		<div class="panel panel-danger">
	        		<div class="panel-heading">POPULAR</div>
	        		<div class="panel-body"><a href="./item.php?item=<?php echo substr($images[3], 0, strlen($images[3])-4); ?>"><img src=<?php echo '"./resources/products/' . $images[3] . '"'?>  class="img-responsive" style="width:100%" alt="Image"></a></div>
	        	<div class="panel-footer">$19.99</div>
	      	</div>
	    </div>
	    <div class="col-sm-4"> 
	      <div class="panel panel-success">
	        <div class="panel-heading">NEW</div>
	        <div class="panel-body"><a href="./item.php?item=<?php echo substr($images[4], 0, strlen($images[4])-4); ?>"><img src=<?php echo '"./resources/products/' . $images[4] . '"'?>  class="img-responsive" style="width:100%" alt="Image"></a></div>
	        <div class="panel-footer">$19.99</div>
	      </div>
	    </div>
	 </div><br>
	<?php endif ?>
<!-- </div><br> -->

<!-- <div class="container-fluid"> -->
	<div class="row">    
        	<?php 
        		include "./back/database.php";
      			$start = 5;  		
				$cat = $_GET["cat"];
				if($cat) {
					$start = 2;
				}				
				//echo "<div class='d-flex justify-content-center'>";
				for ($i = $start; $i < count($images); $i++) {
					$product = substr($images[$i], 0, strlen($images[$i]) - 4);
					if ($cat) {
						if ($product[0] != $cat[0])
							continue;
					}
					$sql = "SELECT * FROM products WHERE name='{$product}'";
					if ($result = $connection->query($sql)) {
					 	if ($result->num_rows > 0) {
					 		$row = $result->fetch_assoc();
					 		$price = $row["price"];
					 		$title = $row["title"];
					 	}
					}

					echo 
						"<div class='col-sm-4'> 
      						<div class='panel panel-primary'>
        						<div class='panel-heading'>". $title ."</div>
        						<div class='panel-body'> <a href='./item.php?item=".$product ."'><img src='./resources/products/" . $images[$i]  . "'class='img-responsive' style='width:100%' alt='Image'></a></div>
       							<div class='panel-footer'>$".$price."</div>
      						</div>
    					</div>";
  			// 		if (($i - 5) % 3 == 0) {
					// 	echo "</div><br>";
					// 	echo "<div class='row'>";
					// }
				}
				//echo "</div>";


			?>
	</div>
	</div>
	<div class="col-1">
    <div class="d-flex flex-row">
    	<div class="p-2">		
	
		</div>
   	</div>
   	<div class="p-2">
  	 		<h2>Products</h2><br>
  	 		<h4><a href="./products.php?cat=hats">Hats</a></h4>
  	 		<h4><a href="./products.php?cat=shirts">Shirts</a></h4>
   		 	<?php
   		 		for ($i = 2; $i < count($images); $i++) {
   		 			$product = substr($images[$i], 0, strlen($images[$i]) - 4);
   		 			echo $product . "<br>";
   		 		}
   		 	?>
   	</div>
</div></div></div>
		
	<?php include './footer.php';?>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>