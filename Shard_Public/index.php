<?php
include("include/header.php");
include("include/pages.php");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shard</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="topLine"></div>
<div id="header">
	<div id="selectPage">
    	<?php selectPage($selectPage); ?>
    </div>	
</div>
<div id="content">
<?php 
if($_GET['page'] == "Index") displayIndex();
if($_GET['page'] == "Features") displayFeatures();
if($_GET['page'] == "Leaderboards") displayLeaderboards();
if($_GET['page'] == "Support") displaySupport();
?>
</div>
</body>
</html>
