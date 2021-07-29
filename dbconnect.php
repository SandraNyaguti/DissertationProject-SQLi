<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "accounts";




if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("oops, something went wrong!");
}

?>