<?php
	include_once('db.php'); 

		$code = mysqli_real_escape_string($conn, $_GET['id']);
		$sql = "DELETE FROM clients WHERE ID='$code'";
		$qury = mysqli_query($db, $sql);
		mysqli_close( $conn );
		if(!$qury) {
			echo "Database Error ! Failed !";
		}
		else {
			$resu = glob("../img/".$code."_blog_*");
			for ($i = 0; $i < count($resu); $i++){
				unlink($resu[$i]);
			}
			header("Location: ../users.php");
		}