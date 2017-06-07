<?php
$test = "VarTest";

$arr[$test] = 80;
$arr["Two"] = 55;
$arr["Three"] = 25;
$arr["Four"] = 45;
$arr["Five"] = 65;

$keys = array_keys($arr);

echo('Items in array: '.count($arr).'<br />');

$min = 1;
$max = 100 * count($arr) - 1;


$randNum = rand( $min , $max );
echo('Random Number: '.$randNum.'<br />');

if($randNum < 100)
{
	echo('Array Item Id: '.$arr[$keys[0]].'<br />');
	if($randNum <= $arr[$keys[0]])
	{
		echo('<h1>'.$randNum .'. -> '.$keys[0].'</h1>');	
	}
}
else
{
	$id = floor($randNum / 100 );
	echo('Devided int: '.$id.'<br />');
	echo('Array Item Id: '.$keys[$id].'<br />');
	echo('Array Item Rarity: '.$arr[$keys[$id]].'<br />');
	$modInt = $randNum % 100;
	echo('Random Number: '.$randNum.' Excess: '.$modInt.'<br />');
	if($modInt <= $arr[$keys[$id]])
	{
		echo('<h1>'.$modInt .'. -> '.$keys[$id].'</h1>');	
	}	
}

?>