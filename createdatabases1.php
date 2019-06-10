<?php
	# PART 1: creating a login database and a table called register where the user's data will be stored
	include "config.php";
	$sql = "CREATE DATABASE login"; //creates database
	mysqli_query($conn, $sql); 
	mysqli_select_db($conn, 'login');//chooses the database
		
	// sql to create register table here so that when you register it is already made for you 
	$sql = "CREATE TABLE register(
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		fullname VARCHAR(100) NOT NULL,
		username VARCHAR(100) NOT NULL,
		password VARCHAR(100) NOT NULL,
		)";
	mysqli_query($conn, $sql);

	// PART 2: creating a vending machine database and importing data into this database from a premade SQL file 
	$sql = "CREATE DATABASE vending_machines"; //creates database 
	mysqli_query($conn, $sql); 
	mysqli_select_db($conn, 'vending_machines');//chooses the database

	//importing data.sql into the vending_machines database
	$templine = '';
	$lines = file('data.sql');
	foreach ($lines as $line) {
	// Skip it if it's a comment
		if (substr($line, 0, 2) == '--' || $line == '')
			continue;
	// Add this line to the current segment
		$templine .= $line;
	// If it has a semicolon at the end, it's the end of the query
		if (substr(trim($line), -1, 1) == ';') {
			mysqli_query($conn, $templine);
			$templine = '';
		}
	}

	mysqli_select_db($conn, 'login');//chooses the database

?>