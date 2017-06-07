<?php
include("Source/Helpers/parseBBCode.php");

global $DBCON;
if(isset($_POST['submitPost']))
{
	if(isset($_GET['board']) && isset($_GET['post']))
	{
		$message = parseBBCode($_POST['body']);
		$poster = mysqli_fetch_array(mysqli_query($DBCON,"SELECT userID FROM user WHERE username='".$_SESSION['username']."' LIMIT 1"));
		
		mysqli_query($DBCON,"INSERT INTO post (body, date, boardID, posterID, inPostID) VALUES('".$message."', NOW(), '".mysqli_real_escape_string($DBCON, $_GET['board'])."', '".$poster[0]."', '".$_GET['post']."')") or die(mysqli_error());
		
		header("location:/post/".$_GET['board']."/".$_GET['post']."/");
	}
	if(!isset($_GET['post']))
	{
		$message = parseBBCode($_POST['body']);
		$poster = mysqli_fetch_array(mysqli_query($DBCON,"SELECT userID FROM user WHERE username='".$_SESSION['username']."' LIMIT 1"));
		
		mysqli_query($DBCON,"INSERT INTO post (title, body, date, boardID, posterID) VALUES('".mysqli_real_escape_string($DBCON, $_POST['title'])."', '".$message."', NOW(), '".mysqli_real_escape_string($DBCON, $_GET['board'])."', '".$poster[0]."')") or die(mysqli_error());
		
		$newPost=mysqli_fetch_array(mysqli_query($DBCON,"SELECT postID FROM post WHERE date=NOW()"));
		
		header("location:/post/".$_GET['board']."/".$newPost[0]."/");
	}
}

if(isset($_POST['editPost']))
{
	$postToEdit = mysqli_fetch_array(mysqli_query($DBCON,"SELECT * FROM post WHERE postID ='".$_GET['post']."' LIMIT 1"));
	$message = parseBBCode($_POST['body']);
	if($postToEdit['inPostID'] != 0)
	{
		mysqli_query($DBCON,"UPDATE post SET body = '".$message."' WHERE postID='".$_GET['post']."'");	
		header("location:/post/".$_GET['board']."/".$postToEdit['inPostID']."/");
	}
	else
	{
		mysqli_query($DBCON,"UPDATE post SET body = '".$message."' WHERE postID='".$_GET['post']."'");	
		header("location:/post/".$_GET['board']."/".$_GET['post']."/");
	}
}

if(isset($_POST['deletePost']) && $_SESSION['userLevel']==1)
{
	$postToDelete = mysqli_fetch_array(mysqli_query($DBCON,"SELECT * FROM post WHERE postID ='".$_POST['postToDelete']."'"));
	if($postToDelete['inPostID'] != 0)
	{
		mysqli_query($DBCON,"DELETE FROM post WHERE postID='".$_POST['postToDelete']."'");
	}
	else
	{
		mysqli_query($DBCON,"DELETE FROM post WHERE postID='".$_POST['postToDelete']."'");
		mysqli_query($DBCON,"DELETE FROM post WHERE inPostID='".$_POST['postToDelete']."'");
		header("location:/board/".$_GET['board']."/");
	}
}

?>