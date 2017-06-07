<?php

function Shard_Shop_Global_Description_JQuery($NOI)
{
	$NOI = $NOI - 1;
	?>
<script type="text/jscript">
		$(document).ready(function(){
			
			var position = 0;
			$(function () {
				$('#dc-if-btn-next').click(function () {
					if ($('#dc-image-box').is(':animated')) 
					{
						return false;
					}
					<?php
					for($i=0;$i<=$NOI;$i++)
					{?>
					<?php if($i!=0) echo "else ";?>if (position === <?php echo $i; ?>) {
						$('#dc-image-box').animate({
							'left': '-<?php if($i == $NOI)echo 0; else echo ($i + 1)."00";?>%'
						}, {
							duration: 200
						});
						$('#dc-if-nav-line').animate({
							'left': '<?php if($i == $NOI)echo 0; else echo ((1*($i+1))/($NOI+1))*100; ?>%'
						}, {
							duration: 200
						});
						position = <?php if($i == $NOI)echo 0; else echo ($i + 1);?>;
					}
					
					<?php } ?>
				});
			});
			
			$(function () {
				$('#dc-if-btn-prev').click(function () {
					if ($('#dc-image-box').is(':animated')) 
					{
						return false;
					}
					if (position === 0) {
						$('#dc-image-box').animate({
							'left': '-<?php echo $NOI; ?>00%'
						}, {
							duration: 200
						});
						$('#dc-if-nav-line').animate({
							'left': '<?php echo (($NOI)/($NOI+1))*100; ?>%'
						}, {
							duration: 200
						});
						position = <?php echo $NOI;?>;
					}<?php
					for($i=1;$i<=$NOI;$i++)
					{?>
					<?php if($i!=0) echo "else ";?>if (position === <?php echo $i; ?>) {
						$('#dc-image-box').animate({
							'left': '-<?php if($i == 0)echo $NOI; else echo ($i - 1)."00";?>%'
						}, {
							duration: 200
						});
						$('#dc-if-nav-line').animate({
							'left': '<?php echo (($i-1)/($NOI+1))*100; ?>%'
						}, {
							duration: 200
						});
						position = <?php if($i == 0)echo $NOI; else echo $i - 1;?>;
					}
					
					<?php } ?>
				});
			});
		});
	</script>
	<?php
}
?>