<?php

$con = mysqli_connect("localhost","root","","hospital");
if(!$con)
{
    die("Connection failed: " . mysqli_connect_error());
}
?>