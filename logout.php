<?php  
session_start();//session is a way to store information (in variables) to be used across multiple pages.  
unset($_SESSION["admin"]);  
header("Location: login.php");//use for the redirection to some page  
?>
