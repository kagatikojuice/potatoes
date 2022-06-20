<?php 
	include 'connection.php';
	session_start();
	
	if(!isset($_SESSION['uname'])){
		header("location:index.php");
	}
 ?>