<?php
	if(!isset($_SESSION))
	{
		session_start();
	}
	date_default_timezone_set("Europe/Zagreb");
	setlocale(LC_ALL,'croatian');

	$host="localhost";
	$username="root";
	$password="usbw";
	$database="njewz";
	
	$DBCON = mysqli_connect($host, $username, $password, $database)or die("cannot connect"); 
	
	$PortalTitle = "Njewz";

?>