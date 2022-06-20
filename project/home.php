<?php
	include 'session.php';

	include 'header.php';

	include 'navbar.php';

	$un = $_GET['un'];
?>
	
	<div class="container mt-4 text-primary">
		<h3>Hi, <span class="text-info" style="font-style: italic; font-family: Verdana;"><?php echo $un; ?></span>. </h3>
	</div>
<?php 
	include 'end.php';
?>