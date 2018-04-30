<?php
	if(!isset($connection)){
		$connection = new mysqli("localhost", "root", "Zero", "Zero");

		if($connection->connect_error){
			die("MySql Connection Failed" . $connection->connection_error);
		}
	}
?>