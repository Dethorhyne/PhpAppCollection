<?php

function view_BuyMenu()
{   
$item = mysql_fetch_array(mysql_query("SELECT * FROM items WHERE itemID = '".$_GET['item']."'"), MYSQL_ASSOC);
	?> 	
	<div id="buySCO">
		<a href="">
		</a>
			<div id="buy">
				<?php 
				obj_BuyMessage($item['name']);
				?>
				<form method="post">
					<div id="buyMailForm">
						<div id="mailHeader">
							<p>My name is <input type="text" name="name" required="required" />.</p>
							<p>I would like to purchase <span style="color: #007eff; text-shadow: 0px 0px 5px rgba(0,126,255,0.7);">.SCO</span> pack for <span><?php echo $item['name']; ?></span> for <span style="color: #007eff; text-shadow: 0px 0px 5px rgba(0,126,255,0.7);"><?php echo $item['priceSCO']; ?>$</span>.</p>
							<p>My Paypal E-mail is <input type="text" name="mail" required="required" />.</p>
						</div>
						<div id="mailBody">
						<script type="text/javascript">
						function removeText()	 {
						if(this.value=="Additional info here")
						{
							this.value='';
						}
						
						return false;	
						}
						</script>
						<textarea name="message" onfocus="if(this.value==='Additional info here'){this.value='';}" onblur="if(this.value===''){this.value='Additional info here';}">Additional info here</textarea>
						</div>
						<div id="mailFooter"><input type="submit" name="BuySCO" value="Send E-mail"/></div>
					</div>
				</form>
			</div>
	</div>
	<div id="buyMAX">
		<a href="">
		</a>
			<div id="buy">
				<p>Hello. Thank you for your interest in buying the <span>.MAX</span> pack for <span><?php echo $item['name']; ?></span>.</p>
				<p>Purchasing my models will be done through few steps:</p>
				<ol>
					<li>You will fill out this form with Name, Paypal E-mail address and additional info.</li>
					<li>I will send an invoice to your Paypal Account regarding your purchase.</li>
					<li>You will make the transaction according to the invoice.</li>
					<li>Within 24 hours you will be recieve a mail with a link to your model.</li>
				</ol>
				<p>Important notes:</p>
				<p>All models are for your <span>personal use only</span>. You are <span>not</span> permitted to leech or share the model.</p>
				<p>There will be <span>no refunds</span>.</p>
				<form method="post">
					<div id="buyMailForm">
						<div id="mailHeader">
							<p>My name is <input type="text" name="name" required="required" />.</p>
							<p>I would like to purchase <span style="color: #509e22; text-shadow: 0px 0px 3px rgba(80,158,34,0.7);">.MAX</span> pack for <span><?php echo $item['name']; ?></span> for <span style="color: #509e22; text-shadow: 0px 0px 3px rgba(80,158,34,0.7);"><?php echo $item['priceMAX']; ?>$</span>.</p>
							<p>My Paypal E-mail is <input type="text" name="mail" required="required" />.</p>
						</div>
						<div id="mailBody">
						<textarea name="message">Additional info here</textarea>
						</div>
						<div id="mailFooter"><input type="submit" name="BuySCO" value="Send E-mail"/></div>
					</div>
				</form>
			</div>
	</div>
	<?php
}

?>