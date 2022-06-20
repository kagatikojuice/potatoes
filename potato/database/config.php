<?php

$host = "localhost";
$db_name = "signup";
$username = "root";
$password = "";

try{
    $php = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
}
catch(Exception $e)
{
    echo $e->getMessage();
}