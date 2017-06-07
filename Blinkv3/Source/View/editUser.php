<?php

function editUserView()
{
	global $DBCON;
	$userInfo=mysqli_fetch_array(mysqli_query($DBCON,"SELECT * FROM userinfo WHERE userID='".$_GET['user']."'"));
?>
<div class="login-section">
		<div class="generic-post-header">Edit Profile</div>
		<div class="generic-post-content"> 
			<div class="login-form">
			<form method="post">
			
				<div class="login-item">
					<div class="login-desc"><span>Location</span></div>
					<div class="login-input">
					<input type="text" maxlength="64" name="location" placeholder="Where are you from?" <?php if($userInfo['location'] != "Not defined") echo "value=\"".$userInfo['location']."\" ";?>/></div>
				</div>
				
				<div class="login-item">
					<div class="login-desc"><span>Age</span></div>
					<div class="login-input"><input type="text" maxlength="16" name="age" placeholder="How old are you?" <?php if($userInfo['age'] != "Not defined") echo "value=\"".$userInfo['age']."\" ";?>/></div>
				</div>
				
				<div class="login-item">
					<div class="login-desc"><span>Occupation</span></div>
					<div class="login-input"><input type="text" maxlength="64" name="occupation" placeholder="What do you do?" <?php if($userInfo['occupation'] != "Not defined") echo "value=\"".$userInfo['occupation']."\" ";?>/></div>
				</div>
				
				<div class="login-item">
					<div class="login-desc"><span>Interests</span></div>
					<div class="login-input"><input type="text" maxlength="128" name="interests" placeholder="What interests you?" <?php if($userInfo['interests'] != "Not defined") echo "value=\"".$userInfo['interests']."\" ";?>/></div>
				</div>
				
				<div class="login-item">
					<div class="login-desc"><span>Steam</span></div>
					<div class="login-input"><input type="text" maxlength="64" name="steam" placeholder="What's your steam name?" <?php if($userInfo['steam'] != "Not defined") echo "value=\"".$userInfo['steam']."\" ";?>/></div>
				</div>
				
				<div class="login-item">
					<div class="login-desc"><span>Skype</span></div>
					<div class="login-input"><input type="text" maxlength="64" name="skype" placeholder="What's your skype name?" <?php if($userInfo['skype'] != "Not defined") echo "value=\"".$userInfo['skype']."\" ";?>/></div>
				</div>
				
				<div class="login-item">
					<div class="login-desc"><span>Yahoo</span></div>
					<div class="login-input"><input type="text" maxlength="64" name="yahoo" placeholder="What's your yahoo name??" <?php if($userInfo['yahoo'] != "Not defined") echo "value=\"".$userInfo['yahoo']."\" ";?>/></div>
				</div>
				
				<div class="login-button">
					<input type="submit" name="saveProfileInfo" value="Save profile" />
				</div>
			</form>
			</div>
		</div>
	</div>
<?php
}