<?php
	$_SESSION['page'] = 'jobs';
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
			font-family: 'Oswald', bold !important;
			text-transform: uppercase;
			color: black;
		}
		#features{
			background-image: url('assets/images/jobs.jpg');
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
			width: 100%;
			height: 100%;
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
		<section class="section bg-light" id="features">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
						<div class="col-sm-3"></div>
							<div class="col-sm-6">
								<h1 class="cusfont" style="font-size: -webkit-xxx-large; color: white; font-weight: 900;">Come work with us!</h1>
							</div>
						<div class="col-sm-3"></div>
					</div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
		
        <!-- Features -->
        <section class="section bg-light" id="jobs" style="background-color: white; padding-top: 20px;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
					<div class="col-sm-1"></div>
					<div class="col-sm-10">
						<table class="table table-striped">
							<thead>
							  <tr class="cusfont" style="font-size: x-large;">
								<th style="text-align: center;">Job Title</th>
								<th style="text-align: center;">Location</th>
								<th style="text-align: center;">Details</th>
							  </tr>
							</thead>
							<tbody style="background-color: white !important;">
			  <?php
				include_once "admin/functions/db.php";
				$sql = "SELECT * FROM jobs";
				$res = mysqli_query( $db, $sql );
				
				if( !is_bool($res) )
				{
					while($array = mysqli_fetch_array($res))
					{
						echo '<tr style="background-color: white !important;">
								<td style="text-align: center; vertical-align: middle;"><h5 style="color: black; font-size: large;">'.$array['Title'].'</h5></td>
								<td style="text-align: center; vertical-align: middle;"><h5 style="color: black; font-size: large;">'.$array['Location'].'</h5></td>
								<td style="text-align: center; vertical-align: middle;"><h5 style="color: black; font-size: large;"><a style="background-color: #E74C3C; border-color: #E74C3C; font-weight: 600; font-family: Oswald, bold !important; text-transform: uppercase; border-radius: 2px !important;" class="btn btn-info" href="applyjob.php?id='.$array['ID'].'" target="_blank">Apply</a></h5></td>
							  </tr>';}}?>
							</tbody>
						</table>
					 </div>
					<div class="col-sm-1"></div>
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

		<script src="assets/js/jquery.waypoints.min.js"></script>
        <!-- Jquery easing -->                                                      
        <script type="text/javascript" src="assets/js/jquery.easing.1.3.min.js"></script>

        <!--sticky header-->
        <script type="text/javascript" src="assets/js/jquery.sticky.js"></script>

        <!--common script for all pages-->
        <script src="assets/js/jquery.app.js"></script>
		<script type="text/javascript">
		var waypoint = new Waypoint({
		  element: document.getElementById('jobs'),
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