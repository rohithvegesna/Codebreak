<?php
	include_once('db.php'); 
		
		$time = time();
		$name = mysqli_real_escape_string($conn, $_POST['email']);
		$page = mysqli_real_escape_string($conn, $_POST['page']);
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		
		$sql = "CREATE TABLE IF NOT EXISTS subscribers ( ID INT NOT NULL AUTO_INCREMENT, Email TEXT, Doe TEXT, PRIMARY KEY (ID) )";
		$qury = mysqli_query($conn, $sql);
		if(!$qury) echo "Database Error ! Failed !";

		$sql = "INSERT into subscribers (`Email`, `Doe`) VALUES ('$email', '$time')";
		$qury = mysqli_query($conn, $sql);
		if(!$qury) echo "Database Error ! Failed !";
		mysqli_close( $conn );
		if(!$qury) {
			echo "Database Error ! Failed !";
		}
		else {
				if($page == 'blog'){
					header("Location: ../../blog.php?sub=yes");
				}
				elseif($page == 'blogdes'){
					header("Location: ../../blogitem.php?id=".$id."&sub=yes");
				}
			}