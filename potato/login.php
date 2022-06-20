<?php include 'navbar.php' ?>

<div class="container mt-3 border border-info bg-dark border-2 rounded">

    <div class=" mt-4 mb-2">
        <h1 class="text-light text-center"> <u>Login</u> </h1>
    </div>

    <form>

	<div class="row mt-2 mb-2 ms-5">
		<div class="col-6">
			<label class="form-label h4 text-light">Username</label>
			<input type="text" class="form-control " placeholder="Username123">
			<label class="text-light h6"><a href="signup.php" class="text-info">Forgot username?</a> </label>
		</div>
		</div>

        <div class="row justify-content-start mt-2 ms-5">
            <div class="col-6">
                <label class="form-label h4 text-light">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password">
				<label class="text-light h6"><a href="signup.php" class="text-info">Forgot password?</a> </label>
            </div>
       </div>

       <div class="row justify-content-start mt-2 ms-5">
           <div class="form-check">
               <input type="checkbox" class="form-check-input">
               <label class="form-check-label text-light">Remember me.</label>
           </div>
       </div>

       <div class="row justify-content-between mt-2">
            <div class="col-auto ms-5">
				<label class="text-light h5">Don't have an account? <a href="signup.php" class="text-info">Sign up.</a> </label> 
            </div>
            <div class="col-auto me-2 mt-auto">
                <button class="btn btn-outline-success">Login</button>
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