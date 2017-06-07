<?php
include("Source/global.php");
include("Source/View/registerForm.php");
include("Source/View/alreadyLoggedIn.php");
include("Source/Shared/_forumHeader.php");
include("Source/Shared/_forumFooter.php");
include("Source/Controllers/loginProcess.php");

$_SESSION['currentPage'] = "Register";

?>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $websiteName; ?></title>
	<link href="/style/style.css" rel="stylesheet" type="text/css" />
	<link href="/style/header.css" rel="stylesheet" type="text/css" />
</head>


<body>
	<?php forumHeader(); ?>
	<div id="body">
	<?php 
		if(isset($_SESSION['username']))
			alreadyLoggedIn();
		else
			registerForm();
	?>
	</div>
	<?php forumFooter(); ?>
</body>
</html>