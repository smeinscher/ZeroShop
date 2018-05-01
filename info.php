<?php
	include './back/authcheck.php';
	include './navbar.php';
	if (!$loggedin) {
		heading('Location: ./login.php');
	}
	$sql = "SELECT * FROM addr WHERE user='{$username}'";
	if ($result = $connection->query($sql)) {
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$line1 = $row["street"];
			$city = $row["city"];
			$state = $row["state"];
			$zipcode = $row["zipcode"];
		}
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Your Information</title>
</head>
<body>
<div class="container">
	<form action="./index.php?ordered" method="POST">	
	  <div class="form-group">
	    <label for="inputAddress">Shipping Address</label>
	    <input type="text" class="form-control" id="inputAddress" value="<?php echo $line1; ?>">
	  </div>
	  <div class="form-row">
	    <div class="form-group col-md-6">
	      <label for="inputCity">City</label>
	      <input type="text" class="form-control" id="inputCity" value="<?php echo $city; ?>">
	    </div>
	    <div class="form-group col-md-4">
	      <label for="inputState">State</label>
	      <select id="inputState" class="form-control">
	        <option selected><?php echo $state; ?></option>
			<option value="AL">Alabama</option>
			<option value="AK">Alaska</option>
			<option value="AZ">Arizona</option>
			<option value="AR">Arkansas</option>
			<option value="CA">California</option>
			<option value="CO">Colorado</option>
			<option value="CT">Connecticut</option>
			<option value="DE">Delaware</option>
			<option value="DC">District Of Columbia</option>
			<option value="FL">Florida</option>
			<option value="GA">Georgia</option>
			<option value="HI">Hawaii</option>
			<option value="ID">Idaho</option>
			<option value="IL">Illinois</option>
			<option value="IN">Indiana</option>
			<option value="IA">Iowa</option>
			<option value="KS">Kansas</option>
			<option value="KY">Kentucky</option>
			<option value="LA">Louisiana</option>
			<option value="ME">Maine</option>
			<option value="MD">Maryland</option>
			<option value="MA">Massachusetts</option>
			<option value="MI">Michigan</option>
			<option value="MN">Minnesota</option>
			<option value="MS">Mississippi</option>
			<option value="MO">Missouri</option>
			<option value="MT">Montana</option>
			<option value="NE">Nebraska</option>
			<option value="NV">Nevada</option>
			<option value="NH">New Hampshire</option>
			<option value="NJ">New Jersey</option>
			<option value="NM">New Mexico</option>
			<option value="NY">New York</option>
			<option value="NC">North Carolina</option>
			<option value="ND">North Dakota</option>
			<option value="OH">Ohio</option>
			<option value="OK">Oklahoma</option>
			<option value="OR">Oregon</option>
			<option value="PA">Pennsylvania</option>
			<option value="RI">Rhode Island</option>
			<option value="SC">South Carolina</option>
			<option value="SD">South Dakota</option>
			<option value="TN">Tennessee</option>
			<option value="TX">Texas</option>
			<option value="UT">Utah</option>
			<option value="VT">Vermont</option>
			<option value="VA">Virginia</option>
			<option value="WA">Washington</option>
			<option value="WV">West Virginia</option>
			<option value="WI">Wisconsin</option>
			<option value="WY">Wyoming</option>
	      </select>
	    </div>
	    <div class="form-group col-md-2">
	      <label for="inputZip">Zip</label>
	      <input type="text" class="form-control" id="inputZip" value="<?php echo $zipcode; ?>">
	    </div>
	  </div>
	  	  <div class="form-group">
	    <label for="inputAddress">Billing Address</label>
	    <input type="text" class="form-control" id="inputAddress2">
	  </div>
	  <div class="form-row">
	    <div class="form-group col-md-6">
	      <label for="inputCity2">City</label>
	      <input type="text" class="form-control" id="inputCity2">
	    </div>
	    <div class="form-group col-md-4">
	      <label for="inputState2">State</label>
	      <select id="inputState2" class="form-control">
	        <option selected></option>
			<option value="AL">Alabama</option>
			<option value="AK">Alaska</option>
			<option value="AZ">Arizona</option>
			<option value="AR">Arkansas</option>
			<option value="CA">California</option>
			<option value="CO">Colorado</option>
			<option value="CT">Connecticut</option>
			<option value="DE">Delaware</option>
			<option value="DC">District Of Columbia</option>
			<option value="FL">Florida</option>
			<option value="GA">Georgia</option>
			<option value="HI">Hawaii</option>
			<option value="ID">Idaho</option>
			<option value="IL">Illinois</option>
			<option value="IN">Indiana</option>
			<option value="IA">Iowa</option>
			<option value="KS">Kansas</option>
			<option value="KY">Kentucky</option>
			<option value="LA">Louisiana</option>
			<option value="ME">Maine</option>
			<option value="MD">Maryland</option>
			<option value="MA">Massachusetts</option>
			<option value="MI">Michigan</option>
			<option value="MN">Minnesota</option>
			<option value="MS">Mississippi</option>
			<option value="MO">Missouri</option>
			<option value="MT">Montana</option>
			<option value="NE">Nebraska</option>
			<option value="NV">Nevada</option>
			<option value="NH">New Hampshire</option>
			<option value="NJ">New Jersey</option>
			<option value="NM">New Mexico</option>
			<option value="NY">New York</option>
			<option value="NC">North Carolina</option>
			<option value="ND">North Dakota</option>
			<option value="OH">Ohio</option>
			<option value="OK">Oklahoma</option>
			<option value="OR">Oregon</option>
			<option value="PA">Pennsylvania</option>
			<option value="RI">Rhode Island</option>
			<option value="SC">South Carolina</option>
			<option value="SD">South Dakota</option>
			<option value="TN">Tennessee</option>
			<option value="TX">Texas</option>
			<option value="UT">Utah</option>
			<option value="VT">Vermont</option>
			<option value="VA">Virginia</option>
			<option value="WA">Washington</option>
			<option value="WV">West Virginia</option>
			<option value="WI">Wisconsin</option>
			<option value="WY">Wyoming</option>
	      </select>
	    </div>
	    <div class="form-group col-md-2">
	      <label for="inputZip2">Zip</label>
	      <input type="text" class="form-control" id="inputZip2">
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="form-check">
	      <input class="form-check-input" type="checkbox" id="gridCheck">
	      <label class="form-check-label" for="gridCheck">
	        Remember my address
	      </label>
	    </div>
	    <div class="form-check">
	      <input class="form-check-input" type="checkbox" id="gridCheck">
	      <label class="form-check-label" for="gridCheck">
	        Shipping address same as billing address
	      </label>
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="form-group col-md-6">
	      <label for="inputCard">Card Number</label>
	      <input type="text" class="form-control" id="inputCity" value="<?php echo $city; ?>">
	    </div>
	    <div class="form-group col-md-4">
	      <label for="inputDate">Exp Date</label>
	      <input type="date" id="inputDate" class="form-control">
	    </div>
	    <div class="form-group col-md-2">
	      <label for="inputCode">Security Code</label>
	      <input type="text" class="form-control" id="inputCode" value="<?php echo $zipcode; ?>">
	    </div>
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
</body>
</html>