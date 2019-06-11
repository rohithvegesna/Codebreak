<?php
session_start();
/* print_r(array_keys(print_r($_SESSION)));
echo (json_encode($_SESSION['answerString']));die;exit; */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Chart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>
<body style="background-color: #1A2B32;">

<div class="container" style="background-color: #1A2B32;">
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
	$json       = file_get_contents('http://codebreak.in/admin/functions/DB_Function_User_Temp.php?answer='.(json_encode($_SESSION['answerString'])));
	
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
				pointRadius: 0,
				pointHitRadius: 10,
				data: [<?php

	$ages = $jsonAsArray['salaryProjection'];
	foreach ($ages as $age)
	{
		echo $age.",";
	}
	?>],
	borderColor: [
                'white'
            ],
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
				pointRadius: 0,
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
			legend: {
				display: false
			 },
			 tooltips: {
				enabled: false
			 },
			scales: {
				xAxes: [{
					display: false
				}],
				yAxes: [{
					display: false
				}]
			}
		}
	});
}
</script>
</div>

</body>
</html>