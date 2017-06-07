<?php
function registerForm()
{
	global $DBCON;
	$badUsername = false;
	$badPassword = false;
	$badEmail = false;
	$badPwdMatch = false;
	if(isset($_POST['submitRegister']))
	{
		$username = stripslashes($_POST['username']);
		$password = stripslashes($_POST['password']);
		$pwdrepeat= stripslashes($_POST['pwdrepeat']);
		$email= stripslashes($_POST['email']);
		
		$username = mysqli_real_escape_string($DBCON, $username);
		$password = mysqli_real_escape_string($DBCON, $password);
		$pwdrepeat = mysqli_real_escape_string($DBCON, $pwdrepeat);
		$email= mysqli_real_escape_string($DBCON, $email);
		
		$badUsername = usernameTaken($username);
		$badPassword = checkPassword($password);
		$badPwdMatch = checkPasswordMatch($password, $pwdrepeat);
		$badEmail = emailTaken($email);
		
		if($badUsername == false && $badPassword == false && $badEmail == false && $badPwdMatch == false)
		{
			mysqli_query($DBCON,"INSERT INTO user (username, password, email, dateregistered) VALUES('".$username."', '".md5($password)."', '".$email."', NOW())") or die(mysqli_error());
				$_SESSION['username'] = $username;
				$un = mysqli_fetch_array(mysqli_query($DBCON,"SELECT userID FROM user WHERE username='".$username."'"));
				$_SESSION['userID'] = $un['userID'];
				mysqli_query($DBCON,"INSERT INTO userinfo (userID) VALUES ('".$un['userID']."')");
				$_SESSION['loggedin']= true;
				header("location:/index/");
		}
	}	
	?>

<div class="login-section">
		<div class="generic-post-header"><?php echo lang('l_register'); ?></div>
		<div class="generic-post-content"> 
			<div class="login-form">
			<form method="post">
				<div class="login-item">
					<div class="login-desc"><span><?php echo lang('l_username');?></span></div>
					<div class="login-input"><input type="text" required="required" maxlength="32" name="username" placeholder="Type your username" /></div>
				</div>
				<?php if($badUsername == true)
				{
				?>
					<div class="login-error">
							<span>Username taken</span>
					</div>
				<?php 
				}
				?>
				<div class="login-item">
					<div class="login-desc"><span><?php echo lang('l_password');?></span></div>
					<div class="login-input"><input type="password" required="required" maxlength="32" name="password" placeholder="Type your password" /></div>
				</div>
				<?php if($badPassword == true)
				{
				?>
					<div class="login-error">
							<span>Invalid password</span>
					</div>
				<?php 
				}
				?>
				<div class="login-item">
					<div class="login-desc"><span><?php echo lang('l_password');?></span></div>
					<div class="login-input"><input type="password" required="required" maxlength="32" name="pwdrepeat" placeholder="Type your password" /></div>
				</div>
				<?php if($badPwdMatch == true)
				{
				?>
					<div class="login-error">
							<span>Passwords don't match</span>
					</div>
				<?php 
				}
				?>
				<div class="login-item">
					<div class="login-desc"><span>E-mail</span></div>
					<div class="login-input"><input type="text" required="required" maxlength="64" name="email" placeholder="Enter a valid E-mail" /></div>
				</div>
				<?php if($badEmail == true)
				{
				?>
					<div class="login-error">
							<span>E-mail taken</span>
					</div>
				<?php 
				}
				?>
				<div class="login-button">
					<input type="submit" name="submitRegister" value="<?php echo lang('l_register');?>" />
				</div>
			</form>
			</div>
		</div>
	</div>
	<?php
}
?>