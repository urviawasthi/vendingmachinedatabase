<?php 
	//creating a hash function
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
	
	
	session_start();

	//checks if username and password are in database. if not, directs user to register. if so, directs user to starter page
	include "config.php";
	$un = $_POST['username'];
	$_SESSION["username"] = $un;
	$pw = encrypt($_POST['password']);
	mysqli_select_db($conn, 'login');
	$sql="SELECT * FROM register WHERE username='$un' AND password = '$pw'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) == 0) {//checks to see if username is not there
		header("Location: notregistered1.php");
		exit;			
	} 
	else {
		$sql="SELECT * FROM register WHERE username= '$un' AND password = '$pw'"; //checks to see if the person has an account
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) == 1){ 
			header("Location: starter.php");
			exit;
		}
	}
			

?>
