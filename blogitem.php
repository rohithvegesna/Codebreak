<?php
	$_SESSION['page'] = 'blogdes';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php
			include_once "admin/functions/db.php";
			$sql = "SELECT * FROM blog WHERE ID=".$_GET['id'];
			$res = mysqli_query( $db, $sql );
			
			if( !is_bool($res) )
			{
				while($array = mysqli_fetch_array($res))
				{
					$resu = glob("admin/img/".$array['ID']."_blog_*");?>
					<meta property="og:url"           content="http://codebreak.in/blogitem.php?id=<?php echo $array['ID'];?>" />
					<meta property="og:type"          content="Blog" />
					<meta property="og:title"         content="<?php echo $array['Title'];?>" />
					<meta property="og:description"   content="Look on codebreak" />
					<meta property="og:image"         content="<?php echo $resu[0];?>" />
					<meta name="robots" content="<?php echo $array['Title'];?>">
					<meta name="title" content="<?php echo $array['Title'];?>">
					<meta name="author" content="Codebreak">
					<meta name="description" content="Look on codebreak">
					<meta name="keywords" content="<?php echo $array['Title'];?>">
			<?php }}?>
		<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

        <title>Codebreak</title>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Open+Sans|Chivo:900|Playfair+Display:700|Roboto:400,300,500,700|Oswald:400,500,600,700|Vollkorn:400,700" rel="stylesheet">

		<style>
		.cusfont {
			font-family: "Alfa Slab One", cursive !important;
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
		h4 {
			font-family: 'Oswald', bold !important;
			text-transform: uppercase;
			color: black !important;
		}
		label {
			font-family: 'Oswald', bold !important;
			text-transform: uppercase;
			color: black !important;
		}
		p {
			font-family: 'Vollkorn', serif !important;
		}
		</style>
		
        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Font Icons CSS -->
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/main.css" rel="stylesheet">

        <!-- Color style -->
        <link href="assets/css/colors/default.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>


    <body data-spy="scroll" data-target="#navbar-menu">

        <?php include "head.php";?>
<br /><br /><br />
	<section id="blog" class="container">

        <div class="blog">
            <div class="row">
                <div class="col-md-8">
                    <?php
						include_once "admin/functions/db.php";
						$sql = "SELECT * FROM blog WHERE ID=".$_GET['id'];
						$res = mysqli_query( $db, $sql );
						
						if( !is_bool($res) )
						{
							while($array = mysqli_fetch_array($res))
							{
								$resu = glob("admin/img/".$array['ID']."_blog_*");
								echo '<div class="blog-item">
										<div class="row">
											<div class="col-xs-12 col-sm-12 blog-content">
												<img class="img-responsive img-blog" src="'.$resu[0].'" width="100%" alt="" />
												<h2 class="title">'.$array['Title'].'</h2>
												<p style="font-size: large;">'.$array['Description'].'</p>

											</div>
										</div>
									</div><!--/.blog-item-->';
							}}?>
                    </div><!--/.col-md-8-->
					
					<aside class="col-md-4">
                    <div class="widget search">
					<div class="well" style="background-color: #000000;">
					<h1 class="title">SUBSCRIBE AND GET FIRST DIBS ON MORE OF OUR STUFF!</h1>
                        <form action="admin/functions/sub.php" role="form">
						<?php
							if($_GET['sub'] != 'yes' || $_GET['sub'] == null){
								echo '<input type="hidden" name="id" value="'.$_GET['id'].'"><input type="hidden" name="page" value="blogdes"><input style="font-family: Oswald, bold !important; text-transform: uppercase; border-radius: 2px !important;" type="email" class="form-control search_box" autocomplete="off" placeholder="Email" required><br>
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

            </div><!--/.row-->

         </div><!--/.blog-->

    </section><!--/#blog-->



        <?php include "footer.php";?>
        

        <!-- Back to top -->    
        <a href="#" class="back-to-top" id="back-to-top"> <i class="pe-7s-angle-up"> </i> </a>


        <!-- js placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery-2.1.4.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- Jquery easing -->                                                      
        <script type="text/javascript" src="assets/js/jquery.easing.1.3.min.js"></script>

        <!--sticky header-->
        <script type="text/javascript" src="assets/js/jquery.sticky.js"></script>

        <!--common script for all pages-->
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>