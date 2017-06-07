<?php
function Shard_Shop_Global_Tabs() 
{
	?>
	<div id="shop-tabs">
	<?php
	for($i=1;$i<5;$i++)
	{
	?>	
		<div class="st-frame<?php if($i==$_GET['tab']) echo " st-cf";?>">
			<div class="st-overlay<?php if($i==$_GET['tab']) echo " st-co";?>">
				<a <?php if($i==$_GET['tab']) echo "class=\"st-cl\"";?> href="/<?php echo $i; ?>/"><?php tabName($i); ?></a>		
			</div>
		</div>
	<?php	
	}?>
	</div>
	<?php
}

function tabName($index)
{
	switch($index)
	{
		case 1:	$name="WarZ models";
				break;
		case 2:	$name="New Models";
				break;	
		case 3:	$name="WarZ sets";
				break;
		case 4:	$name="New sets";
				break;
		default:
				break;
	}
	echo $name;
}