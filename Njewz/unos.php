<?php

require("global.php");
require("modules.php");


if(isset($_SESSION['Admin']))
{
	if($_SESSION['Admin'])
	{
		
	}
	else
	{
	header("location:403.php");
	}
}
else
{
	header("location:403.php");
}


$ImageError = false;

if(isset($_POST['Submit']))
{
	$Title = mysqli_real_escape_string($DBCON,$_POST['Title']);
	$Description = parseBBCode(mysqli_real_escape_string($DBCON,$_POST['Description']));
	$Body = parseBBCode(mysqli_real_escape_string($DBCON,$_POST['Body']));
	$CategoryId = mysqli_real_escape_string($DBCON,$_POST['Category']);
	$Private = isset($_POST['Private']);
	$filetmp = $_FILES["Image"]["tmp_name"];
	$filename = $_FILES["Image"]["name"];
	$filetype = $_FILES["Image"]["type"];
	$GUID = md5($filename.$Title.$CategoryId.time());
	
	if($filetype!="image/jpeg" && $filetype!="image/png")
	{
		$ImageError = true;	
	echo("Imageerror<br />");
	}
	
	if($ImageError == false)
	{
		$Filepath = "images/articles/".$GUID.".png";
		
		mysqli_query($DBCON,"INSERT INTO articles (GUID, Title, Description, Body, CreationDate, AuthorId, CategoryId, ImagePath, Private) VALUES('".$GUID."', '".$Title."', '".$Description."', '".$Body."', NOW(), '1', '".$CategoryId."', '".$Filepath."', '".$Private."')") or die(mysqli_error($DBCON));
		
		
		move_uploaded_file($filetmp,$Filepath);
		
		$Article=mysqli_fetch_array(mysqli_query($DBCON,"SELECT ArticleId FROM articles WHERE guid='".$GUID."'"));
		
		header("location:article.php?ArticleId=".$Article[0]."");

	}
	
	
}



?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo($PortalTitle); ?> - Unos</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/font.css">
<link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">

<script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/site.js"></script> 
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/jquery.li-scroller.1.0.js"></script> 
<script src="assets/js/jquery.newsTicker.min.js"></script> 
<script src="assets/js/jquery.fancybox.pack.js"></script> 
<script src="assets/js/custom.js"></script>
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<?php Module_TopHeader(); ?>
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="index.php" class="logo"><img src="images/logo.jpg" alt=""></a></div>
          <div class="add_banner"><a href="#"><img src="images/addbanner_728x90_V1.jpg" alt=""></a></div>
        </div>
      </div>
    </div>
  </header>
  <?php Module_Navigation(); ?>
  <?php Module_LatestNewsAndSocial(); ?>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="left_content">
          <div class="contact_area">
            <h2>Unos</h2>
			<?php
			if($ImageError)
			{
				?><form class="contact_form" method="post" enctype="multipart/form-data">
				<div class="form-group">
				  <label for="Title">Naslov:</label>
				  <input class="form-control" type="text" value="<?php echo($_POST['Title']); ?>" placeholder="Naslov" name="Title">
				</div>
				<div class="form-group">
				  <label for="Description">Kratki opis:</label>
				  <textarea class="form-control" cols="30" rows="5" placeholder="Kratki opis" name="Description" required><?php echo($_POST['Description']); ?></textarea>
				</div>
				<div class="form-group">
				  <label for="Body">Tijelo:</label>
				  <textarea class="form-control" cols="30" rows="10" placeholder="Tijelo" name="Body" required><?php echo($_POST['Body']); ?></textarea>
				</div>
				<div class="form-group">
				  <label for="Category">Kategorija:</label>
				  <select class="form-control" name="Category" required>
					  <?php
					  
						$CategoryQry = mysqli_query($DBCON,"SELECT CategoryId, CategoryName FROM categories ORDER BY CategoryName ASC");
						while($Category = mysqli_fetch_array($CategoryQry))
						{
							?>
								<option value="<?php echo($Category['CategoryId']);?>" <?php if($Category['CategoryId'] == $CategoryId) echo("selected"); ?>><?php echo($Category['CategoryName']);?></option>
							<?php
						}
					  ?>
					  </select>
				</div>
              
				<div class="form-group">
				  <label for="Image">Odaberite sliku. (Dozvoljeni formati: jpg,jpeg,png):</label>
				  <input class="form-control" type="file" name="Image"/> 
				  <label>Niste odabrali dobru sliku!</label>
				</div>
				<div class="form-group">
				  <label for="Private">Privatna objava?:</label>
				  <input class="checkbox-inline" type="checkbox" name="Private" <?php if($Category['Private'] == $Private) echo("checked"); ?>/>
				</div>
              <input type="Submit" value="Unesi objavu">
            </form>
				<?php
			}
			else
			
			{
				?><form class="contact_form" method="post" enctype="multipart/form-data">
				<div class="form-group">
				  <label for="Title">Naslov:</label>
				  <input id="FormInputTitle" class="form-control" type="text" placeholder="Naslov" name="Title">
				  <span class="InputErrorMessage"></span>
				</div>
				<div class="form-group">
				  <label for="Description">Kratki opis:</label>
				  <textarea id="FormInputDesc" class="form-control" cols="30" rows="5" placeholder="Kratki opis" name="Description"></textarea>
				  <span class="InputErrorMessage"></span>
				</div>
				<div class="form-group">
				  <label for="Body">Tijelo:</label>
				  <textarea id="FormInputBody" class="form-control" cols="30" rows="10" placeholder="Tijelo" name="Body"></textarea>
				  <span class="InputErrorMessage"></span>
				</div>
				<div class="form-group">
				  <label for="Category">Kategorija:</label>
				  <select id="FormInputCat" class="form-control" name="Category">
						<option value="-1" selected disabled>Odaberite kategoriju...</option>
					  <?php
					  
						$CategoryQry = mysqli_query($DBCON,"SELECT CategoryId, CategoryName FROM categories ORDER BY CategoryName ASC");
						while($Category = mysqli_fetch_array($CategoryQry))
						{
							?>
								<option value="<?php echo($Category['CategoryId']);?>"><?php echo($Category['CategoryName']);?></option>
							<?php
						}
					  ?>
					  </select>
				  <span class="InputErrorMessage"></span>
				</div>
              
				<div class="form-group">
				  <label for="Image">Odaberite sliku. (Dozvoljeni formati: jpg,jpeg,png):</label>
				  <input class="form-control" type="file" name="Image" required/> 
				</div>
				<div class="form-group">
				  <label for="Private">Privatna objava?:</label>
				  <input  id="FormInputPriv" class="checkbox-inline" type="checkbox" name="Private"/>
				</div>
              <input id="SubmitButton" type="Submit" name="Submit" value="Unesi objavu">
            </form>
				<?php
				
			}
			
			?>
            
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<footer id="footer">
    <div class="footer_top">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInLeftBig">
            <h2>Linkovi</h2>
          </div>
        </div>
        <?php Module_FooterCategories(); ?>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInRightBig">
            <h2>Kontakt</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <address>
            Vrbik 8, 10000 Zagreb, Croatia
            </address>
          </div>
        </div>
      </div>
    </div>
    <div class="footer_bottom">
      <p class="copyright">Copyright &copy; 2017 <a href="index.php">ShardTools</a></p>
      <p class="developer">Developed By DethoRhyne</p>
    </div>
  </footer>
</body>
</html>