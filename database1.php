<!DOCTYPE html>
<html>
<head>	
	<link rel = "stylesheet" type = "text/css" href = "style1.css">
	
	<?php 
 
	//hash function
	/*
	function encrypt($text) 
	{
		$newText = 0; 
		$text = strval ($text); 
		for ($i = 0; $i< strlen($text); $i++)
		{
			$newText = implode(unpack('n', mb_convert_encoding($text, 'UTF-16BE', 'UTF-8')));
		}
		
		return $newText; 
	}
	*/
	
	//inserts user information into login database
		include "config.php";
		mysqli_select_db($conn, 'login');//chooses the database
		
		// sql to create table
		$un= $_POST['username'];
		$pw= $_POST['password'];
		$fn= $_POST['fullname'];

		$sql = "INSERT INTO register (fullname, username, password)
		VALUES('$fn','$un','$pw')";

		mysqli_query($conn, $sql);

	?>
</head>
<body>
<h3> Your information has been created, please go back to the login page. </h3>
		<form action = "index.php">
			<input type = "submit" id = "submit" name  = "submit" value = "Go back to login"> 	<!-- Button to go back to log in -->
		</form>
</body>
</html>
