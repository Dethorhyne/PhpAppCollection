<?php
function recentPosts()
{
	global $DBCON
?>
	<div class="category-section">
		<div class="generic-post-header">Recent Posts</div>
		<div class="generic-post-content"> 
			<?php
				$qry = mysqli_query($DBCON,"SELECT boardID, title, date, postID FROM post WHERE inPostID=0 ORDER BY date DESC LIMIT 5");
				while($recentPost = mysqli_fetch_array($qry))
				{ 
					?>
					<div class="recent-post-item">
					<a href="/post/<?php echo $recentPost['boardID'];?>/<?php echo $recentPost['postID']; ?>/">
						<div class="recent-post-title"><?php echo $recentPost['title']; ?></div>
						<div class="recent-post-date"><span><?php echo $recentPost['date']; ?></span></div>
					</a>
					</div>
					<?php 
				} 
			?> 
		</div>
	</div>
<?php
}

?>