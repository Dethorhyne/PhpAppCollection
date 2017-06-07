<?php 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<form action="uploadimage.php" method="post" enctype="multipart/form-data">
<input type="file" name="file_img" />
<input type="submit" name="btn_upload" value="Upload">	
</form>

<?php
echo(md5("hitman14"));
if(isset($_POST['btn_upload']))
{
	$filetmp = $_FILES["file_img"]["tmp_name"];
	$filename = $_FILES["file_img"]["name"];
	$filetype = $_FILES["file_img"]["type"];
	$filepath = "images/articles/".md5($filename).".png";
	
	move_uploaded_file($filetmp,$filepath);
	
	echo($filetmp);
	echo("<br />");
	echo($filename);
	echo("<br />");
	echo($filetype);
	echo("<br />");
	echo(md5($filepath));
	?>
	<img src="<?php echo($filepath);?>" />
	<?php
	
}

?>

</body>
</html>
