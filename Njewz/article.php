<?php 
require("global.php");
require("modules.php");
if(isset($_GET['ArticleId']))
{
	$PostQry = mysqli_query($DBCON,"SELECT articles.*, users.Username, categories.CategoryName FROM articles, users, categories WHERE articles.AuthorId = users.UserId AND articles.CategoryId = categories.CategoryId AND articles.ArticleId = '".$_GET['ArticleId']."'");
	
	if(mysqli_num_rows($PostQry) == 0)
	{
		#header("location:404.html");
	}
	else
	{
		$ViewQry = mysqli_query($DBCON,"UPDATE articles SET Views = Views+1 WHERE articles.ArticleId = '".$_GET['ArticleId']."'");
		$Post = mysqli_fetch_array($PostQry);
	}
}
else
{
	#header("location:404.html");
}


?>

<!DOCTYPE html>
<html>
<head>
<title>Njewz - <?php echo($Post['Title']); ?></title>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
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
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
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
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <ol class="breadcrumb">
              <li><a href="index.php">Home</a></li>
              <li><a href="#"><?php echo($Post['CategoryName']); ?></a></li>
            </ol>
			<h1><?php echo($Post['Title']); ?></h1>
			<h4><?php echo($Post['Description']); ?></h4>
            <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i><?php echo($Post['Username']);?></a> <span><i class="fa fa-calendar"></i><?php Post_Time($Post['CreationDate']); ?></span> <a href="#"><i class="fa fa-tags"><?php echo($Post['CategoryName']); ?></i></a> </div>
            <div class="single_page_content"> 
			<img class="img-center" src="<?php echo($Post['ImagePath']);?>" alt="">
			
              <p><?php echo($Post['Body']); ?></p>
			  
            </div>
            <div class="social_link">
              <ul class="sociallink_nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <?php Module_PopularPosts(); ?>
          <?php Module_CategoriesAndComments(); ?>
          <?php Module_Sponsor(); ?>			
          <?php Module_CategoryArchive(); ?>
          <?php Module_Links(); ?>
        </aside>
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