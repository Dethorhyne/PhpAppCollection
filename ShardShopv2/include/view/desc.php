<?php

function Shard_Shop_Global_Description	()
{
	if(isset($_GET['item']) && mysql_num_rows(mysql_query("SELECT * FROM items WHERE itemID = '".$_GET['item']."' LIMIT 1")) == 1)
	{
		$item = mysql_fetch_array(mysql_query("SELECT * FROM items WHERE itemID = '".$_GET['item']."'"), MYSQL_ASSOC);
		?>
	<div class="dc-pe-frame">
		<div class="dc-pack-explainer">
			<div class="dc-pack-sco"><p class="sco-tag">.SCO pack = .SCO file only</p></div>
			<div class="dc-pack-max"><p class="max-tag">.MAX pack = .SCO & .MAX</p></div>
		</div>
	</div>
	
	<div class="dc-item-name"><p><?php echo $item['name']; ?></p></div>    
					    
	<div class="dc-image-frame">
	<?php Shard_Shop_Global_Description_JQuery($item['numberOfImages']);?>
		<div id="dc-image-box">
		<?php
		for($i=1;$i<=$item['numberOfImages'];$i++)
		{?>
			<img src="../../images/storeIcons/full/<?php echo $item['image']; ?>/<?php echo $i;?>.png" />
		<?php 
		}
		?>
		</div>
		<div class="dc-if-navigator-frame">
		<?php
		if($item['numberOfImages']>1)
		{
		?>
			<div id="dc-if-nav-line" style="width:calc(100% / <?php echo $item['numberOfImages']; ?>);"></div>
		<?php
		}
		?>
		</div>
		
		<div id="dc-if-btn-prev">
		</div>
		<div id="dc-if-btn-next">
		</div>
	
		<?php if($item['setName'] != "0")
		{?>
		<div class="dc-if-set">
			<p class="dc-if-type-tag">Set name</p>
			<p class="dc-if-item-set-name"><?php echo $item['setName']; ?></p>
		</div>
		<?php } ?>
		<div class="dc-if-price">
			<p class="dc-if-type-tag">Price</p>
			<p class="sco-tag">$<?php echo $item['priceSCO']; ?></p>
			<p class="max-tag">$<?php echo $item['priceMAX']; ?></p>
		</div>
	</div>
						
					
	<div class="dc-description">
		<?php echo $item['description']; ?>
	</div>
					
					<div id="descSpacerBuy"></div>
					
					<div id="descBuyButtons">
						<div id="descBuyWithSCO"><a href="#buySCO">Buy SCO for <?php echo $item['priceSCO']; ?> $</a></div>
						<div id="descBuyWithMAX"><a href="#buyMAX">Buy MAX for <?php echo $item['priceMAX']; ?> $</a></div>
			
		<?php	
	}
}
?>