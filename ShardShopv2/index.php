<?php
include("include/global.php");
include("include/object/tabs.php");
include("include/object/buymessage.php");
include("include/object/tab.php");
include("include/view/items.php");
include("include/view/desc.php");
include("include/view/buymenu.php");
include("include/object/jquery.php");

$websiteName = websiteName($_GET['tab']);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $websiteName; ?></title>
	<link href="/style/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	
	
</head>

<body>

	<div id="main-container">
   
    <?php Shard_Shop_Global_Tabs(); ?>
	
    	<div id="shop-frame">
		
			<div id="shop-item-list">
			
				<?php Shard_Shop_Global_Items(); ?>
			
			</div>
        	
    	</div>
		
		<div id="description-box">
		
			<?php Shard_Shop_Global_Description(); ?>
		
		</div>
        
    </div>		
	
	<?php //if(isset($_GET['tab'])&&isset($_GET['item'])) view_BuyMenu(); ?>

</body>
</html>