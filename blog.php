<?php
	$_SESSION['page'] = 'blog';
	if(isset($_GET['page']))
	{
		$page = $_GET['page'];
	}
	else $page = 1;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

        <title>Codebreak</title>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Open+Sans|Chivo:900|Playfair+Display:700|Roboto:400,300,500,700|Oswald:400,500,600,700|Vollkorn:400,700|Oswald:400,500,600,700|Vollkorn:400,700" rel="stylesheet">

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<style>
		.cusfont {
			font-family: 'Oswald', bold !important;
			text-transform: uppercase;
			font-weight: 600;
		}
		.title {
			font-family: 'Oswald', bold !important;
			text-transform: uppercase;
			font-size: -webkit-xxx-large !important;
		}
		h2 {
			font-family: 'Oswald', bold !important;
			text-transform: uppercase;
			color: black !important;
		}
		
		.blogdes {
			font-family: 'Vollkorn', serif !important;
		}
		#home {
			background-image: url(assets/images/blog.jpg);
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
			width: 100%;
			height: 100%;
		}
		p {
			font-family: 'Vollkorn', serif !important;
		}
		.pagination {
			font-family: 'Oswald', regular !important;
			text-transform: uppercase;
		}
		</style>
		<!-- Font Icons CSS -->
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/main.css" rel="stylesheet">

        <!-- Color style -->
        <link href="assets/css/colors/default.css" rel="stylesheet">


    </head>


    <body data-spy="scroll" data-target="#navbar-menu">

        <?php include "head.php";?>
	<section class="bg-custom home" id="home" style="background-color: #000000;">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<div class="home-fullscreen" id="home-fullscreen">
						<div class="full-screen">
							<div class="col-sm-12 home-wrapper home-wrapper-alt" style="position:absolute; bottom:0px;">
								<?php
									include_once "admin/functions/db.php";
									$sql = "SELECT * FROM blog WHERE Doe=(SELECT MAX(Doe) FROM blog)";
									$res = mysqli_query( $db, $sql );
									
									if( !is_bool($res) )
									{
										while($array = mysqli_fetch_array($res))
										{
											//echo '<div class="col-sm-12 text-center"><a href="blogitem.php?id='.$array['ID'].'"><h1 class="cusfont"># '.$array['Title'].'</h1></a></div>';
										}
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
		
    <section id="blog" class="container" style="background-color: #000000; width: 100%; margin: auto;">
        <div class="blog">
            <div class="row">
			<div class="col-sm-1" style="background-color: transparent !important;"></div>
			<div class="col-sm-10" style="background-color: #f3f6fa; border-radius: 2px;">
			<br /><br />
                <div class="col-md-8">
                    <?php
						include_once "admin/functions/db.php";
						$sql = "SELECT * FROM blog ORDER BY ID DESC LIMIT ".((intval($page)-1)*6).",6";
						$res = mysqli_query( $db, $sql );
						
						if( !is_bool($res) )
						{
							while($array = mysqli_fetch_array($res))
							{
								$resu = glob("admin/img/".$array['ID']."_blog_*");
								$full = $array['Description'];
								$cut = substr($full, 0, 200);
								echo '<div class="blog-item">
										<div class="row">
											<div class="col-sm-12 blog-content">
												<a  href="blogitem.php?id='.$array['ID'].'"><img class="img-responsive img-blog" src="'.$resu[0].'" width="100%" alt="" /></a>
												<h1 class="title"><a style="color: #000000;" href="blogitem.php?id='.$array['ID'].'">'.$array['Title'].'</a></h1>
												<p style="font-size: large;" class="blogdes">'.$cut.'...</p>
												<a class="btn btn-primary readmore" style="background: #000000;" href="blogitem.php?id='.$array['ID'].'">Read More <i class="fa fa-angle-right"></i></a>
											</div>
										</div>    
									</div><!--/.blog-item-->';
							}}?>
                        
                    <ul class="pagination pagination-lg">
					<?php
						echo '<li><a href="?page='.($page-1).'"><i class="fa fa-long-arrow-left"></i>Previous Page</a></li>';
						include_once "admin/functions/db.php";
						$sql = "SELECT COUNT(*) as cnt FROM blog";
						$res = mysqli_query( $db, $sql );
						
						if( !is_bool($res) )
						{
							while($array = mysqli_fetch_array($res))
							{
								for($i = 1; $i <= (round((($array['cnt'])/6))); $i++){
									if($page == $i){
										$active = 'class="active"';
									}
									else{
										$active = '';
									}
									echo '<li '.$active.'><a href="?page='.$i.'">'.$i.'</a></li>';
								}
							}
						}
						echo '<li><a href="?page='.($page+1).'">Next Page<i class="fa fa-long-arrow-right"></i></a></li>';
					?>
                    </ul><!--/.pagination-->
                </div><!--/.col-md-8-->

                <aside class="col-md-4">
                    <div class="widget search">
					<div class="well" style="background-color: #000000;">
					<h1 class="title">SUBSCRIBE AND GET FIRST DIBS ON MORE OF OUR STUFF!</h1>
                        <form action="admin/functions/sub.php" role="form">
						<?php
							if($_GET['sub'] != 'yes' || $_GET['sub'] == null){
								echo '<input type="hidden" name="page" value="blog"><input style="font-family: Oswald, bold !important; text-transform: uppercase; border-radius: 2px !important;" type="email" class="form-control search_box" autocomplete="off" placeholder="Email" required><br>
								<button style="height: 45px; background-color: #E74C3C; border-color: #E74C3C; font-weight: 600; font-family: Oswald, bold !important; text-transform: uppercase; border-radius: 2px !important;" type="submit" class="form-control btn btn-success">Subscribe</button>';
							}
							elseif($_GET['sub'] == 'yes'){
								echo '<button style="height: 45px; background-color: #E74C3C; border-color: #E74C3C; font-weight: 600; font-family: Oswald, bold !important; text-transform: uppercase; border-radius: 2px !important;" class="form-control btn btn-success">Subscribed</button>';
							}
						?>
						</form>
					</div>
                    </div><!--/.search-->
    				
    				<div class="widget archieve">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="blog_archieve">
								<?php
									include_once "admin/functions/db.php";
									$sql = "SELECT * FROM blog ORDER BY RAND() LIMIT 2";
									$res = mysqli_query( $db, $sql );
									
									if( !is_bool($res) )
									{
										while($array = mysqli_fetch_array($res))
										{
											$resu = glob("admin/img/".$array['ID']."_blog_*");
											echo '<a  href="blogitem.php?id='.$array['ID'].'"><img style="width:100%;" src="'.$resu[0].'" />
												<h2>'.$array['Title'].'</h2></a>
												<hr style="border-top: 2px solid #1A2B32;">';
										}
									}
								?>
								</ul>
                            </div>
                        </div>                     
                    </div><!--/.archieve-->
    			</aside>
				</div>
				<div class="col-sm-1" style="background-color: transparent !important;"></div>
            </div><!--/.row-->
        </div>
    </section><!--/#blog-->



        <?php include "footer.php";?>
        

        <!-- Back to top -->    
        <a href="#" class="back-to-top" id="back-to-top"> <i class="pe-7s-angle-up"> </i> </a>


        <!-- js placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery-2.1.4.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.waypoints.min.js"></script>
        <!-- Jquery easing -->                                                      
        <script type="text/javascript" src="assets/js/jquery.easing.1.3.min.js"></script>

        <!--sticky header-->
		<script type="text/javascript" src="assets/js/jquery.sticky.js"></script>

        <!--common script for all pages-->
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
		var waypoint = new Waypoint({
		  element: document.getElementById('blog'),
		  handler: function(direction) {
			  if(direction == 'up'){
				  $(".navbar-custom").css('background-color', 'transparent');
			  }
			  else
			  {
				  $(".navbar-custom").css('background-color', '#000000');
			  }
			
		  }
		})
		</script>
    </body>
</html>