<?php
	include_once('db.php'); 
		
		$time = time();
		$jid = mysqli_real_escape_string($conn, $_POST['id']);
		$fn = mysqli_real_escape_string($conn, $_POST['fname']);
		$ln = mysqli_real_escape_string($conn, $_POST['lname']);
		$em = mysqli_real_escape_string($conn, $_POST['email']);
		$ph = mysqli_real_escape_string($conn, $_POST['phone']);
		$curcom = mysqli_real_escape_string($conn, $_POST['curcom']);
		$curtit = mysqli_real_escape_string($conn, $_POST['curtit']);
		$pflink = mysqli_real_escape_string($conn, $_POST['pflink']);
		$whf = mysqli_real_escape_string($conn, $_POST['hirejob']);
		$cv = mysqli_real_escape_string($conn, $_POST['cvlink']);
		
		$sql = "CREATE TABLE IF NOT EXISTS ajobs ( ID INT NOT NULL AUTO_INCREMENT, Jid TEXT, Fname TEXT, Lname TEXT, Email TEXT, Phone TEXT, Currcom TEXT, Currtit TEXT, Pflink TEXT, Whf TEXT, Cv TEXT, Doe TEXT, PRIMARY KEY (ID) )";
		$qury = mysqli_query($conn, $sql);
		if(!$qury) echo "Database Error ! Failed !";

		$sql = "INSERT into ajobs (`Jid`, `Fname`, `Lname`, `Email`, `Phone`, `Currcom`, `Currtit`, `Pflink`, `Whf`, `Cv`, `Doe`) VALUES ('$jid', '$fn', '$ln', '$em', '$ph', '$curcom', '$curtit', '$pflink', '$whf', '$cv', '$time')";
		$qury = mysqli_query($conn, $sql);
		if(!$qury) echo "Database Error ! Failed !";
		mysqli_close( $conn );
		if(!$qury) {
			echo "Database Error ! Failed !";
		}
		else {
			header("Location: ../../applyjob.php?id=".$jid);
			}