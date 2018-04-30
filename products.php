<!DOCTYPE html>
<html>
<head>
	<title>Products Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
	<?php include './back/authcheck.php'; include './navbar.php'; $images = scandir("./resources/products"); ?>
	<br>
	<div class="container-fluid">
	<div class="row">
	<div class="col-9">
  	<div class="row">
    	<div class="col-sm-4">
      		<div class="panel panel-primary">
        		<div class="panel-heading">SUMMER DEAL</div>
        		<div class="panel-body"><img src=<?php echo '"./resources/products/' . $images[2] . '"'?> class="img-responsive" style="width:100%" alt="Image"></div>
        		<div class="panel-footer"><strike>$19.99</strike> $10.99</div>
      		</div>
    	</div>
    	<div class="col-sm-4"> 
      		<div class="panel panel-danger">
        		<div class="panel-heading">POPULAR</div>
        		<div class="panel-body"><img src=<?php echo '"./resources/products/' . $images[3] . '"'?>  class="img-responsive" style="width:100%" alt="Image"></div>
        	<div class="panel-footer">$19.99</div>
      	</div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-success">
        <div class="panel-heading">NEW</div>
        <div class="panel-body"><img src=<?php echo '"./resources/products/' . $images[4] . '"'?>  class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">$19.99</div>
      </div>
    </div>
  </div><br>
<!-- </div><br> -->

<!-- <div class="container-fluid"> -->
	<div class="row">    
        	<?php 
				
				//echo "<div class='d-flex justify-content-center'>";
				for ($i = 5; $i < count($images); $i++) {
					$product = substr($images[$i], 0, strlen($images[$i]) - 4);

					echo 
						"<div class='col-sm-4'> 
      						<div class='panel panel-primary'>
        						<div class='panel-heading'>". $product ."</div>
        						<div class='panel-body'> <img src='./resources/products/" . $images[$i]  . "'class='img-responsive' style='width:100%' alt='Image'></div>
       							<div class='panel-footer'>$19.99</div>
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