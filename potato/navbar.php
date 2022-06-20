<?php include 'database/config.php' ?>

<html>
    <head>
        <title>
            |Bootstrap|
        </title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body style="background-color: grey;">

        <nav class="navbar navbar-expand navbar-dark bg-dark border border-info border-2 mt-1 rounded ms-1 me-1 mb-1">
            <div class="container-fluid">
                <h2 class="text-light ms-4">Potato</h2>
                <ul class="nav navbar-nav mb-2 me-3">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Home page</a>
                    </li>
                    <li class="nav-item">
                         <a href="signup.php" class="nav-link">Sign in</a>
                     </li>
                     <li class="nav-item">
                        <a href="login.php" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="data.php" class="nav-link">Signed in list</a>
                    </li>
                </ul>
            </div>
        </nav>
