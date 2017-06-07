<?php
include("Source/global.php");
include("Source/Controllers/postProcess.php");
include("Source/View/newPost.php");
include("Source/Shared/_forumHeader.php");
include("Source/Shared/_forumFooter.php");
include("Source/Shared/_breadcrumbs.php");

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
	<script>
	function setFocus()
	{
	document.getElementById("new-post-body").focus();
	}
	</script>
</head>

<body onload="setFocus()">
	<?php forumHeader(); ?>
	<div id="body">
	
		<?php 
			breadcrumbs();
			showPostForm();
		?>
	</div>
	<?php forumFooter(); ?>
</body>
</html>