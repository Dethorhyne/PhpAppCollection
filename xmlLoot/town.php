<?php
	$xml=simplexml_load_file("Assets/XML/XMLDB.xml");
	$Town = $_GET['Town'];
?>

<h1>Welcome to <?php echo($Town); ?>!</h1>
<h2>Buildings to loot here:</h2>
<ol>
	<?php
		$filter = $xml->xpath("//TownBuildings/TownBuilding[@Town = '".$Town."']");
		$i = 1;
		foreach($filter as $Building)
		{
			?>
				<li>
					<p><?php echo($Building); ?> <button class="<?php echo(str_replace(" ","_",$Building).$i); ?>" data-lootboxid="<?php echo(str_replace(" ","_",$Building).$i); ?>" onclick="spawnLoot('<?php echo(str_replace(" ","_",$Building).$i); ?>','<?php echo($Building); ?>');">Respawn loot</button></p><div class="cfx"></div>
					<code class="<?php echo(str_replace(" ","_",$Building).$i); ?>">
						<?php InitialSpawn($Building); ?>
					</code>
				</li>
			<?php
		}
	?>
</ol>


<?php

function InitialSpawn($Building)
{
	$xml=simplexml_load_file("Assets/XML/XMLDB.xml");
	
	$filter = $xml->xpath("//Buildings/Building[Name = '".$Building."']");
	
	$spawnPoints = $filter[0]->ItemSpawns;
	
	foreach($filter[0]->Locations->Location as $Loc)
	{
		$LocationItems = $xml->xpath("//Items/Item[Locations/Location = '".$Loc."']");
		
		foreach ($LocationItems as $Item) 
		{
			$IName = (string)$Item->Name;
			$IRarity = (int)$Item->Rarity;
			$Items[$IName] = $IRarity;
		}
	}
	
	$ItemKeys = array_keys($Items);
	
	$min = 1;
	$max = 100 * count($Items) - 1;
	
	$AnythingSpawned = false;
	
	for($i = 0;$i<$spawnPoints;$i++)
	{
		$randNum = rand( $min , $max );
		
		if($randNum < 100)
		{
			if($randNum <= $Items[$ItemKeys[0]])
			{
				echo($ItemKeys[0].'<br />');	
				$AnythingSpawned = true;
			}
		}
		else
		{
			$id = floor($randNum / 100 );
			$modInt = $randNum % 100;
			if($modInt <= $Items[$ItemKeys[$id]])
			{
				echo($ItemKeys[$id].'<br />');	
				$AnythingSpawned = true;
			}	
		}
	}
	
	if(!$AnythingSpawned)
	{
		echo("Nothing was found here");	
	}	
}

?>