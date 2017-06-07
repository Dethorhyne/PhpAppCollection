<?php
if(!isset($_GET['tab']))
{
	header("location:/1/");
}
else if($_GET['tab'] < 1 )
{
	header("location:/1/");
}
else if($_GET['tab'] > 4 )
{
	header("location:/4/");	
}
?>