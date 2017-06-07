<?php
function listPosts()
{	
	global $DBCON;
	$postQry = mysqli_query($DBCON,"SELECT * FROM post WHERE postID = '".$_GET['post']."'");
	if(mysqli_num_rows($postQry) == 0) { header("location:/board/".$_GET['board']."/"); }
	while($post = mysqli_fetch_array($postQry))
	{
		$existingUser = mysqli_num_rows(mysqli_query($DBCON,"SELECT userID FROM user WHERE userID = '".$post['posterID']."'"));
		if($existingUser != 0)
		{
			$poster = mysqli_fetch_array(mysqli_query($DBCON,"SELECT * FROM user WHERE userID = '".$post['posterID']."'"));
		}
		else
		{
			$poster['username'] = "Deleted User";
		}
	?>
	<div class="category-section">
		<div class="generic-post-header"><?php echo $post['title']; ?></div>
		<div class="generic-post-content"> 
			<div class="post-item">
				<div class="poster-info post-first">
					<div class="poster-username"><?php 
					if($existingUser != 0)
					{
					?><a href="/user/<?php echo $poster['userID']; ?>/" ><?php echo $poster['username']; ?> </a><?php
					}
					else
					{
						echo $poster['username'];
					}
					?></div>
					<div class="post-date"><?php echo $post['date']; ?></div>
				</div>
				<div class="post-content"><?php echo $post['body']; ?></div>
				<div class="post-controls">
				<?php
				if(isset($_SESSION['username']))
				{
					if($_SESSION['username'] == $poster['username'] || $_SESSION['userLevel'] == 1)
					{
					?>
				<div class="post-control">
						<a href="/post/edit/<?php echo $post['boardID']; ?>/<?php echo $post['postID']; ?>">Edit</a></div><?php
					}
					?>
					<div class="post-control">
						<a href="/comment/new/<?php echo $_GET['board']; ?>/<?php echo $_GET['post']; ?>/<?php echo $post['postID']; ?>">Quote</a></div>
					<?php 
					if($_SESSION['userLevel'] == 1)
					{?>
					<form method="post">
						<input type="hidden" name="postToDelete" value="<?php echo $post['postID']; ?>" />
						<div class="post-control"><input type="submit" name="deletePost" value="Delete" /></div>
					</form>
					<?php
					}
				}
				?>
				</div>
			</div>
		
		<?php 
		$commentQry = mysqli_query($DBCON,"SELECT * FROM post WHERE inPostID='".$post['postID']."' ORDER BY date");
		while($comment = mysqli_fetch_array($commentQry))
		{
			$poster = mysqli_fetch_array(mysqli_query($DBCON,"SELECT * FROM user WHERE userID = '".$comment['posterID']."'"));
			?>
				<div class="comment-item">
					<div class="comment-title">Re: <?php echo $post['title']; ?></div>
					<div class="generic-comment-content">
						<div class="poster-info post-comment">
							<div class="poster-username"><a href="/user/<?php echo $poster['userID']; ?>/" ><?php echo $poster['username']; ?></a></div>
							<div class="post-date"><?php echo $comment['date']; ?></div>
						</div>
						<div class="post-content"><?php echo $comment['body']; ?></div>
						<div class="post-controls">
				<?php
				if(isset($_SESSION['username']))
				{
					if($_SESSION['username'] == $poster['username'] || $_SESSION['userLevel'] == 1)
					{
					?>
				<div class="post-control">
						<a href="/post/edit/<?php echo $post['boardID']; ?>/<?php echo $comment['postID']; ?>">Edit</a></div><?php
					}
					?>
					<div class="post-control">
						<a href="/comment/new/<?php echo $_GET['board']; ?>/<?php echo $_GET['post']; ?>/<?php echo $comment['postID']; ?>">Quote</a></div>
					<?php 
					if($_SESSION['userLevel'] == 1)
					{?>
					<form method="post">
						<input type="hidden" name="postToDelete" value="<?php echo $comment['postID']; ?>" />
						<div class="post-control"><input type="submit" name="deletePost" value="Delete" /></div>
					</form>
					<?php
					}
				}
				?>
						</div>
					</div>
				</div>
				<?php 
			} 
			?> 
		</div>
	</div>
<?php
	}
}
?>