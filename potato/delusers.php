<?php
	include 'database/config.php';

	$username = $_GET['un'];

	$sql = "DELETE FROM information WHERE Username = :un";
	$del = $php->prepare($sql);
	$del->bindParam(':un', $username);
	$del->execute();

	header('location:data.php');
	
?>
<a href="data.php">Go back</a>