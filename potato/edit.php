<?php include 'navbar.php'; include 'error.php'?>
<?php 
	include 'database/config.php';

	$un = $_GET['un'];
	$sql = "SELECT * FROM information WHERE Username = :un";
	$edit = $php->prepare($sql);
	$edit->bindParam(':un', $un);
	$edit->execute();
	$show = $edit->fetch(PDO::FETCH_OBJ);

	if(isset($_POST['save']))
	{
		$u_fname = ucwords($_POST['u_fname']);
		$u_lname = ucwords($_POST['u_lname']);
		$u_uname = $_POST['u_uname'];
		$u_email = $_POST['u_email'];
		$o_passw = $_POST['o_passw'];
		$u_passw = $_POST['u_passw'];
		$u_rpassw = $_POST['u_rpassw']; 

		if(empty($u_fname))
		{
			$fname_error =  TRUE;
		}
		if(empty($u_fname))
		{
			$lname_error =  TRUE;
		}
		if(empty($u_uname))
		{
			$uname_error =  TRUE;
		}
		if(empty($u_email))
		{
			$email_error =  TRUE;
		}

		if($fname_error == FALSE && $lname_error == FALSE && $uname_error == FALSE && $email_error == FALSE)
		{
			$query = "UPDATE information
								SET Firstname='$u_fname', Lastname='$u_lname', Username='$u_uname'
								WHERE Username = :un";
			$hck = $php->prepare($query);
			$hck->bindParam(':25oun', $un);
			$hck->execute();
			header('location:data.php');
		}
	}
?>

<div class="container bg-dark mt-3 border border-info border-2 rounded">
	
	<div class=" mt-4  mb-2">
		<h1 class="text-center text-light"> <u>Edit</u> </h1>
	</div>

	<form method="POST">
		<div class="row justify-content-start mb-2 ms-5">
		<div class="col-8">
			<div class="row">
					<div class="col-6">
						<label class="form-label h4 text-light">Firstname</label>
						<input type="text" placeholder="<?php echo $show->Firstname; ?>" name="u_fname" class="form-control
						<?php
							if($fname_error==TRUE) {echo "border border-danger border-2";}
							elseif($fname_ierror==TRUE) {echo "border border-warning border-2";}
						?> " value="<?php if(!empty($u_fname)){echo $u_fname;} ?>"> 
					</div>
					<div class="col-6">
						<label class="form-label h4 text-light">Lastname</label>
						<input type="text" class="form-control <?php
							if($lname_error==TRUE) {echo "border border-danger border-2";}
							elseif($lname_ierror == TRUE) {echo "border border-warning border-2";}
						?>"
						placeholder="<?php echo $show->Lastname; ?>" name="u_lname" value="<?php if(!empty($u_lname)){echo $u_lname;} ?>">
					</div>
			</div>
		</div>
		</div>

		<div class="row mt-2 mb-2 ms-5">
			<div class="col-6">
				<label class="form-label h4 text-light">Username</label>
				<input type="text" class="form-control <?php
					if($uname_error==TRUE) {echo "border border-danger border-2";} 
					elseif($u_len_error == TRUE){echo "border border-warning border-2";}
					?>" placeholder="<?php echo $show->Username; ?>" name="u_uname" value="<?php if(!empty($u_uname)){echo $u_uname;} ?>">
			</div>
		</div>

	<div class="row justify-content-start ms-5">
			<div class="col-6">
				<label class="form-label h4 text-light">Email</label>
				<input type="text" class="form-control <?php if($email_error==TRUE) {echo "border border-danger border-2";} ?>" placeholder="<?php echo $show->Email; ?>" name="u_email">
			</div>

		<div class="row justify-content-start mt-2">
			<div class="col-6">
				<label class="form-label h4 text-light">Old password</label>
				<input type="password" class="form-control <?php
					if($passw_error==TRUE) {echo "border border-danger border-2";}
					elseif(!empty($passw) && $pass_error == TRUE) {echo "border border-warning border-2";}
					?>"
					placeholder="Enter a password" name="o_passw" value="<?php echo $show->Password; ?>">
			</div>
	</div>

	<div class="row justify-content-start mt-2">
			<div class="col-4">
				<label class="form-label h4 text-light">New password</label>
				<input type="password" class="form-control
				<?php
					if($rpassw_error==TRUE) {echo "border border-danger border-2";}
					elseif(!empty($rpassw) && $pass_error == TRUE) {echo "border border-warning border-2";}
				?>"
				placeholder="Re-enter the password" name="u_passw">
			</div>
			<div class="col-4">
				<label class="form-label h4 text-light">Re-enter new password</label>
				<input type="password" class="form-control
				<?php
					if($rpassw_error==TRUE) {echo "border border-danger border-2";}
					elseif(!empty($rpassw) && $pass_error == TRUE) {echo "border border-warning border-2";}
				?>"
				placeholder="Re-enter the password" name="u_rpassw">
			</div>
	</div>

		<div class="row justify-content-between mt-2">
			<div class="col-auto ms-5 mt-3">
			</div>
			<div class="col-auto me-2 mt-5">
				<a href="data.php" class="btn btn-outline-danger" title="Go back" onclick="return confirm('Exit without saving?')">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
					</svg>
				</a>
				<input type="submit" name = "save" value = 'Save' class="btn btn-outline-success" title="Save the edited data">
				<a href="index.php" class="btn btn-outline-primary" title="Go to home">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/><path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
					</svg>
				</a>
			</div>
		</div>
	</form>
</div>
<?php include 'end.php' ?>