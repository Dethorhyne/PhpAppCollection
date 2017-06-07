<?php
$xml=simplexml_load_file("Assets/XML/XMLDB.xml");

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Item Sheet</title>
<link rel="stylesheet" type="text/css" href="./Assets/CSS/site.css">
</head>

<body>
<a href="index.php" class="returnButton">Back to map</a><br />
<?php
if(isset($_GET['Location']))
{
		echo('<a href="itemsheet.php" class="returnButton">Return to full report</a>');
}
else
{
	$LocationList = $xml->Locations->Location;

	foreach($LocationList as $LocFilter)
	{
		echo('<a href="?Location='.$LocFilter.'" class="LocationListButton">'.$LocFilter.'</a>');
	}
}
?>
<table class="itemSheet" cellspacing="0px">
	<thead>
		<tr>
			<td>Item Family</td>
			<td>Item Placement</td>
			<td>Item Type</td>
			<td>Item Name</td>
			<td>Item Locations</td>
			<td>Item Rarity</td>
		</tr>
	</thead>
	<tbody>
		<?php
		
		
		if(isset($_GET['Location']))
		{
			$LocationFilter = $_GET['Location'];
			$abc = $xml->xpath("//Buildings/Building[Name = 'Test']");
			$filter = $xml->xpath("//Items/Item[Locations/Location = '".$LocationFilter."']");
		}
		else
		{
			$filter = $xml->Items->Item;
		}

		foreach ($filter as $Item) 
		{
						
			if($Item->Rarity < 25)
				$Rarity = "Very Rare";
			else if($Item->Rarity < 50)
				$Rarity = "Rare";
			else if($Item->Rarity < 75)
				$Rarity = "Uncommon";
			else
				$Rarity = "Common";
			
			
				?>
					<tr>
						<td><?php echo ($Item->ItemFamily); ?></td>
						<td><?php echo ($Item->ItemPlacement); ?></td>
						<td><?php echo ($Item->ItemType); ?></td>
						<td><?php echo ($Item->Name); ?></td>
						<td>
							<?php 
							$Locations = "";
								foreach ($Item->Locations->Location as $Location) 
								{
									$Locations = $Locations.'<a href="?Location='.$Location.'">'.$Location.'</a>, ';
								}
								$Locations = substr($Locations , 0, strlen($Locations)-2 );
								echo($Locations);
							?>
						</td>
						<td><?php echo ($Rarity); ?></td>
					</tr>
				
				<?php
		}
		
		
		?>
	</tbody>
</table>
</body>
</html>