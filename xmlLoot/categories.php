<?php
$xml=simplexml_load_file("Assets/XML/XMLDB.xml");

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Category sheet</title>
<link rel="stylesheet" type="text/css" href="./Assets/CSS/site.css">
</head>

<body>
<a href="index.php" class="returnButton">Back to map</a>
<h1>Locations</h1>
<table class="itemSheet" cellspacing="0px">
	<thead>
		<tr>
			<td>Location Name</td>
		</tr>
	</thead>
	<tbody>
		<?php
		
		$filter = $xml->Locations->Location;

		foreach ($filter as $Location) 
		{			
			?>
				<tr>
					<td><?php echo ($Location); ?></td>
				</tr>
			
			<?php
		}
		
		?>
	</tbody>
</table>
<a href="index.php" class="returnButton">Back to map</a>
<h1>Item Families</h1>
<table class="itemSheet" cellspacing="0px">
	<thead>
		<tr>
			<td>Family</td>
		</tr>
	</thead>
	<tbody>
		<?php
		
		$filter = $xml->ItemFamilies->ItemFamily;

		foreach ($filter as $ItemFamily) 
		{			
			?>
				<tr>
					<td><?php echo ($ItemFamily); ?></td>
				</tr>
			
			<?php
		}
		
		?>
	</tbody>
</table>
<a href="index.php" class="returnButton">Back to map</a>
<h1>Towns</h1>
<table class="itemSheet" cellspacing="0px">
	<thead>
		<tr>
			<td>Town name</td>
			<td>X coordinates</td>
			<td>Y coordinates</td>
			<td>Active on map</td>
		</tr>
	</thead>
	<tbody>
		<?php
		
		$filter = $xml->Towns->Town;

		foreach ($filter as $Town) 
		{			
			?>
				<tr>
					<td><?php echo ($Town); ?></td>
					<td><?php echo ($Town['PosX']); ?></td>
					<td><?php echo ($Town['PosY']); ?></td>
					<td><?php echo ($Town['Active']); ?></td>
				</tr>
			
			<?php
		}
		
		?>
	</tbody>
</table>
<a href="index.php" class="returnButton">Back to map</a>
<h1>Item Types</h1>
<table class="itemSheet" cellspacing="0px">
	<thead>
		<tr>
			<td>Type</td>
		</tr>
	</thead>
	<tbody>
		<?php
		
		$filter = $xml->ItemTypes->ItemType;

		foreach ($filter as $ItemType) 
		{			
			?>
				<tr>
					<td><?php echo ($ItemType); ?></td>
				</tr>
			
			<?php
		}
		
		?>
	</tbody>
</table>
<a href="index.php" class="returnButton">Back to map</a>
<h1>Buildings</h1>
<table class="itemSheet" cellspacing="0px">
	<thead>
		<tr>
			<td>Building name</td>
			<td>Location categories</td>
			<td>Spawn points</td>
		</tr>
	</thead>
	<tbody>
		<?php
		
		$filter = $xml->Buildings->Building;

		foreach ($filter as $Building) 
		{			
			?>
				<tr>
					<td><?php echo ($Building->Name); ?></td>
						<td>
							<?php 
							$Locations = "";
								foreach ($Building->Locations->Location as $Location) 
								{
									$Locations = $Locations.$Location.', ';
								}
								$Locations = substr($Locations , 0, strlen($Locations)-2 );
								echo($Locations);
							?>
						</td>
					<td><?php echo ($Building->ItemSpawns); ?></td>
				</tr>
			
			<?php
		}
		
		?>
	</tbody>
</table>

</body>
</html>