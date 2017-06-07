<?php
function tableList()
{
	$item=mysql_fetch_array(mysql_query("SELECT * FROM items WHERE typeID='".$_GET['tab']."' ORDER BY itemID"));
	?>
    <div id="shopItem">
    
    </div>

}
?>