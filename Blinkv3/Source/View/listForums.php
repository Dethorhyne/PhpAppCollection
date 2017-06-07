<?php
function listForums()
{	
	global $DBCON;
	$categoryQry = mysqli_query($DBCON,"SELECT boardID, title, categoryOrder FROM board WHERE isCategory = 1 ORDER BY categoryOrder ");
	while($category = mysqli_fetch_array($categoryQry))
	{
	?>
	<div class="category-section" id="category_<?php echo $category['categoryOrder']; ?>">
		<div class="generic-post-header"><?php echo $category['title']; ?></div>
		<div class="generic-post-content"> 
		<?php 
		$boardQry = mysqli_query($DBCON,"SELECT boardID, title FROM board WHERE inCategory='".$category['boardID']."' ORDER BY categoryOrder");
		while($board = mysqli_fetch_array($boardQry))
		{
			$numberOfPosts = mysqli_num_rows(mysqli_query($DBCON,"SELECT postID FROM post where boardID = '".$board['boardID']."' AND inPostID=0"));
			?>
					<div class="list-board-item">
					<a href="/board/<?php echo $board['boardID'];?>/">
						<div class="list-board-title"><?php echo $board['title']; ?></div>
						<div class="list-board-date"><span>
						<?php if($numberOfPosts == 1) { echo $numberOfPosts." topic"; }	else { echo $numberOfPosts." topics"; }?></span></div>
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