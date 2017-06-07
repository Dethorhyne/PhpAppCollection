<?php


require("global.php");
require("modules.php");

if(isset($_POST['Login']))
{
	if(mysql_real_escape_string($_POST['Username']) == "Admin" && mysql_real_escape_string($_POST['Password']) == "Zap123")
	{
		$_SESSION['Admin'] = true;
		header("location:administrator.php");
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
            <h2>Prijava</h2>
				<form class="contact_form" method="post" enctype="multipart/form-data">
				<div class="form-group">
				  <label for="Title">Korisničko ime:</label>
				  <input class="form-control" type="text" placeholder="Korisničko ime" name="Username" required />
				</div>
				<div class="form-group">
				  <label for="Description">Zaporka:</label>
				  <Input type="password" class="form-control" placeholder="Zaporka" name="Password" required />
				</div>
              <input type="Submit" value="Prijava" name="Login">
            </form>
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