<?php

if(isset($_POST['saveProfileInfo']))
{
	if(empty($_POST['location'])) $location = "Not defined"; else $location = mysqli_real_escape_string($DBCON, $_POST['location']);
	if(empty($_POST['age'])) $age = "Not defined"; else $age = mysqli_real_escape_string($DBCON, $_POST['age']);
	if(empty($_POST['occupation'])) $occupation = "Not defined"; else $occupation = mysqli_real_escape_string($DBCON, $_POST['occupation']);
	if(empty($_POST['interests'])) $interests = "Not defined"; else $interests = mysqli_real_escape_string($DBCON, $_POST['interests']);
	if(empty($_POST['steam'])) $steam = "Not defined"; else mysqli_real_escape_string($DBCON, $steam = $_POST['steam']);
	if(empty($_POST['skype'])) $skype = "Not defined"; else mysqli_real_escape_string($DBCON, $skype = $_POST['skype']);
	if(empty($_POST['yahoo'])) $yahoo = "Not defined"; else mysqli_real_escape_string($DBCON, $yahoo = $_POST['yahoo']);
	mysqli_query($DBCON,"UPDATE 
			userinfo 
		SET 
			location = '".$location."',
			age = '".$age."',
			occupation = '".$occupation."', 
			interests = '".$interests."',
			steam = '".$steam."',
			skype = '".$skype."',
			yahoo = '".$yahoo."'
		WHERE 
			UserID = '".$_GET['user']."'");

	header("location:/user/".$_GET['user']."/");
}
?>