<?php
$Building = $_GET['Building'];

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
?>