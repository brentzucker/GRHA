<?php

$con = mysqli_connect("localhost", "root", "", "ghra_database");

//Check connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else 
{
	//echo "connected";
}

function getConnection()
{
	global $con;
	return $con;
}
?>
