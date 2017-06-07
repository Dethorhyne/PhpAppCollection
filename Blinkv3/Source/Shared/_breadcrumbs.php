<?php

function breadcrumbs()
{
	global $DBCON;
	if(isset($_GET['board'])) $boardCrumb = mysqli_fetch_array(mysqli_query($DBCON,"SELECT title FROM board WHERE boardID='".$_GET['board']."'"));
	if(isset($_GET['post'])) 
	{
		$postCrumb = mysqli_fetch_array(mysqli_query($DBCON,"SELECT title FROM post WHERE postID='".$_GET['post']."'"));

  }
  ?>
    <nav id="breadcrumbs">
      <ol>
      <?php 

		if(!isset($_GET['board']) && !isset($_GET['post'])) 
		{
			?>
			<li><?php
				if($_SESSION['currentPage'] == "Index"){ echo lang('l_index'); }
				if($_SESSION['currentPage'] == "Forum"){ echo lang('l_forum'); }
			?></li>
			<?php
		}
    
		if(isset($_GET['board']) && !isset($_GET['post']))
		{
			?>
			<li><a href="/forum/"><?php echo lang('l_forum');?></a></li><span> > </span>
			<?php
			if(!isset($_GET['action'])) 
			{
				?>
				<li><?php echo $boardCrumb['title'];?></li>
				<?php
			}
			else
			{
				?>
				<li><a href="/board/<?php echo $_GET['board'];?>/"><?php echo $boardCrumb['title'];?></a></li>
				<span> > </span>
				<li><?php 
						echo lang('l_addPost'); 
				?></li>
				<?php
			}
		}
    
		if(isset($_GET['board']) && isset($_GET['post']))
		{
			?>
			<li><a href="/forum/"><?php echo lang('l_forum');?></a></li><span> > </span>
			<li><a href="/board/<?php echo $_GET['board']; ?>/"><?php echo $boardCrumb['title']; ?></a></li><span> > </span>
			<?php
			if(!isset($_GET['action'])) 
			{
				?>
				<li><?php echo $postCrumb['title'];?></li>
				<?php
			}
			else
			{
				?>
				<li><a href="/post/<?php echo $_GET['board'];?>/<?php echo $_GET['post'];?>/"><?php echo $postCrumb['title'];?></a></li>
				<span> > </span>
				<li><?php
					if($_GET['action'] == "editpost")
						echo "Edit post";
					else
						echo lang('l_addComment');
				?></li>
				<?php
			}
		}
      ?>
	  </ol>
    </nav>
  <?php
}
?>