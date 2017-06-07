<?php
include("Source/global.php");
include("Source/View/pageError.php");
include("Source/Shared/_forumHeader.php");

$_SESSION['currentPage'] = "Error";


?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $websiteName; ?></title>
	<link href="/style/style.css" rel="stylesheet" type="text/css" />
	<link href="/style/header.css" rel="stylesheet" type="text/css" />
	<?php if(isset($_GET['error'])) { indexRedirect(); } ?>
</head>

<body>
	<?php forumHeader(); ?>
	<div id="body">
		<?php errorMessage(); ?>
	</div>
</body>
</html>