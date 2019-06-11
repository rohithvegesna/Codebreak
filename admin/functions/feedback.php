<?php
	include_once('db.php'); 
		
		$time = time();
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$business = mysqli_real_escape_string($conn, $_POST['business']);
		$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$querry = mysqli_real_escape_string($conn, $_POST['querry']);
		$seen = "danger";
		
		$sql = "CREATE TABLE IF NOT EXISTS feedback ( ID INT NOT NULL AUTO_INCREMENT, FirstName TEXT, LastName TEXT, Mobile TEXT, Email TEXT, Querry TEXT, Reply TEXT, Seen TEXT, Doe TEXT, PRIMARY KEY (ID) )";
		$qury = mysqli_query($conn, $sql);
		if(!$qury) echo "Database Error ! Failed !";

		$sql = "INSERT into feedback (`FirstName`, `LastName`, `Mobile`, `Email`, `Querry`, `Reply`, `Seen`, `Doe`) VALUES ('$name', '$business', '$mobile', '$email', '$querry', '', '$seen', '$time')";
		$qury = mysqli_query($conn, $sql);
		if(!$qury) echo "Database Error ! Failed !";
		mysqli_close( $conn );
		if(!$qury) {
			echo "Database Error ! Failed !";
		}
		else {
			header("Location: ../../faq.php?sent=success&name=".$name."&q=feedback");
			}