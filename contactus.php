<?php
	$_SESSION['page'] = null;
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
			font-family: 'Roboto', bold !important;
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


    <body data-spy="scroll" data-target="#navbar-menu">

        <?php include "head.php";?>


        <!-- Features -->
        <section class="section bg-light" id="features">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h3 class="title">It's designed for describing your app, agency or business</h3>
                        <p class="text-muted sub-title">The clean and well commented code allows easy customization of the theme.It's <br/> designed for describing your app, agency or business.</p>
                    </div>
                </div> <!-- end row -->

                <div class="row">

                    <div class="col-sm-4">
                        <div class="features-box">
                            <i class="pe-7s-display1"></i>
                            <h4>Abcdefgh Ijaklmnop</h4>
                            <p class="text-muted">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                        </div>
                    </div>

                </div> <!-- end row -->


                <div class="row">
                    <div class="col-sm-4">
                        <div class="features-box">
                            <i class="pe-7s-date"></i>
                            <h4>Abcdefgh Ijaklmnop</h4>
                            <p class="text-muted">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                        </div>
                    </div>

                </div> <!-- end row -->

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