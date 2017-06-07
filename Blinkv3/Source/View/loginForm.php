<?php
function LoginForm()
{
	global $DBCON;
	$badPassword=false;
	$badUsername=false;
	if(isset($_POST['submitLogin']))
	{
		$username = stripslashes($_POST['username']);
		$password = stripslashes($_POST['password']);
		$username = mysqli_real_escape_string($DBCON, $username);
		$password = mysqli_real_escape_string($DBCON, $password);
		
		if(checkUsername($username) == true)
		{
			if(userExists($username,$password) == true)
			{
				$userID = mysqli_fetch_array(mysqli_query($DBCON,"SELECT userID FROM user WHERE username='".$username."'"));
				$_SESSION['username'] = $username;
				$_SESSION['userID'] = $userID[0];
				$_SESSION['loggedin']= true;
				header("location:/index/");
			}
			else 
			{
				$badPassword=true;
			}
		}
		else
		{
			$badUsername=true;
		}
	}	
	
?>
	<div class="login-section">
		<div class="generic-post-header"><?php echo lang('l_login'); ?></div>
		<div class="generic-post-content"> 
			<div class="login-form">
			<form method="post">
				<div class="login-item">
					<div class="login-desc"><span><?php echo lang('l_username');?></span></div>
					<div class="login-input"><input type="text" maxlength="32" name="username" placeholder="Type your username" /></div>
				</div>
				<?php if($badUsername)
				{
				?>
					<div class="login-error">
							<span>Username not found</span>
					</div>
				<?php 
				}
				?>
				<div class="login-item">
					<div class="login-desc"><span><?php echo lang('l_password');?></span></div>
					<div class="login-input"><input type="password" maxlength="32" name="password" placeholder="Type your password" /></div>
				</div>
				<?php if($badPassword)
				{
				?>
					<div class="login-error">
							<span>Invalid password</span>
					</div>
				<?php 
				}
				?>
				<div class="login-button">
					<input type="submit" name="submitLogin" value="<?php echo lang('l_login');?>" />
				</div>
			</form>
			</div>
		</div>
	</div>
<?php

}
?>