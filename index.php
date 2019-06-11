<?php
	session_destroy();
	$_SESSION['page'] = 'index';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta name="p:domain_verify" content="324577b24b834e639a224432ed1da498"/>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Codebreak">

		<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

        <title>Codebreak</title>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Open+Sans|Chivo:900|Playfair+Display:700|Roboto:400,300,500,700|Oswald:400,500,600,700|Vollkorn:400,700" rel="stylesheet">
		
        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <!-- Font Icons CSS -->
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">

        <!-- Color style -->
        <link href="assets/css/colors/default.css" rel="stylesheet">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
		
		<style>
		.cusfont {
			font-family: "Alfa Slab One", cursive !important;
		}		
		.blogdes {
			font-family: 'Open Sans', sans-serif !important;
		}
		.bgim {
			font-family: 'Oswald', bold !important;
			color: #fff;
			opacity: 0.9;
		}
		#btn{
			background-color: transparent;
			border-color: white;
			font-size: large;
			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;
		}
		#btn:hover {
			background-color: white; /* Green */
			color: black;
		}
		label > input[type="radio"]{
		  visibility: hidden;
		  position: absolute;
		}
		#qbtn:hover{
			background-color: white !important;
			color: black !important;
			transition: 0.5s;
		}
		</style>
		
		<style>
        /* code for animated blinking cursor */
        .typed-cursor{
            opacity: 1;
            font-weight: 100;
			font-size: 36px;
            -webkit-animation: blink 0.7s infinite;
            -moz-animation: blink 0.7s infinite;
            -ms-animation: blink 0.7s infinite;
            -o-animation: blink 0.7s infinite;
            animation: blink 0.7s infinite;
        }
        @-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
        @-webkit-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
        @-moz-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
        @-ms-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
        @-o-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
    </style>
	
	<script>
	function showUser(str) {
		var qno = $('#qno').val();
		if (str == "" && (qno != 2)) {
			document.getElementById("txtHint").innerHTML = "";
			return;
		}
		else if ((str == "" || str < 100000) && (qno == 2)) {
			$('#sal').val('');
			$('#sal').css({"border-color":"red", "border-width":"thick"});
			$('#sal').attr("placeholder", "Please enter a  valid amount.");
			return;
		}else { 
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
					// callInitChart();
				}
			};
			xmlhttp.open("GET","admin/functions/getque.php?q="+str+"&que="+$('#qno').val(),true);
			xmlhttp.send();
		}
	}
	
	function showUser1(str) {
		var qno = $('#qno').val();
		var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		if (str == "" || (!filter.test(str))) {
			$('#sal').val('');
			$('#sal').css({"border-color":"red", "border-width":"thick"});
			$('#sal').attr("placeholder", "Please enter a  valid email.");
			return;
		}else { 
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
					// callInitChart();
				}
			};
			xmlhttp.open("GET","admin/functions/getque.php?q="+str+"&que="+$('#qno').val(),true);
			xmlhttp.send();
		}
	}
	</script>
	<script>
	$(document).ready(function(){
		$('#btn').click(function(){
			$('#hideque').remove();
			$("#showque").removeAttr("style");
		});
	});
	$(document).ready(function () {
		$("body").keypress(function(e) {
			if (e.which == 13) {
			return false;
			}
		});
	});
	</script>
    </head>


    <body data-spy="scroll" data-target="#navbar-menu" style="background-color: #1A2B32;">

        <?php include "head.php";?>


        <!-- Features -->
        <section class="bg-custom home" id="home" style="background-color: #1A2B32; height: 900px;">
		<div class="container">
		<div class="home-fullscreen" id="home-fullscreen">
			<div class="full-screen">
			<div class="row">
				<div class="col-sm-12 text-center">
					<div class="row">
					<div class="col-sm-12 bgim home-wrapper home-wrapper-alt">
							<div id="hideque">
								<div class="jumbotron" style="background-color: transparent;">
									<h1 style="font-weight: 900;">THE MOBILE APPLICATION</h1>
									<h2 style="font-size: 25px;display:inline-block;padding-right:5px;text-align:left;">THAT DETERMINES* IF YOU CAN AFFORD</h2>
									<div id="typed-strings">
										<h1>THAT SWEET RIDE</h1>
										<h1>THAT OVERPRICED SMARTPHONE</h1>
										<h1>THAT OVERSEAS VACATION</h1>
										<h1>THAT EXPENSIVE RESTAURANT</h1>
									</div>
									<span id="typed" style="white-space:pre;font-size: 25px; font-family: 'Oswald', bold !important; color: #fff; opacity: 0.9;"></span>
								</div>
								<button id="btn" class="fbutton btn">GET STARTED</button>
								<div class="row">
								<div class="col-sm-2"></div>
								<div class="col-sm-8"><br /><br /><br /><br /><br /><br /><br />
								<p style="font-family: 'Vollkorn', regular !important; font-size: large;">
									*We won't bore you with the details but we use the best financial analysis techniques to give you the autopilot, hands (and stress)-free investing experience that you deserve. (If you want do want the details, you can refer to our FAQ page!)
								</p>
								</div>
								<div class="col-sm-2"></div>
								</div>
							</div>
							<div id="showque" class="container" style="display: none;">
							<form>
								<div id="txtHint" style="vertical-align: middle;">
									<div class="jumbotron" style="background-color: transparent;">
										<div class="row text-center">
											<div class="col-sm-12 text-center">
												<h1 style="font-family: 'Oswald', bold !important; text-transform: uppercase; color: #fff; font-weight: 900;">How old are you?</h1>
												<div class="row text-center">
													<div class="col-sm-4"></div>
													<div class="col-sm-4 text-center">
														<input type="hidden" id="qno" value="1"><br /><br />
														<input style="font-size: x-large; color: white; background-color: transparent; border-color: white; border-width: medium; border-top-color: transparent; border-left-color: transparent; border-right-color: transparent;" type="number" class="valid form-control" placeholder="" onchange="showUser(this.value)"><br/>
														<div class="row text-center"><div class="col-sm-4"></div><div class="col-sm-4"><a id="qbtn" style="width: 100%; color: white; background-color: transparent; border-color: white; font-size: large;" class="btn btn-default btn-lg">ENTER</a></div><div class="col-sm-4"></div></div>
													</div>
													<div class="col-sm-4"></div>
												</div>											
											</div>
										</div>
									</div>
								</div>
							</form>
							</div>
					</div>
					</div>
				</div>
				</div>
			</div>
			</div>
			</div> <!-- end container -->
        </section>
        <!-- end Features -->



        <?php include "footer.php";?>
        

        <!-- Back to top -->    
        <a href="#" class="back-to-top" id="back-to-top"> <i class="pe-7s-angle-up"> </i> </a>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="assets/js/typed.js" type="text/javascript"></script>
		
		<script>
		$(function(){

			$("#typed").typed({
				stringsElement: $('#typed-strings'),
				typeSpeed: 100,
				backDelay: 1500,
				loop: true,
				contentType: 'html', // or text
				// defaults to false for infinite loop
				loopCount: false,
				onStringTyped: function(){ foo(); },
				// resetCallback: function() { newTyped(); }
			});

			$(".reset").click(function(){
				$("#typed").typed('reset');
			});

		});

		function newTyped(){  }
		
		function foo(){}
		</script>

        <!-- js placed at the end of the document so the pages load faster -->

        <!-- Jquery easing -->                                                      
        <script type="text/javascript" src="assets/js/jquery.easing.1.3.min.js"></script>

        <!--sticky header-->
        <script type="text/javascript" src="assets/js/jquery.sticky.js"></script>

        <!--common script for all pages-->
        <script src="assets/js/jquery.app.js"></script>
		

    </body>
</html>