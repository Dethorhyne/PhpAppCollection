<?php
include("Source/global.php");
include("Source/View/userInfo.php");
include("Source/Helpers/editProfileButton.php");
include("Source/Shared/_forumHeader.php");
include("Source/Shared/_forumFooter.php");
include("Source/Shared/_breadcrumbs.php");
include("Source/Shared/_errorMessages.php");

$userExists = 0;

if(	isset($_GET['user']) && mysqli_num_rows(mysqli_query($DBCON,"SELECT * FROM user WHERE userID='".mysqli_real_escape_string($DBCON, $_GET['user'])."' LIMIT 1"))==1) $userExists = 1;
	
if(isset($_SESSION['loggedin']))
{
	$user=mysqli_fetch_array(mysqli_query($DBCON,"SELECT username FROM user WHERE userID='".$_GET['user']."'"));
}
$_SESSION['currentPage'] = "User";

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $websiteName; ?></title>
	<link href="/style/style.css" rel="stylesheet" type="text/css" />
	<link href="/style/header.css" rel="stylesheet" type="text/css" />
	<link href="/style/user.css" rel="stylesheet" type="text/css" />
	<?php if($userExists==0) { indexRedirect(); } ?>
</head>

<body>
	<?php forumHeader(); ?>
	<div id="body">
	<?php 
	if($userExists==1)
	{
		if(isset($_SESSION['loggedin']))
		{
			$checkAdmin = mysqli_fetch_array(mysqli_query($DBCON,"SELECT usertype FROM user WHERE username='".$_SESSION['username']."'"));		
			if($user['username']==$_SESSION['username'] || $checkAdmin['usertype']==1) editProfileButton();
			
		}
		showUserInfo();
	}
	else
		noUserError();
	?>
	</div>
	<?php forumFooter(); ?>
</body>

<body>
    
</body>
</html>