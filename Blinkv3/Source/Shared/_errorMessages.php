<?php
function noUserError()
{
?>
	<div class="category-section">
		<div class="generic-post-header">User not found</div>
		<div class="generic-post-content"> 
			<div class="recent-post-item">
				<div class="recent-post-title">User you're looking for does not exist . You will be redirected shortly.</div>
			</div>
		</div>
	</div>
<?php
}

function accessForbidden()
{
?>
	<div class="category-section">
		<div class="generic-post-header">You are not allowed here</div>
		<div class="generic-post-content"> 
			<div class="recent-post-item">
				<div class="recent-post-title">You're not allowed to edit this profile. You will be redirected shortly.</div>
			</div>
		</div>
	</div>
<?php
	
}
?>