<?php

function addNewPostButton()
{
?>
	<div class="new-post-button-line">
		<div class="new-post-button">
			<a href="/<?php
				if(isset($_GET['post']))
				{ 
					echo "comment";
				} 
				else 
				{ 
					echo "post"; 
				}
				?>/new/<?php
				
				echo $_GET['board'];
				if(isset($_GET['post']))
				{
				?>/<?php echo $_GET['post']; 
				}
				
				?>">
					<?php
					if(isset($_GET['post']))
					{
						echo lang('l_addComment');
					}
					else
					{
						echo lang('l_addPost');
					}
					?>
				</a>
		</div>
	</div>
<?php 
} 