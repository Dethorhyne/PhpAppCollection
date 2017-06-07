<?php
session_start();

$dbHost="localhost";
$dbUser="root";
$dbPassword="usbw";
$dbName="shardshop";
		
mysql_connect($dbHost, $dbUser, $dbPassword)or die("cannot connect"); 
mysql_select_db($dbName)or die("cannot select DB");

function websiteName($tab) 
{
	switch ($tab)
	{
		case 1: $name = "WarZ remake models - Shard Market";
				break;
		case 2: $name = "New models - Shard Market";
				break;
		case 3: $name = "WarZ remake sets - Shard Market";
				break;
		case 4: $name = "New model sets - Shard Market";
				break;
		default:$name = "Shard Market";
				break;			
	}
	return $name;
}

?>