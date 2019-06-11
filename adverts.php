<?php
	$_SESSION['page'] = 'gal';
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
		
        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Font Icons CSS -->
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">

        <!-- Color style -->
        <link href="assets/css/colors/default.css" rel="stylesheet">

        
		<link rel="stylesheet" type="text/css" href="assets/css/gal/demo.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/gal/component.css" />
		<script src="assets/js/gal/modernizr.custom.js"></script>

    </head>


    <body data-spy="scroll" data-target="#navbar-menu">

        <?php include "head.php";?>

	<div id="grid-gallery" class="grid-gallery" style="background-color: #1A2B32;">
				<section class="grid-wrap"><br /><br /><br /><br /><br /><br />
				<div class="row">
					<div class="col-sm-12 text-center">
						<h1 style="font-family: 'Oswald', medium !important; text-transform: uppercase; color: white; font-size: 106px;">ENJOY IRRESPONSIBLY.</h1><br /><br /><br />
					</div>
				</div>
					<ul class="grid">
						<li class="grid-sizer"></li><!-- for Masonry column width -->
						<?php
							$files = glob("assets/images/gal/*.*");

							for ($i=0; $i<count($files); $i++) {
								$image = $files[$i];
								echo '<li><figure><img src="'.$image .'" alt="img01"/></figure></li>';
							}
						?>
					</ul>
				</section><!-- // grid-wrap -->
				<section class="slideshow">
					<ul>
						<?php
							$files = glob("assets/images/gal/*.*");

							for ($i=0; $i<count($files); $i++) {
								$image = $files[$i];
								echo '<li><figure><img src="'.$image .'" alt="img01"/></figure></li>';
							}
						?>
					</ul>
					<nav>
						<span class="icon nav-prev"></span>
						<span class="icon nav-next"></span>
						<span class="icon nav-close"><a onclick="$('#sticky-nav').show();"></a></span>
					</nav>
					<div class="info-keys icon">Navigate with arrow keys</div>
				</section><!-- // slideshow -->
			</div><!-- // grid-gallery -->


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

        <!-- mailchimp - ajax form
        <script type="text/javascript" src="assets/js/jquery.ajaxchimp.js"></script> -->

        <!--common script for all pages-->
        <script src="assets/js/jquery.app.js"></script>
		<script src="assets/js/gal/imagesloaded.pkgd.min.js"></script>
		<script src="assets/js/gal/masonry.pkgd.min.js"></script>
		<script src="assets/js/gal/classie.js"></script>
		<script src="assets/js/gal/cbpGridGallery.js"></script>
		<script>
			new CBPGridGallery( document.getElementById( 'grid-gallery' ) );
		</script>

    </body>
</html>