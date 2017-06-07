<?php
function errorMessage()
{
?>
	<div class="category-section">
		<div class="generic-post-header">ERROR <?php if(isset($_GET['error'])) echo $_GET['error']; ?></div>
		<div class="generic-post-content"> 
			<div class="recent-post-item">
				<div class="recent-post-title"><?php 
					if($_GET['error'] == "404") echo "Page you're looking for is not here. You will be redirected shortly."; 
					if($_GET['error'] == "403") echo "Access forbidden! You will be redirected shortly."; 
				?></div>
			</div>
		</div>
	</div>
<?php
}
?>