<?php 

	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "canli_destek";

	$connection = new mysqli($servername, $username, $password, $database);

	if ($connection->connect_error) {
	    die("Connection failed: " . $connection->connect_error);
	}

	mysqli_query($connection, "SET NAMES UTF8");
	
	session_start();
	ob_start();

?>