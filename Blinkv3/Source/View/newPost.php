<?php

function showPostForm()
{
	global $DBCON;
	if(isset($_GET['post']))
		$postTitle = mysqli_fetch_array(mysqli_query($DBCON,"SELECT title FROM post WHERE postID='".$_GET['post']."'"));
?>
	<div class="new-post-section">
			<form method="post">
				<div class="new-post-header"><?php if(!isset($_GET['post'])) {?><input type="text" required="required" name="title" placeholder="Post title" /><?php } else {?>Re: <?php echo $postTitle[0]; } ?></div>
				<div class="new-post-content">
					<div class="new-post-body">
					<textarea required="required" id="new-post-body" name="body" placeholder="Post content"><?php 
					if(isset($_GET['quote']))
					{
						$quote = mysqli_fetch_array(mysqli_query($DBCON,"SELECT body FROM post WHERE postID='".$_GET['quote']."' LIMIT 1"));
						$quote = reverseBBCode($quote[0]);
						echo "[quote]".$quote."[/quote] \n \n";
					}
					?></textarea></div>
					
					<div class="new-post-button">
						<input type="submit" name="submitPost" value="Submit Post" />
					</div>
				</div>
			</form>
	</div>
<?php 

}

function showEditPostForm()
{
	global $DBCON;
	if(mysqli_num_rows(mysqli_query($DBCON,"SELECT postID FROM post WHERE inPostID='".$_GET['post']."'")) == 0)
		{
			$postID = mysqli_fetch_array(mysqli_query($DBCON,"SELECT inPostID FROM post WHERE PostID='".$_GET['post']."'"));
			$originalPost = $postID[0];
			$postTitle = mysqli_fetch_array(mysqli_query($DBCON,"SELECT title FROM post WHERE postID='".$originalPost."'"));
		}
	else
		$postTitle = mysqli_fetch_array(mysqli_query($DBCON,"SELECT title FROM post WHERE postID='".$_GET['post']."'"));
	
?>
	<div class="new-post-section">
			<form method="post">
				<div class="new-post-header"><?php echo $postTitle[0]; ?></div>
				<div class="new-post-content">
					<div class="new-post-body">
					<textarea required="required" id="new-post-body" name="body" placeholder="Post content"><?php 
						$message = mysqli_fetch_array(mysqli_query($DBCON,"SELECT body FROM post WHERE postID='".$_GET['post']."' LIMIT 1"));
						$message = reverseBBCode($message[0]);
						echo $message;
					?></textarea></div>
					
					<div class="new-post-button">
						<input type="submit" name="editPost" value="Save changes" />
					</div>
				</div>
			</form>
	</div>
<?php 

}
?> 