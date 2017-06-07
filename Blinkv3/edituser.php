<?php
include("Source/global.php");
include("Source/View/editUser.php");
include("Source/Shared/_forumHeader.php");
include("Source/Shared/_forumFooter.php");
include("Source/Shared/_breadcrumbs.php");
include("Source/Controllers/saveProfileProcess.php");
include("Source/Shared/_errorMessages.php");

$_SESSION['currentPage'] = "Edit Profile";

$Error = 1;

if(isset($_SESSION['loggedin'])) 
{
	$user=mysqli_fetch_array(mysqli_query($DBCON,"SELECT username FROM user WHERE userID='".$_GET['user']."'"));
	if($user['username']==$_SESSION['username'])
	{
		$Error = 0;
	}
	$checkAdmin = mysqli_fetch_array(mysqli_query($DBCON,"SELECT usertype FROM user WHERE username='".$_SESSION['username']."'"));
	if($checkAdmin['usertype']==1)
	{
		$Error = 0;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $websiteName; ?></title>
	<link href="/style/style.css" rel="stylesheet" type="text/css" />
	<link href="/style/header.css" rel="stylesheet" type="text/css" />
	<?php if($Error==true) { indexRedirect(); } ?>
</head>

<body>
	<?php forumHeader(); ?>
	<div id="body">
	
		<?php 
		
		if($Error==0)
			editUserView(); 
		else
			accessForbidden();
		?>
	</div>
	<?php forumFooter(); ?>
</body>
</html>