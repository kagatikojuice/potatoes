<?php include 'database/config.php' ?>
<?php 
	if(isset($_POST['add']))
	{
		$name = ucwords($_POST['name']);
		echo $name;
	}
?>
<html>
	<head>
		<title>
			Add
		</title>
	</head>
	<body>
		<form method="POST">
			<label >Name</label>
			<input type="text" name="name" value="<?php if(!empty($name)){echo $name;} ?>">
			<label >Address</label>
			<input type="text" name="name" value="<?php if(!empty($name)){echo $name;} ?>">
			<input type="submit" name="add" value="Add">
		</form>
	</body>
</html>