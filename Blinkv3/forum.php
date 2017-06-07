<?php
include("Source/global.php");
include("Source/View/listForums.php");
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
</head>

<body>
	<?php forumHeader(); ?>
	<div id="body">
	<?php
		breadcrumbs();
		listForums();
	?>
	</div>
	<?php forumFooter(); ?>
</body>
</html>