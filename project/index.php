<?php
//session start;
	session_start();
//header;
	include 'header.php';
//connection with database;
	include 'connection.php';
//error.php;
	include 'error.php';
//...
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$un = $_POST['un'];
		$pw = $_POST['pw'];
//Validations;
		if(empty($un)){
			$un_empty = TRUE;
		}
		if(empty($pw)){
			$pw_empty = TRUE;
		}

		if($pw_empty == FALSE && $un_empty == FALSE){
			$sql = "SELECT * FROM users WHERE Username = :un";
			$login = $usr->prepare($sql);
			$login->bindParam(':un', $un);
			$login->execute();

			if($login->rowCount() > 0){
				$fetch = $login->fetchAll();

				foreach ($fetch as $data) {
					 $uname = $data['Username'];
					 $passw = $data['Pwd'];
				}
//password validation;
				if($passw == $pw){
					$_SESSION['uname'] = $un;
					header('location:home.php?un= '.$un);
				}else{
				$pw_error = TRUE;
				}
			}else{
				$un_error = TRUE;
			}
		}
	}
?>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-auto">
					<div class="card mt-4 border-3 border-info border" style="width: 18cm;">
						<div class="card-body">
							<h1 class="card-title text-info text-center">Login</h1>
							<h6 class="card-subtitle text-info text-center">Fill up to login</h6>

							<form method="POST">
								<div class="row">
									<label class="form-label h4 mt-4 text-info">Username:</label>
									<div class="col-8">
										<input type="text" name="un" class="form-control border-2 border-info border text-info
										<?php if($un_empty == TRUE){echo 'border-danger border-2';} ?>"
										value="<?php if(!empty($un)){echo $un;} ?>">
									</div>
									<a href="index.php" class="text-info">Forgot username?</a>
								</div> 

								<div class="row">
									<label class="form-label h4 mt-4 text-info">Password:</label>
									<div class="col-8">
										<input type="password" name="pw" class="form-control border-2 border-info border text-info
										<?php if($pw_empty == TRUE){echo 'border-danger border-2';} ?>">
									</div>
									<div class="col-auto text-danger mt-auto mb-auto">
									</div>
									<a href="index.php" class="text-info">Forgot password?</a>
								</div>

								<div class="row">
									<div class="col-8">
										<div class="form-check mt-4 text-info">
											<input type="checkbox" class="form-check-input border-info bg-info btn-info me-2"> Remember me
										</div>
									</div>
								</div>

								<div class="row mt-2 justify-content-between">
									<div class="col-auto">
										<input type="submit" class="btn btn-info text-light" value="Login">
									</div>
									<div class="col-auto mt-auto">
										<label class="text-info">Not signed in?</label><a href="signup.php" class="text-secondary">Signup.</a>
									</div>
								</div>
								<div class="row justify-content-end">
									<div class="col-auto mt-2">
										<a href="home.php" class="text-secondary">Go to home.</a>
									</div>
								</div>
								<div class="row justify-content-end">
									<div class="col-auto mt-2">
										<a href="logout.php" class="text-secondary">Logout</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

<!--Alert-->
			<div class="row justify-content-center">
				<div class="col-auto mt-1">
					<?php if($un_empty == TRUE){ ?>
					<div class="alert alert-danger border-danger border-2">
						*Username is required*
					</div>
					<?php } ?>
				</div>

				<div class="col-auto mt-1">
					<?php if($pw_empty == TRUE){ ?>
					<div class="alert alert-danger border-danger border-2">
						*Password is required*
					</div>
					<?php } ?>
				</div>

				<div class="col-auto mt-1">
					<?php if($un_error == TRUE){ ?>
					<div class="alert alert-danger border-danger border-2 text-center">
						*No username [<?php echo $un; ?>] found.* <br>
						Signup from <a href="signup.php">here.</a>
					</div>
					<?php } ?>
				</div>

				<div class="col-auto mt-1">
					<?php if($pw_error == TRUE){ ?>
					<div class="alert alert-danger border-danger border-2">
						*Incorrect Password*
					</div>
					<?php } ?>
				</div>
			</div>
<?php include 'end.php' ?>