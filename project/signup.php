<?php
	include 'header.php';
	include 'error.php';
	include 'connection.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$fname = ucwords($_POST['fn']);
		$lname = ucwords($_POST['ln']);
		if(!empty($_POST['gender'])){
			$gender = $_POST['gender'];
			if($gender == 'male'){
			$gen_der = 'Male';
			}else{
				$gen_der = 'Female';
			}
		}
		$uname = $_POST['un'];
		$passw = $_POST['pw'];
		$rpassw = $_POST['rpw'];
		$u_len = strlen($uname);
		
//validations;
		if(empty($fname)){
			$fn_empty = TRUE;
		}
		if(empty($lname)){
			$ln_empty = TRUE;
		}
		if(empty($gender)){
			$g_empty = TRUE;
		}
		if(empty($uname)){
			$un_empty = TRUE;
		}
		if(empty($passw)){
			$pw_empty = TRUE;
		}
		if(empty($rpassw)){
			$rpw_empty = TRUE;
		}
		 if (!preg_match("/^[a-zA-z]*$/", $fname)){
	        $fn_ierror = TRUE;
	    }
	    if (!preg_match("/^[a-zA-z]*$/", $lname)){
	        $ln_ierror = TRUE;
	    }
	    if ($u_len > 15 or $u_len < 3){
	    	$u_len_error = TRUE;
	    }
	    if ($passw != $rpassw) {
	    	$pw_error = TRUE;
	    }
	    if(empty($fname) or empty($lname) or empty($gender) or empty($uname) or empty($passw) or empty($rpassw)){
	    	$fill_error = TRUE;
	    }

		if($fn_empty == FALSE && $ln_empty == FALSE && $g_empty == FALSE && $un_empty == FALSE && $pw_empty == FALSE &&
			$rpw_empty == FALSE && $fn_ierror == FALSE && $ln_ierror == FALSE && $u_len_error == FALSE && $pw_error == FALSE){
			$data = [$fname, $lname, $gen_der, $uname, $passw];
			$query = "INSERT INTO users (Firstname, Lastname, Gender, Username, Pwd) VALUES (?, ?, ?, ?, ?)";
			$insert = $usr->prepare($query);
			$insert->execute($data);
			header('location:index.php');
		}
	}
?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-auto">
			<div class="card mt-4 border-3 border-info border" style="width: 18cm;">
				<div class="card-body">
					<h1 class="card-title text-info text-center">Sign up</h1>
					<h6 class="card-subtitle text-info text-center">Fill up to Sign in</h6>

					<form method="POST">
						<div class="row">
							<div class="col-6">
								<label class="form-label h4 mt-4 text-info">Firtsname:</label>
								<input type="text" name="fn" class="form-control border-2 border-info border text-info
								<?php if($fn_empty == TRUE or $fn_ierror == TRUE){echo 'border-danger border-2';} ?>"
								value="<?php if(!empty($fname)){echo $fname;} ?>">
								<?php if($fn_ierror == TRUE){ ?>
										<label class="text-danger">Invalid Firstname</label>
								<?php } ?>
							</div>
							
							<div class="col-6">
								<label class="form-label h4 mt-4 text-info">Lastname:</label>
								<input type="text" name="ln" class="form-control border-2 border-info border text-info
								<?php if($ln_empty == TRUE or $ln_ierror == TRUE){echo 'border-danger border-2';} ?>"
								value="<?php if(!empty($lname)){echo $lname;} ?>">
								<?php if($ln_ierror == TRUE){ ?>
										<label class="text-danger">Invalid Lastname</label>
								<?php } ?>
							</div>
						</div>

						<div class="row">
							<div class="col-auto">
								<label class="form-label h4 mt-2 text-info">Gender:</label>
								<div class="form-check form-check-inline ms-3">
									<input type="radio" name="gender" value="male" class="form-check-input border-info">
									<label class="form-check-label text-info">Male</label>
								</div>

								<div class="form-check form-check-inline">
									<input type="radio" name="gender" value="female" class="form-check-input border-info">
									<label class="form-check-label text-info">Female</label>
								</div>
								<?php if($g_empty == TRUE){ ?>
								<label class="text-danger">[*required*]</label>
								<?php } ?>
							</div>
						</div>

						<div class="row">
							<div class="col-6">
								<label class="form-label h4 mt-2 text-info">Username:</label>
								<input type="text" name="un" class="form-control border-2 border-info border text-info
								<?php if($un_empty == TRUE or $u_len_error == TRUE){echo 'border-danger border-2';} ?>"
								value="<?php if(!empty($uname)){echo $uname;} ?>">
								<?php if($u_len_error == TRUE && !empty($uname)){ ?>
										<label class="text-danger">Username too short or too long</label>
								<?php } ?>
							</div>
						</div>

						<div class="row">
							<div class="col-6">
								<label class="form-label h4 mt-2 text-info">Password:</label>
								<input type="password" name="pw" class="form-control border-2 border-info border text-info
								<?php if($pw_error == TRUE){echo 'border-danger border-2';} elseif($pw_empty == TRUE){echo 'border-danger border-2';} ?>">
							</div>
							<div class="col-6">
								<label class="form-label h4 mt-2 text-info">Re-enter Password:</label>
								<input type="password" name="rpw" class="form-control border-2 border-info border text-info
								<?php if($pw_error == TRUE){echo 'border-danger border-2';} elseif($pw_empty == TRUE){echo 'border-danger border-2';} ?>">
								<?php if($pw_error == TRUE){ ?>
										<label class="text-danger">Password didn't match</label>
								<?php } ?>
							</div>
						</div>

						<div class="row mt-4 justify-content-between">
							<div class="col-auto">
								<input type="submit" class="btn btn-info text-light" value="Sign up">
							</div>
							<div class="col-auto mt-auto">
								<label class="text-info">Already signed in?</label><a href="index.php" class="text-secondary">Login.</a>
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
							<div class="row justify-content-center">
<!--Alerts-->
								<div class="col-auto mt-1">
									<?php if($fill_error == TRUE){ ?>
									<div class="alert alert-danger border-danger border-2 mb-auto">
										*Fill all boxes*
									</div>
									<?php } ?>
								</div>
							</div>
<!--end of Alerts-->
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>

<?php include'end.php' ?>
