<?php
	$loggedin = FALSE;
	$user_level = 2;
	if(isset($_COOKIE["auth_token"])){
		include("database.php");
		$sql = "SELECT user, token FROM tokens WHERE token = '{$_COOKIE['auth_token']}'";
		if($result = $connection->query($sql)){
			if($result->num_rows > 0) {
				$row = $result->fetch_array();
				$loggedin = TRUE;
				//$userlevel = $row["user_level"];
				$username = $row[0];
			} else {
				setcookie("auth_token", "", time()-3600);
			}
		} else {
			setcookie("auth_token", "", time()-3600);
		}
	}
?>