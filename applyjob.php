<?php
	$_SESSION['page'] = null;
	if( $_GET['id'] == null ){
		header("Location: jobs.php");
	}
	else{
		$id = $_GET['id'];
	}
	
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
		h1 {
			font-family: 'Oswald', bold !important;
			text-transform: uppercase;
			color: black !important;
		}
		h4 {
			font-family: 'Oswald', medium !important;
			text-transform: uppercase;
			color: black !important;
		}
		p {
			font-family: 'Vollkorn', regular !important;
			font-size: initial;
			color: black !important;
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
		
        <!-- Features -->
        <section class="section bg-light" id="features" style="background: white;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<?php
						include_once "admin/functions/db.php";
						$sql = "SELECT * FROM jobs WHERE ID=".$id;
						$res = mysqli_query( $db, $sql );
						
						if( !is_bool($res) )
						{
							while($array = mysqli_fetch_array($res))
							{
								echo'<h1>'.$array['Title'].'</h1>';?>
						<p>at Codebreak</p>
						<p>Location: <?php echo $array['Location'] ;?></p><br />
						<p>Codebreak goes against the grain. It was developed as an anecdote

						to other Finance businesses and stock market news websites which

						required you to stick around for as long as possible to accomplish the

						most basic tasks. Codebreak saves you time. It is a lifestyle app that

						efficiently manages your investments and personal finances so you

						can stop doing what you must and do what you love instead.</p><br />
						<h4>What you'll do</h4>
						<?php 
						$string = $array['Wtd'];
						$patterns = array();
						$patterns[0] = '/•/';
						$replacements = array();
						$replacements[0] = '<br>•';
						$wtd = preg_replace($patterns, $replacements, $string);
						$string1 = $array['Wlf'];
						$patterns1 = array();
						$patterns1[0] = '/•/';
						$replacements1 = array();
						$replacements1[0] = '<br>•';
						$wlf = preg_replace($patterns1, $replacements1, $string1);
						echo '<p>'.$wtd.'</p><br />
										<h4>Who we\'re looking for</h4>
										<p>'.$wlf.'</p>';?><br />
						<div class="well">
						<h4>Apply for this job</h4>
						<form action="admin/functions/applyjob.php" method="post">
						  <div class="form-group">
							<label for="name">First name*:</label>
							<input type="text" class="form-control" name="fname" required>
							<input type="hidden" class="form-control" name="id" value="<?php echo $array['ID'];?>" required>
						  </div>
						  <div class="form-group">
							<label for="name">Last name*:</label>
							<input type="text" class="form-control" name="lname" required>
						  </div>
						  <div class="form-group">
							<label for="email">Email*:</label>
							<input type="email" class="form-control" name="email" required>
						  </div>
						  <div class="form-group">
							<label for="name">Phone*:</label>
							<input type="number" class="form-control" name="phone" required>
						  </div>
						  <div class="form-group">
							<label for="name">Current Company*:</label>
							<input type="text" class="form-control" name="curcom" required>
						  </div>
						  <div class="form-group">
							<label for="name">Current Title*:</label>
							<input type="text" class="form-control" name="curtit" required>
						  </div>
						  <div class="form-group">
							<label for="name">Portfolio Link:</label>
							<input type="text" class="form-control" name="pflink">
						  </div>
						  <div class="form-group">
							<label for="name">Why should you be hired for this job?*:</label>
							<textarea type="text" class="form-control" name="hirejob" required></textarea>
						  </div>
						  <div class="form-group">
							<label for="name">Attach CV*: (Copy & Paste Google drive link.)</label>
							<input type="text" class="form-control" name="cvlink" required>
						  </div>
						  <div class="checkbox">
							<label><input type="checkbox" required>Agree Terms & Conditions</label>
						  </div>
						  <button type="submit" class="btn btn-default">Submit</button>
						</form><?php }}?>
						</div>
					</div>
					<div class="col-sm-2"></div>
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