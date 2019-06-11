<?php
	include_once('db.php'); 
		
		$time = time();
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$loc = mysqli_real_escape_string($conn, $_POST['loc']);
		$wtd = mysqli_real_escape_string($conn, $_POST['wtd']);
		$wlf = mysqli_real_escape_string($conn, $_POST['wlf']);
		
		$sql = "CREATE TABLE IF NOT EXISTS jobs ( ID INT NOT NULL AUTO_INCREMENT, Title TEXT, Location TEXT, Wtd TEXT, Wlf TEXT, Doe TEXT, PRIMARY KEY (ID) )";
		$qury = mysqli_query($conn, $sql);
		if(!$qury) echo "Database Error ! Failed !";

		$sql = "INSERT into jobs (`Title`, `Location`, `Wtd`, `Wlf`, `Doe`) VALUES ('$title', '$loc', '$wtd', '$wlf', '$time')";
		$qury = mysqli_query($conn, $sql);
		if(!$qury) echo "Database Error ! Failed !";
		mysqli_close( $conn );
		if(!$qury) {
			echo "Database Error ! Failed !";
		}
		else {
			header("Location: ../newjob.php");
			}