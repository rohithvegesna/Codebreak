<?php
	include_once('db.php'); 
		
		$time = time();
		$state = mysqli_real_escape_string($conn, $_POST['state']);
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$business = mysqli_real_escape_string($conn, $_POST['business']);
		$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$querry = mysqli_real_escape_string($conn, $_POST['querry']);
		$seen = "danger";
		
		$sql = "CREATE TABLE IF NOT EXISTS contact ( ID INT NOT NULL AUTO_INCREMENT, State TEXT, Name TEXT, Business TEXT, Mobile TEXT, Email TEXT, Querry TEXT, Reply TEXT, Seen TEXT, Doe TEXT, PRIMARY KEY (ID) )";
		$qury = mysqli_query($conn, $sql);
		if(!$qury) echo "Database Error ! Failed !";

		$sql = "INSERT into contact (`State`, `Name`, `Business`, `Mobile`, `Email`, `Querry`, `Reply`, `Seen`, `Doe`) VALUES ('$state', '$name', '$business', '$mobile', '$email', '$querry', '', '$seen', '$time')";
		$qury = mysqli_query($conn, $sql);
		if(!$qury) echo "Database Error ! Failed !";
		mysqli_close( $conn );
		if(!$qury) {
			echo "Database Error ! Failed !";
		}
		else {
			header("Location: ../../faq.php?sent=success&name=".$name."&q=contact");
			}