<?php
	$_SESSION['page'] = 'down';
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
        <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Open+Sans|Chivo:900|Playfair+Display:700|Roboto:400,300,500,700|Oswald:400,500,600,700|Vollkorn:400,700" rel="stylesheet">

		<style>
		.cusfont {
			font-family: "Alfa Slab One", cursive !important;
		}
		.title {
			font-family: 'Oswald', bold !important;
			font-size: 60px !important;
			margin-top: 25% !important;
			color: white;
			text-transform: uppercase !important;
			text-align: left;
			padding-left: 40px;
		}
		
		.blogdes {
			font-family: 'Open Sans', sans-serif !important;
		}
		</style>
		
        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Font Icons CSS -->
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">

        <!-- Color style -->
        <link href="assets/css/colors/default.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>


    <body data-spy="scroll" data-target="#navbar-menu" style="background-color: #1A2B32;">

        <?php include "head.php";?>


        <!-- Features -->
        <section class="section bg-light" id="features" style="background-color: #1A2B32; <?php
										$iPod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
										$iPhone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
										$iPad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
										$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
											if($iPad||$iPhone||$iPod||$android){
												echo 'height: 600px;';
											} 
											else{
												echo 'height: 900px;';
											}
									?>">
            <div class="container">
				<div class="home-fullscreen" id="home-fullscreen">
					<div class="full-screen">
						<div class="row"><br /><br /><br />
							<div class="col-sm-2"></div>
							<div class="col-sm-4 text-center">
								<?php
										$iPod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
										$iPhone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
										$iPad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
										$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
											if($iPad||$iPhone||$iPod||$android){
												echo '';
											} 
											else{
												echo '<img id="phonegif" style="position: absolute; width: 75%;" src="assets/images/phone.png">
														<video muted="" style="position: relative; padding-top: 58px; width: 71%; margin-left: 20px;" src="assets/images/download.mp4" autoplay loop></video>';
											}
									?></div>
							<div class="col-sm-4 text-center">
								<h1 class="title">Download Now.</h1>
								<div class="row">
									<div class="col-sm-1"></div>
									<?php
										$iPod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
										$iPhone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
										$iPad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
										$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
											if($iPad||$iPhone||$iPod||$android){
												echo '<div class="col-sm-5">
															<img src="assets/images/as.png" style="width:50%;" />
														</div><br />
														<div class="col-sm-5">
															<a href="https://play.google.com/store/apps/details?id=in.codebreak.app" target="_blank"><img src="assets/images/gs.png" style="width:50%;" /></a>
														</div>';
											} 
											else{
												echo '<div class="col-sm-5">
															<img src="assets/images/as.png" style="width:100%;" />
														</div>
														<div class="col-sm-5">
															<a href="https://play.google.com/store/apps/details?id=in.codebreak.app" target="_blank"><img src="assets/images/gs.png" style="width:100%;" /></a>
														</div>';
											}
									?>
									<div class="col-sm-1"></div>
								</div>
							</div>
							<div class="col-sm-2"></div>
						</div> <!-- end row -->
					</div>
				</div>
            </div> <!-- end container -->
        </section>
        <!-- end Features -->



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

        <!-- mailchimp - ajax form -->
        <script type="text/javascript" src="assets/js/jquery.ajaxchimp.js"></script>

        <!--common script for all pages-->
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>