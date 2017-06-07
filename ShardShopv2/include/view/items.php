<?php

function Shard_Shop_Global_Items()
{   
$qry = mysql_query("SELECT * FROM Items WHERE tabID = '".$_GET['tab']."'");
while ($item = mysql_fetch_array($qry, MYSQL_ASSOC))
	{
		Show_Fetched_Item($item['itemID'],$item['tabID'],$item['name'],$item['priceSCO'],$item['priceMAX'],$item['setName'],$item['setShort'],$item['image']);
	}
}


function Show_Fetched_item($_itemID,$_tabID,$_name,$_priceSCO,$_priceMAX,$_setName,$_setShort,$_image)
{
?>
<div class="si-frame<?php if(isset($_GET['item'])) {if($_itemID==$_GET['item'])echo " st-cf"; }?>">
	<div class="si-overlay<?php if(isset($_GET['item'])) {if($_itemID==$_GET['item'])echo " st-co"; }?>">
		
		<div class="si-price-box">
			<p class="sco-tag">
				<span>.SCO</span>$<?php echo $_priceSCO; ?>
			</p>
			<p class="max-tag">
				<span>.MAX</span>$<?php echo $_priceMAX; ?>
			</p>
		</div>
		
		<div class="si-thumbnail-image">
			<img src="/images/storeIcons/thumbs/<?php echo $_image;?>.png" />
		</div>
		
		<div class="si-name-box">
			<p <?php if(isset($_GET['item'])) {if($_itemID==$_GET['item'])echo " class=\"st-cl\""; }?>><?php if($_setName != "0") echo $_setShort." ".$_name; else echo $_name; ?></p></p>
		</div>
		
		
		<div class="si-shop-link">
			<a href="/<?php echo $_tabID; ?>/<?php echo $_itemID; ?>/"></a>
		</div>
	</div>
</div>
	<?php
}
?>