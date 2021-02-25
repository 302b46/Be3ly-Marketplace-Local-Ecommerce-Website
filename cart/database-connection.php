<?php

session_start();
//connecting to database

$conn = mysqli_connect('localhost', 'root', '', 'be3ly');

if (!$conn)
{
	die ( "connection failed".mysqli_connect_error());
}
?>
