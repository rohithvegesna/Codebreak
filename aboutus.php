<?php
	$_SESSION['page'] = 'about';
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
		.font-light {
			font-family: 'Oswald', bold !important;
			text-transform: uppercase !important;
			font-weight: 600 !important;
			font-size: 47px !important;
			text-align: left;
			width: 100% !important;
		}
		.text-light {
			font-family: 'Vollkorn', regular !important;
			text-align: left;
			color: white !important;
			font-size: large !important;
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


    <body data-spy="scroll" data-target="#navbar-menu">

        <?php include "head.php";?>


        <!-- Features -->
		<section class="bg-custom home" id="home" style="background-color: #1A2B32;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
						<div class="home-wrapper home-wrapper-alt">
							<div class="row">
								<div class="col-sm-6"><br /><br /><br /><br />
									<h1 class="font-light text-white">Codebreak goes against the grain.</h1><br />
									<p class="text-light">It was developed as an antidote to other finance businesses and stock market news websites which required the user to stick around for as long as possible to accomplish the most basic tasks.</p><br />
									<p class="text-light">Codebreak saves you time. It is a lifestyle app that efficiently manages your investments and personal finances so you can stop doing what you must and do what you love instead.</p>
								</div>
			
								<div class="col-sm-6 text-center">
									<img style="width: 75%;" src="assets/images/about.png">
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
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

        <!--common script for all pages-->
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>