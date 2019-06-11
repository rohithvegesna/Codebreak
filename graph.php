<?php
	$_SESSION['page'] = null;
	session_start();
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
		.sub-title {
			text-align: justify !important;
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
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>


    <body data-spy="scroll" data-target="#navbar-menu">
		<!-- Features -->
        <section class="section bg-light" id="features">
            <div class="container">
				<div class="row">
                    <div class="col-sm-12 text-center">
						<canvas id="myChart" width="400" height="400"></canvas>
						<script>
						callInitChart();
						function callInitChart() {
							var ctx = document.getElementById("myChart");
							var ctx1 = document.getElementById("myChart").getContext("2d");
							ctx1.canvas.width = 200;
							ctx1.canvas.height = 100;
							var myChart = new Chart(ctx, {
								type: 'line',
								data: {
									labels: [<?php
							$json       = file_get_contents('http://'.$_SERVER['HTTP_HOST'].'/admin/functions/DB_Function_User_Temp.php?answer='.(json_encode($_SESSION['answerString'])));
							
							$jsonAsArray    = json_decode($json, TRUE);
							$ages = $jsonAsArray['age_projection'];
							foreach ($ages as $age)
							{
								echo $age.",";
							}
							?>],
									datasets: [{
										label: "Salary",
										fill: false,
										lineTension: 0.1,
										backgroundColor: "rgba(75,192,192,0.4)",
										borderColor: "rgba(75,192,192,1)",
										borderCapStyle: 'butt',
										borderDash: [],
										borderDashOffset: 0.0,
										borderJoinStyle: 'miter',
										pointBorderColor: "rgba(75,192,192,1)",
										pointBackgroundColor: "#fff",
										pointBorderWidth: 1,
										pointHoverRadius: 7,
										pointHoverBackgroundColor: "rgba(75,192,192,1)",
										pointHoverBorderColor: "rgba(220,220,220,1)",
										pointHoverBorderWidth: 2,
										pointRadius: 5,
										pointHitRadius: 10,
										data: [<?php

							$ages = $jsonAsArray['salaryProjection'];
							foreach ($ages as $age)
							{
								echo $age.",";
							}
							?>],
									},
									{
										label: "Expences",
										fill: false,
										lineTension: 0.1,
										backgroundColor: "rgba(192, 75, 75,0.4)",
										borderColor: "rgba(192, 75, 75,1)",
										borderCapStyle: 'butt',
										borderDash: [],
										borderDashOffset: 0.0,
										borderJoinStyle: 'miter',
										pointBorderColor: "rgba(192, 75, 75,1)",
										pointBackgroundColor: "#fff",
										pointBorderWidth: 1,
										pointHoverRadius: 7,
										pointHoverBackgroundColor: "rgba(192, 75, 75,1)",
										pointHoverBorderColor: "rgba(220,220,220,1)",
										pointHoverBorderWidth: 2,
										pointRadius: 5,
										pointHitRadius: 10,
										data: [<?php

							$ages = $jsonAsArray['finalExpense'];
							foreach ($ages as $age)
							{
								echo $age.",";
							}
							?>],
									}]
								},
								options: {
									scales: {
										yAxes: [{
											ticks: {
												beginAtZero:true
											}
										}]
									}
								}
							});
						}
						</script>
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