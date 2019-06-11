<?php
 
	session_start(); # Starts the session
 
	session_unset(); #removes all the variables in the session
 
	session_destroy(); #destroys the session
 
	if(!isset($_SESSION['userName']))
   		echo 
				header('Location: login.php');
	else
   		 echo "Error Occured!!<br />";
 
?>