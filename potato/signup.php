<?php include 'navbar.php' ?>
<?php include 'error.php' ?>

<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $fname = ucwords($_POST['fname']);
    $lname = ucwords($_POST['lname']);
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $passw = $_POST['passw'];
    $rpassw = $_POST['rpassw'];
    $u_length = strlen($uname);
    
    if(empty($fname))
    {
        $fname_error = TRUE;
    }
    if(empty($lname))
    {
        $lname_error = TRUE;
    }
    if(empty($uname))
    {
        $uname_error = TRUE;
    }
    if(empty($email))
    {
        $email_error = TRUE;
    }
    if(empty($passw))
    {
        $passw_error = TRUE;
    }
    if(empty($rpassw))
    {
        $rpassw_error = TRUE;
    }
    if(!empty($passw) && !empty($rpassw) && $passw != $rpassw)
    {
        $pass_error = TRUE;
    }
    if(!empty($u_length))
    {
        if($u_length > 15 or $u_length < 2)
        {
            $u_len_error = TRUE;
        }
    }
    if (!preg_match("/^[a-zA-z]*$/", $fname))
    {
        $fname_ierror = TRUE;
    }
    if (!preg_match("/^[a-zA-z]*$/", $lname))
    {
        $lname_ierror = TRUE;
    }


    if($fname_error == FALSE && $lname_error == FALSE && $uname_error == FALSE && $email_error == FALSE && $passw_error == FALSE && $rpassw_error == FALSE)
    {
            $info = [$fname, $lname, $uname, $email, $passw];
            $sql = "INSERT INTO `information`(`Firstname`, `Lastname`, `Username`, `Email`, `Password`) VALUES (?, ?, ?, ?, ?)";
            $nth = $php->prepare($sql);
            $nth->execute($info);
            $signed = TRUE;
    }
    else
    {
        $error = TRUE;
    }
}
?>

<div class="container bg-dark mt-3 border border-info border-2 rounded">    

    <div class=" mt-4  mb-2">
        <h1 class="text-center text-light"> <u>Sign up</u> </h1>
    </div>

    <form method="POST">
        <div class="row justify-content-start mb-2 ms-5">
           <div class="col-8">
               <label class="form-label h4 text-light">Name</label>
               <div class="row">
                    <div class="col-6">
                        <input type="text" placeholder="First Name" name="fname" class="form-control
                        <?php
                            if($fname_error==TRUE) {echo "border border-danger border-2";}
                            elseif($fname_ierror==TRUE) {echo "border border-warning border-2";}
                        ?> " value="<?php if(!empty($fname)){echo $fname;} ?>"> 
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control <?php
                            if($lname_error==TRUE) {echo "border border-danger border-2";}
                            elseif($lname_ierror == TRUE) {echo "border border-warning border-2";}
                        ?>"
                        placeholder="Last Name" name="lname" value="<?php if(!empty($lname)){echo $lname;} ?>">
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
					?>" placeholder="Username123" name="uname"value="<?php if(!empty($uname)){echo $uname;} ?>">
			</div>
		</div>

       <div class="row justify-content-start ms-5">
            <div class="col-6">
                <label class="form-label h4 text-light">Email</label>
                <input type="text" class="form-control <?php if($email_error==TRUE) {echo "border border-danger border-2";} ?>" placeholder="abc@example.com" name="email">
            </div>
            <div class="col-6">
                <?php if($signed == TRUE) { ?>
                    <div class="alert alert-success text-success ms-5 me-5 text-center border border-success">
                        You are now signed! Click here to<a href="login.php"> login.</a>
                    </div>
                <?php } ?>

                <?php if($error == TRUE) { ?>
                    <div class="alert alert-danger text-danger ms-5 me-5 text-center border border-danger">
                        Please fill boxes with red outline.
                    </div>
                <?php } ?>
            </div>
       </div>

       
       <div class="row justify-content-start mt-2 ms-5">
            <div class="col-6">
                <label class="form-label h4 text-light">Password</label>
                <input type="password" class="form-control <?php
                    if($passw_error==TRUE) {echo "border border-danger border-2";}
                    elseif(!empty($passw) && $pass_error == TRUE) {echo "border border-warning border-2";}
                    ?>"
                    placeholder="Enter a password" name="passw">
            </div>

            <div class="col-6">
            <?php if($pass_error == TRUE) { ?>
                    <div class="alert alert-warning text-warning ms-5 me-5 text-center border border-warning">
                        Password did not match. 
                    </div>
                <?php } ?>

                <?php if($u_len_error == TRUE) { ?>
                    <div class="alert alert-warning text-warning ms-5 me-5 text-center border border-warning">
                        Username should be more that 2 and less than 8 characters.
                    </div>
                <?php } ?>
            </div>
       </div>

       <div class="row justify-content-start mt-2 ms-5">
            <div class="col-6">
                <label class="form-label h4 text-light">Re-enter Password</label>
                <input type="password" class="form-control
                <?php
                    if($rpassw_error==TRUE) {echo "border border-danger border-2";}
                    elseif(!empty($rpassw) && $pass_error == TRUE) {echo "border border-warning border-2";}
                ?>"
                placeholder="Re-enter the password" name="rpassw">
            </div>
       </div>

       <div class="row justify-content-start mt-2 ms-5">
           <div class="form-check">
               <input type="checkbox" class="form-check-input" checked>
               <label class="form-check-label text-light">I accept to sign up.</label>
           </div>
       </div>

        <div class="row justify-content-between mt-2">
            <div class="col-auto ms-5 mt-3">
                <label class="text-light h5">Already signed in? <a href="login.php" class="text-info">Login.</a> </label>
            </div>
            <div class="col-auto me-2 mt-5">
                <input type="submit" name = "signup" value = 'Signup' class="btn btn-outline-success">
                <a href="signup.php"class="btn btn-outline-danger" title="Discard">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                    </svg>
                </a>
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