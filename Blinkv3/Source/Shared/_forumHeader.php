<?php
function forumHeader()
{
?>
	<header>
		<div class="logo">
			<?php 
				if($_SESSION['currentPage'] == "Index") 
				{
					?>
						<a href="#"></a>
					<?php
				}
				else
				{
					?>
						<a href="/index/"></a>
					<?php
				}
			?>
		</div>
		<?php 
		if(isset($_SESSION['username']))
			LoggedInUser();
		else 
			notLoggedInUser();
		?>
	
	<div class="pageNavigation">
		<a <?php if($_SESSION['currentPage'] == "Index") { ?>class="currentTab"<?php }?> <?php if($_SESSION['currentPage'] == "Index") { ?>href="#"<?php } else {?>href="/index/"<?php }?>><?php echo lang('l_index');?></a>
		
		<a <?php if($_SESSION['currentPage'] == "Forum") { ?>class="currentTab"<?php }?> <?php if($_SESSION['currentPage'] == "Forum" && !isset($_GET['board']) && !isset($_GET['post'])) { ?>href="#"<?php } else {?>href="/forum/"<?php }?>><?php echo lang('l_forum');?></a>
	</div>
	
	</header>
<?php
}

function loggedInUser()
{
	global $DBCON;
$userID=mysqli_fetch_array(mysqli_query($DBCON,"SELECT userID FROM user WHERE username='".$_SESSION['username']."' LIMIT 1"));

?>
	<div id="user-menu">
		<a class="user-button" href="/user/<?php echo $userID[0]; ?>/"><?php echo $_SESSION['username']; ?></a>
		<a class="logout-button" href="/login/?logout"><?php echo lang('l_logout');?></a>
	</div>
<?php
}

function notLoggedInUser()
{
?>
	<div id="login-and-registration">
		<a class="login-button" href="/login/"><?php echo lang('l_login');?></a>
		<a class="register-button" href="/register/"><?php echo lang('l_register');?></a>
	</div>
<?php
}
?>