<?php

mysql_connect("localhost","root","usbw");
mysql_select_db("shard");

function checkLootTable($lootTable)
{
	$checkExistance = mysql_num_rows(mysql_query("SELECT * FROM items_lootdata WHERE LootID='".$lootTable."'"));
	if($checkExistance > 0)
	{
		$lootIDItems = mysql_query("SELECT * FROM items_lootdata WHERE LootID='".$lootTable."'");
		$item = array();
		
		while($oneItem = mysql_fetch_assoc($lootIDItems))
		{
			array_push($item,decideItems($oneItem['ItemID'],$oneItem['Chance']));
		}
		
		$items = count($item) - 1;
		$itemRand = rand(0,$items);
		$lowerNothing = rand(0,3);
		
		if($lowerNothing>1)
		{
			while($item[$itemRand]=="")
			{
				$itemRand= rand(0,$items);
			}
		}
		
		displayItem($item[$itemRand]);
	}
	
	else
	{
		echo "Invalid Loot Table";
	}
}

function decideItems($itemID,$chance)
{
	$chance=$chance*10;
	$randNumber = rand(0,1000);
	$chanceOfNothing = rand(0,10);
	
	if($chanceOfNothing==0)
	{
		if($randNumber < $chance)
		{
			return $itemID;
		}
	}
	else
	{
		return $itemID;
	}
}

function displayItem($itemID)
{
	switch($itemID)
	{
		case 101306:
			echo "Flashlight";
			break;
			
		case 101307:
			echo "Hammer";
			break;
			
		case 101311:
			echo "Chemlight White";
			break;
			
		case 101312:
			echo "Flare";
			break;
			
		case 101315:
			echo "Binoculars";
			break;
			
		case 101316:
			echo "Barb wire barricade";
			break;
			
		case 101317:
			echo "Wood shield barricade";
			break;
			
		default:
			echo "<div id=\"nothing\">Nothing</div>";
			break;
	}	
}

$table = 301137;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Loot test</title>
<link rel="stylesheet" type="text/css" href="/style/style.css" />
</head>
<body>
<div id="content">
<?php
if(!isset($_POST['spawnLoot']))
{?>
    <div id="spawn1">Loot Spawn</div>
    <div id="spawn2">Loot Spawn</div>
    <div id="spawn3">Loot Spawn</div>
    <div id="spawn4">Loot Spawn</div>
    <div id="spawn5">Loot Spawn</div>
    <div id="spawn6">Loot Spawn</div>
    <div id="spawn7">Loot Spawn</div>
    <div id="spawn8">Loot Spawn</div>
    <div id="spawn9">Loot Spawn</div>
    <div id="spawn10">Loot Spawn</div>
    <div id="spawn11">Loot Spawn</div>
    <div id="spawn12">Loot Spawn</div>
    <div id="spawn13">Loot Spawn</div>
    <div id="spawn14">Loot Spawn</div>
    <div id="spawn15">Loot Spawn</div>
    <div id="spawn16">Loot Spawn</div>
	<div id="spawn17">Loot Spawn</div>
  <?php
}
else
{?>
    <div id="spawn1"><?php checkLootTable($table); ?></div>
    <div id="spawn2"><?php checkLootTable($table); ?></div>
    <div id="spawn3"><?php checkLootTable($table); ?></div>
    <div id="spawn4"><?php checkLootTable($table); ?></div>
    <div id="spawn5"><?php checkLootTable($table); ?></div>
    <div id="spawn6"><?php checkLootTable($table); ?></div>
    <div id="spawn7"><?php checkLootTable($table); ?></div>
    <div id="spawn8"><?php checkLootTable($table); ?></div>
    <div id="spawn9"><?php checkLootTable($table); ?></div>
    <div id="spawn10"><?php checkLootTable($table); ?></div>
    <div id="spawn11"><?php checkLootTable($table); ?></div>
    <div id="spawn12"><?php checkLootTable($table); ?></div>
    <div id="spawn13"><?php checkLootTable($table); ?></div>
    <div id="spawn14"><?php checkLootTable($table); ?></div>
    <div id="spawn15"><?php checkLootTable($table); ?></div>
    <div id="spawn16"><?php checkLootTable($table); ?></div>
	<div id="spawn17"><?php checkLootTable($table); ?></div>
  <?php
}
?>
    <div id="spawnLoot">
        <form method="post">
			<input type="submit" name="spawnLoot" value="Spawn Loot" />
        </form>
    </div>
</div>
</body>
</html>

<!-- 
LootID = 301137
		101306=Flashlight
		101307=Hammer
		101311=Chemlight White
		101312=Flare
		101315=Binoculars
		101316=Barb wire barricade
		101317=Wood shield barricade

-->