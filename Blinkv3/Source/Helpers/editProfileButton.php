<?php

function editProfileButton()
{
?>
	<div class="edit-profile-button-line">
		<div class="edit-profile-button">
			<a href="/user/edit/<?=$_GET['user'];?>/">Edit profile</a>
		</div>
	</div>
<?php 
} 