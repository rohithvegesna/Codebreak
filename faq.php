<?php
	error_reporting(0);
	$_SESSION['page'] = 'faq';
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
		.clickers {                                             
			font-family: 'Oswald', medium !important;
			text-transform: uppercase;
		}
		.cusfont {
			font-family: 'Oswald', bold !important;
			text-transform: uppercase;
		}
		h1 {
			font-family: 'Oswald', bold !important;
			text-transform: uppercase;
		}
		.panel-title {
			font-family: 'Oswald', bold !important;
			text-transform: uppercase;
			color: black !important;
		}
		.panel-body {
			font-size: large !important;
		}
		.nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
			color: black !important;
			background-color: #F3F3F3 !important;
			font-weight: 600;
		}
		.form-group {
			font-family: 'Vollkorn', regular !important;
		}
		.well {
			border-color: black !important;
		}
		button {
			font-family: 'Vollkorn', regular !important;
		}
		.footer {
			font-family: 'Roboto', sans-serif !important;
			font-size: 14px;
			line-height: 22px;
		}
		label {
			font-family: 'Vollkorn', regular !important;
			color: black !important;
		}
		#features{
			background-image: url('assets/images/faq.jpg');
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
		<link rel="stylesheet" href="assets/css/reset.css"> <!-- CSS reset -->
		
		<script>
		function showUser(str) {
			//alert(str);
			if (str == "" || (typeof str == 'undefined')) {
				document.getElementById("txtHint").innerHTML = "";
				return;
			} else { 
				if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else {
					// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("txtHint").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET","admin/functions/getfaq.php?q="+str,true);
				xmlhttp.send();
			}
		}
		
		function showResult(str) {
		  if (str.length==0) { 
			document.getElementById("livesearch").innerHTML="";
			document.getElementById("livesearch").style.border="0px";
			  $("#searchbox").css({"border-radius" : "100px", "box-shadow" : "0 2px 15px 0 rgba(0,0,0,.2)", "z-index" : "2", "font-family" : "'Oswald', bold !important", "font-size" : "large"});
			return;
		  }
		  if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		  } else {  // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
			if (this.readyState==4 && this.status==200) {
			  document.getElementById("livesearch").innerHTML=this.responseText;
			  $("#searchbox").css({"border-top-right-radius" : "20px", "border-top-left-radius" : "20px", "border-bottom-left-radius" : "0px", "border-bottom-right-radius" : "0px", "box-shadow" : "0 2px 15px 0 rgba(0,0,0,.2)", "z-index" : "2", "font-family" : "'Oswald', bold !important", "font-size" : "large"});
			}
		  }
		  xmlhttp.open("GET","admin/functions/livesearch.php?q="+str,true);
		  xmlhttp.send();
		}
		</script>

    </head>


    <body data-spy="scroll" data-target="#navbar-menu">

        <?php include "head.php";?>

		<section class="section bg-light" id="features">
            <div class="container">
			<br /><br /><br /><br />
                <div class="row">
                    <div class="col-sm-12 text-center">
					<h1 class="cusfont" style="font-size: -webkit-xxx-large; color: white; font-weight: 900;">Support</h1><br />
					<form>
						<div class="col-sm-3 text-center"></div>
						<div class="col-sm-6 text-center">
						<input id="searchbox" style="position: relative; border-radius: 100px; box-shadow: 0 2px 15px 0 rgba(0,0,0,.2); z-index: 2; font-family: 'Oswald', bold !important; font-size: large;" type="text" class="form-control" placeholder="Search" onkeyup="showResult(this.value)" size="20">
						<div class="text-center" style="position: absolute; width:95%; background-color: white; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px; box-shadow: 0 2px 15px 0 rgba(0,0,0,.2);" id="livesearch"></div>
						</div>
						<div class="col-sm-3 text-center"></div><br /><br /><br />
					</form><br>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- Features -->
        <section id="faq" class="section bg-light" style="background-color:white;">
		<div class="container">
			<div class="row">
			  <div class="col-sm-1"></div>
			  <div class="col-sm-3">
				<div class="well" style="background-color:white;">
					<ul class="nav nav-pills nav-stacked">
					  <li class="<?php if($_GET['q'] == null){echo 'active ';}?>clickers"><a style="color: black !important; font-weight: 600;" value="1">Getting Started</a></li>
					  <li class="clickers"><a style="color: black !important; font-weight: 600;" value="2">Discover</a></li>
					  <li class="clickers"><a style="color: black !important; font-weight: 600;" value="3">Utility</a></li>
					  <li class="<?php if($_GET['q'] == 'feedback'){echo 'active ';}?>clickers"><a style="color: black !important; font-weight: 600;" value="4">Feedback</a></li>
					  <li class="<?php if($_GET['q'] == 'contact'){echo 'active ';}?>clickers"><a style="color: black !important; font-weight: 600;" value="5">Inquires</a></li>
					</ul>
				</div>
			  </div>
			  <div class="col-sm-7">
				<div class="well" id="txtHint" style="background-color:white;">
<?php
if($_GET['q'] != null && $_GET['q'] != 'contact' && $_GET['q'] != 'feedback'){
	include_once "admin/functions/db.php";
	$sql = "SELECT * FROM faq WHERE Url = '".$_GET['q']."'";
	$res = mysqli_query( $db, $sql );
	
	if( !is_bool($res) )
	{
		while($array = mysqli_fetch_array($res))
		{
			$string = $array['Answer'];
			$patterns = array();
			$patterns[0] = '/@enter@/';
			$replacements = array();
			$replacements[0] = '<br>';
			$ans = preg_replace($patterns, $replacements, $string);
			echo '<div class="panel-group" id="accordion">
					  <div class="panel panel-default">
						<div id="panel-heading" class="panel-heading">
						  <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$array['ID'].'">
						   <h4 id="panel-title" class="panel-title">'.$array['Question'].'</h4>
						  </a>
						</div>
						<div id="collapse'.$array['ID'].'" class="panel-collapse collapse">
						  <div id="panel-body" class="panel-body">'.$ans.'</div>
						</div>
					  </div>
					</div>';}}
}
elseif($_GET['q'] == 'contact'){
			echo '<h1 style="font-size: xx-large; color: black; font-weight: 600;">Inquires</h1><br />
					<p><form action="admin/functions/contact.php" method="post">
					<div class="form-group">
						<label for="text">Select Region:</label>
						<input type="text" class="form-control" name="state" id="text" required>
					</div>
					<div class="row"><div class="col-sm-6">
					<div class="form-group">
						<label for="text">Business Name:</label>
						<input type="text" class="form-control" name="name" id="text" required>
					</div>
					</div>
					<div class="col-sm-6">
					<div class="form-group">
						<label for="text">Type of Business:</label>
						<input type="text" class="form-control" name="business" id="text" required>
					</div>
					</div></div>
					<div class="row"><div class="col-sm-6">
					<div class="form-group">
						<label for="text">Mobile Number:</label>
						<input type="number" class="form-control" name="mobile" id="text" pattern=".{10,10}" required>
					</div>
					</div>
					<div class="col-sm-6">
					<div class="form-group">
						<label for="text">Email Address:</label>
						<input type="email" class="form-control" name="email" id="text" required>
					</div>
					</div></div>
					<div class="form-group">
						<label for="text">What would you like to say to us?</label>
						<textarea type="text" class="form-control" name="querry" id="text" maxlength="500" required></textarea>
					</div>
						<div class="checkbox">
						<label><input type="checkbox" required>Agree Terms & conditions</label>
					</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form></p>';
					
				if( $_GET['sent'] == 'success' )
					{
						echo '<div class="alert alert-success">
								  <strong>Success!</strong> Thank You for your querry '.$_GET['name'].'. We will get back to you in a while.
								</div>';
					}
				else {}
}
elseif($_GET['q'] == 'feedback'){
			echo '<h1 style="font-size: xx-large; color: black; font-weight: 600;">Feedback</h1><br />
					<p><form action="admin/functions/feedback.php" method="post">
					<div class="row"><div class="col-sm-6">
					<div class="form-group">
						<label for="text">First Name:</label>
						<input type="text" class="form-control" name="name" id="text" required>
					</div>
					</div>
					<div class="col-sm-6">
					<div class="form-group">
						<label for="text">First Name:</label>
						<input type="text" class="form-control" name="business" id="text" required>
					</div>
					</div></div>
					<div class="row"><div class="col-sm-6">
					<div class="form-group">
						<label for="text">Mobile Number:</label>
						<input type="number" class="form-control" name="mobile" id="text" pattern=".{10,10}" required>
					</div>
					</div>
					<div class="col-sm-6">
					<div class="form-group">
						<label for="text">Email Address:</label>
						<input type="email" class="form-control" name="email" id="text" required>
					</div>
					</div></div>
					<div class="form-group">
						<label for="text">What would you like to say to us?</label>
						<textarea type="text" class="form-control" name="querry" id="text" maxlength="500" required></textarea>
					</div>
						<div class="checkbox">
						<label><input type="checkbox" required>Agree Terms & conditions</label>
					</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form></p>';
					
				if( $_GET['sent'] == 'success' )
					{
						echo '<div class="alert alert-success">
								  <strong>Success!</strong> Thank You for your querry '.$_GET['name'].'. We will get back to you in a while.
								</div>';
					}
				else {}
}
else{
	include_once "admin/functions/db.php";
	$sql = "SELECT * FROM faq WHERE Menu = 1 ORDER BY ID ASC";
	$res = mysqli_query( $db, $sql );
	
	if( !is_bool($res) )
	{
		while($array = mysqli_fetch_array($res))
		{
			$string = $array['Answer'];
			$patterns = array();
			$patterns[0] = '/@enter@/';
			$replacements = array();
			$replacements[0] = '<br>';
			$ans = preg_replace($patterns, $replacements, $string);
			echo '<div class="panel-group" id="accordion">
					  <div class="panel panel-default">
						<div id="panel-heading" class="panel-heading">
						  <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$array['ID'].'">
						   <h4 id="panel-title" class="panel-title">'.$array['Question'].'</h4>
						  </a>
						</div>
						<div id="collapse'.$array['ID'].'" class="panel-collapse collapse">
						  <div id="panel-body" class="panel-body">'.$ans.'</div>
						</div>
					  </div>
					</div>';}}}?>
				</div>
			  </div>
			  <div class="col-sm-1"></div>
			</div>
		</div><!-- tab content -->
		</section> <!-- cd-faq -->
        <!-- end Features -->



        <?php include "footer.php";?>
        

        <!-- Back to top -->    
        <a href="#" class="back-to-top" id="back-to-top"> <i class="pe-7s-angle-up"> </i> </a>


        <!-- js placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery-2.1.4.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.waypoints.min.js"></script>

		<script>
			$(function() {
				$('.clickers').click( function() {
					showUser($(this).children().attr('value'));
					$('.clickers').attr('class', 'clickers');
					$(this).attr('class', 'active clickers');
				});
			});
		</script>
        <!-- Jquery easing -->                                                      
        <script type="text/javascript" src="assets/js/jquery.easing.1.3.min.js"></script>

        <!--sticky header-->
        <script type="text/javascript" src="assets/js/jquery.sticky.js"></script>

        <!--common script for all pages-->
        <script src="assets/js/jquery.app.js"></script>
		<script type="text/javascript">
		var waypoint = new Waypoint({
		  element: document.getElementById('faq'),
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