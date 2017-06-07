<?php

function showUserInfo()
{
	global $DBCON;
$qry = mysqli_query($DBCON,"SELECT * FROM user WHERE userID='".$_GET['user']."'");
$user = mysqli_fetch_array($qry);
$uiqry = mysqli_query($DBCON,"SELECT * FROM userinfo WHERE userID='".$_GET['user']."'");
$userInfo = mysqli_fetch_array($uiqry);	

$posts = mysqli_num_rows(mysqli_query($DBCON,"SELECT postID FROM post WHERE posterID='".$_GET['user']."'"));
	
$userType = getUserType($user['usertype']);

	?>
	<div class="category-section">
		<div class="generic-post-header">Viewing <?=$user['username'];?>'s profile</div>
		<div class="generic-post-content"> 
			<div class="user-left-column">
				<div class="user-image">
					<img class="user-profile-image" src="../../images/avatars/no_avatar.png" />
				</div>
				
				<div class="user-statistic-item">
					<div class="user-statistic-q"><?=lang('l_dateRegistered');?>:</div>
					<div class="user-statistic-a"><?=$user['dateregistered'];?></div>
				</div>
				
				<div class="user-statistic-item">
					<div class="user-statistic-q">Number of posts:</div>
					<div class="user-statistic-a"><?=$posts;?></div>
				</div>
			</div>
			<div class="user-right-column">
				<div class="user-info-item">
					<div class="user-info-q"><?=lang('l_username');?>: <span class="user-info-a"><?=$user['username'];?></span></div>
				</div>
				
				<div class="user-info-item">
					<div class="user-info-q"><?=lang('l_usertype');?>: <span class="user-info-a"><?=$userType;?></span></div>
				</div>
				
				<div class="user-info-item">
					<div class="user-info-q">Location: <span class="user-info-a"><?=$userInfo['location'];?></span></div>
				</div>
				
				<div class="user-info-item">
					<div class="user-info-q">Age: <span class="user-info-a"><?=$userInfo['age'];?></span></div>
				</div>
				
				<div class="user-info-item">
					<div class="user-info-q">Occupation: <span class="user-info-a"><?=$userInfo['occupation'];?></span></div>
				</div>
				
				<div class="user-info-item">
					<div class="user-info-q">Interests: <span class="user-info-a"><?=$userInfo['interests'];?></span></div>
				</div>
				
				<div class="user-info-item">
					<div class="user-info-q">Steam: <span class="user-info-a"><?=$userInfo['steam'];?></span></div>
				</div>
				
				<div class="user-info-item">
					<div class="user-info-q">Skype: <span class="user-info-a"><?=$userInfo['skype'];?></span></div>
				</div>
				
				<div class="user-info-item">
					<div class="user-info-q">yahoo: <span class="user-info-a"><?=$userInfo['yahoo'];?></span></div>
				</div>
				
				<div class="user-info-item">
					<div class="user-info-q">Email: <span class="user-info-a"><?php echo $user['email']; ?></span></div>
				</div>
			</div>
			<div class="user-signature">
			
			</div>
		</div>
	</div>
<?php
}
?>