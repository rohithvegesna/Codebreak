<?php
	include_once('db.php'); 
		
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$reply = mysqli_real_escape_string($conn, $_POST['reply']);
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		
		$sql = "UPDATE feedback SET Reply='".$reply."', Seen='success' WHERE ID='".$id."'";
		$qury = mysqli_query($conn, $sql);
		mysqli_close( $conn );
		if(!$qury) {
			echo "Database Error ! Failed !";
		}
		else {
			header("Location: ../mail/replymail.php?email=".urlencode($email)."&reply=".urlencode($reply)."&page=feedback");
			}