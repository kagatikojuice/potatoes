<?php
	include 'connection.php';

	$username = $_GET['un'];

	$sql = "DELETE FROM users WHERE Username = :un";
	$del = $usr->prepare($sql);
	$del->bindParam(':un', $username);
	$del->execute();

	header('location:list.php');
	
?>