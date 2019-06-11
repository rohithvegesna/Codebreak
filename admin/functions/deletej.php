<?php
	include_once('db.php'); 

		$code = mysqli_real_escape_string($conn, $_GET['id']);
		$sql = "DELETE FROM ajobs WHERE ID='$code'";
		$qury = mysqli_query($db, $sql);
		mysqli_close( $conn );
		if(!$qury) {
			echo "Database Error ! Failed !";
		}
		else {
			header("Location: ../application.php");
		}