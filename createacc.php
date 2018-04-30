<?php
 	if (isset($_GET["submit"])) {
		if (!$_POST["email"] || !$_POST["pwd"]) {
	      echo ('<div class="alert alert-danger" role="alert">
	      Enter a username and password.
	      </div>');
	      die;	    
	  	}
	    /* MySQL database info */
	    $host = "localhost";
	    $user = "root";
	    $password = "Zero";
	    $database = "Zero";
	    /* index/home page of ZeroShirts */
	    $home = "./index.php";
	    $con = new mysqli($host, $user, $password, $database);
	    if ($con->connection_error) {
	      die("Connection failed: " . $con->connect_error);
	    } 

	    $email = $_POST["email"];
	    $pass = $_POST["pwd"];
	    $pass2 = $_POST["pwd2"];
	    if (strcmp($pass, $pass2) != 0) {
	   		echo ('<div class="alert alert-danger" role="alert">
	      	Passwords do not match. Try again.
	      	</div>');
	      	die;
		}
		$sql = 'SELECT * FROM users WHERE name="' . $email . '";';
	    $res = $con->query($sql);
	    if ($res->num_rows != 0) {
	      echo ('<div class="alert alert-danger" role="alert">
	      Email already being used. Please try again.
	      </div>');
	      die;
	    }
	    $sql = 'INSERT INTO users(name, password) VALUES ("' . $email . '", "' . hash('sha256', $pass) . '");';
	    $res = $con->query($sql);
	   	$sql = 'SELECT * FROM users WHERE name="' . $email . '";';
	    $res = $con->query($sql);
	    if ($res->num_rows <= 0) {
	      echo ('<div class="alert alert-danger" role="alert">
	      An unexpected error occured. Please try again.
	      </div>');
	      die;
	    }
	   	header('Location: ./login.php?newacc');
	}
?>
<html>
<head>
	<title>Create an Account</title>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<?php include './navbar.php'; ?>
	<br>
	<div class="container body-content">
		<form class="form-horizontal" action="./createacc.php?submit" method="POST">
	        <div class="form-group row">
	        	<span class="col-sm-3"></span>
	            <label class="control-label col-sm-1" for="email">Email:</label>
	            <div class="col-sm-5">
	                <?php if(!$login_error): ?>
	                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
	                <?php else: ?>
	                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $_POST['email']?>" autofocus>
	                <?php endif ?>
	            </div>
	        </div>
	        <div class="form-group row">
	        	<span class="col-sm-3"></span>
	            <label class="control-label col-sm-1" for="pwd">Password:</label>
	            <div class="col-sm-5">
	                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
	            </div>
	        </div>
	        <div class="form-group row">
	        	<span class="col-sm-3"></span>
	            <label class="control-label col-sm-1" for="pwd">Retype Password:</label>
	            <div class="col-sm-5">
	                <input type="password" class="form-control" id="pwd2" placeholder="Retype password" name="pwd2">
	            </div>
	        </div>
	        <div class="form-group row">
	        	<span class="col-sm-4"></span>
	            <div class="col-sm-8">
	                <button type="submit" class="btn btn-primary">Submit</button>
	            </div>
	    	</div>
	    </form>
	</div>
	<?php include './footer.php';?>
<!-- 	<div class="container">
    <form action="" method="post">
	     Username
	    <div class="form-group row">
	        <input type="text" class="form-control" name="username" aria-describedby="usernameHelp" placeholder="Enter Username">
	      </div>
	      
	      
	      <div class="form-group row">
	      	Password:
	      	<div class="col-sm-5">
	        <input type="password" class="form-control" name="password" placeholder="Password">
	      	</div>
	      </div>
	      Retype Password
	      <div class="form-group row">
	        <input type="password" class="form-control" name="password2" placeholder="Retype Password">
	      </div>

	      <button type="submit" class="btn btn-primary">Submit</button>
	    </form>

 	</div> -->

  	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>