<?php
function listTopics()
{	
	global $DBCON;
	$boardQry = mysqli_query($DBCON,"SELECT boardID, title, categoryOrder FROM board WHERE boardID = '".$_GET['board']."' ORDER BY categoryOrder ");
	while($board = mysqli_fetch_array($boardQry))
	{
	?>
	<div class="category-section">
		<div class="generic-post-header"><?php echo $board['title']; ?></div>
		<div class="generic-post-content"> 
		<?php 
		$postQry = mysqli_query($DBCON,"SELECT postID, title FROM post WHERE boardID='".$board['boardID']."' and inPostID=0 ORDER BY date");
		while($post = mysqli_fetch_array($postQry))
		{
			$numberOfComments = mysqli_num_rows(mysqli_query($DBCON,"SELECT postID FROM post where inPostID = '".$post['postID']."'"));
			?>
					<div class="list-board-item">
					<a href="/post/<?php echo $_GET['board'];?>/<?php echo $post['postID'] ?>/">
						<div class="list-board-title"><?php echo $post['title']; ?></div>
						<div class="list-board-date"><span>
						<?php 
						if($numberOfComments == 1) 
							echo $numberOfComments." comment"; 
						else 
							echo $numberOfComments." comments"; ?></span></div>
					</a>
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