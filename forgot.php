<?php 
	include './navbar.php';
	$subject = "Password Recovery";
	$msg = "test";
	$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: sterling@meinscher.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion(); 
	if(isset($_GET["sent"])) {
		if (!mail($_POST["email"], $subject, $msg, $headers)){
			echo '<div class="alert alert-danger"><i class="fa fa-check"></i>Could not send email</div>';
		} else {
			echo '<div class="alert alert-info"><i class="fa fa-check"></i>Email sent</div>';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Password Recovery</title>
</head>
<body>
<br>
<div class="container">
	<form action='./forgot.php?sent' method="POST">
		<div class="form-row">
			<div class="col-6">
				<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
			</div>
			<div class="col-2">
				<input type="submit" class="btn btn-primary" name="submit" value="Send Email">
			</div>
		</div>
	</form>
</div>
<?php include './footer.php'; ?>
</body>
</html>