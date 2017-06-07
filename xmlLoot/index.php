<html>
<head>
<title>Loot Distribution</title>
<script src="./Assets/JS/jquery.min.js" type="text/javascript"></script>
<script src="./Assets/JS/jquery-ui.min.js" type="text/javascript"></script>
<script src="./Assets/JS/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
<script src="./Assets/JS/site.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="./Assets/CSS/site.css">

</head>
<body>

<aside>
	<a href="itemsheet.php" class="LocationListButton">Item List</a>
	<a href="categories.php" class="LocationListButton">Category List</a>
</aside>
<main>
	<div id="map">
        <div class="Towns">
		
		<?php
		$xml=simplexml_load_file("Assets/XML/XMLDB.xml");
		
	
	
		foreach ($xml->Towns->Town as $OneTown) {
			if($OneTown['Active']=="True")
			
			{
				?>
				<p class="TownName" style="top: calc((<?php echo($OneTown['PosY']); ?> / 154) * 100% - 60px);left: calc((<?php echo($OneTown['PosX']); ?> / 154) * 100% - 125px);"><?php echo($OneTown); ?></p>
				<?php
			}
		}
			
		?>
            
        </div>
		<img src="./Assets/Images/map.jpg" />
	</div>
	

	
	
</main>
	<div id="TownOverlay">
		<button id="CloseOverview"> Close </button>
		<div id="TownInfo">
		
		</div>
	</div>

</body>

</html>