<?php
$selectPage = array("Index", "Features", "Leaderboards", "Forum", "Support");

if(!isset($_GET['page']))
{
	header("location:?page=Index");
}

if($_GET['page'] != $selectPage[0] && $_GET['page'] != $selectPage[1] && $_GET['page'] != $selectPage[2] && $_GET['page'] != $selectPage[4])
{
	header("location:?page=Index");
}

function selectPage($selectPage)
{
	for($i=0;$i<5;$i++)
	{
		if($i<5)
		{ ?>
			
    <div id="selectPage<?php echo $selectPage[$i]; ?>">
	<div id="selectPageStart<?php if($selectPage[$i]==$_GET['page']) echo "Current"; ?>"></div>
	<div id="selectPageMiddle<?php if($selectPage[$i]==$_GET['page']) echo "Current"; ?>">
	<?php
    if ($i==3)
	{ ?>
	<a href="https://forum.dominichock.de/"><?php echo $selectPage[$i]; ?></a>
     <?php 
	}
	else
	{?>
	<a href="?page=<?php echo $selectPage[$i]; ?>"><?php echo $selectPage[$i]; ?></a> <?php } ?>
	</div>
	<div id="selectPageFinish<?php if($selectPage[$i]==$_GET['page']) echo "Current"; ?>"></div>
</div><?php
		}
	}	
	?>
    <div id="selectPageDonate">
	<div id="selectPageStartPaypal"></div>
	<div id="selectPageMiddlePaypal"><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="submit" border="0" name="submit" alt="Donate via Paypal" value="Donate" class="donateButton">
</form></div>
	<div id="selectPageFinishPaypal"></div>
</div><?php


}
?>