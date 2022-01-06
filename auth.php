<?php

$a = isset($_SESSION["admin"]);
$b = isset($_SESSION["patient"]);
$c = isset($_SESSION["doctor"]);

if('a!=1' || 'b!=1' || 'c!=1')
{
	header("Location: login.php");
	exit(); 
}


?>
