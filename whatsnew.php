<?php
	$_SESSION['page'] = 'new';
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <title>Codebreak</title>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Open+Sans|Chivo:900|Playfair+Display:700|Roboto:400,300,500,700|Oswald:400,500,600,700|Vollkorn:400,700" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<style>
		.center-block {                                              
			font-family: 'Oswald', bold !important;
			font-size: -webkit-xxx-large;
			text-transform: uppercase;
			color: white !important;         
		}
		#text {                                                        
			font-family: 'Vollkorn', regular !important;                                  
			text-align: justify;    
			font-size: large;
			color: white !important;
		}
		.blogdes {
			font-family: 'Open Sans', sans-serif !important;
		}
		h3 {
		  display: inline-block;
		  padding: 10px;
		  background: #B9121B;
		  border-top-left-radius: 10px;
		  border-top-right-radius: 10px;
		}

		.full-screen {
		  background-size: cover;
		  background-position: center;
		  background-repeat: repeat;
		}
		.bg-light {
		  border: 0px !important;
		}
		#first:hover {
			background-color: white !important;
			color: #1A2B32 !important;
			transition: 0.5s;
		}
		#second:hover {
			background-color: #22A7F0 !important;
			color: white !important;
			transition: 0.5s;
		}
		#third:hover {
			background-color: #37CD3C !important;
			color: black !important;
			transition: 0.5s;
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

    </head>


    <body data-spy="scroll" data-target="#navbar-menu">

        <?php include "head.php";?>


        <!-- Features -->
        <section class="section bg-light" id="features" style="background-color: #1A2B32; height: 1000px;">
            <div class="container">
				<div class="home-fullscreen" id="home-fullscreen">
					<div class="full-screen">
						<div class="row text-center"><br /><br /><br /><br />
							<div class="col-sm-6 text-center">
								<img src="assets/images/slide1.png" style="width:50%;" />
							</div>
							<div class="col-sm-5 text-center">
								<h2 class="center-block text-left">Introducing Surge.<br>Grandaddy of all ratios.</h2><br />
								<p id="text">
									When you sign into Codebreak, you don't get bomarded with investment gibberish
									you don't need or financial ratios you don't use. No, sir. We re-engineered the wheel
									to condense all the financial jargon into just one number.
								<br /><br />
									Introducing Surge. The only metric you'll ever need.<br /><br />
									<a href="faq.php?q=surge" id="first" style="font-weight: 900; font-family: 'Oswald', bold !important; text-transform: uppercase; background-color: transparent; color: white; border-radius: 0px; border-color: white;" class="btn btn-default">Learn More</a>
								</p>
							</div>
							<div class="col-sm-1"></div>
						</div>
					</div>
				</div>
			</div><!-- end container -->
        </section>


        <!-- Features -->
        <section class="section bg-light" id="features1" style="background-color: white; height: 100%;">
            <div class="container">
				<div class="home-fullscreen" id="home-fullscreen">
					<div class="full-screen">
						<div class="row text-center">
							<div class="col-sm-1"></div>
							<div class="col-sm-5 text-center">
								<h2 class="center-block text-left" style="color: black !important;">Codebreak is idiot-proof.</h2><br />
								<p id="text" style="color: black !important;">
									Codebreak does away with the most nerve-racking part of your investing experience
									the waiting. You no longer have to deal with the stress and uncertainty of being
									invested in the capital markets because our precise algorithms tell you just how long
									to stay invested to meet your financial goals.
								<br /><br />
									Idiot proof Indeed.<br /><br />
									<a href="faq.php?q=eta" id="second" style="font-weight: 900; font-family: 'Oswald', bold !important; text-transform: uppercase; background-color: transparent; color: #22A7F0; border-radius: 0px; border-color: #22A7F0;" class="btn btn-default">Learn More</a>
								</p>
							</div>
							<div class="col-sm-6 text-center">
								<img src="assets/images/slide2.png" style="width:50%;" />
							</div>
						</div>
					</div>
				</div>
			</div><!-- end container -->
        </section>
        <!-- end Features -->


        <!-- Features -->
        <section class="section bg-light" id="features2" style="background-color: black; height: 100%;">
            <div class="container">
				<div class="home-fullscreen" id="home-fullscreen">
					<div class="full-screen">
						<div class="row text-center">
							<div class="col-sm-6 text-center">
								<img src="assets/images/slide3.png" style="width:50%;" />
							</div>
							<div class="col-sm-5 text-center">
								<h2 class="center-block text-left">Set it. Forget it.</h2><br />
								<p id="text">
									Constantly monitoring your portfolio is a pain that most investors live with. Add to
									that a few blue chip businesses you may be interested in and it makes for a truly awful
									experience. When you join the family, we free up hours in your schedule by doing the
									tracking for you.
								<br /><br />
									You’ll never have to check stock quotes again.<br /><br />
									<a href="faq.php?q=triggers" id="third" style="font-weight: 900; font-family: 'Oswald', bold !important; text-transform: uppercase; background-color: transparent; color: #37CD3C; border-radius: 0px; border-color: #37CD3C;" class="btn btn-default">Learn More</a>
								</p>
							</div>
							<div class="col-sm-1"></div>
						</div>
					</div>
				</div>
			</div><!-- end container -->
        </section>
        <!-- end Features -->



        <?php include "footer.php";?>
        

        <!-- Back to top -->    
        <a href="#" class="back-to-top" id="back-to-top"> <i class="pe-7s-angle-up"> </i> </a>

        <!-- Jquery easing -->                                                      
        <script type="text/javascript" src="assets/js/jquery.easing.1.3.min.js"></script>
		<script src="assets/js/jquery.waypoints.min.js"></script>

        <!--sticky header-->
        <script type="text/javascript" src="assets/js/jquery.sticky.js"></script>

        <!--common script for all pages-->
        <script src="assets/js/jquery.app.js"></script>
		<script type="text/javascript">
		var waypoint = new Waypoint({
		  element: document.getElementById('features1'),
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
		var waypoint = new Waypoint({
		  element: document.getElementById('features2'),
		  handler: function(direction) {
			  if(direction == 'up'){
				  $(".navbar-custom").css('background-color', '#000000');
			  }
			  else
			  {
				  $(".navbar-custom").css('background-color', 'transparent');
			  }
			
		  }
		})
		</script>
    </body>
</html>