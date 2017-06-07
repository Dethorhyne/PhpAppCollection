<?php
function logout()
{
	session_destroy();
?>
	<div class="category-section">
		<div class="generic-post-header"><?php echo lang('l_logout'); ?></div>
		<div class="generic-post-content"> 
			<div class="recent-post-item">
				<div class="recent-post-title">Successfully logged out. Redirecting. . .</div>
			</div>
		</div>
	</div>

<?php
 }
?>