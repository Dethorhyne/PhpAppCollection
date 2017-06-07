<?php
require("global.php");
require("modules.php");

if(isset($_POST['Logout']))
{
	session_destroy();
	header("location:login.php");
}

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
	header("location:login.php");
}



if(isset($_POST['Delete']))
{
	mysqli_query($DBCON,"DELETE FROM articles WHERE ArticleId='".$_POST['ArticleId']."'");	
}
if(isset($_POST['ShowHide']))
{
	if($_POST['Private']=="1")
	{
		mysqli_query($DBCON,"UPDATE articles SET private=false WHERE ArticleId='".$_POST['ArticleId']."'");	
	}
	else
	{
		mysqli_query($DBCON,"UPDATE articles SET private=true WHERE ArticleId='".$_POST['ArticleId']."'");	
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
            <h2>Objave</h2>
			<form method="POST">
				<input class="btn btn-red" type="submit" name="Logout" Value="Odjava" />
			</form>
			<?php
			$PostsQry = mysqli_query($DBCON,"SELECT ArticleId,Title,Private FROM articles");
			
			while($Post = mysqli_fetch_array($PostsQry))
			{
				?>
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8">
						<p><?php echo($Post['Title']); ?></p>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2">
						<form method="post">
							<input type="hidden" value="<?php echo($Post['ArticleId']); ?>" name="ArticleId" />
							<input type="hidden" value="<?php echo($Post['Private']); ?>" name="Private" />
							<?php
								if($Post['Private'])
								{
									?>
										<input type="submit" class="btn btn-green" value="Prikaži" name="ShowHide" />
									<?php
								}
								else
								{
									?>
										<input type="submit" class="btn btn-orange" value="Sakrij" name="ShowHide" />
									<?php
								}
							?>
						</form>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2">
						<form method="post">
							<input type="hidden" value="<?php echo($Post['ArticleId']); ?>" name="ArticleId" />
							<input type="submit" class="btn btn-red" value="Obriši" name="Delete" />
						</form>
					</div>
				</div>
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
<script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/jquery.li-scroller.1.0.js"></script> 
<script src="assets/js/jquery.newsTicker.min.js"></script> 
<script src="assets/js/jquery.fancybox.pack.js"></script> 
<script src="assets/js/custom.js"></script>
</body>
</html>