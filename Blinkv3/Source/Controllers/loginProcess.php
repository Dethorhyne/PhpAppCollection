<?php

function checkUsername($username)
{
	global $DBCON;
	if(mysqli_num_rows(mysqli_query($DBCON,"SELECT userID FROM user WHERE username='".$username."'")) == 1)
	{
		return true;
	}
	else
	{
		return false;		
	}
}

function userExists($username, $password)
{
	global $DBCON;
	if(mysqli_num_rows(mysqli_query($DBCON,"SELECT * FROM user WHERE username='".$username."' AND password='".md5($password)."'")) != 0)
	{
		return true;	
	}
}

function usernameTaken($username)
{
	global $DBCON;
	if(mysqli_num_rows(mysqli_query($DBCON,"SELECT username FROM user WHERE username='".$username."'")) != 0)
	{
		return true;	
	}
}

function emailTaken($email)
{
	global $DBCON;
	if(mysqli_num_rows(mysqli_query($DBCON,"SELECT email FROM user WHERE email='".$email."'")) != 0)
	{
		return true;	
	}
}

function checkPassword($pwd)
{
	if(strlen($pwd) < 8 || preg_match('/[^a-zA-Z0-9_]/', $pwd) != 0)
	{
		return true;	
	}
	else
	{
		return false;
	}	
}

function checkPasswordMatch($pwd, $pwdr)
{
	if($pwd == $pwdr)
	{
		return false;
	}
	else
	{
		return true;
	}
}
?>