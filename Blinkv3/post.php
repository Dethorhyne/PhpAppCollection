<?php
require("Source/global.php");
include("Source/Controllers/postProcess.php");
include("Source/View/listPosts.php");
include("Source/Shared/_forumHeader.php");
include("Source/Shared/_forumFooter.php");
include("Source/Shared/_breadcrumbs.php");
include("Source/Helpers/newPostButton.php");

$_SESSION['currentPage'] = "Forum";

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $websiteName; ?></title>
	<link href="/style/style.css" rel="stylesheet" type="text/css" />
	<link href="/style/header.css" rel="stylesheet" type="text/css" />
	<link href="/style/post.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<?php forumHeader(); ?>
	<div id="body">
	<?php
		breadcrumbs();
		if(isset($_SESSION['loggedin'])) addNewPostButton();
		listPosts(); 
		if(isset($_SESSION['loggedin'])) addNewPostButton();
	?>
	</div>
	<?php forumFooter(); ?>
</body>
</html>