<?php
require("global.php");
require("functions.php");

function Module_Navigation()
{
	?>
	<section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Navigacija</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">
          <li class="active"><a href="index.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Početna stranica</span></a></li>
          <li class="dropdown"> <a href="find.php?CategoryId=1,6" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Novosti</a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="find.php?CategoryId=1">Politika</a></li>
              <li><a href="find.php?CategoryId=2">Svijet</a></li>
              <li><a href="find.php?CategoryId=3">Poslovanje</a></li>
              <li><a href="find.php?CategoryId=4">Crna Kronika</a></li>
              <li><a href="find.php?CategoryId=5">Šokantno</a></li>
              <li><a href="find.php?CategoryId=6">Zanimljivosti</a></li>
            </ul>
          </li>
          <li class="dropdown"> <a href="find.php?CategoryId=7,8" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Showbiz</a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="find.php?CategoryId=7">Film</a></li>
              <li><a href="find.php?CategoryId=8">Glazba</a></li>
            </ul>
          </li>
          <li><a href="find.php?CategoryId=9">Sport</a></li>
          <li class="dropdown"> <a href="find.php?CategoryId=10" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Život i stil</a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="find.php?CategoryId=11">Zdravlje</a></li>
              <li><a href="find.php?CategoryId=12">Ljubav &amp; Seks</a></li>
              <li><a href="find.php?CategoryId=13">Moda</a></li>
              <li><a href="find.php?CategoryId=14">Kuhanje</a></li>
              <li><a href="find.php?CategoryId=15">Obitelj</a></li>
            </ul>
          </li>
          <li class="dropdown"> <a href="find.php?CategoryId=20" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tehnologija</a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="find.php?CategoryId=16">Internet</a></li>
              <li><a href="find.php?CategoryId=17">Gaming</a></li>
              <li><a href="find.php?CategoryId=19">Auto-Moto</a></li>
            </ul>
          </li>
          <li><a href="find.php?CategoryId=18">Znanost</a></li>
        </ul>
      </div>
    </nav>
  </section>
	<?php
	
}


function Module_LatestNewsAndSocial()
{
	require("global.php");
	$PostsQry = mysqli_query($DBCON,"SELECT ArticleId, Title, ImagePath FROM articles WHERE Private=false ORDER BY Views LIMIT 9");
    ?>
    <section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"> <span>Najnoviji sadržaj</span>
          <ul id="ticker01" class="news_sticker">
		  <?php
		  while($Post = mysqli_fetch_array($PostsQry))
		  {
			?>
            <li><a href="article.php?ArticleId=<?php echo($Post['ArticleId']);?>"><img src="<?php echo($Post['ImagePath']);?>" style="width:25px;height:20px;" alt=""><?php echo($Post['Title']);?></a></li>
			<?php  
		  }
		  
		  ?>
          </ul>
          <div class="social_area">
            <ul class="social_nav">
              <li class="facebook"><a href="#"></a></li>
              <li class="twitter"><a href="#"></a></li>
              <li class="flickr"><a href="#"></a></li>
              <li class="pinterest"><a href="#"></a></li>
              <li class="googleplus"><a href="#"></a></li>
              <li class="vimeo"><a href="#"></a></li>
              <li class="youtube"><a href="#"></a></li>
              <li class="mail"><a href="#"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
}


function Module_PopularPosts()
{
	
	require("global.php");
	$PostsQry = mysqli_query($DBCON,"SELECT ArticleId, Title, ImagePath FROM articles WHERE Private=false ORDER BY Views LIMIT 4");
    ?>
    	<div class="single_sidebar">
            <h2><span>Popularno</span></h2>
            <ul class="spost_nav">
			<?php 
			while($Post = mysqli_fetch_array($PostsQry))
			{
				?>
				  <li>
					<div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" style="width:72px;height:72px" src="<?php echo($Post['ImagePath']);?>"> </a>
					  <div class="media-body"> <a href="article.php?ArticleId=<?php echo($Post['ArticleId']); ?>" class="catg_title"><?php echo($Post['Title']); ?></a> </div>
					</div>
				  </li>				
				<?php	
			}
			
			?>
            </ul>
          </div>
    <?php 
}
function Module_NewestPosts()
{
	require("global.php");
	$PostsQry = mysqli_query($DBCON,"SELECT ArticleId, Title, ImagePath FROM articles WHERE Private=false ORDER BY CreationDate DESC LIMIT 5");
    ?>
       <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Nove objave</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
			<?php
			while($Post = mysqli_fetch_array($PostsQry))
			{
				?>
				  <li>
					<div class="media"> <a href="single_page.html" class="media-left"> <img alt="" style="width:72px;height:72px" src="<?php echo($Post['ImagePath']);?>"> </a>
					  <div class="media-body"> <a href="article.php?ArticleId=<?php echo($Post['ArticleId']); ?>" class="catg_title"><?php echo($Post['Title']); ?></a> </div>
					</div>
				  </li>	
				<?php	
			}
			?>
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>
    <?php 
}

function Module_TopHeader()
{
	?>
	<div class="col-lg-12 col-md-12 col-sm-12" style="padding-left:0px;padding-right:0px;">
		<div class="header_top">
		  <div class="header_top_left">
			<ul class="top_nav">
			  <li><a href="index.php">Početna</a></li>
			  <li><a href="about.html">O Nama</a></li>
			  <li><a href="contact.html">Kontakt</a></li>
			</ul>
		  </div>
		  <div class="header_top_right">
			<p><?php echo(Header_CurrentTime()); ?></p>
		  </div>
		</div>
	</div>
	<?php	
}

function Module_NewestPostsSlider()
{
	require("global.php");
	$PostsQry = mysqli_query($DBCON,"SELECT ArticleId, Title, ImagePath, Description FROM articles WHERE Private=false ORDER BY CreationDate DESC LIMIT 5");
	?>
	<div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
		<?php 
		while($Post = mysqli_fetch_array($PostsQry))
		{
			?>
			<div class="single_iteam"> 
		  	<a href="article.php?ArticleId=<?php echo($Post['ArticleId']); ?>"> 
				<img src="<?php echo($Post['ImagePath']); ?>" alt="">
			</a>
            <div class="slider_article">
              	<h2>
			  		<a class="slider_tittle" href="article.php?ArticleId=<?php echo($Post['ArticleId']); ?>"><?php echo($Post['Title']); ?></a>
				</h2>
              	<p><?php echo($Post['Description']); ?></p>
            </div>
          </div>
			<?php	
		}
		
		?>
          
        </div>
      </div>
	<?php	
}


function Module_RelatedPosts()
{
    ?>
    
    <?php 
}


function Module_CategoriesAndComments()
{
	require("global.php");
	$CategoryQry = mysqli_query($DBCON,"SELECT CategoryId, CategoryName FROM categories");
	$PostsQry = mysqli_query($DBCON,"SELECT ArticleId, Title, ImagePath FROM articles WHERE Private=false ORDER BY RAND() LIMIT 4");
	
    ?><div class="single_sidebar">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Kategorije</a></li>
              <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Objave</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="category">
                <ul>
				<?php
				while($Category = mysqli_fetch_array($CategoryQry))
				{
					?>
                  		<li class="cat-item"><a href="find.php?CategoryId=<?php echo($Category['CategoryId']); ?>"><?php echo($Category['CategoryName']); ?></a></li>
					<?php	
				}
				
				?>
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane" id="comments">
                <ul class="spost_nav">
				
				<?php
				while($Post = mysqli_fetch_array($PostsQry))
				{
					?>
						<li>
							<div class="media wow fadeInDown"> <a href="article.php?ArticleId=<?php echo($Post['ArticleId']); ?>" class="media-left"> <img alt="" src="<?php echo($Post['ImagePath']); ?>"> </a>
							  <div class="media-body"> <a href="article.php?ArticleId=<?php echo($Post['ArticleId']); ?>" class="catg_title"><?php echo($Post['Title']); ?></a> </div>
							</div>
						</li>
					<?php	
				}
				
				?>
                </ul>
              </div>
            </div>
          </div>
    <?php
}

function Module_CategoryArchive()
{
	require("global.php");
	$CategoryQry = mysqli_query($DBCON,"SELECT CategoryId, CategoryName FROM categories");

    ?>
    <div class="single_sidebar wow fadeInDown">
            <h2><span>Category Archive</span></h2>
            <select class="catgArchive">
              	<option selected>Select Category</option>
			<?php
			while($Category = mysqli_fetch_array($CategoryQry))
			{
				?>
              	<option value="<?php echo($Category['CategoryId']);?>"><?php echo($Category['CategoryName']);?></option>
			  <?php
			}
			?>
            </select>
          </div>
    <?php
}

function Module_Links()
{
    ?>
    	<div class="single_sidebar wow fadeInDown">
            <h2><span>Links</span></h2>
            <ul>
              <li><a href="#">RSS</a></li>
              <li><a href="administrator.php">Admin Panel</a></li>
			  <?php if(isset($_SESSION['Admin']))
			  { ?>
              <li><a href="unos.php">Unos objave</a></li>
			  <?php 
			  }
				?>
            </ul>
          </div>
    <?php
}

function Module_FooterCategories()
{
	require("global.php");
	$CategoryQry = mysqli_query($DBCON,"SELECT CategoryId, CategoryName FROM categories ORDER BY RAND() LIMIT 8");

    ?>
    <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInDown">
            <h2>Kategorije</h2>
            <ul class="tag_nav">
			<?php
			while($Category = mysqli_fetch_array($CategoryQry))
			{
				?>
              	<li><a href="find.php?CategoryId=<?php echo($Category['CategoryId']); ?>"><?php echo($Category['CategoryName']); ?></a></li>
			  <?php
			}
			?>
            </ul>
          </div>
        </div>
    <?php
}

function Module_FooterContact()
{
    ?>
    
    <?php
}

function Module_Sponsor()
{
    ?>
    	<div class="single_sidebar wow fadeInDown">
            <h2><span>Sponzor</span></h2>
            <a class="sideAdd" href="#"><img src="images/add_img.jpg" alt=""></a> 
		</div>
    <?php
}


function Module_SingleCategory($CategoryId)
{
	
	require("global.php");
	$PostsQry = mysqli_query($DBCON,"SELECT articles.ArticleId, articles.Title, articles.Description, articles.ImagePath FROM articles WHERE articles.CategoryId = '".$CategoryId."' AND Private=false ORDER BY Views DESC");
	$CategoryName = mysqli_fetch_array(mysqli_query($DBCON,"SELECT CategoryName FROM categories WHERE categories.CategoryId = '".$CategoryId."'"));
	
	$CategoryName = $CategoryName[0];
 ?>
 <div class="single_post_content">
            <h2><span><?php echo($CategoryName); ?></span></h2>
			<?php
			$First = true;
			while($Post = mysqli_fetch_array($PostsQry))
			{
				if($First)
				{
					?>
					<div class="single_post_content_left">
					  <ul class="business_catgnav  wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
						<li>
						  <figure class="bsbig_fig"> <a href="article.php?ArticleId=<?php echo($Post['ArticleId']); ?>" class="featured_img"> <img alt=""  src="<?php echo($Post['ImagePath']); ?>"> <span class="overlay"></span> </a>
							<figcaption> <a href="article.php?ArticleId=<?php echo($Post['ArticleId']); ?>"><?php echo($Post['Title']); ?></a> </figcaption>
							<p><?php echo($Post['Description']); ?></p>
						  </figure>
						</li>
					  </ul>
					</div>
            
            <div class="single_post_content_right">
              <ul class="spost_nav">
			<?php
					$First = false;
				}
				else
				{
					?>
					<li>
					  <div class="media wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"> <a href="pages/article.php?ArticleId=<?php echo($Post['ArticleId']); ?>" class="media-left"> <img alt="" style="width:72px; height:72px;" src="<?php echo($Post['ImagePath']); ?>"> </a>
						<div class="media-body"> <a href="pages/article.php?ArticleId=<?php echo($Post['ArticleId']); ?>" class="catg_title"><?php echo($Post['Title']); ?></a> </div>
					  </div>
					</li>
					<?php
				}
			}
			
			?>
              </ul>
            </div>
          </div>
 <?php	
}

function Module_DoubleCategory($CategoryId1, $CategoryId2)
{
	require("global.php");
	
	$PostsQry1 = mysqli_query($DBCON,"SELECT articles.ArticleId, articles.Title, articles.Description, articles.ImagePath FROM articles WHERE articles.CategoryId = '".$CategoryId1."' AND Private=false ORDER BY Views DESC");
	
	$PostsQry2 = mysqli_query($DBCON,"SELECT articles.ArticleId, articles.Title, articles.Description, articles.ImagePath FROM articles WHERE articles.CategoryId = '".$CategoryId2."' AND Private=false ORDER BY Views DESC");
	
	
	$CategoryName1 = mysqli_fetch_array(mysqli_query($DBCON,"SELECT CategoryName FROM categories WHERE categories.CategoryId = '".$CategoryId1."'"));
	$CategoryName1 = $CategoryName1[0];
	
	$CategoryName2 = mysqli_fetch_array(mysqli_query($DBCON,"SELECT CategoryName FROM categories WHERE categories.CategoryId = '".$CategoryId2."'"));
	$CategoryName2 = $CategoryName2[0];
	
	?>
	<div class="double_post_content">
            <div class="double_post_left">
              <div class="single_post_content">
                <h2><span><?php echo($CategoryName1); ?></span></h2>
				<?php
				$First = true;
				while($Post = mysqli_fetch_array($PostsQry1))
				{
					if($First)
					{
						?>
                <ul class="business_catgnav wow fadeInDown">
                  <li>
                    <figure class="bsbig_fig"> <a href="article.php?ArticleId=<?php echo($Post['ArticleId']); ?>" class="featured_img"> <img alt="" src="<?php echo($Post['ImagePath']); ?>"> <span class="overlay"></span> </a>
                      <figcaption> <a href="article.php?ArticleId=<?php echo($Post['ArticleId']); ?>"><?php echo($Post['Title']); ?></a> </figcaption>
                      <p><?php echo($Post['Description']); ?></p>
                    </figure>
                  </li>
                </ul>
                <ul class="spost_nav">
				
						<?php
						$First = false;
					}
					else
					{
						?>
                  <li>
                    <div class="media wow fadeInDown"> <a href="article.php?ArticleId=<?php echo($Post['ArticleId']); ?>" class="media-left"> <img alt="" src="<?php echo($Post['ImagePath']); ?>"> </a>
                      <div class="media-body"> <a href="article.php?ArticleId=<?php echo($Post['ArticleId']); ?>" class="catg_title"><?php echo($Post['Title']); ?></a> </div>
                    </div>
                  </li>
						<?php
					}
				}
				?>
                </ul>
              </div>
            </div>
			
			
            <div class="double_post_right">
              <div class="single_post_content">
                <h2><span><?php echo($CategoryName2); ?></span></h2>
				<?php
				$First = true;
				while($Post = mysqli_fetch_array($PostsQry2))
				{
					if($First)
					{
						?>
                <ul class="business_catgnav wow fadeInDown">
                  <li>
                    <figure class="bsbig_fig"> <a href="article.php?ArticleId=<?php echo($Post['ArticleId']); ?>" class="featured_img"> <img alt="" src="<?php echo($Post['ImagePath']); ?>"> <span class="overlay"></span> </a>
                      <figcaption> <a href="article.php?ArticleId=<?php echo($Post['ArticleId']); ?>"><?php echo($Post['Title']); ?></a> </figcaption>
                      <p><?php echo($Post['Description']); ?></p>
                    </figure>
                  </li>
                </ul>
                <ul class="spost_nav">
				
						<?php
						$First = false;
					}
					else
					{
						?>
                  <li>
                    <div class="media wow fadeInDown"> <a href="article.php?ArticleId=<?php echo($Post['ArticleId']); ?>" class="media-left"> <img alt="" src="<?php echo($Post['ImagePath']); ?>"> </a>
                      <div class="media-body"> <a href="article.php?ArticleId=<?php echo($Post['ArticleId']); ?>" class="catg_title"><?php echo($Post['Title']); ?></a> </div>
                    </div>
                  </li>
						<?php
					}
				}
				?>
                </ul>
              </div>
            </div>
          </div>
	<?php	
}
?>