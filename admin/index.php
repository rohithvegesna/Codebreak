<?php
	 session_start();
	if( !isset($_SESSION['userName']))
	{
		header('Location: login.php');
	}
?>

<?php
	if( $_SESSION['IsAdmin'] )
	{
		header('Location: index1.php');
	}
	else
	{
		header('Location: feedback.php');
	}
?>