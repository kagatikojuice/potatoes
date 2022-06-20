<?php 
	$host = "localhost";
	$db_name = "user";
	$username = "root";
	$password = "";

	try{
		$usr = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
	}catch(Exception $e){
		echo $e->getMessage();
	}
?>